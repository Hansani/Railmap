<?php
/**
 * Created by PhpStorm.
 * User: Hansi
 * Date: 14/04/2017
 * Time: 13:16
 */

namespace App\DBModel;

use App\DBConnection\DBConnector;

class TrainStation
{
    public $train_no;
    public $station_code;

    public function insert()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stm = $db->prepare("INSERT INTO train_station (train_no,station_code) VALUES (?,?)");
            $stm->bind_param("is", $this->train_no, $this->station_code);
            return $stm->execute();
        }
        return false;
    }

    public static function getAll()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $sql = "SELECT * FROM train_station";
            $result = $db->query($sql);

            if (isset($result)) {

                $train_stations = array();
                while ($row = $result->fetch_assoc()) {
                    $train_station = new TrainStation();
                    $train_station->train_no = $row['train_no'];
                    $train_station->station_code = $row['station_code'];
                    $train_stations = $train_station;
                }
                return $train_stations;
            }
        }
        return false;
    }

    public static function getStation($train_no)
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stmt = $db->prepare("SELECT station_code FROM train_station WHERE train_no=?");
            $stmt->bind_param("i", $train_no);

            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if (isset($result)) {
                    $row = $result->fetch_assoc();

                    $train_station = new TrainStation();
                    $train_station->train_no = $train_no;
                    $train_station->station_code = $row['station_code'];
                    return $train_station;
                }
            }
        }
        return false;
    }

    public function remove()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stm = $db->prepare("DELETE FROM train_station WHERE train_no=? AND station_code=?");
            $stm->bind_param("is", $this->train_no, $this->station_code);
            $executed = $stm->execute();
            return $executed;
        }
        return false;
    }

    public function update()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stmt = $db->prepare("UPDATE train_station SET station_code=? WHERE train_no=?");
            $stmt->bind_param("si", $this->station_code, $this->train_no);
            return $stmt->execute();
        }
        return false;
    }
}