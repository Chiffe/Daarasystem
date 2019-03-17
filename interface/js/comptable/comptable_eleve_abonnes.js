/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var comptableEleveAbonne = function () {
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
        cycle:  {value:null, msg:''},
        classe: {value:null, msg:''}
    };

    //Les prix unitaire de chaque type d'achat (Mis à jour en AJAX)
    var prix = null;

    var urls = {
        saveMultiAction:    "url_pour_effectuer_action_sur_plusieurs_lignes",
        getFormDesabo:      "url_pour_afficher_form_desabonnement",
        getFormFacturer:    "url_pour_avoir_form_facturer",
        generatePdf:        "url_pour_generer_lien_du_pdf"
    };

    var handleTable = function() {
        var table = $('#table_abonne');
        //Init les messages de notifications
        toastr.options = mainInterface.defaultToastr;

        var oTable = table.DataTable($.extend(mainInterface.defaultDatatable, {
            order: [[1, 'asc']],
            columnDefs: [{orderable: false, targets: [0, 6]}]
        }));

        //Sélection sur le filtre classe
        $('#filter_classe').on('change', function(){
            oTable.column(1).search($(this).val()).draw();
            changeFiltre('classe', $(this).find('option:selected').attr('data-id'), $(this).val());
        });

        //Sélection sur le filtre cycle
        $('#filter_cycle').on('change', function(){
            oTable.column(0).search($(this).val()).column(1).search("").draw();
            changeFiltre('cycle', $(this).find('option:selected').attr('data-id'), $(this).val());
        });

        //Désabonner l'élève
        table.on('click', '.desabo', function(){
            //On récupère l'id de l'élève
            var idEleve = this.getAttribute('data-id');
            // ------------------------- Faire requête AJAX à la place -----------------
            // Utiliser urls.getFormDesabo pour aller chercher le html de la fenetre modal
            // --------
            //Générer la variable resAjax.html côté serveur (simule la réponse ajax)
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'comptable', action:'desabo_eleve', id:idEleve}, function(resAjax){
                if(ajaxResponse && resAjax.success){
                    mainInterface.displayModal(resAjax.html);
                    //Active input-mask
                    mainInterface.initInputMask();
                }
                else
                    toastr.warning('Une erreur est survenue.');
            });
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });

        //Click sur modifier abo
        table.on('click', '.edit', function(){
            //id de l'élève
            var idEleve = $(this).attr('data-id');

            //On va chercher le formulaire
            //Utiliser urls.getForm
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'comptable', action:'edit_trans_cant', id: idEleve}, function(resAjax){
                if(ajaxResponse && resAjax.success){
                    //On cache les cont_facture
                    $('.cont_facture').hide('fast');
                    //On affiche le bouton "Annuler"
                    $('.cancel_facture').show('slow');
                    //On met à jour les prix
                    prix = resAjax.prix;
                    //On insère le html rendu et on l'affiche
                    $('#yes_facture').html(resAjax.html).show('slow', function(){
                        //On active le inputMask sur les champs date
                        mainInterface.initInputMask();
                        //On déclenche les events sur les 2 select
                        $('#cantine').trigger('change');
                        $('#busid').trigger('change');
                        //On scroll dessus
                        App.scrollTo($('#yes_facture'), -85);
                    });
                }
                else
                    toastr.warning('Une erreur est survenue.');
            });
        });

        //Click sur un des boutons facturer
        table.on('click', '.facturer', function(){
            //id de l'élève
            var idEleve = $(this).attr('data-id');

            //On va chercher le formulaire
            //Utiliser urls.getForm
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'comptable', action:'facturer_trans_cant', id: idEleve}, function(resAjax){
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

        //Clique sur le select "Transport"
        $('#yes_facture').on('change', '#busid', function(){
            //De base, on cache le container zone bus
            $('#zone_bus').hide('slow');
            //Si zone bus == Bus SOS
            if($(this).val() == 5)
                $('#zone_bus').show('fast');
        });

        //Clique sur le select "Cantine"
        $('#yes_facture').on('change', '#cantine', function(){
            //De base, on cache le select tarif
            $('#cont_tarif').hide('slow');
            //Si cantine == Demi-pension
            if($(this).val() == 3)
                $('#cont_tarif').show('fast');
        });

        //Gestion des input "cond", les input qui conditionne le montant total
        $('#yes_facture').on('change', '.input_cond', function(){
            var value = $(this).val();
            var name = $(this).attr('name');
            var montant = 0;

            //selon le name
            switch(name){
                case 'busid':
                    //On met à jour le champ transport
                    if(value == '6')
                        montant = prix.busPrive;
                    else if(value == '5'){
                        var zone = $('input[name="zone"]:checked').val();
                        //Si une zone a déjà été sélectionné
                        if(zone != undefined)
                            montant = prix[('zone'+zone)];
                    }

                    $('#trans').val(montant);
                    break;
                case 'cantine':
                    //On met à jour le champ transport
                    if(value == '3')
                        montant = (parseFloat($('#tarif').val()) * parseFloat(prix.demi_pension));
                    else if(value == '2')
                        montant = (parseFloat($('#tarif').val()) * parseFloat(prix.pension));

                    $('#cant').val(montant);
                    break;
                case 'tarif':
                    montant = (parseFloat($('#tarif').val()) * parseFloat(prix.demi_pension));
                    $('#cant').val(montant);
                    break;
                case 'zone':
                    montant = prix[('zone'+value)];
                    $('#trans').val(montant);
                    break;
            }
            //On déclenche l'event change
            $('.input_payer').trigger('change');
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
        }

        //Message pour les tooltips des boutons
        var msgFiltreTooltips = '';
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
            msgFiltreTooltips+= '<br/>'+v.msg;
        });

        //On met le bouton dans l'état qui doit être
        $('.printer_actions').prop('disabled', dataFilters.disabledBtnPrint);
        //On change les messages des tooltips
        $('button[data-action="trans"]').attr('data-original-title', 'Liste des élèves abonnés à un transport'+msgFiltreTooltips);
        $('button[data-action="cant"]').attr('data-original-title', 'Liste des élèves abonnés à la cantine'+msgFiltreTooltips);
    }

    return {
        init: function(){
            handleTable();
            handleFacturer();
            handlePrinterActions();
            handleBW(); // Test BEW-Works A SUPPRIMER
        }
    };
}();

$(document).ready(function(){comptableEleveAbonne.init();});