

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

  function Userlogin(){
    alert("Password is incorrect. Please try again");
  }
});