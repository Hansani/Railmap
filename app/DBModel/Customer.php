<?php
/**
 * Created by PhpStorm.
 * User: Hansi
 * Date: 14/04/2017
 * Time: 13:15
 */

namespace App\DBModel;

use App\DBConnection\DBConnector;

class Customer extends Person
{
    public $country;

    public function insert()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            if (!isset($this->person_id)) {
                mysqli_begin_transaction($db);
                $person_id = parent::insert();
                if (isset($person_id)) {
                    $stm = $db->prepare("INSERT INTO customer (person_id, country) VALUES (?,?)");
                    $stm->bind_param("is", $this->person_id, $this->country);
                    $executed = $stm->execute();
                    mysqli_commit($db);
                    return $executed;
                }
            } else {
                $stm = $db->prepare("INSERT INTO customer (person_id, country) VALUES (?,?)");
                $stm->bind_param("is", $this->person_id, $this->country);
                $executed = $stm->execute();
                return $executed;
            }
        }
        return false;
    }

    public function update()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            mysqli_begin_transaction($db);
            if (parent::update()) {
                mysqli_commit($db);
                return true;
            }
        }
        return false;
    }

    public function get($person_id)
    {
        $customer = new Customer();
        $customer = parent::getPerson($person_id, $customer);

        if (isset($customer)) {
            $db = DBConnector::getDatabase();
            if (isset($db)) {
                $stmt = $db->prepare("SELECT * FROM customer WHERE person_id=?");
                $stmt->bind_param("i", $customer->person_id);
                if ($stmt->execute()) {
                    $result = $stmt->get_result()->fetch_assoc();

                    if (isset($result)) {
                        $customer->country = $result['country'];
                        return $customer;
                    }
                }
            }
        }
    }

    public function remove($person_id)
    {
        $db = DBConnector::getDatabase();
        if ($db != false) {
            $stm = $db->prepare("DELETE FROM customer WHERE id=?");
            $stm->bind_param("i", $person_id);
            $executed = $stm->execute();
            parent::remove($person_id);
            return $executed;
        } else {
            return false;
        }
    }
}