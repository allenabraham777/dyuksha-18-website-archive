function checkPasswordField(){
    var passwordBox = document.getElementById("password");
    var passwordConfirmBox = document.getElementById("password-confirm");
    var password=passwordBox.value;
    var passwordConfrim=passwordConfirmBox.value;
    var form  = document.getElementById("create-form-id");
    if(password.localeCompare(passwordConfirm)==0){
        form.submit();
    }
    else{
        alert("Password Doesnt Match");
        passwordBox.value="";
        passwordCofirmBox.value="";
    }
}