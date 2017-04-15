<?php
/**
 * Created by PhpStorm.
 * User: Hansi
 * Date: 14/04/2017
 * Time: 13:17
 */

namespace App\DBModel;

use App\DBConnection\DBConnector;

class TrainLine
{
    public $train_no;
    public $line_no;

    public function insert()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stm = $db->prepare("INSERT INTO train_line (train_no,line_no) VALUES (?,?)");
            $stm->bind_param("ii", $this->train_no, $this->line_no);
            return $stm->execute();
        }
        return false;
    }

    public static function getAll()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $sql = "SELECT * FROM train_line";
            $result = $db->query($sql);

            if (isset($result)) {

                $train_lines = array();
                while ($row = $result->fetch_assoc()) {
                    $train_line = new TrainLine();
                    $train_line->train_no = $row['train_no'];
                    $train_line->line_no = $row['line_no'];
                    $train_lines[] = $train_line;
                }
                return $train_lines;
            }
        }
        return false;
    }

    public static function getLine($train_no)
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stmt = $db->prepare("SELECT line_no FROM train_line WHERE train_no=?");
            $stmt->bind_param("i", $train_no);

            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if (isset($result)) {
                    $row = $result->fetch_assoc();

                    $train_line = new TrainLine();
                    $train_line->train_no = $train_no;
                    $train_line->line_no = $row['line_no'];
                    return $train_line;
                }
            }
        }
        return false;
    }

    public function remove()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stm = $db->prepare("DELETE FROM train_line WHERE train_no=? AND line_no=?");
            $stm->bind_param("ii", $this->train_no, $this->line_no);
            $executed = $stm->execute();
            return $executed;
        }
        return false;
    }

    public function update()
    {
        $db = DBConnector::getDatabase();
        if (isset($db)) {
            $stmt = $db->prepare("UPDATE train_line SET line_no=? WHERE train_no=?");
            $stmt->bind_param("ii", $this->line_no, $this->train_no);
            return $stmt->execute();
        }
        return false;
    }
}