function payMode(x){
    console.log(x)
    document.getElementById('net').style.display="none";
    document.getElementById('card').style.display="none";
    document.getElementById('paypal').style.display="none";
    document.getElementById('mobile').style.display="none";
    document.getElementById(x).style.display="block"
  }

function provincevalid()
{
 var proov = document.getElementById('prov').value; 
  if(/^[A-z ]+$/.test(proov)==false || proov=="")
  {
      document.getElementById('prov_err').style.display='inline';
      return false;
     
  }
  else{
      document.getElementById('prov_err').style.display='none';
      return true;
      
   }}

function namevalid(x)
{
  if(/^[A-z ]+$/.test(x)==false || x=="")
  {
      return false;
     
  }
  else{
      return true;
      
   }
}

function cvvvalid(y) {
    if(y<100 || y>999)
    {
        return false;
    }else{

        return true;
    }
    
}


function cardvalid() {
        var card_type = document.querySelector('input[name="ctype"]:checked').value
        var cname = document.getElementById('card_name').value;
        var cnum = document.getElementById('card_num').value;
        var mm = document.getElementById('mm').value;
        var yy = document.getElementById('yy').value;
        var cvv = document.getElementById('cvv').value;

      if(card_type=='visa'){
        var v_format= /^4[0-9]{12}(?:[0-9]{3})?$/;  //All Visa card numbers start with a 4. New cards have 16 digits. Old cards have 13.
        if(v_format.test(cnum)==false||(cnum)==""||(namevalid(cname))==false||(mm)==""||(yy)==""||(cvvvalid(cvv))==false)
        {
            document.getElementById('card_err').style.display='inline';
            return false;
        }
        else
        {
            document.getElementById('card_err').style.display='none';
            return true;
        }

    }
    else if(card_type=='master'){
        var m_format=/^(?:5[1-5][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}$/;  ///MasterCard numbers either start with the numbers 51 through 55 or with the numbers 2221 through 2720. All have 16 digits.
        if(m_format.test(cnum)==false||(cnum)==""||(namevalid(cname))==false||(mm)==""||(yy)==""||(cvvvalid(cvv))==false)
        {
            document.getElementById('card_err').style.display='inline';
            return false;
        }
        else
        {
            document.getElementById('card_err').style.display='none';
            return true;
        }


    }
    else if(card_type=='amex'){
        var a_format=/^3[47][0-9]{13}$/;  //American Express card numbers start with 34 or 37 and have 15 digits.
        if(a_format.test(cnum)==false||(cnum)==""||(namevalid(cname))==false||(mm)==""||(yy)==""||(cvvvalid(cvv))==false)
        {
            document.getElementById('card_err').style.display='inline';
            return false;
        }
        else
        {
            document.getElementById('card_err').style.display='none';
            return true;
        }


    }
    
}

function bankvalid() {
    var bank = document.getElementById('bank').value;
    if(bank==""){
        document.getElementById('bank_err').style.display='inline';
            return false;
    }
    else{
        document.getElementById('bank_err').style.display='none';
        return true;

    }
}

function upivalid()
{
    var letters = /^[a-zA-Z0-9.\-_]{3,80}@[a-zA-Z]{3,10}/; 
    var x =document.getElementById('upiid').value;
    var y =document.getElementById('upiapp').value;
  if(letters.test(x)==false || x==""||y=="")
  {
    document.getElementById('upi_err').style.display='inline';
    return false;
     
  }
  else{
    document.getElementById('upi_err').style.display='none';
    return true;
      
   }
}


function submitForm(){
    var mode = document.querySelector('input[name="method"]:checked').value;
    if(mode=='card'){
        if((cardvalid() && provincevalid())==true){
            document.form.submit();
            return true;
        }
        else  {
            return false;
        }
    }
    else if(mode=='netbank'){
        if((bankvalid() && provincevalid())==true){
            document.form.submit();
            return true;
        }
        else  {
            return false;
        }
    }
    else if(mode=='upi'){
        if((upivalid() && provincevalid())==true){
            document.form.submit();
            return true;
        }
        else  {
            return false;
        }
    }
    else if(mode=='paypal'){
            document.form.submit();
            return true;
       
    }
}