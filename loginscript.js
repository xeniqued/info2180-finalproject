

document.addEventListener("DOMContentLoaded", function () {
  //masking the password
 /* const textarea = document.getElementById('password');
  textarea.addEventListener('input', (event) => {
  const currentLength = event.target.value.length;
  textarea.value = '*'.repeat(currentLength);
});*/
  //login button functionality

const form = document.getElementById('form');

form.addEventListener("submit", function(event) {
  event.preventDefault(); // Prevents the page from reloading
  /*const useremail = document.getElementById('email');
  const email = useremail.value; // Updates the email variable
  console.log(email); // Logs the updated email value
  const userpassword = document.getElementById('password');
  const password = userpassword.value; // Updates the email variable
  console.log(password); */
  Verification();
});
  
  
  /*const login = document.getElementById('loginbutton');
  login.addEventListener('click', PrintEmail);
  const useremail =document.getElementById('email');
  console.log(12345678);
  const userpassword = document.getElementById('password');
  /*useremail.addEventListener("input", EmailVerification);
  userpassword.addEventListener("input", PasswordVerification);
*/
  async function Verification(){
    const checkemail = await fetch('login.php');
    const rsp = await checkemail.text();
    console.log(rsp);
    
  }


  function Userlogin(){
    //const validity = `${EmailVerification()}+${PasswordVerification}`; //check for the return values of the password and email checks

    switch (validity){
      case "true+true":
        window.location.assign("dashboard.html");//go to dashboard
        break;
      case "true+false":
        alert("Password is incorrect. Please try again.");
        window.location.assign("loginindex.html");//to ensure reload of the login page once we press ok
        break;
      case "false+true":
        alert("Email is incorrect. Please try again.");
        window.location.assign("loginindex.html");
        break;
      case "false+false":
        alert("Email and Password incorrect. Please try again.");
        window.location.assign("loginindex.html");
        break;
      default:
        alert("Something went wrong. Please try again.");
        window.location.assign("loginindex.html");
        break;


    }

    //alert("Password is incorrect. Please try again");
  }
});