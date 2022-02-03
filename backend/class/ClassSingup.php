<?php 
include_once "../config.php";  
	


	class User{
		
		private $name;
		private $surname;
		private $email;
		private $password;

		public function __construct($array){

			$this->name = $array['name'];    
			$this->surname = $array['surname'];
			$this->email = $array['email'];    
			$this->password = $array['password']; 


		}
	
			
	function load(){

		$mysqli = new mysqli(HOST, USER , PASSWORD, DB);

		$query = "SELECT * FROM usuario";  

		$table =  mysqli_query($mysqli, $query);

		$obj =[];

		while( $row = $table->fetch_assoc()  ){

			array_push($obj, $row) ; 
		} 

		$json = json_encode($obj);



		echo $json;  

		$mysqli->close();

	}	


	function loadId($id){

		$mysqli = new mysqli(HOST, USER , PASSWORD, DB);

		$query = "SELECT * FROM usuario WHERE idusuario = ".$id ;

		$table =  mysqli_query($mysqli, $query);

		$row = $table->fetch_assoc();

		$json = json_encode($row);

		echo $json; 

		$mysqli->close() ;

	}

	function post(){

		   

		$mysqli = new mysqli(HOST, USER , PASSWORD, DB);

		$query = "INSERT INTO usuario (

			name,
			surname,
			email,
			password 

		) VALUES (

			'".trim($this->name)."', 
			'".trim($this->surname)."',
			'".trim($this->email)."', 
			'".trim(sha1($this->password))."'            

		)" ;   

		mysqli_query($mysqli, $query);  

 
		$mysqli->close();

			

		  
    
		   
		
   


	}//end post () 
 

	 
	}//end class 


 ?>

