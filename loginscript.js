

document.addEventListener("DOMContentLoaded", function () {
  //masking the password
  const textarea = document.getElementById('password');
  textarea.addEventListener('input', (event) => {
  const currentLength = event.target.value.length;
  textarea.value = '*'.repeat(currentLength);
});
  //login button functionality
  const login = document.getElementById('loginbutton');
  login.addEventListener('click', Userlogin);
  const useremail =document.getElementById('email');
  const userpassword = document.getElementById('password');
  useremail.addEventListener("input", EmailVerification);
  userpassword.addEventListener("input", PasswordVerification);

  function EmailVerification(){

  }
  
  function Userlogin(){
    /*if ((EmailVerification()== true) && (PasswordVerification()== true)){
      window.location.assign("dashboard.html");
    }*/
    window.location.assign("dashboard.html");


   // alert("Password is incorrect. Please try again");
  }
});