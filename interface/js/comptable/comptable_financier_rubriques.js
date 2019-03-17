/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var comptableFinancierRubrique = function () {

    //Pour gérer les options pour l'impression, les msg des tooltips et l'état du bouton d'impression
    //L'ordre des index détermine l'ordre des filtres dans les msg tooltips
    var dataFilters = {
        disabledBtnPrint: false,
        cycle:  {value:null, msg:''},
        classe: {value:null, msg:''},
        rub:    {value:null, msg:''},
        mois:   {value:null, msg:''}
    };

    var urls = {
        generatePdf:    "url_pour_generer_url_du_pdf"
    };

    var handleTable = function() {
        var table = $('#table_financier_rubrique');
        //Init les messages de notifications
        toastr.options = mainInterface.defaultToastr;

        var oTable = table.DataTable($.extend(mainInterface.defaultDatatable, {
            order: [],
            pageLength: 25
        }));

        //Sélection sur le filtre rubrique
        $('#filter_rub').on('change', function(){
            oTable.column(4).search($(this).val()).draw();
            changeFiltre('rub', $(this).find('option:selected').attr('data-id'), $(this).val());
        });

        //Sélection sur le filtre mois
        $('#filter_mois').on('change', function(){
            oTable.column(5).search($(this).val()).draw();
            changeFiltre('mois', $(this).find('option:selected').attr('data-id'), $(this).val());
        });

        //Sélection sur le filtre classe
        $('#filter_classe').on('change', function(){
            oTable.column(1).search($(this).val()).draw();
            changeFiltre('classe', $(this).find('option:selected').attr('data-id'), $(this).val());
        });

        //Sélection sur le filtre cycle
        $('#filter_cycle').on('change', function(){
            oTable.column(0).search($(this).val()).column(2).search("").draw();
            changeFiltre('cycle', $(this).find('option:selected').attr('data-id'), $(this).val());
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
            case 'rub':
                //Si id renseigné
                if(idItem != undefined && idItem != ''){
                    dataFilters.rub.value = idItem;
                    dataFilters.rub.msg = 'Rubrique :'+labelItem;
                }
                else
                    dataFilters.rub = {value:null, msg:''};
                break;
        }

        //Message pour les tooltips des boutons
        var msgTooltips = 'Imprimer la liste des élèves qui ont payé';
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
            handleBW(); // Test BEW-Works A SUPPRIMER
        }
    };
}();

$(document).ready(function(){comptableFinancierRubrique.init();});