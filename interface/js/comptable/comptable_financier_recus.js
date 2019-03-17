/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var comptableFinancierRecu = function () {
    //---------------- Test Bew-Works A SUPPRIMER ---------
    var ajaxResponse = true;
    var msgMultiAction = {
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
        date:   {value:null, msg:''},
        cycle:  {value:null, msg:''},
        classe: {value:null, msg:''},
        mois:   {value:null, msg:''},
        cat:    {value:null, msg:''}
    };

    var urls = {
        saveMultiAction:    "url_pour_effectuer_action_sur_plusieurs_lignes",
        generatePdf:        "url_pour_generer_url_du_pdf",
        seeFacture:         "url_pour_afficher_facture"
    };

    //Cette fois-ci, variable oTable en globale pour le daterangepicker
    var oTable = null;

    var filterDate =  $('#filter_date');

    var handleDateRangePicker = function(){
        if (!jQuery().daterangepicker)
            return false;

        filterDate.daterangepicker(mainInterface.getDefaultDaterangePicker(),
            function (start, end) {  //On change le span et les arrtibuts data
                filterDate.find('span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
                filterDate.attr('data-start-date', start.format('YYYYMMDD'));
                filterDate.attr('data-end-date', end.format('YYYYMMDD'));
            }
        );

        //Pour effacer le filtre date
        filterDate.on('cancel.daterangepicker', function(ev, picker) {
            filterDate.find('span').html('Pas de restriction');
            //On redessine le tableau
            oTable.draw();
            //Changement sur le filtre date
            changeFiltre('date', '', 'Pas de restriction');
        });

        //Lorsque l'on choisit un filtre_date et que le filtre a été effacé juste avant
        filterDate.on('apply.daterangepicker', function(ev, picker){
            var daterange = picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY');
            //Si le filtre a été effacé juste avant
            if(filterDate.find('span').html() == 'Pas de restriction'){
                filterDate.find('span').html(daterange);
                filterDate.attr('data-start-date', picker.startDate.format('YYYYMMDD'));
                filterDate.attr('data-end-date', picker.endDate.format('YYYYMMDD'));
            }
            //On redessine le tableau
            oTable.draw();
            //Changement sur le filtre date
            changeFiltre('date', daterange, (picker.startDate.format('DD/MM/YYYY') + ' au ' + picker.endDate.format('DD/MM/YYYY')));
        });
    };

    var handleTable = function() {
        var table = $('#table_financier_facture');
        //Init les messages de notifications
        toastr.options = mainInterface.defaultToastr;

        //On customise la fonction search de datable pour le daterangepicker
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var daterange = filterDate.find('span').html();
                //Si pas filtre date
                if(daterange == 'Pas de restriction')
                    return true;
                //sinon s'il y a un filtre, alors on récupère les valeurs
                var startDate = parseInt(filterDate.attr('data-start-date'));
                var endDate = parseInt(filterDate.attr('data-end-date'));
                var dateItem = parseInt(data[6]); //On utilise la colonne caché

                return ((isNaN(startDate) && isNaN(endDate)) ||
                (isNaN(startDate) && dateItem <= endDate) ||
                (startDate <= dateItem && isNaN(endDate)) ||
                (startDate <= dateItem && dateItem <= endDate));
            }
        );

        oTable = table.DataTable($.extend(mainInterface.defaultDatatable, {
            order: [[7, 'desc']],
            pageLength: 25,
            columnDefs: [{orderable: false, targets: [0, 11]}],
            initComplete: function(){
                mainInterface.sumMontantTable(table);
            }
        }));

        //Permet de gérer les checkbox du tableau et la zone button multi_action
        mainInterface.handleCheckboxTable(table);

        //Clique sur un bouton multi_actions
        $('#cont_multi_actions').on('click', '.multi_submit', function(){
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

        //Sélection sur le filtre catégorie
        $('#filter_cat').on('change', function(){
            oTable.column(5).search($(this).val()).draw();
            changeFiltre('cat', $(this).find('option:selected').attr('data-id'), $(this).val());
        });

        //Sélection sur le filtre mois
        $('#filter_mois').on('change', function(){
            oTable.column(8).search($(this).val()).draw();
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

        //A chaque changement de visuel de la table, on recalcule le montant total
        table.on('draw.dt', function(){
            mainInterface.sumMontantTable(table);
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

            //!!!!!!!!!!!!!!!!!!!!!!! A SUPPRIMER !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            var msg = 'Impression demandé<br/><br/>';
            msg+= 'Message à titre indicatif !<br/>Pour la version finale à la place de ce message, un nouvel onglet sera ouvert avec le pdf généré.';
            toastr.success(msg);
            //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

            //!!!!!!!!!!!!!!!!!!!!!!!!!! FAIRE CECI A LA PLACE !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            /*
             Utiliser urls.generatePdf en faisant un POST de dataFilters pour générer l'url comme il faut
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
            case 'date':
                //Si id renseigné
                if(idItem != undefined && idItem != ''){
                    dataFilters.date.value = idItem;
                    dataFilters.date.msg = 'Période : Du '+labelItem;
                }
                else
                    dataFilters.date = {value:null, msg:''};
                break;
            case 'cat':
                //Si id renseigné
                if(idItem != undefined && idItem != ''){
                    dataFilters.cat.value = idItem;
                    dataFilters.cat.msg = 'Catégorie : "'+labelItem+'"';
                }
                else
                    dataFilters.cat = {value:null, msg:''};
                break;
        }

        //Message pour les tooltips des boutons
        var msgTooltips = 'Imprimer le tableau des encaisements';
        //Par défaut, on vérrouille le bouton impression
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

        //On met le bouton dans l'état qui doit être et on change le message des tooltips
        $('.printer_actions').prop('disabled', dataFilters.disabledBtnPrint).attr('data-original-title', msgTooltips);
    }

    return {
        init: function(){
            handleTable();
            handlePrinterActions();
            handleDateRangePicker();
            handleBW(); // Test BEW-Works A SUPPRIMER
        }
    };
}();

$(document).ready(function(){comptableFinancierRecu.init();});