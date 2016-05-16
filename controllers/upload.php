<?php

class Upload extends Controller {

    protected $fileMaxSize = 10485760 ;

    function __construct() {

        parent::__construct();
        Auth::handleLogin();
<<<<<<< HEAD
        Auth::handleAuth(array('admin', 'watchlist')) ; 
=======
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
        $this->view->js = array("upload/js/jquery.form.min.js",
        "upload/js/upload.js");

    }
    
    function index() 
    {

        $this->view->render('header');
        $this->view->render('upload/index');
        $this->view->render('footer');
    }


    function newSuspect(){

        $this->model->newSuspect() ;
    }
    
    function uploadImg(){

        if ( !isset($_FILES["FileInput"]) )
            die( "No Files Selected" ) ;

        //check if this is an ajax request
        if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
            die();
        }


        $UploadDirectory	= 'data/'; //specify upload directory ends with / (slash)

        $num = count($_FILES["FileInput"]["name"]) ;
        $msg = "";


        for ( $i = 0 ; $i < $num ; $i++ ) {
        
            if( $_FILES["FileInput"]["error"][$i] == UPLOAD_ERR_OK) {

                //Is file size is less than allowed size.
                if ($_FILES["FileInput"]["size"][$i] > $this->fileMaxSize) {

                    $msg .= "File ".$_FILES["FileInput"]["name"][$i]." size has to be less than 10MB!<br />";
                }
	
                //allowed file type Server side check
                switch( strtolower($_FILES['FileInput']['type'][$i] )){

                    //allowed file types
                case 'image/png': 
                case 'image/gif': 
                case 'image/jpeg': 
                case 'image/pjpeg':
                case 'image/bmp':
                    break;
                default:
                    $msg .= "File ".$_FILES["FileInput"]["name"][$i]." Type Invalid!<br />"; 
                }
	
                $File_Name          = strtolower($_FILES['FileInput']['name'][$i]);
                $File_Ext           = substr($File_Name, strrpos($File_Name, '.')); 
<<<<<<< HEAD


                $type = '' ;

                switch ( $_POST['type'] ) {
                    case 'Face':
                    $type = 'face' ;
                    break;
                    case 'Eye Peninsula':
                    $type = 'eyes' ;
                    break;
                    case 'Iris':
                    $type = 'iris' ;
                    break;
                    case 'Fingerprint':
                    $type = 'fringer' ;
                    break;
                    case 'Sketch':
                    $type = 'sketch' ;
                    break;

                    default:
                    $type = '' ;         
                    break;
                }

                
                $NewFileName 		= $_POST['firstname']."_".$_POST['lastname']
                    ."_".$type."_".date("y_m_d_h_i_s"); //new file name
	
                $lastID = $this->model->uploadImg( $NewFileName, $File_Ext) ;
                $NewFileName = $UploadDirectory.$lastID.'_'.$NewFileName.$File_Ext;
=======
                $NewFileName 		= $_POST['firstname']."_".$_POST['lastname']
                    ."_".$_POST['type']."_".date("y_m_d_h_i_s"); //new file name
	
                $lastID = $this->model->uploadImg($UploadDirectory.$NewFileName, $File_Ext) ;
                $NewFileName = $UploadDirectory.$NewFileName."_".$lastID.$File_Ext;
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0

                if( move_uploaded_file($_FILES['FileInput']['tmp_name'][$i], $NewFileName )) {
                                    
                    chmod($NewFileName, 0777) ;
<<<<<<< HEAD
                    echo substr($NewFileName, 5).' Upload Successfully. <br/>' ;
=======
                    echo $NewFileName.'=> Uploaded.<br/>' ;
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
                }else{
                    $msg .= 'Error uploading File '.$_FILES["FileInput"]["name"][$i].'!<br />' ;
                }
	
            } else {

                $msg .= $_FILES['FileInput']['error'][$i] ."<br />";
            }
        }
    } 
 
    function getProfile(){

        $this->model->getProfile() ;
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 2005baf0843eb78e681740de250e57fa5cc79fa0
