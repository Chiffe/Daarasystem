/**
 * Created by Jr on 28/06/2017.
 */

var mainInterface = function () {

    /**
     * Retourne les valeurs par défaut pour l'init du plugin Toastr
     *
     * @type {{closeButton: boolean, debug: boolean, positionClass: string, onclick: null, showDuration: string, hideDuration: string, timeOut: string, extendedTimeOut: string, showEasing: string, hideEasing: string, showMethod: string, hideMethod: string}}
     */
    var defaultToastr = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "slideDown",
        "hideMethod": "fadeOut"
    };

    /**
     * Retourne les valeurs par défaut pour l'init du plugin Datable
     *
     * @type {{stateSave: boolean, lengthMenu: *[], language: {info: string, infoEmpty: string, infoFiltered: string, lengthMenu: string, search: string, zeroRecords: string, paginate: {first: string, last: string, next: string, previous: string}}}}
     */
    var defaultDatatable = {
        "stateSave": false,
        "lengthMenu": [[10,25,50,-1],[10,25,50,"All"]],
        "language": {
            "info" :            "Affichage des résultats _START_ à _END_ sur _TOTAL_",
            "infoEmpty" :       "Aucun résultat à afficher",
            "infoFiltered" :    "(filtré sur _MAX_ lignes)",
            "lengthMenu" :      "_MENU_ lignes par page",
            "search" :          "Recherche",
            "zeroRecords":      "Aucun résultat trouvé",
            "paginate": {
                "first":      "Première",
                "last":       "Dernière",
                "next":       "Suivant",
                "previous":   "Précédent"
            }
        }
    };

    /**
     * Retourne les valeurs par défaut pour l'init du plugin DaterangePciker
     *
     */
    function defaultDateRangePicker(){
        if(!jQuery().daterangepicker)
            return false;

        return {
            opens: (App.isRTL() ? 'left' : 'right'),
            maxDate: moment(),
            applyClass: 'green',
            cancelClass: 'red-flamingo',
            showDropdowns: true,
            ranges: {
                "Aujourd'hui": [moment(), moment()],
                "Hier": [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                "Les 7 derniers jours": [moment().subtract(6, 'days'), moment()],
                "Les 30 derniers jours": [moment().subtract(29, 'days'), moment()],
                "Ce mois-ci": [moment().startOf('month'), moment().endOf('month')],
                "Le mois dernier": [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            locale: {
                format: 'DD/MM/YYYY',
                applyLabel: 'Valider',
                cancelLabel: 'Effacer',
                customRangeLabel: 'Période perso.',
                daysOfWeek: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
                monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
                firstDay: 1
            }
        };
    }

    /**
     * Active le plugin InputMask sur les input avec la classe ".date-mask"
     */
    function handleInputMask() {
        if (jQuery().inputmask){
            $(".date-mask").inputmask("d/m/y", {
                "placeholder": "jj/mm/aaaa"
            });
        }
    }

    /**
     * Permet de gérer les checkbox d'un tableau, avec l'apparition de la zone des boutons
     *
     * @param table - Le pointer sur l'élément table où on doit gérer les checkbox
     */
    function handleCheckboxTable(table){
        var allCheck = $('#group_checkable');
        var contActions = $('#cont_multi_actions');

        //Checkbox all
        allCheck.on('change', function(){
            if($(this).prop('checked')){
                table.find('input.checkboxes').prop('checked', true);
                contActions.show('fast');
            }
            else{
                table.find('input.checkboxes').prop('checked', false);
                contActions.hide('slow');
            }
        });

        //Checkbox input
        table.on('change', 'input.checkboxes', function(){
            var inputChecked = table.find('input.checkboxes:checked').length;
            var totalCheckbox = table.find('input.checkboxes').length;

            switch(true){
                case (inputChecked == 0):
                    allCheck.prop('checked', false);
                    contActions.hide('slow');
                    break;
                case (inputChecked > 0 && inputChecked < totalCheckbox):
                    allCheck.prop('checked', false);
                    contActions.show('fast');
                    break;
                case (inputChecked == totalCheckbox):
                    allCheck.prop('checked', true);
                    contActions.show('fast');
                    break;
            }
        });
    }

    /**
     * Permet de gérer les filtres Cycle et Classe quand ils sont présents sur la page en même temps.
     *
     * Recharge le filtre Classe, en fonction du Cycle
     */
    function handleFilterCycle(){
        //Actif si seulement les 2 filtres sont présents
        if($('#filter_cycle').length == 1 && $('#filter_classe').length == 1){
            //On charge toutes les classes au chargement de la page
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'all_compte', action:'filter_cycle'}, function(resAjax){
                if(resAjax.success){
                    $('#filter_classe').html(resAjax.optionsHtml);
                    //S'il y a des valeurs query pour la classe
                    var idClasse = $('#filter_classe').attr('data-query');
                    //si la valeur est bien présente
                    if(idClasse != undefined && idClasse != ''){
                        //On affecte le résultat au select
                        $('#filter_classe option[data-id="'+idClasse+'"]').prop('selected', true).trigger('change');
                    }
                }
            });

            //Sélection sur le filtre cycle
            $('#filter_cycle').on('change', function(){
                //id du cycle
                var idCycle = $(this).find('option:selected').attr('data-id');
                //On va chercher les classes pour le cycle sélectionné
                mainInterface.ajaxRequest('../response_ajax.php', {compte:'all_compte', action:'filter_cycle', id:idCycle}, function(resAjax){
                    if(resAjax.success)
                        $('#filter_classe').html(resAjax.optionsHtml);
                });
            });
        }
    }

    /**
     * Permet d'afficher la fenetre modal
     *
     * @param ajaxRes - La reponse AJAX, soit bool ou le html de la modal
     */
    function displayModal(ajaxRes){
        if(ajaxRes === false) {
            //Problème lors de la récupération du form
            toastr.warning('Une erreur est survenue. Veuillez recharger la page et réessayer.');
            return false;
        }
        else if (ajaxRes !== true){ //On doit s'occuper d'intégrer le html dans le document avant de l'afficher
            //On supprime les modals s'il y en a. Pas de doublon
            $('#myModal').remove();
            //On ajoute la nouvelle modal
            $('body').append(ajaxRes);
        }
        //On l'affiche
        $('#myModal').modal({
            backdrop:   true,
            keyboard:   true,
            show:       true
        });
    }

    /**
     * Calcul le montant total d'un tableau pour les lignes visibles
     *
     * @param table - object jQuery selector
     */
    /**
     * Calcul le montant total d'un tableau pour les lignes visibles
     *
     * @param table - object jQuery selector
     * @param indexColumn - int index de la colonne à compter
     */
    function sumMontant(table, indexColumn){
        //calcul le montant des lignes visibles d'un tableau
        var sum = 0;
        //Si un indexColumn correct n'est pas fourni
        if(indexColumn == undefined || !$.isNumeric(indexColumn))
            table.find('td[data-montant]').each(function(){
                sum+= parseInt($(this).attr('data-montant'));
            });
        else
            table.find('tbody tr td:nth-child('+indexColumn+')').each(function(){
                sum+= parseInt($(this).html());
            });

        //On affiche le résultat
        $('#sum_total').html(sum);
    }

    //Permet de stringify les form
    (function($){
        $.fn.serializeFormJSON = function () {
            var o = {};
            var a = this.serializeArray();
            $.each(a, function () {
                if (o[this.name]) {
                    if (!o[this.name].push) {
                        o[this.name] = [o[this.name]];
                    }
                    o[this.name].push(this.value || '');
                } else {
                    o[this.name] = this.value || '';
                }
            });
            return o;
        };
    })(jQuery);

    return {
        init: function(){
            handleInputMask();
            handleFilterCycle();
        },
        initInputMask : function(){
            handleInputMask();
        },
        defaultToastr: defaultToastr,
        defaultDatatable: defaultDatatable,
        getDefaultDaterangePicker: function(){
            return defaultDateRangePicker();
        },
        displayModal: function(ajaxRes){
            displayModal(ajaxRes);
        },
        handleCheckboxTable: function(table){
            handleCheckboxTable(table);
        },
        sumMontantTable: function(table, indexColumn){
            sumMontant(table, indexColumn);
        },
        ajaxRequest: function(url, postVars, callback, dataType){
            //Si dataType non défini, alors json
            if (dataType == undefined)
                dataType = 'json';
            $.ajax({
                type: 'POST',
                dataType: dataType,
                url: url,
                data: postVars,
                success: function(datas){
                    if (callback != undefined)
                        callback(datas);
                }
            });
        }
    };
}();

$(document).ready(function(){mainInterface.init();});