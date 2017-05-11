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

    public static function getAll()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $sql = "SELECT customer.person_id,nic,title,first_name,last_name,street_no,street_name,city,province,postal_code,email,country FROM customer 
                    LEFT OUTER JOIN person ON customer.person_id=person.person_id";
            $customers_array = $db->query($sql);
            $customers = array();
            while ($customer_details = $customers_array->fetch_assoc()) {
                $customer = new Customer();

                $customer->person_id = $customer_details['person_id'];
                $customer->nic = $customer_details['nic'];
                $customer->title = $customer_details['title'];
                $customer->first_name = $customer_details['first_name'];
                $customer->last_name = $customer_details['last_name'];
                $customer->street_no = $customer_details['street_no'];
                $customer->street_name = $customer_details['street_name'];
                $customer->city = $customer_details['city'];
                $customer->province = $customer_details['province'];
                $customer->postal_code = $customer_details['postal_code'];
                $customer->email = $customer_details['email'];
                $customer->country = $customer_details['country'];

                $customers[$customer_details['person_id']] = $customer;
            }
            return $customers;
        }
    }
}