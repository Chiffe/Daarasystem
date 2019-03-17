/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var bwLogin = {
    init: function(){
        this.handleForgetPassword();
    },
    handleForgetPassword: function() {
        Ladda.bind('.forget-form button[type=submit]');

        $('.forget-form').on('submit', function(){
            event.preventDefault();
            //Par défaut, on cache le block réponse et on le vide
            $('.forget_passwd_response').hide('slow', function(){
                $('.forget_passwd_response .mt-element-list .mt-list-container ul').html("");
            });
            //On récupère l'adresse mail
            var email = $(this).find('input[name="email"]').val();

            //---------!!!!!!  Faire une requete AJAX à la place du setTimeout !!!!!!!---------
            setTimeout(function(){
                if(email == 'unseulcompte@gmail.com'){
                    swal('Good job!', 'Un email a été envoyé pour réinitialiser le mot de passe', 'success');
                }else if(email == 'plusieurscomptes@gmail.com'){
                    var datas = {'resultatAjax':true, 'accounts':[{'id_compte':1, 'email':'plusieurscomptes@gmail.com', 'pseudo':'pseudo1', 'type_compte':'Admin'}, {'id_compte':2, 'email':'plusieurscomptes@gmail.com', 'pseudo':'pseudo2', 'type_compte':'Professeur'}]};
                    var outHtml = "";
                    for (i in datas.accounts){
                        outHtml+= '<li class="mt-list-item"><div class="list_form_action"><form action="undefined" method="post"><div style="display:none;"><input type="hidden" name="_method" value="POST">'
                        +'<input type="hidden" name="id" value="'+datas.accounts[i].id_compte+'">'
                        +'<input type="hidden" name="email" value="'+datas.accounts[i].email+'"></div><div class="form-actions"><button type="submit" class="btn green uppercase">Réinitialiser</button></div></form></div>'
                        +'<div class="list-item-content"><p>Compte : '+datas.accounts[i].type_compte+'<br>Pseudo : '+datas.accounts[i].pseudo+'</p></div></li>';
                    }
                    //On ajoute le rendu html
                    $('.forget_passwd_response .mt-element-list .mt-list-container ul').html(outHtml);
                    $('.forget_passwd_response').show('slow', function(){
                        //On scroll sur la zone
                        var target = $('.forget_passwd_response').offset().top;
                        $('html, body').animate({scrollTop: target}, {duration:1000, queue:false});
                    });
                }else if(email == 'pasdecompte@gmail.com'){
                    swal('Oups!', 'Aucun compte n\'est associé à cette adresse mail', 'warning');
                }
                Ladda.stopAll();
            }, 2000);
            //-------- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -----------
        });

        $('#forget-password').on('click', function(){
            $('.login-form').hide();
            $('.forget-form').show();
        });

        $('#back-btn').on('click', function(){
            $('.login-form').show();
            $('.forget-form').hide();
            //On cache le block réponse
            $('.forget_passwd_response').hide('slow', function(){
                $('.forget_passwd_response .mt-element-list .mt-list-container ul').html("");
            });
        });
    }
};

$(document).ready(function(){bwLogin.init();});