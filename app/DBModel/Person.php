<?php
/**
 * Created by PhpStorm.
 * User: Hansi
 * Date: 14/04/2017
 * Time: 11:22
 */

namespace App\DBModel;

use App\DBConnection\DBConnector;

abstract class Person
{
    public $person_id;
    public $nic;
    public $title;
    public $first_name;
    public $last_name;
    public $street_no;
    public $street_name;
    public $city;
    public $province;
    public $postal_code;
    public $email;

    public $home_no;
    public $mobile_no;
    public $emergency_no;

    public function insert()
    {
        $db = DBConnector::getDatabase();

        if (isset($db)) {
            $stm = $db->prepare("INSERT INTO person(nic,title,first_name,last_name,street_no,street_name,city,province,postal_code,email) VALUE (?,?,?,?,?,?,?,?,?,?)");
            $stm->bind_param("ssssssssss", $this->nic, $this->title, $this->first_name, $this->last_name, $this->street_no, $this->street_name, $this->city, $this->province, $this->postal_code, $this->email);
            $execute = $stm->execute();

            if ($execute) {
                $person_id = mysqli_insert_id($db);
                if ($this->home_no != null) {
                    $phone = new Phone();
                    $phone->person_id = $person_id;
                    $phone->phone_type = "home";
                    $phone->phone_no = $this->home_no;
                    $phone->insert();
                }
                if ($this->mobile_no != null) {
                    $phone = new Phone();
                    $phone->person_id = $person_id;
                    $phone->phone_type = "mobile";
                    $phone->phone_no = $this->mobile_no;
                    $phone->insert();
                }
                if ($this->emergency_no != null) {
                    $phone = new Phone();
                    $phone->person_id = $person_id;
                    $phone->phone_type = "emergency";
                    $phone->phone_no = $this->emergency_no;
                    $phone->insert();
                }
                return $person_id;
            }
        }
    }

    public function update()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stmt = $db->prepare("UPDATE person SET nic=?,title=?,first_name=?,last_name=?,street_no=?,street_name=?,city=?,province=?, postal_code=?,email=? WHERE person_id=?");
            $stmt->bind_param("ssssssssssi", $this->nic, $this->title, $this->first_name, $this->last_name, $this->street_no, $this->street_name, $this->city, $this->province, $this->postal_code, $this->email, $this->person_id);
            if ($stmt->execute()) {
                $phones = Phone::get($this->person_id);
                if (isset($phones['home'])) {
                    $phones['home']->phone_no = $this->home_no;
                    $phones['home']->update();
                } elseif (isset($this->home_no)) {
                    $phone = new Phone();
                    $phone->person_id = $this->person_id;
                    $phone->phone_no = $this->home_no;
                    $phone->phone_type = "home";
                    $phone->insert();
                }
                if (isset($phones['mobile'])) {
                    $phones['mobile']->phone_no = $this->mobile_no;
                    $phones['mobile']->update();
                } elseif (isset($this->mobile_no)) {
                    $phone = new Phone();
                    $phone->person_id = $this->person_id;
                    $phone->phone_no = $this->mobile_no;
                    $phone->phone_type = "mobile";
                    $phone->insert();
                }
                if (isset($phones['emergency'])) {
                    $phones['emergency']->phone_no = $this->emergency_no;
                    $phones['emergency']->update();
                } elseif (isset($this->emergency_no)) {
                    $phone = new Phone();
                    $phone->person_id = $this->person_id;
                    $phone->phone_no = $this->emergency_no;
                    $phone->phone_type = "emergency";
                    $phone->insert();
                }
                return true;
            }
        }
        return false;
    }

    public static function getPerson($person_id, $person)
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stm = $db->prepare("SELECT nic, title, first_name, last_name, street_no, street_name, city, province, postal_code, email FROM person WHERE person_id=?");
            $stm->bind_param('i', $person_id);
            if ($stm->execute()) {
                $result = $stm->get_result()->fetch_assoc();
                if (isset($result)) {
                    $person->nic = $result['nic'];
                    $person->title = $result['title'];
                    $person->first_name = $result['first_name'];
                    $person->last_name = $result['last_name'];
                    $person->street_no = $result['street_no'];
                    $person->street_name = $result['street_name'];
                    $person->city = $result['city'];
                    $person->province = $result['province'];
                    $person->postal_oode = $result['postal_code'];
                    $person->email = $result['email'];

                    $phones = Phone::get($person_id);
                    foreach ($phones as $phone) {
                        if ($phone->phone_type == 'home') {
                            $person->home_no = $phone->phone_no;
                        }
                        if ($phone->phone_type == 'mobile') {
                            $person->home_no = $phone->phone_no;
                        }
                        if ($phone->phone_type == 'emergency') {
                            $person->home_no = $phone->phone_no;
                        }
                    }
                    return $person;
                }
            }
        }
    }


    public function remove($person_id)
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stm = $db->prepare("DELETE FROM person WHERE person_id=?");
            $stm->bind_param('i', $person_id);
            return $stm->execute();
        }
        return false;
    }


}

