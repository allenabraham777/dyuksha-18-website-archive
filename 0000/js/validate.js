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
              required:true,
              equalTo: password
            },
            college:{
              required:true,
            }
          },
          // Error Messages
          messages: {
            name: {
                required:"<div class='field_errors'><p><i class='fa fa-times'></i>Please enter your Name</p></div>",
                lettersonly: "<div class='field_errors'><p><i class='fa fa-times'></i>Should Contain Only Aphabets</p></div>"
            },
            phone: {
                required:"<div class='field_errors'><p><i class='fa fa-times'></i>Please enter your Phone Number</p></div>",
                number:"<div class='field_errors'><p><i class='fa fa-times'></i>Not a valid Phone Number</p></div>",
                minlength:"<div class='field_errors'><p><i class='fa fa-times'></i>Not a valid Phone Number</p></div>"
            },
            password: {
              required: "<div class='field_errors'><p><i class='fa fa-times'></i>This Field is Required</p></div>",
              minlength: "<div class='field_errors'><p><i class='fa fa-times'></i>At Least 5 Characters Required</p></div>"
            },
            passwordconfirm:{
              required: "<div class='field_errors'><p><i class='fa fa-times'></i>This Field is Required</p></div>",
                equalTo:"<div class='field_errors'><p><i class='fa fa-times'></i>Passwords Doesnt Match</p></div>"
            },
            college:"<div class='field_errors'><p><i class='fa fa-times'></i>This Field is Required</p></div>",
            email: "<div class='field_errors'><p><i class='fa fa-times'></i>Not a valid Email Id</p></div>"
            
          },
        
          submitHandler: function(form) {
            form.submit();
          }
        });
      });
});