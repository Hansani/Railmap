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
    public $user_name;
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
                    $stm->bind_param("issss", $this->person_id, $this->employee_id, $this->user_name, $this->designation, $this->password);
                    $executed = $stm->execute();
                    mysqli_commit($db);
                    return $executed;
                }
            } else {
                $stm = $db->prepare("INSERT INTO employee (person_id,employee_id,user_name,designation,password) VALUES (?,?,?,?,?) ");
                $stm->bind_param("issss", $this->person_id, $this->employee_id, $this->user_name, $this->designation, $this->password);
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
                $stm->bind_param("sssi", $this->employee_id, $this->user_name, $this->designation, $this->person_id);
                $executed = $stm->execute();
                mysqli_commit($db);
                return $executed;
            }
        }
        return false;
    }

    public static function get($person_id)
    {
        $employee = new Employee();
        $employee = parent::getPerson($person_id, $employee);
        if (isset($employee)) {
            $db = DBConnector::getDatabase();
            if (isset($db)) {
                $stm = $db->prepare("SELECT * FROM employee WHERE person_id=?");
                $stm->bind_param("i", $person_id);
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

    public static function changePassword($person_id, $old_password, $new_password)
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            mysqli_begin_transaction($db);

            $stmt = $db->prepare("SELECT password from employee WHERE person_id=?");
            $stmt->bind_param("i", $person_id);
            $stmt->execute();

            $current_password = $stmt->get_result()->fetch_assoc();
            if (password_verify($old_password, $current_password['password'])) {
                $new_password = bcrypt($new_password);
                $stmt = $db->prepare("UPDATE person SET password=? WHERE id=?");
                $stmt->bind_param("si", $new_password, $person_id);
                $executed = $stmt->execute();

                mysqli_commit($db);
                return $executed;
            }
            mysqli_commit($db);

        }
        return false;
    }

    public static function getAllEmployee(){
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $sql = "SELECT * FROM employee";
            
            $result = $db->query($sql);

            if (isset($result)) {

                $employees = array();
                while ($row = $result->fetch_assoc()) {
                    $employee = new Employee();
                    $employee->person_id = $row['person_id'];
                    $employee=Person::getPerson($employee->person_id,$employee);
                    $employees[] = $employee;
                }
                return $employees;
            }
        }
        return false;
    }
}