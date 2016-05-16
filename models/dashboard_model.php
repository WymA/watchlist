<?php

class Dashboard_Model extends Model {


    public function __construct() {

       @session_start() ;
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
           (firstName=:firstname OR lastName=:lastname )AND username=:username") ;

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

        if ( 'admin' == Session::get('role') ){

            $details = $this->db->prepare("SELECT * FROM IMAGES WHERE biometID=:id ");
            $status = $details->execute(array(
                ':id' => $_POST['id']
                ));
        }else{

            $details = $this->db->prepare("SELECT * FROM IMAGES WHERE biometID=:id AND username=:username ");
            $status = $details->execute(array(
                ':id' => $_POST['id'],
                ':username' => Session::get('username')
                ));
        }


        $res = $details->fetchAll() ;
        echo json_encode($res) ;
        
    }catch(PDOException $e){

        echo $e->getMessage() ;
        die();
    }

}

public function deleteImg(){

    try{

        if ( Session::get('role') == 'admin'){

        $path = $this->db->prepare('SELECT * FROM `IMAGES` WHERE id=:id') ;    
        $path->execute(array(

            ':id' => $_POST['id']
            )) ;

        $res = $path->fetch(PDO::FETCH_ASSOC) ;

        $tmp = unlink( URL + 'data/' + $res['path'] ) ;

        $del = $this->db->prepare('DELETE FROM `IMAGES` WHERE id=:id');

        $status = $del->execute(array(

            ':id' => $_POST['id']
            )) ;

        echo json_encode($status);  

        }else{

        $del = $this->db->prepare('UPDATE `IMAGES` SET username=:username WHERE id=:id');
        $status = $del->execute(array(

            ':username' => 'csadmin',
            ':id' => $_POST['id']
            )) ;

        echo json_encode($status);
        }

    }catch(PDOException $e){

        echo json_encode( $e->getMessage() ) ;
    }
}



}
