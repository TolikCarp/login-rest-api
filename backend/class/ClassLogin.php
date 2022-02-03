<?php 
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

	 	
	 	$encrypt = sha1($this->password);  
	  

		$mysqli = new mysqli(HOST, USER , PASSWORD, DB);

		$query = "SELECT email , password FROM usuario WHERE  email ='".$this->email."'   " ;   

		$user =  mysqli_query($mysqli, $query);
 
		$row = $user->fetch_assoc();//array 

		//var_dump(sha1($row['password']) );   

		if ($row == null || $row['password'] != $encrypt ) { 
		 $array = array('respuesta' => 'Usuario Incorrecto' );       

		} 

		else  $array = array('respuesta' => 'Usuario Verificado' );    

		echo json_encode($array);    

		       


		$mysqli->close(); 

	}//end function 





		


}//end class

 ?>