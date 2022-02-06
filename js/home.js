var Cookie = document.cookie; 
	      	 	
axios({
  method: 'get',
  url: 'http://localhost/login-rest-api/backend/api/login.php',
}).then((response) => {
  //console.log( "token="+response.data) ;  
  //console.log(Cookie);

  if (Cookie != "token="+response.data) {document.location.href='index.html';} 
  else {console.log('Usuario validado')  }
}).catch((error) => {
  console.error(error); 
}).finally(() => {
  
});

function logout(){


    document.cookie = "token=" ; 

    location.reload();

};

//document.cookie = "token=" + response.data.token;

	

