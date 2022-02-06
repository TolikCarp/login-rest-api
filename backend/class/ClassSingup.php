<?php 
include_once "../config.php"; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception; 
include_once "../class/ClassSingup.php"; 
require '../mail/Exception.php';
require '../mail/PHPMailer.php';
require '../mail/SMTP.php';
 

 

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

		   
		//conn
		$mysqli = new mysqli(HOST, USER , PASSWORD, DB);

		$email = "SELECT email FROM usuario WHERE email = '".$this->email."' "; 

		$run =  mysqli_query($mysqli, $email); 

		$rowemail = $run->fetch_assoc(); 

		//var_dump($rowemail);    

		
		if($rowemail == null ){
		 	 

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

		$correo =$this->email ;
		$correo =$this->password ; 
		 		 

		 	 //USE YOUR OWN HOST
		 	  $mail = new PHPMailer(true);

					try { 
					    //Server settings
					    $mail->SMTPDebug = 0;                       //Enable verbose debug output
					    $mail->isSMTP();                                            //Send using SMTP
					    $mail->Host       = '';                     //Set the SMTP server to send through
					    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
					    $mail->Username   = '';                     //SMTP username
					    $mail->Password   = '';                               //SMTP password
					    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
					    $mail->Port       = 587; //465;       
					    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

					    //Recipients

					    $mail->setFrom('');    
					    $mail->addAddress($this->email);    //Add a recipient  
					    //$mail->addAddress('contacto@astryzhekozin.tech');             
					    //$mail->addReplyTo('info@example.com', 'Information');
					    //$mail->addCC('cc@example.com');
					    //$mail->addBCC('bcc@example.com');

					    //Attachments
					    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
					    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

					    //Content
					    $mail->isHTML(true);                                  //Set email format to HTML
					    $mail->Subject = 'Login Credential';
					    $mail->Body    = '
										 
										 Email: '.$this->email.'</br> 
										 Password: '.$this->password.'</br>';    

					    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					    $mail->send();  
					       
					} catch (Exception $e) {
					    //print_r( "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");   

					} 
					echo '1';
 				} // end if

 				else echo '0';      

	}//end post () 


 

	 
	}//end class 


 ?>

