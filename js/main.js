 


function singup(){

	let obj = {

 		name:document.getElementById('name').value, 
 		surname: document.getElementById('surname').value,
 		email: document.getElementById('email').value,
 		password:document.getElementById('password').value    
 
 	}   

axios({
  method: 'post',
  url: 'http://localhost/login/backend/api/singup.php',     
  contentType:'json', 
  data:obj 
}).then((response) => {
  console.log(response) 
}).catch((error) => {
  console.error(error);
}).finally(() => {
  // TODO
});
 
 

}//end function

function login(){


  let obj = {

    email: document.getElementById('email').value,
    password:document.getElementById('password').value    
 
  }   



axios({
  method: 'post',
  url: 'backend/api/login.php',
  contentType:'json', 
  data:obj
}).then((response) => {
  console.log(response)    
}).catch((error) => {
  console.error(error);
}).finally(() => {
  // TODO
});


}// end function 


