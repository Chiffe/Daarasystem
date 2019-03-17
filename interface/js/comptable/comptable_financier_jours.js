/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var comptableFinancierJour = function () {
    //Pour gérer les options pour l'impression, les msg des tooltips et l'état du bouton d'impression
    //L'ordre des index détermine l'ordre des filtres dans les msg tooltips
    var dataFilters = {
        disabledBtnPrint: false,
        date:   {value:null, msg:''},
        cycle:  {value:null, msg:''}
    };

    var urls = {
        generatePdf:    "url_pour_generer_url_du_pdf"
    };

    //Cette fois-ci, variable oTable en globale pour le daterangepicker
    var oTable = null;

    var handleDateRangePicker = function(){
        if (!jQuery().daterangepicker) {
            return false;
        }

        var filterDate =  $('#filter_date');

        filterDate.daterangepicker(mainInterface.getDefaultDaterangePicker(),
            function (start, end, label) {  //On change le span et les arrtibuts data
                filterDate.find('span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
                filterDate.attr('data-start-date', start.format('YYYYMMDD'));
                filterDate.attr('data-end-date', end.format('YYYYMMDD'));
            }
        );

        //Pour effacer le filtre date
        filterDate.on('cancel.daterangepicker', function(ev, picker) {
            filterDate.find('span').html('Pas de restriction');
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
            //Changement sur le filtre date
            changeFiltre('date', daterange, (picker.startDate.format('DD/MM/YYYY') + ' au ' + picker.endDate.format('DD/MM/YYYY')));
        });
    };

    var handleTable = function() {
        var table = $('#table_financier_jour');
        //Init les messages de notifications
        toastr.options = mainInterface.defaultToastr;

        oTable = table.DataTable($.extend(mainInterface.defaultDatatable, {
            order: [[1, 'desc']],
            paging: false,
            searching: false,
            initComplete: function(){
                mainInterface.sumMontantTable(table, 2);
            },
            ajax: { //Chargement des données à chaque changement sur un filtre
                url:        '../response_ajax.php',
                type:       'POST',
                dataSrc:    "",
                data:       function(){
                    return {compte: 'comptable', action: 'financier_jour', params: {idCycle: dataFilters.cycle.value, filterDate: dataFilters.date.value}};
                }
            }
        }));

        //Sélection sur le filtre cycle
        $('#filter_cycle').on('change', function(){
            changeFiltre('cycle', $(this).find('option:selected').attr('data-id'), $(this).val());
        });

        //A chaque changement de visuel de la table, on recalcule le montant total
        table.on('draw.dt', function(){
            mainInterface.sumMontantTable(table, 2);
        });
    };

    var handlePrinterActions = function(){
        //Lors d'un click sur une action print
        $('.printer_actions').on('click', function(){

            //!!!!!!!!!!!!!!!!!!!!!!! A SUPPRIMER !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            var msg = 'Impression demandé<br/><br/>';
            msg+= 'Message à titre indicatif !<br/>Pour la version finale à la place de ce message, un nouvel onglet sera ouvert avec le pdf généré.';
            toastr.success(msg);
            //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

            //!!!!!!!!!!!!!!!!!!!!!!!!!! FAIRE CECI A LA PLACE !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            /*
             Utiliser urls.generatePdf en faisant un POST des variables idCycle, filterDate pour générer l'url comme il faut
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
        var msgTooltips = 'Imprimer le tableau des encaisements.';
        //On vérifie les filtres pour savoir quel msg doit être diffusé
        $.each(dataFilters, function(k, v){
            //On saute l'index "disabledBtnPrint"
            if(k == 'disabledBtnPrint' || v.value == null)
                return;

            //Sinon on ajoute le filtre dans le msg
            msgTooltips+= '<br/>'+v.msg;
        });

        //On change les messages des tooltips
        $('.printer_actions').attr('data-original-title', msgTooltips);
        //Les données ajax de oTable
        oTable.ajax.reload();
    }

    return {
        init: function(){
            handleTable();
            handlePrinterActions();
            handleDateRangePicker();
        }
    };
}();

$(document).ready(function(){comptableFinancierJour.init();});