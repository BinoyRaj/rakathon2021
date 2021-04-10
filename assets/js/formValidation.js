(function ($) {
    "use strict";
    $('.formValidation').on('submit', function (e) {
        var input=$(this).find('.inputValidation .input');
        var select=$(this).find('.inputValidation .select');
        var check = true;
        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }
        for (var i = 0; i < select.length; i++) {
            if (validateSelect(select[i]) == false) {
                showValidate(select[i]);
                check = false;
            }
        }
        if(!check){
            e.preventDefault();
        }
        return check;
    });
    $('.formValidation .input').each(function () {
        $(this).focus(function () {
            hideValidate(this);
        });
    });

    function validate(input) {
        if ($(input).attr('name') == 'email') {
            if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        } else if (($(input).attr('type') == 'password') && (!$(input).hasClass('loginPassword'))) {
            if ($(input).val().trim().match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,32}$/) == null) {
                return false;
            }
        } else {
            
            if ($(input).val().trim() == '') {
                return false;
            }
        }
    }

    function validateSelect(select){
        if(select.selectedIndex == 0){
            return false;
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();
        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();
        $(thisAlert).removeClass('alert-validate');
    }

    $('#createAccount').click(function(e){
        e.preventDefault();
        let clicked = $(this).parent().parent();
        clicked.animate({ "left": "-400px" }, "slow").removeClass('visible').addClass('hide');
        $(".signup").animate({ "right": "0px" }, "slow").removeClass('hide').addClass('visible');
    });

    $('#signIn').click(function(e){
        e.preventDefault();
        let clicked = $(this).parent().parent().parent();
        clicked.animate({ "right": "-400px" }, "slow").removeClass('visible').addClass('hide');
        $(".login").animate({ "left": "0px" }, "slow").removeClass('hide').addClass('visible');
    });

    $('#forgotPassword').click(function(e){
        e.preventDefault();
        let clicked = $(this).parent().parent().parent();
        clicked.animate({ "right": "-400px" }, "slow").removeClass('visible').addClass('hide');
        $(".forgotPassword").animate({ "left": "0px" }, "slow").removeClass('hide').addClass('visible');
    });

    $('#signInForgotPassword').click(function(e){
        e.preventDefault();
        let clicked = $(this).parent().parent();
        $(".login").css({"left":""});
        clicked.animate({ "left": "-400px" }, "slow").removeClass('visible').addClass('hide');
        $(".login").animate({ "right": "0px" }, "slow").removeClass('hide').addClass('visible');
    });


})(jQuery);

