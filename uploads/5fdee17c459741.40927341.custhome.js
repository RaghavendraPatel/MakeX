function openPage(pageName, elmnt) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    document.getElementById(pageName).style.display = "block";
  }
 function dash(){
   document.getElementById('item1').style.borderRight="5px solid #6089FF";
   document.getElementById('item2').style.border="";
   document.getElementById('item3').style.border="";
   document.getElementById('item4').style.border="";
 }
 function project(){
  document.getElementById('item2').style.borderRight="5px solid #6089FF";
  document.getElementById('item1').style.borderRight="none";
  document.getElementById('item3').style.borderRight="none";
  document.getElementById('item4').style.borderRight="none";
}
function plans(){
  document.getElementById('item3').style.borderRight="5px solid #6089FF";
  document.getElementById('item1').style.borderRight="none";
  document.getElementById('item4').style.borderRight="none";
  document.getElementById('item2').style.borderRight="none";
}
function settings(){
  document.getElementById('item4').style.borderRight="5px solid #6089FF";
  document.getElementById('item1').style.borderRight="none";
  document.getElementById('item3').style.borderRight="none";
  document.getElementById('item2').style.borderRight="none";
}

// var element = document.getElementsByClassName("dash-ele")[0];
// element.addEventListener("click", myFunction);
// function myFunction(e) {
// 		var elems = document.querySelector(".active");
//     if(elems !=null) {
//       elems.classList.remove("active");
//     }
//     e.target.className = "active";
// 	}

// upload


function next(x){
  document.getElementById(x).style.display="none";
}
function prev(x){
  document.getElementById(x).style.display="block";
}

function pay(x){
  console.log(x)
}

function payMode(x){
  console.log(x)
  document.getElementById('net').style.display="none";
  document.getElementById('card').style.display="none";
  document.getElementById('paypal').style.display="none";
  document.getElementById('mobile').style.display="none";
  document.getElementById(x).style.display="block"
}

