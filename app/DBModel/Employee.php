<?php
/**
 * Created by PhpStorm.
 * User: Hansi
 * Date: 14/04/2017
 * Time: 13:15
 */

namespace App\DBModel;

use App\DBConnection\DBConnector;

class Employee extends Person
{
    public $employee_id;
    public $use_name;
    public $designation;
    public $password;

    public function insert()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            if (!isset($this->person_id)) {
                mysqli_begin_transaction($db);
                $person_id = parent::insert();
                if (isset($person_id)) {
                    $stm = $db->prepare("INSERT INTO employee (person_id,employee_id,user_name,designation,password) VALUES (?,?,?,?,?) ");
                    $stm->bind_param("issss", $this->person_id, $this->employee_id, $this->use_name, $this->designation, $this->password);
                    $executed = $stm->execute();
                    mysqli_commit($db);
                    return $executed;
                }
            } else {
                $stm = $db->prepare("INSERT INTO employee (person_id,employee_id,user_name,designation,password) VALUES (?,?,?,?,?) ");
                $stm->bind_param("issss", $this->person_id, $this->employee_id, $this->use_name, $this->designation, $this->password);
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
                $stm = $db->prepare("UPDATE employee SET employee_id=?, user_name=?, designation=? WHERE person_id=?");
                $stm->bind_param("sssi", $this->employee_id, $this->use_name, $this->designation, $this->person_id);
                $executed = $stm->execute();
                mysqli_commit($db);
                return $executed;
            }
        }
        return false;
    }

    public function get($person_id)
    {
        $employee = new Employee();
        $employee = parent::getPerson($person_id, $employee);
        if (isset($employee)) {
            $db = DBConnector::getDatabase();
            if (isset($db)) {
                $stm = $db->prepare("SELECT * FROM employee WHERE person_id=?");
                $stm->bind_param("i", $this->person_id);
                if ($stm->execute()) {
                    $result = $stm->get_result()->fetch_assoc();
                    if (isset($result)) {
                        $employee->employee_id = $result['employee_id'];
                        $employee->user_name = $result['user_name'];
                        $employee->designation = $result['designation'];
                    }
                    return $employee;
                }
            }
        }
    }

    public function remove($person_id)
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stm = $db->prepare("DELETE FROM employee WHERE person_id=?");
            $stm->bind_param("i", $this->person_id);
            $executed = $stm->execute();
            parent::remove($person_id);
            return $executed;
        } else {
            return false;
        }
    }
}