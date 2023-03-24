(function($) {
    "use strict";


    /*==================================================================
    [ Focus Contact2 ]*/
    $('.input100').each(function() {
        $(this).on('blur', function() {
            if ($(this).val().trim() != "") {
                $(this).addClass('has-val');
            } else {
                $(this).removeClass('has-val');
            }
        })
    })


    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit', function() {
        var check = true;

        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function() {
        $(this).focus(function() {
            hideValidate(this);
        });
    });

    function alphatest(ch) {
        return /^[a-zA-Z]+$/.test(ch); //

    }


    function validate(input) {

        if ($(input).attr('name') == 'email') {
            if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                /* document.getElementById('control-mail').innerHTML = "mail invalide";*/
                return false;
            }
        } else if ($(input).attr('type') == 'text' || $(input).attr('name') == 'nom') {
            if ($(input).val().trim().match(/^[a-zA-Z]+$/) == null) {
                /*document.getElementById('control-nom').innerHTML = "nom invalide";*/

                return false;
            }
        } else if ($(input).attr('type') == 'text' || $(input).attr('name') == 'prenom') {
            if ($(input).val().trim().match(/^[a-zA-Z]+$/) == null) {
                /* document.getElementById('control-prenom').innerHTML = "prénom invalide";*/

                return false;
            }
        } else if ($(input).attr('type') == 'password' || $(input).attr('name') == 'pass') {
            if ($(input).val().trim().match(/[0-9]/g) &&
                $(input).val().trim().match(/[A-Z]/g) &&
                $(input).val().trim().match(/[a-z]/g) &&
                $(input).val().trim().match(/[^a-zA-Z\d]/g) &&
                $(input).val().trim().length >= 10)
                return true;
            else
                return false;
        } else if ($(input).attr('name') == 'passconfirm') {
            var mdp = document.getElementsByName("pass");

            if ($(input).val().trim().match(mdp) == null)
                return false;

        } else {
            if ($(input).val().trim() == '') {

                return false;
            }
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


})(jQuery);