<?php
/**
 * Created by PhpStorm.
 * User: Hansi
 * Date: 14/04/2017
 * Time: 13:17
 */

namespace App\DBModel;

use App\DBConnection\DBConnector;

class Reservation
{
    public $reservation_no;
    public $customer_id;
    public $train_no;
    public $reserve_from;
    public $reserve_to;
    public $reserve_date;
    public $class;
    public $no_of_seat;
    public $accepted;

    public function insert()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stm = $db->prepare("INSERT INTO reservation (reservation_no,customer_id,train_no,reserve_from, reserve_to,reserve_date, class, no_of_seat) VALUES (?,?,?,?,?,?,?,?)");
            $stm->bind_param("iiissssi", $this->reservation_no, $this->customer_id, $this->train_no, $this->reserve_from, $this->reserve_to, $this->reserve_date, $this->class, $this->no_of_seat);
            return $stm->execute();
        }
        return false;
    }

    public static function getAll()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $sql = "SELECT * FROM reservation";
            $result = $db->query($sql);

            if (isset($result)) {

                $reservations = array();
                while ($row = $result->fetch_assoc()) {
                    $reservation = new Reservation();
                    $reservation->reservation_no = $row['reservation_no'];
                    $reservation->customer_id = $row['customer_id'];
                    $reservation->train_no = $row['train_no'];
                    $reservation->reserve_from = $row['reserve_from'];
                    $reservation->reserve_to = $row['reserve_to'];
                    $reservation->reserve_date = $row['reserve_date'];
                    $reservation->class = $row['class'];
                    $reservation->no_of_seat = $row['no_of_seat'];
                    $reservation->accepted = $row['accepted'];
                    $reservations[$row['reservation_no']] = $reservation;
                }
                return $reservations;
            }
        }
        return false;
    }

    public static function get($reservation_no)
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stmt = $db->prepare("SELECT * FROM reservation WHERE reservation_no=? AND accepted=0");
            $stmt->bind_param("i", $reservation_no);

            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if (isset($result)) {
                    $row = $result->fetch_assoc();

                    $reservation = new Reservation();
                    $reservation->reservation_no = $row['reservation_no'];
                    $reservation->customer_id = $row['customer_id'];
                    $reservation->train_no = $row['train_no'];
                    $reservation->reserve_from = $row['reserve_from'];
                    $reservation->reserve_to = $row['reserve_to'];
                    $reservation->reserve_date = $row['reserve_date'];
                    $reservation->class = $row['class'];
                    $reservation->no_of_seat = $row['no_of_seat'];
                    return $reservation;
                }
            }
        }
        return false;
    }

    public function remove()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stm = $db->prepare("DELETE FROM reservation WHERE reservation_no=?");
            $stm->bind_param("i", $this->reservation_no);
            $executed = $stm->execute();
            return $executed;
        }
        return false;
    }

    public function update()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stmt = $db->prepare("UPDATE reservation SET train_no=?,reserve_from=?, reserve_to=?, reserve_date=?, class=?, no_of_seat=? WHERE reservation_no=?");
            $stmt->bind_param("issssi", $this->train_no, $this->reserve_from, $this->reserve_to, $this->reserve_date, $this->class, $this->no_of_seat);
            return $stmt->execute();
        }
        return false;
    }

    public static function accept($reservation_no){
        $db = DBConnector::getDatabase();
        if(isset($db)){
            $stmt = $db->prepare("UPDATE reservation SET accepted=1 WHERE reservation_no=?");
            $stmt->bind_param("i", $reservation_no);
            return $stmt->execute();
        }
        return false;
    }
}