<?php

class Admin_Model extends Model {


	public function __construct() {

		@session_start() ;
		parent::__construct();
	}

	public function changeEmail(){

		try{


			$sth = $this->db->prepare("SELECT * FROM USER WHERE username = :username AND password = :password");

			$sth->execute(array(

				':username' => Session::get('username'),
				':password' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
				));


			$data = $sth->fetch();

			$count =  $sth->rowCount();

			if ( $count == 1 ) {

				if ( $data['role'] != 'admin' ){

					$res = array('status' => false, 'msg' => 'You Dont Have Such Authority!') ;
				} else{

					$update = $this->db->prepare("UPDATE `ADMIN` SET `email`=:email WHERE `state`= 1 ") ;
					$update->execute(array(
						':email' => $_POST['email'],
						)) ;

					$res = array('status' => true, 'msg' => 'Changed Successfully!') ;
				}

			}else  {

				$res = array('status' => false, 'msg' => 'Password Incorrect!') ;
			}
		}catch(PDOException $e){

			$res = array('status' => false, 'msg'=>$e->getMessage() ) ;
		}

		echo json_encode($res);

	}

	public function deleteImg(){


	}

	public function deleteSuspect(){


	}
}
