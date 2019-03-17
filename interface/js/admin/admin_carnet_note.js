/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var adminCarnetNote = function () {
    //Pour gérer les options pour l'impression, les msg des tooltips et l'état du bouton d'impression
    //L'ordre des index détermine l'ordre des filtres dans les msg tooltips
    var dataFilters = {
        disabledBtnPrint: true,
        classe:     {value:null, msg:''},
        trimestre:  {value:null, msg:''}
    };

    var urls = {
        generatePdf:    "url_pour_generer_lien_pdf"
    };

    var handleTable = function() {
        var table = $('#table_carnet_note');
        //Init les messages de notifications
        toastr.options = mainInterface.defaultToastr;

        var oTable = table.DataTable($.extend(mainInterface.defaultDatatable, {
            order: [[1, 'asc']],
            columnDefs: [{orderable: false, targets: [5, 6, 7]}]
        }));

        //Sélection sur le filtre trimestre
        $('#filter_trimestre').on('change', function(){
            changeFiltre('trimestre', $(this).find('option:selected').attr('data-id'), $(this).val());
        });

        //Sélection sur le filtre classe
        $('#filter_classe').on('change', function(){
            oTable.column(1).search($(this).val()).draw();
            changeFiltre('classe', $(this).find('option:selected').attr('data-id'), $(this).val());
        });

        //Sélection sur le filtre cycle
        $('#filter_cycle').on('change', function(){
            oTable.column(0).search($(this).val()).column(1).search("").draw();
            //On réinitialise le filtre "Classe", car pour rappel le fitlre "Classe" est relié au filtre "Cycle"
            changeFiltre('classe');
        });

        //Voir le carnet de note
        table.on('click', '.view', function(){
            //On récupère l'id de l'élève
            var idEleve = this.getAttribute('data-id_eleve');
            //On récupère l'id du trimeestre
            var idTrimes = this.getAttribute('data-id_trimes');
            // ------------------------- Faire requête AJAX à la place -----------------
            // --------
            //Générer la variable resAjax.html côté serveur (simule la réponse ajax)
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'admin', action:'view_carnet_note'}, function(resAjax){
                if(resAjax.success)
                    mainInterface.displayModal(resAjax.html);
                else
                    toastr.warning('Une erreur est survenue.');
            });
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });

        //Edition d'un carnet de note
        table.on('click', '.edit', function(){
            //On récupère l'id de l'élève
            var idEleve = this.getAttribute('data-id_eleve');
            //On récupère l'id du trimestre
            var idTrimes = this.getAttribute('data-id_trimes');
            // ------------------------- Faire requête AJAX à la place -----------------
            //Générer la variable resAjax.html côté serveur (simule la réponse ajax)
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'admin', action:'form_carnet_note', data:{id_eleve: idEleve, id_trimes: idTrimes}}, function(resAjax){
                if(resAjax.success)
                    mainInterface.displayModal(resAjax.html);
                else
                    toastr.warning('Une erreur est survenue.');
            });
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });

        //Validation form pour edition d'un carnet de note
        $('body').on('submit', '.form_carnet_note', function(e){
            //Petit spinner de chargement
            var ladda = Ladda.create($('.form_carnet_note button[type="submit"]')[0]);
            ladda.start();

            e.preventDefault();
            //On récupèrer les valeurs du form
            var dataPost = JSON.stringify($(this).serializeFormJSON());
            // ------------------------------- Faire requête AJAX à la place ----------------------
            //Simulation requête AJAX
            setTimeout(function(){
                var ajaxResponse = true;
                if(ajaxResponse)
                    toastr.success('Action effectuée.');
                else
                    toastr.warning('Une erreur est survenue.');

                //Stop le spinner
                ladda.stop();
                //Quelque soit la réponse, on ferme la fenetre modal
                $('#myModal').modal('hide');
            },1000);
        });

        //Gestin des input "note"
        $('body').on('change', '#myModal form.form_carnet_note .input_note', function(){
            var sumTotal = 0;
            //On recalcule la note total
            $('.input_note', '#myModal form.form_carnet_note').each(function(){
                sumTotal+= parseFloat($(this).val());
            });
            //On modifie l'input somme
            $('.input_somme').val(sumTotal);
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
                toastr.warning('Veuillez sélectionner les filtres "Classe" et "Trimestre" avant d\'imprimer');
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
            case 'classe':
                //Si id renseigné
                if(idItem != undefined && idItem != ''){
                    dataFilters.classe.value = idItem;
                    dataFilters.classe.msg = 'Classe : "'+labelItem+'"';
                }
                else
                    dataFilters.classe = {value:null, msg:''};
                break;
            case 'trimestre':
                //Si id renseigné
                if(idItem != undefined && idItem != ''){
                    dataFilters.trimestre.value = idItem;
                    dataFilters.trimestre.msg = 'Trimestre : "'+labelItem+'"';
                }
                else
                    dataFilters.trimestre = {value:null, msg:''};
                break;
        }

        //Message pour les tooltips des boutons
        var msgFiltreTooltips = '';
        //Par défaut, on vérrouille le bouton impression
        dataFilters.disabledBtnPrint = true;
        //On vérifie les filtres pour savoir quel doit être l'état des btn d'impression
        //Au moins le filtre "Classe" et "Trimestre" pour activer le bouton
        var classeFilter = false;
        var trimestreFilter = false;
        $.each(dataFilters, function(k, v){
            //On saute l'index "disabledBtnPrint" ou si valeur null
            if(k == 'disabledBtnPrint' || v.value == null)
                return;

            //Si le filtre classe est activé, on active le flag
            if(k == 'classe' && v.value != null)
                classeFilter = true;
            //Si le filtre trimestre est activé, on active le flag
            if(k == 'trimestre' && v.value != null)
                trimestreFilter = true;

            //On génère le msg
            //Sinon on ajoute le filtre dans le msg
            msgFiltreTooltips+= '<br/>'+v.msg;
        });

        //Pouvons-nous activer le bouton impression ?
        if(classeFilter && trimestreFilter)
            dataFilters.disabledBtnPrint = false;

        //On met le bouton dans l'état qui doit être et on change le message de la tooltips
        $('.printer_actions').prop('disabled', dataFilters.disabledBtnPrint).attr('data-original-title', 'Carnet de note général'+msgFiltreTooltips);
    }

    return {
        init: function(){
            handleTable();
            handlePrinterActions();
        }
    };
}();

$(document).ready(function(){adminCarnetNote.init();});