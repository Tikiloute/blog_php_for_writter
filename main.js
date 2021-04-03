let myModal = document.getElementById('myModal');
let input = document.getElementById('myInput');

// myModal.addEventListener("click", function(){
//    alert("delete !!");
// });

myModal.addEventListener('shown.bs.modal', function () {
    input.focus();
  })