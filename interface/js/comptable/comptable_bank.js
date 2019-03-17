/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var comptableBank = function () {
    //---------------- Test Bew-Works A SUPPRIMER ---------
    var ajaxResponse = true;
    var idRecuTest = 100;

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
        cycle:  {value:null, msg:''}
    };

    var urls = {
        getForm:        "url_pour_avoir_html_du_form",
        saveForm:       "url_pour_save_form", //Si l'input id est présent alors c'est une modification sinon c'est un ajout
        generatePdf:    "url_pour_generer_url_du_pdf"
    };

    //Cette fois-ci, variable oTable en globale pour le daterangepicker
    var oTable = null;

    var filterDate =  $('#filter_date');

    var handleDateRangePicker = function(){
        if (!jQuery().daterangepicker) {
            return false;
        }

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

        //Lorsque l'on choisit un filtre_date et que le filtre a été effacé jsute avant
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
        var eRow = false;
        var table = $('#table_bank');
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
                var dateItem = parseInt(data[2]); //On utilise la colonne caché

                return ((isNaN(startDate) && isNaN(endDate)) ||
                (isNaN(startDate) && dateItem <= endDate) ||
                (startDate <= dateItem && isNaN(endDate)) ||
                (startDate <= dateItem && dateItem <= endDate));
            }
        );

        oTable = table.DataTable($.extend(mainInterface.defaultDatatable, {
            order: [[3, 'desc']],
            pageLength: 25,
            columnDefs: [{orderable: false, targets: 6}],
            initComplete: function(){
                mainInterface.sumMontantTable(table);
            }
        }));

        //Sélection sur le filtre cycle
        $('#filter_cycle').on('change', function(){
            oTable.column(0).search($(this).val()).draw();
            changeFiltre('cycle', $(this).find('option:selected').attr('data-id'), $(this).val());
        });

        //A chaque changement de visuel de la table, on recalcule le montant total
        table.on('draw.dt', function(){
            mainInterface.sumMontantTable(table);
        });

        //Ajout d'un versement
        $('#add_depot').on('click', function(){
            // ------------------------- Faire requête AJAX avec les bon paramètres -----------------
            // Utiliser urls.getForm pour aller chercher le html de la fenetre modal.
            // --------
            //Générer la variable resAjax.html côté serveur (simule la réponse ajax)
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'comptable', action:'form_bank'}, function(resAjax){
                if(ajaxResponse && resAjax.success){
                    mainInterface.displayModal(resAjax.html);
                    //On active le plugin input-mask
                    mainInterface.initInputMask();
                }
                else
                    toastr.warning('Une erreur est survenue.');
            });
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });

        //Edition d'un versement
        table.on('click', '.edit', function(){
            var nRow = $(this).parents('tr')[0];
            //On récupère l'id de la classe
            var idRecu = this.getAttribute('data-id');
            // ------------------------- Faire requête AJAX à la place -----------------
            // Utiliser urls.getForm pour aller chercher le html de la fenetre modal, dans le cas d'une édition on fournit l'id du versement...
            // ... pour éviter de récupérer les valeurs côté client, toujours faire confiance au côté serveur
            // --------
            //Générer la variable resAjax.html côté serveur (simule la réponse ajax)
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'comptable', action:'form_bank', id:idRecu}, function(resAjax){
                if(ajaxResponse && resAjax.success){
                    mainInterface.displayModal(resAjax.html);
                    //On active le plugin input-mask
                    mainInterface.initInputMask();
                }
                else
                    toastr.warning('Une erreur est survenue.');
            });
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });

        //Validation form pour ajout/edition d'un versement
        $('body').on('submit', '.form_bank', function(e){
            //Petit spinner de chargement
            var ladda = Ladda.create($('.form_bank button[type="submit"]')[0]);
            ladda.start();

            e.preventDefault();
            //On récupèrer les valeurs du form
            var dataPost = JSON.stringify($(this).serializeFormJSON());
            // ------------------------------- Faire requête AJAX à la place ----------------------
            // Utiliser urls.saveForm pour sauvegarder le form, si le champ id est présent dans les datas alors c'est une modification, sinon c'est un ajout
            // Pour la réponse, l'id doit être renvoyé dans tout les cas, avec les données correspondant sous forme array, ne pas oublier la colonne cachée
            // --------
            //Simulation requête AJAX (idTestAdd est là pour un ajout pour la version test)
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'comptable', action:'submit_form_bank', data:dataPost, idTestAdd:idRecuTest}, function(resAjax){
                if(ajaxResponse && resAjax.success){
                    //Juste pour le test
                    idRecuTest = resAjax.idRecuTest;
                    //On récupère la ligne, si possible
                    var nRow = table.find('a.edit[data-id="'+resAjax['id']+'"]').closest('tr');
                    //Passage à l'event
                    eRow = resAjax['id'];
                    if(nRow.length == 0){ //On est sur un ajout
                        //On ajoute la ligne
                        nRow = oTable.row.add(resAjax.row).draw().node();
                        //On cache la 3eme colonne
                        $(nRow).find('td').eq(2).addClass('display-none');
                    }else if(nRow.length == 1){   //Normalement pas besoin de faire else if, juste else est suffisant, mais on anticipe si jamais quelques malins modifient le html
                        nRow = nRow[0];
                        //On update la ligne
                        oTable.row(nRow).data(resAjax.row);
                    }
                    toastr.success('Action effectuée.');
                }
                else
                    toastr.warning('Une erreur est survenue.');

                //Stop le spinner
                ladda.stop();
                //Quelque soit la réponse, on ferme la fenetre modal
                $('#myModal').modal('hide');
            });
        });

        //Après la fermeture de la fenetre modal
        $('body').on('hidden.bs.modal', '#myModal', function(e){
            //Pas de mise à jour ou d'ajout sur le tableau
            if(eRow == false) return false;

            //On attire l'attention
            $('a.edit[data-id="'+eRow+'"]').closest('tr').find('td')
                .animate( { backgroundColor: "#1d9d38" }, 900 )
                .animate( { backgroundColor: "transparent" }, 600 );
            //Init var
            eRow = false;
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
                //Si id renseigné
                if(idItem != undefined && idItem != ''){
                    dataFilters.cycle.value = idItem;
                    dataFilters.cycle.msg = 'Cycle : "'+labelItem+'"';
                }
                else
                    dataFilters.cycle = {value:null, msg:''};
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
        }

        //Message pour les tooltips des boutons
        var msgTooltips = 'Imprimer les versements';
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
            msgTooltips+= '<br/>'+v.msg;
        });

        //On met le bouton dans l'état qui doit être et on change les messages des tooltips
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

$(document).ready(function(){comptableBank.init();});