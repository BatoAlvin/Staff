$(function(){
    var $registrationForm = $("#registration");
    jQuery.validator.addMethod("noSpace", function(value, element){
        return value == '' || value.trim().length != 0
    }, "Spaces arenot allowed");
    if($registrationForm.length){
        $registrationForm.validate({
            rules:{
                staff_name:{
                    required:true,
                    noSpace:true
                },
                staff_contact:{
                    required:true,
                    noSpace:true
                },
                staff_email:{
                    required:true,
                    email:true,
                },
                staff_dob:{
                    required:true
                },
                gender:{
                    required:true
                },
                staff_address:{
                    required:true
                },

            },
            messages:{
                staff_name:{
                    required:'Staffname is mandatory'
                },
                staff_contact:{
                    required:'Please enter contact'
                },
                staff_email:{
                    required:'Please enter valid email'
                },
                staff_dob:{
                    required:'Please enter date of birth'
                },
                gender:{
                    required:'Please enter gender'
                },
                staff_address:{
                    required:'Please enter address'
                },


            }
        })
    }
})
