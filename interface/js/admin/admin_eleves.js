/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var adminEleve = function () {
    //---------------- Test Bew-Works A SUPPRIMER ---------
    var ajaxResponse = true;

    var handleBW = function(){
        $('#bw_test').on('switchChange.bootstrapSwitch', function (event, state) {
            ajaxResponse = state;
        });
    };
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    var urls = {
        "delete":           "url_pour_supprimer_eleve",
        "seeEleve":         "url_pour_afficher_eleve",
        "getFormBan":       "url_pour_avoir_form_pour_bannir",
        "saveFormBan":      "url_pour_save_form_ban",
        "saveMultiAction":  "url_pour_effectuer_action_sur_plusieurs_lignes"
    };

    var handleTable = function() {
        var table = $('#table_eleve');
        //Init les messages de notifications
        toastr.options = mainInterface.defaultToastr;

        var oTable = table.DataTable($.extend(mainInterface.defaultDatatable, {
            order: [[2, 'asc']],
            columnDefs: [{orderable: false, targets: [0, 7]}]
        }));

        //Permet de gérer les checkbox du tableau et la zone button multi_action
        mainInterface.handleCheckboxTable(table);

        //Clique sur un bouton multi_actions
        $('#cont_multi_actions .multi_submit').on('click', function(){
            var postData = table.find('input.checkboxes').serializeFormJSON();
            var formAction = $(this).attr('data-form-action');

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
                    response: ajaxResponse
                };
                if(ajaxDataResponse['response'])
                    toastr.success('Action effectuée');
                else
                    toastr.warning('Une erreur est survenue.');
                // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            }
        });

        //Sélection sur le filtre classe
        $('#filter_classe').on('change', function(){
            oTable.column(2).search($(this).val()).draw();
        });

        //Sélection sur le filtre cycle
        $('#filter_cycle').on('change', function(){
            oTable.column(1).search($(this).val()).column(2).search("").draw();
        });

        //Suppression d'un élève
        table.on('click', '.delete', function(){
            var nRow = $(this).closest('tr');
            //On récupère l'id de l'élève
            var idEleve = this.getAttribute('data-id');
            // -------------- Faire une requête AJAX à la place ------------
            // Possibilité d'envoyer une requete à l'adresse "urls.delete" et "idEleve" en paramètre POST (penser à adapter "urls.delete")...
            // ...ou sinon faire une concaténation : urls.delete+idEleve
            // En fonction du retour de la requête AJAX
            if(ajaxResponse){
                oTable.row(nRow).remove().draw();
                toastr.success('L\'élève a été supprimé.');
            }
            else
                toastr.warning('Erreur lors de la suppression de l\'élève.');
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });

        //Voir la fiche d'un élève
        table.on('click', '.view_eleve', function(){
            //On récupère l'id de l'élève
            var idEleve = this.getAttribute('data-id');
            // ------------------------- Faire requête AJAX à la place -----------------
            // Utiliser urls.seeEleve pour aller chercher le html de la fenetre modal
            // --------
            //Générer la variable resAjax.html côté serveur (simule la réponse ajax)
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'admin', action:'view_eleve'}, function(resAjax){
                if(ajaxResponse && resAjax.success)
                    mainInterface.displayModal(resAjax.html);
                else
                    toastr.warning('Une erreur est survenue.');
            });
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });

        //Form pour bannir un élève
        table.on('click', '.ban_eleve', function(){
            //On récupère l'id de l'élève
            var idEleve = this.getAttribute('data-id');
            // ------------------------- Faire requête AJAX à la place -----------------
            // Utiliser urls.getFormBan pour aller chercher le html de la fenetre modal
            // --------
            //Générer la variable resAjax.html côté serveur (simule la réponse ajax)
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'admin', action:'ban_eleve', id:idEleve}, function(resAjax){
                if(ajaxResponse && resAjax.success)
                    mainInterface.displayModal(resAjax.html);
                else
                    toastr.warning('Une erreur est survenue.');
            });
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });

        //Validation form pour bannir un élève
        //----------------------------------------------------------------------------
        // Soit vous bannisez un élève en AJAX, donc on capte l'event submit du formulaire et on envoie le form en AJAX et du coup pas de rechargement de page
        // Soit vous postez le form avec un rechargement de page, dans ce cas, supprimer le listener ci-dessous
        //----------------------------------------------------------------------------
        $('body').on('submit', '.form_eleve', function(e){
            //Petit spinner de chargement
            var ladda = Ladda.create($('.form_eleve button[type="submit"]')[0]);
            ladda.start();

            e.preventDefault();
            //On récupèrer les valeurs du form
            var dataPost = JSON.stringify($(this).serializeFormJSON());
            // ------------------------------- Faire requête AJAX à la place ----------------------
            // Utiliser urls.saveFormBan pour sauvegarder le form
            // --------
            //On simule le retour ajax
            var ajaxDataResponse = {
                response: ajaxResponse
            };
            if(ajaxDataResponse['response']){
                toastr.success('Action effectuée.');
            }else
                toastr.warning('Une erreur est survenue.');

            //Stop le spinner
            ladda.stop();
            //Quelque soit la réponse, on ferme la fenetre modal
            $('#myModal').modal('hide');
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });
    };

    return {
        init: function(){
            handleTable();
            handleBW(); // Test BEW-Works A SUPPRIMER
        }
    };
}();

$(document).ready(function(){adminEleve.init();});