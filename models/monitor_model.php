<?php

class Monitor_Model extends Model {


	public function __construct() {

		@session_start() ;
		parent::__construct();
		Auth::handleLogin() ;

		if ( null == Session::get('lasttime') ) {

			Session::set('lasttime', '0') ;
		}
	}


	public function getChecking(){

		try{ 

			if ( Session::get('role') == 'watchlist' ) {

				$get = $this->db->prepare("SELECT * FROM `BIOMETDATA` bd ".
					"JOIN `IMAGES` img on bd.id = img.biometID ".
					"JOIN `MATCH` m on m.imgId = img.id ".
					"WHERE m.check = :check AND bd.username=:username ") ;
				$get->execute(array(
					':check' => 'checking',
					':username' => Session::get('username') 
					));

				if ( $get->rowCount() > 0 ) {

					$updateData = $get->fetchAll() ;
					$data = array('status'=> true, 'data' => $updateData, 'role' => Session::get('role') ) ;
				}else{

					$data = array('status'=> false, 'data' => null, 'role' => Session::get('role') ) ;
				}

			}
			if ( 'passport' == Session::get('role') ){

				$get = $this->db->prepare("SELECT * FROM `BIOMETDATA` bd ".
					"JOIN `IMAGES` img on bd.id = img.biometID ".
					"JOIN `MATCH` m on m.imgId = img.id ".
					"WHERE m.check = :check ") ;
				$get->execute(array(
					':check' => 'checking'
					));

				if ( $get->rowCount() > 0 ) {

					$updateData = $get->fetchAll() ;
					$data = array('status'=> true, 'data' => $updateData, 'role' => Session::get('role')  ) ;
				}else{

					$data = array('status'=> false, 'data' => null, 'role' => Session::get('role') ) ;
				}

			}

			if ( Session::get('role') == 'admin' ){

				$get = $this->db->prepare("SELECT * FROM `BIOMETDATA` bd ".
					"JOIN `IMAGES` img on bd.id = img.biometID ".
					"JOIN `MATCH` m on m.imgId = img.id " ) ;
				$get->execute( );

				if ( $get->rowCount() > 0 ) {

					$updateData = $get->fetchAll() ;
					$data = array('status'=> true, 'data' => $updateData, 'role' => Session::get('role')) ;
				}else{

					$data = array('status'=> false, 'data' => null, 'role' => Session::get('role') ) ;
				}

			}
		}catch (PDOException $e ){

			$data = array('status'=> false, 'data' => $e->getMessage(), 'role' => Session::get('role') ) ;
		}

		echo json_encode($data) ;

	}

	public function getMessage(){

		try{ 


			if ( Session::get('role') == 'watchlist' ) {

				$get = $this->db->prepare("SELECT * FROM `BIOMETDATA` bd ".
					"JOIN `IMAGES` img on bd.id = img.biometID ".
					"JOIN `MATCH` m on m.imgId = img.id ".
					"WHERE m.check = :check AND bd.username=:username AND m.time>:time ");
				$get->execute(array(
					':check' => 'unchecked',
					':username' => Session::get('username'),
					':time' => Session::get('lasttime')
					));

			}

			if ( 'passport' == Session::get('role') || 
				Session::get('role') == 'admin' ){


				$get = $this->db->prepare("SELECT * FROM `BIOMETDATA` bd ".
					"JOIN `IMAGES` img on bd.id = img.biometID ".
					"JOIN `MATCH` m on m.imgId = img.id ".
					"WHERE m.check = :check AND m.time>:time ");
				$tmp = $get->execute(array(
					':check' => 'unchecked',
					':time' => Session::get('lasttime')
					));

			}

			if ( $get->rowCount() > 0 ) {

				$updateData = $get->fetchAll() ;
				Session::set('lasttime', $updateData[$get->rowCount()-1][21] ) ;
				$data = array('status'=> true, 'data' => $updateData ) ;
			}else{

				$data = array('status'=> false, 'data' => null ) ;
			}


		}catch (PDOException $e ){

			$data = array('status'=> false, 'data' => $e->getMessage() ) ;
		}

		echo json_encode($data) ;

	}


	public function getDetails(){

		try {

			if ( Session::get('role') == 'watchlist' ) {

				$get = $this->db->prepare("SELECT * FROM `BIOMETDATA` bd ".
					"JOIN `IMAGES` img on bd.id = img.biometID ".
					"JOIN `MATCH` m on m.imgId = img.id ".
					"WHERE m.check = :check AND bd.username=:username ") ;
				$get->execute(array(
					':check' => 'unchecked',
					':username' => Session::get('username')
					));
			}else if ( Session::get('role') == 'admin'
				|| 'passport' == Session::get('role') ){

				$get = $this->db->prepare("SELECT * FROM `BIOMETDATA` bd ".
					"JOIN `IMAGES` img on bd.id = img.biometID ".
					"JOIN `MATCH` m on m.imgId = img.id ".
					"WHERE m.check = :check ") ;
				$get->execute(array(
					':check' => 'unchecked'
					));
			}

			if ( $get->rowCount() > 0 ) {

				$updateData = $get->fetchAll() ;
				$data = array('status'=> true, 'data' => $updateData ) ;

				foreach( $updateData as $update ) {

					$checking = $this->db->prepare("UPDATE `MATCH` SET `check`=:check WHERE `id`=:id ") ;
					$res = $checking->execute(array(
						':check' => 'checking',
						':id' => $update[15]
						));

					chmod( $update['path'], 0777 ) ;
				}


			}else{
				$data = array('status'=> false, 'data' => null ) ;
			}


		}catch( PDOException $e){

			$msg = $e.getMessage() ;
			$data = array('status'=> false, 'data' => $msg ) ;
		}

		echo json_encode($data) ;

	}

	public function check(){

		try {

			$check = $this->db->prepare("UPDATE `MATCH` SET `check`=:check WHERE `id`=:id ") ;
			$res = $check->execute(array(
				':check' => 'checked',
				':id' => $_POST['id']
				));

			$out = array( 'status' => $res, 'data' => 'Checked Successfully!') ;

		}catch (PDOException $e){

			$out = array( 'status' => false, 'data' => $e->getMessage() ) ;
		}

		echo json_encode($out) ;

	}

	public function ignore(){

		try {

			$ignore = $this->db->prepare("UPDATE `MATCH` SET `check`=:check WHERE `id`=:id ") ;
			$res = $ignore->execute(array(
				':check' => 'ignored',
				':id' => $_POST['id']
				));

			$out = array( 'status' => $res, 'data' => 'Ignored') ;

		}catch (PDOException $e){

			$out = array( 'status' => false, 'data' => $e->getMessage() ) ;
		}

		echo json_encode($out) ;

	}

	public function deleteItem(){

		try{

			if ( Session::get('role') == 'admin'){

				$path = $this->db->prepare('SELECT * FROM `MATCH` WHERE id=:id') ;    
				$path->execute(array(

					':id' => $_POST['id']
					)) ;

				$res = $path->fetch(PDO::FETCH_ASSOC) ;

				$tmp = unlink( URL + 'data/' + $res['path'] ) ;

				$del = $this->db->prepare('DELETE FROM `MATCH` WHERE id=:id');

				$status = $del->execute(array(

					':id' => $_POST['id']
					)) ;

				echo json_encode(array(

					'status' => true,
					'data' => 'Delete Successfully!'
					));  

			}else{

				echo json_encode(array(

				'status' => false,
				'data' => 'Sorry, you do not have the authority to do this operation.'
				));  
			}

		}catch(PDOException $e){

			echo json_encode( $e->getMessage() ) ;
		}
	}


}


