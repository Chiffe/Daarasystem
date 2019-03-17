/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var comptableFacture = function () {
    //---------------- Test Bew-Works A SUPPRIMER ---------
    var ajaxResponse = true;
    var msgMultiAction = {
        cancel: 'Les factures ont été annulé',
        print:  'Impression de plusieurs factures demandées<br/><br/>Message à titre indicatif !<br/>Pour la version finale à la place de ce message, un nouvel onglet sera ouvert avec le pdf généré.'
    };

    var handleBW = function(){
        $('#bw_test').on('switchChange.bootstrapSwitch', function (event, state) {
            ajaxResponse = state;
        });
    };
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    //Pour gérer les options pour l'impression, les msg des tooltips et l'état du bouton d'impression
    //L'ordre des index détermine l'ordre des filtres dans les msg tooltips
    var dataFilters = {
        disabledBtnPrint: true,
        cycle:  {value:null, msg:''},
        classe: {value:null, msg:''},
        mois:   {value:null, msg:''}
    };

    var urls = {
        cancel:             "url_pour_annuler_facture",
        saveMultiAction:    "url_pour_effectuer_action_sur_plusieurs_lignes",
        generatePdf:        "url_pour_generer_url_du_pdf",
        seeFacture:         "url_pour_afficher_facture"
    };

    var handleTable = function() {
        var table = $('#table_facture');
        //Init les messages de notifications
        toastr.options = mainInterface.defaultToastr;

        var oTable = table.DataTable($.extend(mainInterface.defaultDatatable, {
            order: [[2, 'asc']],
            columnDefs: [{orderable: false, targets: [0, 6]}]
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
                    msgUser:    msgMultiAction[formAction],  //possibilité de personnaliser le msg
                    urlPdf:     'url_pdf'   //Si c'est une impression qui est demandé, renvoyé l'url pour voir le pdf
                };
                if(ajaxDataResponse['response']){
                    //Selon le form_action
                    switch(formAction){
                        case 'cancel':
                            //On récupère les lignes annulées
                            var nRows = table.find('input.checkboxes:checked').closest('tr');
                            //On les retire du tableau
                            oTable.rows(nRows).remove().draw();
                            //On décoche, la case all_checkboxes par précaution
                            $('#group_checkable').prop('checked', false);
                            //On cache le container des boutons multi_actions
                            $('#cont_multi_actions').hide('slow');
                            break;
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

        //Sélection sur le filtre mois
        $('#filter_mois').on('change', function(){
            oTable.column(5).search($(this).val()).draw();
            changeFiltre('mois', $(this).find('option:selected').attr('data-id'), $(this).val());
        });

        //Sélection sur le filtre classe
        $('#filter_classe').on('change', function(){
            oTable.column(2).search($(this).val()).draw();
            changeFiltre('classe', $(this).find('option:selected').attr('data-id'), $(this).val());
        });

        //Sélection sur le filtre cycle
        $('#filter_cycle').on('change', function(){
            oTable.column(1).search($(this).val()).column(2).search("").draw();
            changeFiltre('cycle', $(this).find('option:selected').attr('data-id'), $(this).val());
        });

        //Suppression d'une facture
        table.on('click', '.cancel', function(){
            var nRow = $(this).closest('tr');
            //On récupère l'id de la facture
            var idFacture = this.getAttribute('data-id');
            // -------------- Faire une requête AJAX à la place ------------
            // Possibilité d'envoyer une requete à l'adresse "urls.cancel" et "idFacture" en paramètre POST (penser à adapter "urls.cancel")...
            // ...ou sinon faire une concaténation : urls.cancel+idFacture
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'comptable', action:'cancel_facture', id: idFacture}, function(resAjax){
                if(ajaxResponse && resAjax.success){
                    mainInterface.displayModal(resAjax.html);
                    //Active input-mask
                    mainInterface.initInputMask();
                }
                else
                    toastr.warning('Une erreur est survenue.');
            });
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });

        //Voir la facture
        table.on('click', '.view', function(){
            //On récupère l'id de la facture
            var idFacture = this.getAttribute('data-id');
            // ------------------------- Faire requête AJAX à la place -----------------
            // Utiliser urls.seeFacture pour aller chercher le html de la fenetre modal
            // --------
            //Générer la variable resAjax.html côté serveur (simule la réponse ajax)
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'comptable', action:'view_facture'}, function(resAjax){
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
            //Si un des filtres n'a pas été sélectionné
            if(dataFilters.disabledBtnPrint){
                //On désactive les boutons
                $('.printer_actions').prop('disabled', true);
                //Message d'avertissement
                toastr.warning('Veuillez sélectionner au moins un filtre avant d\'imprimer');
                return false;
            }
            //Le type d'impression demandé
            var toBePrinted = $(this).attr('data-action');

            //!!!!!!!!!!!!!!!!!!!!!!! A SUPPRIMER !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            var msg = 'Impression demandé<br/><br/>';
            msg+= 'Message à titre indicatif !<br/>Pour la version finale à la place de ce message, un nouvel onglet sera ouvert avec le pdf généré.';
            toastr.success(msg);
            //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

            //!!!!!!!!!!!!!!!!!!!!!!!!!! FAIRE CECI A LA PLACE !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            /*
             Utiliser urls.generatePdf en faisant un POST des variables idCycle, idClasse et idMois pour générer l'url comme il faut
             Utiliser toBePrinted, avec un if ou une concatenation ou en POST pour savoir quel type d'impression demandé (Factures ou Liste des impayés)
             Selon comment est votre système, une requête AJAX n'est pas nécessaire, juste une concatenation, à vous de voir
             Une fois l'url généré utiliser :
             window.open(url_genere, '_blank');
             */
            //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });
    };

    /**
     * Active/Désactive les boutons d'impression.
     * Changement également les messages pour les tooltips des boutons
     *
     * @param nameFiltre string - Nom du filtre qui a changé
     * @param idItem int - ID de la valeur sélectionné
     * @param labelItem string - Label de la valeur sélectionné
     */
    function changeFiltre(nameFiltre, idItem, labelItem){
        //Selon le filtre
        switch(nameFiltre){
            case 'cycle':
                //On remet les données classe à 0, vu que la classe est reliée au cycle
                dataFilters.classe = {value:null, msg:''};
                //Si id renseigné
                if(idItem != undefined && idItem != ''){
                    dataFilters.cycle.value = idItem;
                    dataFilters.cycle.msg = 'Cycle : "'+labelItem+'"';
                }
                else
                    dataFilters.cycle = {value:null, msg:''};
                break;
            case 'classe':
                //Si id renseigné
                if(idItem != undefined && idItem != ''){
                    dataFilters.classe.value = idItem;
                    dataFilters.classe.msg = 'Classe : "'+labelItem+'"';
                }
                else
                    dataFilters.classe = {value:null, msg:''};
                break;
            case 'mois':
                //Si id renseigné
                if(idItem != undefined && idItem != ''){
                    dataFilters.mois.value = idItem;
                    dataFilters.mois.msg = 'Mois : "'+labelItem+'"';
                }
                else
                    dataFilters.mois = {value:null, msg:''};
                break;
        }

        //Message pour les tooltips des boutons
        var msgTooltips = '';
        //Par défaut, on vérrouille les boutons impression
        dataFilters.disabledBtnPrint = true;
        //On vérifie les filtres pour savoir quel doit être l'état des btn d'impression
        //Au moins un filtre pour activer le bouton
        $.each(dataFilters, function(k, v){
            //On saute l'index "disabledBtnPrint"
            if(k == 'disabledBtnPrint' || v.value == null)
                return;

            //Sinon on ajoute le msg et disabled à false
            dataFilters.disabledBtnPrint = false;
            //Si le filtre est cycle, mais que le filtre classe est rempli alors on n'affiche pas le cycle dans le msg tooltips
            if(k == 'cycle' && dataFilters.classe.value != undefined && dataFilters.classe.value != null)
                return;
            //Sinon on ajoute le filtre dans le msg
            msgTooltips+= '<br/>'+v.msg;
        });

        //On met les boutons dans l'état qui doivent être
        $('.printer_actions').prop('disabled', dataFilters.disabledBtnPrint);
        //On change les messages des tooltips
        $('button[data-action="facture"]').attr('data-original-title', 'Imprimer toutes les factures'+msgTooltips);
        $('button[data-action="impaye"]').attr('data-original-title', 'Imprimer la liste des impayés'+msgTooltips);
        $('button[data-action="recu"]').attr('data-original-title', 'Imprimer tous les reçus'+msgTooltips);
    }

    return {
        init: function(){
            handleTable();
            handlePrinterActions();
            handleBW(); // Test BEW-Works A SUPPRIMER
        }
    };
}();

$(document).ready(function(){comptableFacture.init();});