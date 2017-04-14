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
                if ($this->mobile_no !=null){
                    $phone = new Phone();
                    $phone->person_id=$person_id;
                    $phone->phone_type="mobile";
                    $phone->phone_no=$this->mobile_no;
                    $phone->insert();
                }
                if ($this->emergency_no != null){
                    $phone = new Phone();
                    $phone->person_id=$person_id;
                    $phone->phone_type="emergency";
                    $phone->phone_no=$this->emergency_no;
                    $phone->insert();
                }
               // return $person_id;
            }
            return $person_id;
        }
    }
    
    
}

