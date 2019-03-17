/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var comptableFeaturesFormEleve = function () {
    var urls = {
        "getDataForm":  "url_pour_avoir_donnees_form_en_fonction_cycle" //URL pour récupérer les données du form en fonction du cycle choisi
    };

    var handleSelect = function() {
        //Init select
        $('#clas_doublee').multiSelect({
            selectableHeader:   "<div class='bg-green padd_select font-white text-center'><h5>Classes disponibles</h5></div>",
            selectionHeader:    "<div class='bg-green padd_select font-white text-center'><h5>Classes doublées</h5></div>"
        });
    };

    /**
     * Permet de gérer l'état des boutons "Retour" et "Suivant"
     *
     * @param form
     * @param navigation
     * @param index
     */
    var handleBtnNav = function(form, navigation, index){
        var total = navigation.find('li').length;
        var current = index + 1;
        //Etapes validées
        $('li', form).removeClass('done');
        var li_list = navigation.find('li');
        for (var i = 0; i < index; i++) {
            $(li_list[i]).addClass("done");
        }

        if (current == 1) {
            form.find('.button-previous').hide();
            form.find('.button-next').hide();
        } else {
            form.find('.button-previous').show();
        }

        if (current >= total) {
            form.find('.button-next').hide();
            form.find('.button-submit').show();
        } else if(current > 1) {
            form.find('.button-next').show();
            form.find('.button-submit').hide();
        }

        App.scrollTo(form, -10);
    };

    var handleWizard = function(){
        var formWizard = $('#form_wizard');
        var formSubmit = $('#form_submit');
        var idCycle = 0;
        if (jQuery().toastr){
            //Init les messages de notifications
            toastr.options = mainInterface.defaultToastr;
        }

        //Validate (pour ajout d'un élève)
        if (jQuery().validate) {
            formSubmit.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    idcycle:        {required: true},
                    civilite:       {required: true},
                    classe:         {required: true},
                    cat_id:         {required: true},
                    prenom:         {required: true},
                    nom:            {required: true},
                    date_naissance: {required: true},
                    lieu_naissance: {required: true},
                    adresseeleve:   {required: true},
                    numtele:        {required: true}
                },
                errorPlacement: function(error, element) {
                    if (element.is(':checkbox')) {
                        error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
                    } else if (element.is(':radio')) {
                        error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                highlight: function(element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function(element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function(label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                }
            });
        }

        //On cache le bouton suivant au départ
        formWizard.find('.button-next').hide();

        //Changement dans un des input du tableau paiement
        $('#table_paiement').on('change', 'input[name="paiement[]"]', function(){
            var sumTotal = 0;
            //On recalcule la somme
            $('input[name="paiement[]"]', '#table_paiement').each(function(){
                sumTotal+= parseInt($(this).val());
            });
            //On modifie l'input somme
            $('#total').val(sumTotal);
        });

        //Clique sur un cycle
        $('.cycle_item', formWizard).on('click', function(){
            idCycle = this.getAttribute('data-cycle');
            //Dans l'input
            $('#idcycle').val(idCycle);
			//On passe à l'étape suivante
			formWizard.bootstrapWizard('next');
        });

        if (jQuery().bootstrapWizard){
            formWizard.bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                onTabClick: function (tab, navigation, index, clickedIndex) {return false;},    //En mode test, mettre true, pour passer les étapes sans restrictions
                onNext: function (tab, navigation, index) {
                    if(formSubmit.valid() == false)
                        return false;

                    handleBtnNav(formWizard, navigation, index);
                },
                onPrevious: function (tab, navigation, index) {
                    handleBtnNav(formWizard, navigation, index);
                },
                onTabShow: function (tab, navigation, index) {
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    var $percent = (current / total) * 100;
                    formWizard.find('.progress-bar').css({
                        width: $percent + '%'
                    });

                    //Si on arrive à la dernière étape, on affiche les précédentes sauf la 1er
                    if(current == 5)
                        $('#tab2,#tab3,#tab4').addClass('active');
                }
            });
        }
    };

    return {
        init: function(){
            handleSelect();
            handleWizard();
        }
    };
}();

$(document).ready(function(){comptableFeaturesFormEleve.init();});