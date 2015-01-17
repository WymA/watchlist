<?php

class Dashboard_Model extends Model {


    public function __construct() {
        parent::__construct();
    }


    function getAllSuspects(){

        if ( Session::get('role') == 'admin'){
        
            $sth = $this->db->prepare("SELECT * FROM BIOMETDATA") ;
            $sth->execute();

        }else{

            $sth = $this->db->prepare("SELECT * FROM BIOMETDATA WHERE 
                 username=:username") ;

            $sth->execute(array(

                ':username' => Session::get('username') 
            ));

        }


        $result = $sth->fetchAll() ;
        echo json_encode($result);
    }
    
    function search(){

        if ( Session::get('role') == 'admin'){
        
            $sth = $this->db->prepare("SELECT * FROM BIOMETDATA WHERE 
                 firstName=:firstname OR lastName=:lastname") ;

            $sth->execute(array(

                ':firstname' => $_POST['firstname'],
                ':lastname' => $_POST['lastname'],
            ));

        }else{

            $sth = $this->db->prepare("SELECT * FROM BIOMETDATA WHERE 
                 firstName=:firstname OR lastName=:lastname AND username=:username") ;

            $sth->execute(array(

                ':firstname' => $_POST['firstname'],
                ':lastname' => $_POST['lastname'],
                ':username' => Session::get('username')
            ));

        }

        $result = $sth->fetchAll() ;

        echo json_encode($result) ;
    }


    public function getDetails(){

        try{

            $details = $this->db->prepare("SELECT * FROM IMAGES WHERE biometID=:id ");

            $status = $details->execute(array(
                ':id' => $_POST['id']
            ));
            
            $res = $details->fetchAll() ;
            echo json_encode($res) ;
        
        }catch(PDOException $e){

            echo $e->getMessage() ;
            die();
        }
        
    }

    public function deleteImg(){

        try{

            $del = $this->db->prepare("DELETE FROM `IMAGES` WHERE id=:id");
            $status = $del->execute(array(

                ':id' => $_POST['id']
            ));

            unlink( $_POST['path'] );

            echo json_encode($status );
        }catch(PDOException $e){

            echo json_encode( $e->getMessage() ) ;
        }
    }
    


}