<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE"); 
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
//header('Content-type: application/json');     
 include_once('../class/ClassSingup.php');    
 
 
   
 


switch ( $_SERVER['REQUEST_METHOD'] ) {

	/*case 'GET':
	//header('Content-type: application/json');
	  	

	isset($_REQUEST["id"])?$singUp->loadId($_REQUEST["id"]): $singUp->load(); 
		  
		  
	break;*/
 
 	case 'POST':

 	$_POST = json_decode(file_get_contents('php://input'),true); 

 	$singUp = new User($_POST);
 	  
 	$singUp->post();   
  
 	  
 
 	break;
	
	
}


 ?>


