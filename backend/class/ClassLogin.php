<?php
//session_start(); 
include_once "../config.php";  
header('Content-type: application/json'); 


class Logged
{
	private $email;
	private $password; 

	public function __construct($array)
	{
		$this->email = $array['email'];    
		$this->password = $array['password']; 
		 

	}//end function



	 public function verificar(){ 

	 	
	 	$encrypt = sha1($this->password); // encrpypts password 
	  
		$mysqli = new mysqli(HOST, USER , PASSWORD, DB);//opens db

		$query = "SELECT * FROM usuario WHERE  email ='".$this->email."'   " ; // db's email must be equal to login mail  

		$user =  mysqli_query($mysqli, $query);// executes the query
 
		$row = $user->fetch_assoc();//query->array    

		if ($row == null || $row['password'] != $encrypt ) { 
 
		 $response = array(
			'mensaje' => 'Usuario Verificado',
			'codigo'  => 0
			 

		);          

		} 

		else  

		$response = array(
			'mensaje'=>'Usuario Verificado',
			'codigo'=>1,
			'token'=>sha1(uniqid(rand(),true)),
			'nombre'=>$row['name'],
			'correo'=>$row['email']
			  

		);     
	
		 
		$json= json_encode($response['token']) ;
		file_get_contents('../tokes.json');
		file_put_contents('../tokes.json', $json);


		echo json_encode($response);

		      


		//$mysqli->close(); 

	}//end function 





		


}//end class

 ?>