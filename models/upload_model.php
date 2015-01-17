<?php

class Upload_Model extends Model {


    public function __construct() {
        parent::__construct();
    }
    
    public function uploadImg( $filename, $fileExt ){

        try{

            $img = $this->db->prepare("INSERT INTO `IMAGES` (`biometID`, `type`)".
            " VALUES ( :bioid, :type )");

            $status = $img->execute(array(

                ':bioid' => $_POST['id'],
                ':type' => $_POST['type'],
            ));

            $lastID = $this->db->lastInsertId() ;
            $this->db->update("IMAGES", 
            array(
                "path" => $filename."_".$lastID.$fileExt
            ),
            "id='$lastID' "
            ) ;
            
            return $lastID ;


        }catch(PDOException $e){

            echo $e->getMessage() ;
            die();
        }
        
    }

    public function newSuspect(){

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {

            $ip = $_SERVER['REMOTE_ADDR'];
        }
        
        try{

            $new = $this->db->prepare("INSERT INTO `BIOMETDATA`".
            "( `firstName`, `lastName`, `gender`, `age`, `username`, `userIp`, `description`) ".
            "VALUES ( :firstname, :lastname, :gender, :age, :username, :ip, :description)");

            $status = $new->execute(array(

                ':firstname' => $_POST['firstname'],
                ':lastname' => $_POST['lastname'],
                ':gender' => $_POST['gender'],
                ':age' => $_POST['age'],
                ':username' => $_SESSION['username'],
                ':ip' => $ip,
                ':description' => $_POST['description']
            ));

            $lastID = $this->db->lastInsertId() ;
            $res = array('id' => $lastID, 'msg' => $status) ;
            echo json_encode($res) ;
        
        }catch(PDOException $e){

            echo $e->getMessage() ;
            die();
        }
    }

    public function getProfile(){

        $res = $this->db->select("SELECT `firstName`, `lastName` FROM `BIOMETDATA` WHERE id=:id",
        array(
            ':id' => $_POST['id']
        )) ;
        
        echo json_encode($res) ;
    }
}
