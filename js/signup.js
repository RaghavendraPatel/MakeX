function fnamevalid()
{
 var letters = /^[A-Za-z]+$/;
 var fname = document.getElementById('fname').value; 
  if(/^[A-z ]+$/.test(fname)==false || fname=="")
  {
      document.getElementById('fname_err').style.display='inline';
      return false;
     
  }
  else{
      document.getElementById('fname_err').style.display='none';
      return true;
      
   }
}


function lnamevalid()
{
 var letters = /^[A-Za-z]+$/;
 var lname = document.getElementById('lname').value; 
  if(/^[A-z ]+$/.test(lname)==false  || lname=="")
  {
      document.getElementById('lname_err').style.display='inline';
      return false;
  }
  else{
      document.getElementById('lname_err').style.display='none';
      return true;
   }
}
   

function ValidateEmail()
{
    var mail = document.getElementById('email').value
    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if(mailformat.test(mail)==false||(document.getElementById('email').value)=="")
    {
        document.getElementById('email_err').style.display='inline';
        return false;
    }
    else
    {
        document.getElementById('email_err').style.display='none';
        return true;
    }
}

function ValidatePassword(){

    var pwd = document.getElementById('pass').value;
    var pwdformat =/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[a-zA-Z!#$*%&? "])[a-zA-Z0-9!#$%*&?]{6,20}$/ ;
    if(pwdformat.test(pwd)==false||(document.getElementById('pass').value)=="")
    {
        document.getElementById('pass_err').style.display='inline';
        return true;
    }
    else
    {
        document.getElementById('pass_err').style.display='none';
        return true;
    }

}

function checkPasswordMatch() {
    var password = document.getElementById('pass').value
    var confirmPassword = document.getElementById('cpass').value

    if (password != confirmPassword || (document.getElementById('pass').value)=="" ||(document.getElementById('cpass').value)==""){
     
        document.getElementById('cpass_err').style.display='inline';
        return false;
        
    }
    else{
         document.getElementById('cpass_err').style.display='none'; 
         return true;
        }
}

function change() {
    var decider = document.getElementById('accept');
    if(decider.checked){
        document.getElementById("accept").className = "accept";
        return true;
    } else {
        document.getElementById("accept").className = "accept_error";
        return false;
    }
   
}

function submitForm(){

    if((fnamevalid() && lnamevalid() && ValidateEmail() && ValidatePassword() && checkPasswordMatch() && change() )==true){
        document.form.submit();
        return true;
    }
    else  {
        return false;
    }
}