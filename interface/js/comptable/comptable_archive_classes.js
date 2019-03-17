/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var comptableArchiveClasse = function () {
    //---------------- Test Bew-Works A SUPPRIMER ---------
    var ajaxResponse = true;

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
        anscol:  {value:null, msg:''},
        classe: {value:null, msg:''}
    };

    var urls = {
        saveMultiAction:    "url_pour_effectuer_action_sur_plusieurs_lignes"
    };

    var handleTable = function() {
        var table = $('#table_archive_classe');
        //Init les messages de notifications
        toastr.options = mainInterface.defaultToastr;

        var oTable = table.DataTable($.extend(mainInterface.defaultDatatable, {order: [[1, 'desc']], columnDefs: [{orderable: false, targets: [0,5]}]}));

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
                    msgUser:    'Impression de plusieurs documents demandée<br/><br/>Message à titre indicatif !<br/>Pour la version finale à la place de ce message, un nouvel onglet sera ouvert avec le pdf généré.',  //possibilité de personnaliser le msg
                    urlPdf:     'url_pdf'   //Si c'est une impression qui est demandé, renvoyé l'url pour voir le pdf
                };
                if(ajaxDataResponse['response']){
                    //Selon le form_action
                    switch(formAction){
                        case 'print_scolarite':
                        case 'print_bulletin':
                        case 'print_recu':
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

        //Sélection sur le filtre classe
        $('#filter_classe').on('change', function(){
            oTable.column(2).search($(this).val()).draw();
            changeFiltre('classe', $(this).find('option:selected').attr('data-id'), $(this).val());
        });

        //Sélection sur le filtre annee scolaire
        $('#filter_anscol').on('change', function(){
            oTable.column(1).search($(this).val()).draw();
            changeFiltre('anscol', $(this).find('option:selected').attr('data-id'), $(this).val());
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
             Utiliser urls.generatePdf en faisant un POST de dataFilters pour générer l'url comme il faut
             Utiliser toBePrinted, avec un if ou une concatenation ou en POST pour savoir quel type d'impression demandé (Bulletin ou Reçu)
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
            case 'anscol':
                //Si id renseigné
                if(idItem != undefined && idItem != ''){
                    dataFilters.anscol.value = idItem;
                    dataFilters.anscol.msg = 'Année scolaire : "'+labelItem+'"';
                }
                else
                    dataFilters.anscol = {value:null, msg:''};
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
        }

        //Message pour les tooltips des boutons
        var msgFiltreTooltips = '';
        //Par défaut, on vérrouille les boutons impression
        dataFilters.disabledBtnPrint = true;
        //On vérifie les filtres pour savoir quel doit être l'état des btn d'impression
        //Au moins un filtre pour activer le bouton
        $.each(dataFilters, function(k, v){
            //On saute l'index "disabledBtnPrint"
            if(k == 'disabledBtnPrint' || v.value == null)
                return;

            //Si le filtre classe est activé, on active le bouton
            if(k == 'classe' && v.value != null)
                dataFilters.disabledBtnPrint = false;

            //Sinon on ajoute le filtre dans le msg
            msgFiltreTooltips+= '<br/>'+v.msg;
        });

        //On met les boutons dans l'état qui doivent être
        $('.printer_actions').prop('disabled', dataFilters.disabledBtnPrint);
        //On change les messages des tooltips
        $('button[data-action="bulletin"]').attr('data-original-title', 'Imprimer le bulletin général'+msgFiltreTooltips);
        $('button[data-action="recu"]').attr('data-original-title', 'Imprimer le reçu global'+msgFiltreTooltips);
    }

    return {
        init: function(){
            handleTable();
            handlePrinterActions();
            handleBW(); // Test BEW-Works A SUPPRIMER
        }
    };
}();

$(document).ready(function(){comptableArchiveClasse.init();});