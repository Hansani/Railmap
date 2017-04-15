<?php
/**
 * Created by PhpStorm.
 * User: Hansi
 * Date: 14/04/2017
 * Time: 13:16
 */

namespace App\DBModel;

use App\DBConnection\DBConnector;

class Station
{
    public $station_code;
    public $name;
    public $type;
    public $line_no;
    public $district;
    public $province;

    public function insert()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stm = $db->prepare("INSERT INTO station (station_code,name,type,line_no,district,province) VALUES (?,?,?,?,?,?)");
            $stm->bind_param("sssiss", $this->station_code, $this->name, $this->type, $this->line_no, $this->district, $this->province);
            return $stm->execute();
        }
        return false;
    }

    public static function getAll()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $sql = "SELECT * FROM station";
            $result = $db->query($sql);

            if (isset($result)) {

                $stations = array();
                while ($row = $result->fetch_assoc()) {
                    $station = new Station();
                    $station->station_code = $row['station_code'];
                    $station->name = $row['name'];
                    $station->type = $row['type'];
                    $station->line_no = $row['line_no'];
                    $station->province = $row['province'];
                    $station->district = $row['district'];
                    $stations[] = $station;
                }
                return $stations;
            }
        }
        return false;
    }

    public static function get($station_code)
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stmt = $db->prepare("SELECT * FROM station WHERE station_code=?");
            $stmt->bind_param("s", $station_code);

            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if (isset($result)) {
                    $row = $result->fetch_assoc();

                    $station = new Station();
                    $station->station_code = $station_code;
                    $station->name = $row['name'];
                    $station->type = $row['type'];
                    $station->line_no = $row['line_no'];
                    $station->district = $row['district'];
                    $station->province = $row['province'];
                    return $station;
                }
            }
        }
        return false;
    }

    public function remove()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stm = $db->prepare("DELETE FROM station WHERE station_code=?");
            $stm->bind_param("s", $this->station_code);
            $executed = $stm->execute();
            return $executed;
        }
        return false;
    }

    public function update()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stmt = $db->prepare("UPDATE station SET name=?, type=? WHERE station_code=?");
            $stmt->bind_param("sss", $this->name, $this->type, $this->station_code);
            return $stmt->execute();
        }
        return false;
    }


}