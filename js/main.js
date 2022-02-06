

function singup(){

	let obj = {

 		name:document.getElementById('name').value, 
 		surname: document.getElementById('surname').value,
 		email: document.getElementById('email').value,
 		password:document.getElementById('password').value    
 
 	} 
var values = Object.values(obj);

var count = 0 ;
var resp = 0;   

for (var i = 0; i < values.length; i++) {
  if (values[i] == ""){
   count++ ;  
  }
 } //end for

 

if(count != 0){
    document.getElementById('alertsing').style.display = 'block';
    document.getElementById('mailexists').style.display = 'none';
    document.getElementById('oksing').style.display = 'none';
}else {
   

axios({
  method: 'post',
  url: 'http://localhost/login-rest-api/backend/api/singup.php',     
  contentType:'json', 
  data:obj 
}).then((response) => {
  document.getElementById('alertsing').style.display = 'none'; 
    console.log(response.data); 
  if(response.data == 0){ 
    document.getElementById('alertsing').style.display = 'none';
    document.getElementById('mailexists').style.display = 'block';
    document.getElementById('oksing').style.display = 'none';

  }
  if(response.data == 1){ 

    document.getElementById('alertsing').style.display = 'none';
    document.getElementById('mailexists').style.display = 'none'; 
    document.getElementById('oksing').style.display = 'block';;
    setTimeout("location.href = 'index.html';", 3000);   
  }  
      

 
}).catch((error) => {
  //console.error(error);

}).finally(() => {
       
}); 
 
 }

    

}//end function 

function login(){ 


  let obj = {

    email: document.getElementById('email').value,
    password:document.getElementById('password').value    
 
  }   



axios({
  method: 'post',
  url: 'http://localhost/login-rest-api/backend/api/login.php', 
  contentType:'json', 
  data:obj
}).then((response) => {
  //console.log(response.data);    
  //console.log(response.data.token); 
  //document.cookie = "token="+response.data.token+"; expires= Thu, 21 Aug 2012 20:00:00 UTC; path=/ ";   
  document.cookie = "token=" + response.data.token;         
  if (response.data.codigo == 1) { document.location.href='home.html'; }
  else document.getElementById('alert').style.display='block' ;     
    
}).catch((error) => {
  //console.error(error);
}).finally(() => {
  // TODO
});


}// end function 

function show(){ 

var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text"; 
  } else {
    x.type = "password";
  }


}