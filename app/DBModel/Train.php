<?php
/**
 * Created by PhpStorm.
 * User: Hansi
 * Date: 14/04/2017
 * Time: 13:16
 */

namespace App\DBModel;

use App\DBConnection\DBConnector;


class Train
{
    public $train_no;
    public $name;
    public $type;
    public $source_station;
    public $departure_time;
    public $destination_station;
    public $arrival_time;
    public $classes;
    public $availability;

    public function insert()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stm = $db->prepare("INSERT INTO train (train_no,name,type,source_station,departure_time,destination_station,arrival_time,classes,availability) VALUES (?,?,?,?,?,?,?,?,?)");
            $stm->bind_param("issssssss", $this->train_no, $this->name, $this->type, $this->source_station, $this->departure_time, $this->destination_station,$this->arrival_time,$this->classes,$this->availability);
            return $stm->execute();
        }
        return false;
    }

    public static function getAll()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $sql = "SELECT * FROM train";
            $result = $db->query($sql);

            if (isset($result)) {

                $trains = array();
                while ($row = $result->fetch_assoc()) {
                    $train = new Train();
                    $train->train_no = $row['train_no'];
                    $train->name = $row['name'];
                    $train->type = $row['type'];
                    $train->source_station = $row['source_station'];
                    $train->departure_time = $row['departure_time'];
                    $train->destination_station = $row['destination_station'];
                    $train->arrival_time = $row['arrival_time'];
                    $train->classes = $row['classes'];
                    $train->availability = $row['availability'];
                    $trains[] = $train;
                }
                return $trains;
            }
        }
        return false;
    }

    public static function get($train_no)
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stmt = $db->prepare("SELECT * FROM train WHERE train_no=?");
            $stmt->bind_param("i", $train_no);

            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if (isset($result)) {
                    $row = $result->fetch_assoc();

                    $train = new Train();
                    $train->train_no = $train_no;
                    $train->name = $row['name'];
                    $train->type = $row['type'];
                    $train->source_station = $row['source_station'];
                    $train->departure_time = $row['departure_time'];
                    $train->destination_station = $row['destination_station'];
                    $train->arrival_time = $row['arrival_time'];
                    $train->classes = $row['classes'];
                    $train->availability = $row['availability'];
                    return $train;
                }
            }
        }
        return false;
    }

    public function remove()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stm = $db->prepare("DELETE FROM train WHERE train_no=?");
            $stm->bind_param("i", $this->train_no);
            $executed = $stm->execute();
            return $executed;
        }
        return false;
    }

    public function update()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stmt = $db->prepare("UPDATE train SET name=?, type=?, source_station=?, departure_time=?, destination_station=?, arrival_time=?, classes=?, availability=? WHERE train_no=?");
            $stmt->bind_param("ssssssssi", $this->name, $this->type, $this->source_station, $this->departure_time, $this->destination_station, $this->arrival_time, $this->classes, $this->availability);
            return $stmt->execute();
        }
        return false;
    }


}