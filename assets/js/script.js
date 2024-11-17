function checkSyntax(){
  var re = /^(?=.*[!#$%&'()*+,-.:;<=>?@[\\\]^_`{|}~])(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/g;
  var input1 = document.getElementById('contrasena');
  if(input1.value.match(re)){
    input1.setCustomValidity('');
  } else{
    input1.setCustomValidity("Una contraseña valida debe tener: \n\u00ba Longitud minima de 8 caracteres \n\u00baUna mayuscula \n\u00baUna minuscula \n\u00baUn numero \n\u00baUn caracter especial");
  }
}

function check() {
  var input1 = document.getElementById('contrasena');
  var input2 = document.getElementById('contrasena2');

  if (input2.value != input1.value) {
    input2.setCustomValidity('Las contraseñas no coinciden');
  } else {
      // input is valid -- reset the error message
    input2.setCustomValidity('');
  }
}

function hide(inpass, idimg){
  var x = document.getElementById(inpass);
  var img =document.getElementById(idimg);
  if (x.type == "password"){
    x.type = "text";
    img.src = "assets/image/hide.png";
  } else{
    x.type = "password";
    img.src = "assets/image/view.png";
  }
}

function displaySelectedImage(event, elementId) {
    const selectedImage = document.getElementById(elementId);
    const fileInput = event.target;

    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            selectedImage.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}