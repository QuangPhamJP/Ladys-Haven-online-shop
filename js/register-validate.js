jQuery(function(){
	jQuery.validator.addMethod("validate_email", function(value, element) {

	    if (/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value)) {
	        return true;
	    } else {
	        return false;
	    }
	}, "Please enter a valid Email.");

	$("#form-register").validate({
        rules:{
            firstName: {
                required: true,
                minlength: 3,
                maxlength: 100
            },
            lastName: {
                required: true,
                minlength: 3,
                maxlength: 100
            },
            username: {
                required: true,
                minlength: 3,
                maxlength: 100
            },
            password: {
                required: true,
                minlength: 7,
                maxlength: 100
            },
            cpassword: {
                required: true,
                minlength: 7,
                maxlength: 100,
                equalTo: "#password"
            },
            email:{
            	required: true,
            	validate_email: true
            }
        },
        messages:{
            firstName: {
                required :"Please enter your firstname",
                minlength:"FirstName must be at least 3 characters",
                maxlength:"FirstName limit 100 characters"
            },
            lastName: {
                required :"Please enter your lastname",
                minlength:"LastName must be at least 3 characters",
                maxlength:"LastName limit 100 characters"
            },
            email:{
            	required:"Please enter your email",
            }
        }
    });

    
});