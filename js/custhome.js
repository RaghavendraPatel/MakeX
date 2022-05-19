function openPage(pageName, elmnt) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    document.getElementById(pageName).style.display = "block";
  }
//  function dash(){
//    document.getElementById('item1').style.borderRight="5px solid #6089FF";
//    document.getElementById('item2').style.border="";
//    document.getElementById('item3').style.border="";
//    document.getElementById('item4').style.border="";
//  }
 function project(){
  document.getElementById('item2').style.borderRight="5px solid #6089FF";
  // document.getElementById('item1').style.borderRight="none";
  document.getElementById('item3').style.borderRight="none";
  document.getElementById('item4').style.borderRight="none";
}
function plans(){
  document.getElementById('item3').style.borderRight="5px solid #6089FF";
  // document.getElementById('item1').style.borderRight="none";
  document.getElementById('item4').style.borderRight="none";
  document.getElementById('item2').style.borderRight="none";
}
function settings(){
  document.getElementById('item4').style.borderRight="5px solid #6089FF";
  // document.getElementById('item1').style.borderRight="none";
  document.getElementById('item3').style.borderRight="none";
  document.getElementById('item2').style.borderRight="none";
}
function settings1(){
  document.getElementById('item3').style.borderRight="5px solid #6089FF";
  // document.getElementById('item1').style.borderRight="none";
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


function next(x,y){
  document.getElementById(x).style.display="none";
  document.getElementById(y).style.display="block";
}
function prev(x,y){
  document.getElementById(y).style.display="none";
  document.getElementById(x).style.display="block";
}

function upload(){
  console.log('upload');
  document.getElementById('file-upload-inp').click();
}
function filename(){
  lol=document.getElementById('file-upload-inp').files;
  str='';
  for (i=0; i<lol.length;i++){
    f=lol[i].name;
    f=f.replace(/.*[\/\\]/, '');
    str+=f+", ";
  }
  console.log(str.slice(0,-2));
  const defaultLabelText = "Drag & drop any images or documents that might be helpful in <br>explaining your brief here (Max file size: 25 MB).";
  document.getElementById('file-upload-label').innerHTML=str.slice(0,-2)||defaultLabelText;
}
// function upfile(){
//     if((document.getElementById('file-upload-inp').files)!=""){
//       console.log('lol');
//       window.location.href='../php/upload.php';
//     }
// }

function exp(x,y){
  document.getElementById(x).style.display="flex";
  document.getElementById(y).style.display="none";
}

function addFile(){
  document.getElementById('up').click();
}