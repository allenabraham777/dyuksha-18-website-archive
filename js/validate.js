$(document).ready(function(){
    
    
    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z ]+$/i.test(value);
      }, false); 

    $(function() {
        $("form[name='regform']").validate({
          // Specify validation rules
          rules: {
            name:{
                required:true,
                lettersonly: true
            },
            phone: {
                required:true,
                number:true,
                minlength:10
            },
            email: {
              required: true,
              email: true
            },
            password: {
              required: true,
              minlength: 5
            },
            passwordconfirm:{
                equalTo: password
            }
          },
          // Error Messages
          messages: {
            name: {
                required:"Please enter your Name",
                lettersonly: "Name must contain only alphabets"
            },
            phone: {
                required:"Please enter your Phone Number",
                number:"Not a Valid Phone Number",
                minlength:"Not a Valid Phone Number"
            },
            password: {
              required: "Please provide a password",
              minlength: "At least 5 characters long"
            },
            passwordconfirm:{
                equalTo:"Passwords Dont Match"
            },
        
            email: "<b>Please enter a valid email address</b>"
            
          },
        
          submitHandler: function(form) {
            form.submit();
          }
        });
      });
});