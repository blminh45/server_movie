let errname = document.getElementById("errname");
let errnoidung = document.getElementById("errnoidung");
let errthoiluong = document.getElementById("errthoiluong");
let errkhoichieu = document.getElementById("errkhoichieu");
let errtrailer = document.getElementById("errtrailer");

let errslghe = document.getElementById("errslghe");

let errngaychieu = document.getElementById("errngaychieu");
let errgiochieu = document.getElementById("errgiochieu");

let txtname = document.getElementById("txtname");
let txtnoidung = document.getElementById("txtnoidung");
let txtthoiluong = document.getElementById("txtthoiluong");
let txtkhoichieu = document.getElementById("txtkhoichieu");
let txttrailer = document.getElementById("txttrailer");

let txtsoluong = document.getElementById("txtsoluong");

let txtgiochieu = document.getElementById("txtgiochieu");
let txtngaychieu = document.getElementById("txtngaychieu");


var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

function checkAddMovie() {
    // errname.style.display="none";
    // errnoidung.style.display="none";
    // errthoiluong.style.display="none";
    // errkhoichieu.style.display="none";
    // errtrailer.style.display="none";
   
     if(txtname.value.length == 0)
     {
        errname.style.display="block";
        console.log( errname.style.display);
       
     }
     else{
        errname.style.display="none";
        console.log( errname.style.display);
     }

     if(txtnoidung.value.length == 0)
     {
      errnoidung.style.display="block";
       
     }
     else{
        errnoidung.style.display="none";
     }

     if(txtthoiluong.value.length == 0)
     {
        errthoiluong.style.display="block";
       
     }
     else{
       errthoiluong.style.display="none";
     }

     if(txttrailer.value.length == 0)
     {
        errtrailer.style.display="block";
       
     }
     else{
       errtrailer.style.display="none";
     }

     if(txtkhoichieu.value <= date)
     {
        errkhoichieu.style.display="block";
       
     }
     else{
       errkhoichieu.style.display="none";
     }
}


function checkRap() {
//    errslghe.style.display="none";
   if(txtsoluong.value <= 30)
   {
      errslghe.style.display="block";
     
   }
   else{
     errslghe.style.display="none";
   }
}
function checkSuatChieu() {
//    errgiochieu.style.display="none";
//    errngaychieu.style.display="none";

   if(txtngaychieu.value <= date)
   {
      errngaychieu.style.display="block";
     
   }
   else{
      errngaychieu.style.display="none";
   }
   console.log(txtngaychieu.value);
}
let txttenchinhanh = document.getElementById("txttenchinhanh");
let txtdcchinhanh = document.getElementById("txtdcchinhanh");
let errtenchinhanh = document.getElementById("errtenchinhanh");
let errdcchinhanh = document.getElementById("errdcchinhanh");

function checkChiNhanh() {
    if(txttenchinhanh.value.length == 0)
     {
        errtenchinhanh.style.display="block";
     }
     else{
        errtenchinhanh.style.display="none";
     }

     if(txtdcchinhanh.value.length == 0)
     {
        errdcchinhanh.style.display="block"; 
     }
     else{
        errdcchinhanh.style.display="none";
     }
}



function checkTheLoai() {
    let txttentheloai = document.getElementById("txttheloai");
    let errtentheloai = document.getElementById("errtentheloai");
    console.log(txttentheloai.value);
    if(txttentheloai.value.length == 0)
     {
        errtentheloai.style.display="block";
     }
     else{
        errtentheloai.style.display="none";
     }
}