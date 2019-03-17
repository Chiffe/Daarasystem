/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var comptableAchatEleve = function () {
    //---------------- Test Bew-Works A SUPPRIMER ---------
    var ajaxResponse = true;

    var handleBW = function(){
        $('#bw_test').on('switchChange.bootstrapSwitch', function (event, state) {
            ajaxResponse = state;
        });
    };
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    var urls = {
        getForm:    "url_pour_avoir_form_achat"
    };

    //Les prix unitaire de chaque type d'achat (Mis à jour en AJAX)
    var prix = null;

    var handleTable = function() {
        var table = $('#table_achat');
        //Init les messages de notifications
        toastr.options = mainInterface.defaultToastr;

        var oTable = table.DataTable($.extend(mainInterface.defaultDatatable, {order: [[1, 'asc']], columnDefs: [{orderable: false, targets: 4}]}));

        //Sélection sur le filtre classe
        $('#filter_classe').on('change', function(){
            oTable.column(1).search($(this).val()).draw();
        });

        //Sélection sur le filtre cycle
        $('#filter_cycle').on('change', function(){
            oTable.column(0).search($(this).val()).column(1).search("").draw();
        });

        //Click sur un des boutons achat
        table.on('click', '.achat', function(){
            //id de l'élève
            var idEleve = $(this).attr('data-id');
            //Type d'achat
            var typeAchat = $(this).attr('data-achat');

            //On va chercher le formulaire
            //Utiliser urls.getForm
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'comptable', action:'achat_'+typeAchat, id: idEleve}, function(resAjax){
                if(ajaxResponse && resAjax.success){
                    //On cache les zone formulaires
                    $('#yes_facture, #no_facture').hide('fast');
                    //On affiche le bouton "Annuler"
                    $('.cancel_facture').show('slow');
                    //On met à jour les prix
                    prix = resAjax.prix;
                    //On insère le html rendu et on l'affiche
                    $('#yes_facture').html(resAjax.html).show('slow', function(){
                        //On active le inputMask sur les champs date
                        mainInterface.initInputMask();
                        //On scroll dessus
                        App.scrollTo($('#yes_facture'), -85);
                    });
                }
                else
                    toastr.warning('Une erreur est survenue.');
            });

        });

        //Annuler l'achat
        $('.cancel_facture').on('click', function(){
            //On cache tout
            $('.cont_facture').hide('fast');
            //On supprime le contenu du "yes_facture"
            $('#yes_facture').html('');
            //On affiche "no_facture"
            $('#no_facture').show('slow');
            //On cache le bouton "Annuler"
            $(this).hide('fast');
        });

        //Gestion du montant des tenues
        $('#yes_facture').on('change', '#nbrtenu', function(){
            //On modifie l'input somme
            $('#prixtenu').val((parseInt($(this).val())*parseInt(prix.tenu)));
        });

        //Clique sur le select "Cantine"
        $('#yes_facture').on('change', '#cantine', function(){
            //De base, on cache le select tarif
            $('#cont_tarif').hide('slow');
            //Si cantine == Demi-pension
            if($(this).val() == 3)
                $('#cont_tarif').show('fast');
        });

        //Clique sur le select "Transport"
        $('#yes_facture').on('change', '#busid', function(){
            //De base, on cache le container zone bus
            $('#zone_bus').hide('slow');
            //Si zone bus == Bus SOS
            if($(this).val() == 5)
                $('#zone_bus').show('fast');
        });

        //Gestion des input "cond", les input qui conditionne le montant total
        $('#yes_facture').on('change', '.input_cond', function(){
            var value = $(this).val();
            var name = $(this).attr('name');
            var montant = 0;

            //selon le name
            switch(name){
                case 'busid':
                    //On met à jour le champ transport
                    if(value == '5'){
                        var zone = $('input[name="zone"]:checked').val();
                        //Si une zone a déjà été sélectionné
                        if(zone != undefined)
                            montant = prix[('zone'+zone)];
                    }
                    else if(value == '6')
                        montant = prix.busPrive;

                    $('#trans').val(montant);
                    break;
                case 'cantine':
                    //On met à jour le champ transport
                    if(value == '3')
                        montant = (parseFloat($('#tarif').val()) * parseFloat(prix.demi_pension));
                    else if(value == '2')
                            montant = (parseFloat($('#tarif').val()) * parseFloat(prix.pension));

                    $('#cant').val(montant);
                    break;
                case 'tarif':
                    montant = (parseFloat($('#tarif').val()) * parseFloat(prix.demi_pension));
                    $('#cant').val(montant);
                    break;
                case 'zone':
                    montant = prix[('zone'+value)];
                    $('#trans').val(montant);
                    break;
            }
            //Met à jour le montant total
            sumTotal();
        });

        //Somme des input pour le form trans/cant
        function sumTotal(){
            var sumTotal = 0;
            //On fait la somme
            $('#yes_facture').find('.input_payer').each(function(){
                sumTotal+= parseInt($(this).val());
            });
            //On modifie l'input somme
            $('.input_somme').val(sumTotal);
        }
    };

    return {
        init: function(){
            handleTable();
            handleBW(); // Test BEW-Works A SUPPRIMER
        }
    };
}();

$(document).ready(function(){comptableAchatEleve.init();});