<?php
/**
 * Created by PhpStorm.
 * User: Hansi
 * Date: 14/04/2017
 * Time: 13:16
 */

namespace App\DBModel;

use App\DBConnection\DBConnector;

class Line
{
    public $line_no;
    public $name;
    public $distance;

    public function insert()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stm = $db->prepare("INSERT INTO line (name, distance) VALUES (?,?)");
            $stm->bind_param("sd", $this->name, $this->distance);
            return $stm->execute();
        } else {
            return false;
        }
    }

    public function get($line_no)
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stm = $db->prepare("SELECT * FROM line WHERE line_no=?");
            $stm->bind_param("i", $line_no);
            if ($stm->execute()) {
                $result = $stm->get_result();
                if ($result) {
                    $row = $result->fetch_assoc();
                    $line = new Line();
                    $line->line_no = $line_no;
                    $line->name = $row['name'];
                    $line->distance = $row['distance'];
                    return $line;
                }
            }
        }
        return false;
    }

    public static function getAll()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stm = "SELECT * FROM line";
            $result = $db->query($stm);
            if (isset($result)) {
                $lines = array();
                while ($row = $result->fetch_assoc()) {
                    $line = new Line();
                    $line->line_no = $row['line_no'];
                    $line->name = $row['name'];
                    $line->distance = $row['distance'];
                    $lines[] = $line;
                }
                return $lines;
            }
        }
        return false;
    }

    public function remove()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stm = $db->prepare("DELETE FROM line WHERE line_no=?");
            $stm->bind_param("i", $this->line_no);
            return $stm->execute();
        }
        return false;
    }
}
