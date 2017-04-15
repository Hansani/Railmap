<?php
/**
 * Created by PhpStorm.
 * User: Hansi
 * Date: 14/04/2017
 * Time: 13:17
 */

namespace App\DBModel;

use App\DBConnection\DBConnector;

class Seat
{
    public $train_no;
    public $available_class;
    public $no_of_seat;

    public function insert()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stm = $db->prepare("INSERT INTO seat (train_no,available_class,no_of_seat) VALUES (?,?,?)");
            $stm->bind_param("isi", $this->train_no, $this->available_class, $this->no_of_seat);
            return $stm->execute();
        }
        return false;
    }

    public static function getAll()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $sql = "SELECT * FROM seat";
            $result = $db->query($sql);

            if (isset($result)) {

                $seats = array();
                while ($row = $result->fetch_assoc()) {
                    $seat = new Seat();
                    $seat->train_no = $row['train_no'];
                    $seat->available_class = $row['available_class'];
                    $seat->no_of_seat = $row['no_of_seat'];
                    $seats = $seat;
                }
                return $seats;
            }
        }
        return false;
    }


    public function remove()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stm = $db->prepare("DELETE FROM seat WHERE train_no=? AND available_class=?");
            $stm->bind_param("is", $this->train_no, $this->available_class);
            $executed = $stm->execute();
            return $executed;
        }
        return false;
    }

    public function update()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stmt = $db->prepare("UPDATE seat SET no_of_seat=? WHERE train_no=? ANd available_class=?");
            $stmt->bind_param("iis", $this->no_of_seat, $this->train_no, $this->available_class);
            return $stmt->execute();
        }
        return false;
    }
}