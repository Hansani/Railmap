<?php
/**
 * Created by PhpStorm.
 * User: Hansi
 * Date: 14/04/2017
 * Time: 13:23
 */

namespace App\DBModel;

use App\DBConnection\DBConnector;

class Phone
{
    public $person_id;
    public $phone_type;
    public $phone_no;

    public function insert()
    {
        $db = DBConnector::getDatabase();

        if (isset($db)) {
            $stm = $db->prepare("INSERT INTO phone (person_id,phone_type,phone_no) VALUE (?,?,?)");
            $stm->bind_param("iss", $this->person_id, $this->phone_type, $this->phone_no);
            $execute = $stm->execute();
            echo('add to phone success');
            return $execute;
        }
        return false;
    }

    public static function get($person_id)
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stm = $db->prepare("SELECT phone_type, phone_no FROM phone WHERE person_id=?");
            $stm->bind_param('i', $person_id);
            if ($stm->execute()) {
                $result = $stm->get_result();
                if (isset($result)) {
                    $phones = array();
                    while ($phone_details = $result->fetch_assoc()) {
                        $phone = new Phone();
                        $phone->person_id = $person_id;
                        $phone->phone_type = $phone_details['phone_type'];
                        $phone->phone_no = $phone_details['phone_no'];

                        $phones[$phone_details['phone_type']] = $phone;
                    }
                    return $phones;
                }
            }
        }
        return false;
    }

    public function update()
    {
        $db = DBConnector::getDatabase();

        if (isset($db)) {
            $phones = self::get($this->person_id);
            foreach ($phones as $phone) {
                if ($phone->phone_type == $this->phone_type) {
                    $stm = $db->prepare("UPDATE phone SET phone_no=? WHERE person_id=? AND phone_type=?");
                    $stm->bind_param('sis', $this->phone_no, $this->person_id, $this->phone_type);
                    return $stm->execute();
                }
            }
            return $this->insert();
        }
        return false;
    }

}