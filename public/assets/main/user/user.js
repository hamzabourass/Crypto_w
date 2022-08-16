/*
script pour la verification de registrement des utilisateur
*/
$('#register-user').click(function(){

 var firstname = $('#firstname').val();
 var lastname = $('#lastname').val();
 var email = $('#email').val();
 var password = $('#password').val();
 var password_confirm = $('#password-confirm').val();
 var passwordLength = password.length;
 var password2Length = password_confirm.length;

 var agreeTerms = $('#agreeTerms');

/*console.log('test');*/

 if(firstname!="" && /^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(firstname)){

    $('#firstname').removeClass(('is-invalid'));
    $('#firstname').addClass(('is-valid'));
    $('#error-register-firstname').text("");
 if(lastname!="" && /^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(lastname)){

        $('#lastname').removeClass(('is-invalid'));
        $('#lastname').addClass(('is-valid'));
        $('#error-register-lastname').text("");
 if(email!="" && /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(email)){

            $('#email').removeClass(('is-invalid'));
            $('#email').addClass(('is-valid'));
            $('#error-register-email').text("");
            if( passwordLength >=8){

                $('#password').removeClass(('is-invalid'));
                $('#password').addClass(('is-valid'));
                $('#error-register-password').text("");
            if( password == password_confirm ){

                    $('#password-confirm').removeClass(('is-invalid'));
                    $('#password-confirm').addClass(('is-valid'));
                    $('#error-register-password_confirm').text("");

                    if(agreeTerms.is(':checked')){
                        $('#agreeTerms').removeClass(('is-invalid'));
                        $('#error-register-agreeTerms').text("");
                        //envoie du formulaire
                        //alert('ok');

                        // si il est different de exist (il n'existe pas) il doit valider formulaire sinon affichage message d'erreur

                        var res= emailExistjs(email);

                            //$('#form-register').submit();
                        (res != "exist") ? $('#form-register').submit()
                               :      ($('#email').addClass('is-invalid'),
                                      $('#email').removeClass('is-valid'),
                                      $('#error-register-email').text("This email is already used!"));

                      /*  if( res != "exist" ) {

                            $('#form-register').submit();}
                           else{
                             $('#email').addClass('is-invalid');
                             $('#email').removeClass('is-valid');
                             $('#error-register-email').text("This email is already user!");
                               }*/





                       // $('#form-register').submit();

                    }else{
                       $('#agreeTerms').addClass(('is-invalid'));
                       $('#error-register-agreeTerms').text("You should agree to our terms...");


                    }
                }else{

                    $('#password-confirm').addClass(('is-invalid'));
                    $('#password-confirm').removeClass(('is-valid'));
                    $('#error-register-password-confirm').text("Your passwords must be identical!");

                 }


             }else{


                $('#password').addClass(('is-invalid'));
                $('#password').removeClass(('is-valid'));
                $('#error-register-password').text("Your password must be at least 8 characters!");

             }







         }else{


            $('#email').addClass(('is-invalid'));
            $('#email').removeClass(('is-valid'));
            $('#error-register-email').text("Email is not valid!");

         }






     }else{


        $('#lastname').addClass(('is-invalid'));
        $('#lastname').removeClass(('is-valid'));
        $('#error-register-lastname').text("Last Name is not valid!");

     }

    /*alert('khdama');*/
 }else{
    /*console.log("khdama")*/

    $('#firstname').addClass(('is-invalid'));
    $('#firstname').removeClass(('is-valid'));
    $('#error-register-firstname').text("First Name is not valid!");

 }

});

//evenement pour l'input termes et conditions
$('#agreeTerms').change(
    function(){

        var agreeTerms = $('#agreeTerms');
        if(agreeTerms.is(':checked')){
            $('#agreeTerms').removeClass(('is-invalid'));
            $('#error-register-agreeTerms').text("");

        }else{
        $('#agreeTerms').addClass(('is-invalid'));
           $('#error-register-agreeTerms').text("You should agree to our terms...");

        }



    }
);

//emailExistjs();

function emailExistjs(email){

    var url = $('#email').attr('url-emailExist');
    var token = $('#email').attr('token');
    var res = "";
    $.ajax(
        {
         type:'POST',
         url: url,
         data: {
          '_token': token,
          email : email


         },
         success : function(result){
            res = result.response;
         },
         async : false
        });
        return res;

//console.log(url);


}
