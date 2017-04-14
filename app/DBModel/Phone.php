<?php
/**
 * Created by PhpStorm.
 * User: Hansi
 * Date: 14/04/2017
 * Time: 13:23
 */

namespace App\DBModel;

use App\DBConnection\DBConnection;

class Phone
{
    public $person_id;
    public $phone_type;
    public $phone_no;

    public function insert()
    {
        $db=DBConnection::getDatabase();
        
        if(isset($db)){
            $stm = $db->prepare("INSERT INTO phone (person_id,phone_type,phone_no) VALUE (?,?,?)");
            $stm->bind_param("iss",$this->person_id,$this->phone_type,$this->phone_no);
            $execute=$stm->execute();
            
            return $execute;
        }
        return false;
    }

}