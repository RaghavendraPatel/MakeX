function user(){
    
    if (document.getElementById('usr-sel').value=='dev'){
        document.getElementById('dev1').style.display="block";
        document.getElementById('cust1').style.display="none";
    }
    else{
        document.getElementById('dev1').style.display="none";
        document.getElementById('cust1').style.display="block";
    }
}

function phonevalid(){
    var phval = document.getElementById('phonenum').value; 
     if(/^[0-9]{10}$/.test(phval)==false  || phval=="")
     {
         document.getElementById('phone_err').style.display='inline';
         return false;
     }
     else{
         document.getElementById('phone_err').style.display='none';
         return true;
      }
}

function maxdatefix(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; 
    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById("datefield").setAttribute("max", today);
}


function dobvalid(){
 
        var dateString=document.getElementById("datefield").value;
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        if(age<18)
        {    

            document.getElementById('dob_err').style.display='inline';
            return false;}
           
        else{
            document.getElementById('dob_err').style.display='none';
            return true;
         }
   }


   function eduvalid(){
    var phval = document.getElementById('edud').value; 
     if(phval=="")
     {
         document.getElementById('edu_err').style.display='inline';
         return false;
     }
     else{
         document.getElementById('edu_err').style.display='none';
         return true;
      }
}


function accvalid(){
    var phval = document.getElementById('accom').value; 
     if(phval=="")
     {
         document.getElementById('accomp_err').style.display='inline';
         return false;
     }
     else{
         document.getElementById('accomp_err').style.display='none';
         return true;
      }
}


function expvalid(){
    var phval = document.getElementById('yr').value; 
     if(phval=="")
     {
         document.getElementById('exp_err').style.display='inline';
         return false;
     }
     else{
         document.getElementById('exp_err').style.display='none';
         return true;
      }
}



function profvalid(){
    var phval = document.getElementById('proff').value; 
     if(phval=="")
     {
         document.getElementById('prof_err').style.display='inline';
         return false;
     }
     else{
         document.getElementById('prof_err').style.display='none';
         return true;
      }
}

function whovalid(){
    var phval = document.getElementById('whooo').value; 
     if(phval=="")
     {
         document.getElementById('who_err').style.display='inline';
         return false;
     }
     else{
         document.getElementById('who_err').style.display='none';
         return true;
      }
}

   function submitForm(){
    var phval = document.getElementById('usr-sel').value;
    if(phval=='dev'){
        if((phonevalid() && dobvalid() && eduvalid() && profvalid() && expvalid() &&  accvalid())==true){
            document.form.submit();
            return true;
        }
        else  {
            return false;
        }
    }
    else if(phval=='cust'){
        if((phonevalid() && dobvalid() && whovalid())==true){
            document.form.submit();
            return true;
        }
        else  {
            return false;
        }
    }
}



