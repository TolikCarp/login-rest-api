<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE"); 
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
  
include_once "../class/ClassLogin.php";         
$server = $_SERVER['REQUEST_METHOD'];


switch ($server){

	 
  
 	  
 	case 'POST':
 	$_POST = json_decode(file_get_contents('php://input'),true);  


 	//var_dump($_POST); 

 	$logIn = new Logged($_POST); 

  	
 	$logIn->verificar();  

 	    
 	//$logIn->post($_POST);  

 	break;  
	
	
}


 ?>


