/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var comptableBlouse = function () {
    //---------------- Test Bew-Works A SUPPRIMER ---------
    var ajaxResponse = true;

    var handleBW = function(){
        $('#bw_test').on('switchChange.bootstrapSwitch', function (event, state) {
            ajaxResponse = state;
        });
    };
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    //Pour gérer les options pour l'impression
    var idClasse = null;

    var urls = {
        saveMultiAction:    "url_pour_effectuer_action_sur_plusieurs_lignes",
        generatePdf:        "url_pour_generer_url_du_pdf",
        seeRecu:            "url_pour_afficher_recu"
    };

    var handleTable = function() {
        var table = $('#table_blouse');
        //Init les messages de notifications
        toastr.options = mainInterface.defaultToastr;

        var oTable = table.DataTable($.extend(mainInterface.defaultDatatable, {
            order: [[1, 'asc']],
            columnDefs: [{orderable: false, targets: [0, 6]}],
            initComplete: function(){
                mainInterface.sumMontantTable(table);
            }
        }));

        //Permet de gérer les checkbox du tableau et la zone button multi_action
        mainInterface.handleCheckboxTable(table);

        //Clique sur un bouton multi_actions
        $('#cont_multi_actions .multi_submit').on('click', function(){
            var postData = table.find('input.checkboxes').serializeFormJSON();
            var formAction = $(this).attr('data-form-action');

            //Pas de checkbox sélectionnées
            if(postData['id'] == undefined){
                $('#group_checkable').prop('checked', false);
                $('#cont_multi_actions').hide('slow');
                toastr.warning('Veuillez sélectionner des lignes du tableau.');
                return false;
            }
            else{
                postData['form_action'] = formAction;
                postData = JSON.stringify(postData);
                // ------------------------- Faire requête AJAX à la place -----------------
                // Utiliser urls.saveMultiAction avec postData en POST
                // "form_action" permet de savoir qu'est ce qu'il faut appliquer sur les éléments postés
                // --------
                // voilà le format de réponse attendu pour la réponse ajax
                var ajaxDataResponse = {
                    response:   ajaxResponse,
                    msgUser:    'Impression de plusieurs reçus demandées<br/><br/>Message à titre indicatif !<br/>Pour la version finale à la place de ce message, un nouvel onglet sera ouvert avec le pdf généré.',  //possibilité de personnaliser le msg
                    urlPdf:     'url_pdf'   //Si c'est une impression qui est demandé, renvoyé l'url pour voir le pdf
                };
                if(ajaxDataResponse['response']){
                    //Selon le form_action
                    switch(formAction){
                        case 'print':
                            /*
                             Utiliser ajaxDataResponse.urlPdf et ouvrir un nouvel onglet :
                             window.open(ajaxDataResponse.urlPdf, '_blank');
                             */
                            break;
                    }
                    //Message à diffuser
                    toastr.success(ajaxDataResponse.msgUser);
                }
                else
                    toastr.warning('Une erreur est survenue.');
                // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            }
        });

        //A chaque changement de visuel de la table, on recalcule le montant total
        table.on('draw.dt', function(){
            mainInterface.sumMontantTable(table);
        });

        //Sélection sur le filtre classe
        $('#filter_classe').on('change', function(){
            oTable.column(1).search($(this).val()).draw();
            var id = $(this).find('option:selected').attr('data-id');
            var label = $(this).val();
            var msgTooltips = '';
            //Si id renseigné
            if(id != undefined && id != ''){
                idClasse = id;
                msgTooltips+= ' de la classe "'+label+'"';
            }
            else
                idClasse = null;

            //On change les messages des tooltips
            $('button[data-action="recu"]').attr('data-original-title', 'Imprimer tous les reçus'+msgTooltips);
            $('button[data-action="blouse"]').attr('data-original-title', 'Imprimer la liste des élèves qui ont au moins une blouse'+msgTooltips);
        });

        //Voir le reçu
        table.on('click', '.view', function(){
            //On récupère l'id du reçu
            var idRecu = this.getAttribute('data-id');
            // ------------------------- Faire requête AJAX à la place -----------------
            // Utiliser urls.seeRecu pour aller chercher le html de la fenetre modal
            // --------
            //Générer la variable resAjax.html côté serveur (simule la réponse ajax)
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'comptable', action:'view_recu_blouse'}, function(resAjax){
                if(ajaxResponse && resAjax.success)
                    mainInterface.displayModal(resAjax.html);
                else
                    toastr.warning('Une erreur est survenue.');
            });
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });
    };

    var handlePrinterActions = function(){
        //Lors d'un click sur une action print
        $('.printer_actions').on('click', function(){
            //Le type d'impression demandé
            var toBePrinted = $(this).attr('data-action');

            //!!!!!!!!!!!!!!!!!!!!!!! A SUPPRIMER !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            var msg = 'Impression demandé<br/><br/>';
            msg+= 'Message à titre indicatif !<br/>Pour la version finale à la place de ce message, un nouvel onglet sera ouvert avec le pdf généré.';
            toastr.success(msg);
            //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

            //!!!!!!!!!!!!!!!!!!!!!!!!!! FAIRE CECI A LA PLACE !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            /*
             Utiliser urls.generatePdf en faisant un POST de idClass pour générer l'url comme il faut
             Utiliser toBePrinted, avec un if ou une concatenation ou en POST pour savoir quel type d'impression demandé (Reçu ou Blouse)
             Selon comment est votre système, une requête AJAX n'est pas nécessaire, juste une concatenation, à vous de voir
             Une fois l'url généré utiliser :
             window.open(url_genere, '_blank');
             */
            //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });
    };

    return {
        init: function(){
            handleTable();
            handlePrinterActions();
            handleBW(); // Test BEW-Works A SUPPRIMER
        }
    };
}();

$(document).ready(function(){comptableBlouse.init();});