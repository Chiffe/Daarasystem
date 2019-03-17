/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var comptableFacturerEleve = function () {
    //---------------- Test Bew-Works A SUPPRIMER ---------
    var ajaxResponse = true;

    var handleBW = function(){
        $('#bw_test').on('switchChange.bootstrapSwitch', function (event, state) {
            ajaxResponse = state;
        });
    };
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    var urls = {
        getForm:    "url_pour_avoir_form_facturer"
    };

    var handleTable = function() {
        var table = $('#table_facturer');
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

        //Click sur un des boutons facturer
        table.on('click', '.facturer', function(){
            //id de l'élève
            var idEleve = $(this).attr('data-id');

            //On va chercher le formulaire
            //Utiliser urls.getForm
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'comptable', action:'facturer_scolarite', id: idEleve}, function(resAjax){
                if(ajaxResponse && resAjax.success){
                    //On cache les cont_facture
                    $('.cont_facture').hide('fast');
                    //On affiche le bouton "Annuler"
                    $('.cancel_facture').show('slow');
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
    };

    var handleFacturer = function(){
        //Annuler la facturation
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

        //Gestin des input "payer"
        $('#yes_facture').on('change', '.input_payer', function(){
            var sumTotal = 0;
            //On recalcule la somme
            $('.input_payer', '#yes_facture').each(function(){
                sumTotal+= parseInt($(this).val());
            });
            //On modifie l'input somme
            $('.input_somme').val(sumTotal);
        });
    };

    return {
        init: function(){
            handleTable();
            handleFacturer();
            handleBW(); // Test BEW-Works A SUPPRIMER
        }
    };
}();

$(document).ready(function(){comptableFacturerEleve.init();});