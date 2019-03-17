/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var adminProf = function () {
    //---------------- Test Bew-Works A SUPPRIMER ---------
    var ajaxResponse = true;

    var handleBW = function(){
        $('#bw_test').on('switchChange.bootstrapSwitch', function (event, state) {
            ajaxResponse = state;
        });
    };
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    var urls = {
        "delete":   "url_pour_supprimer_prof",
        "seeProf":  "url_pour afficher_prof"  // Le lien pour voir la fiche du prof, avec le rendu html de la fenetre modal
    };

    var handleTable = function() {
        var table = $('#table_prof');
        //Init les messages de notifications
        toastr.options = mainInterface.defaultToastr;

        var oTable = table.DataTable($.extend(mainInterface.defaultDatatable, {stateSave: true, columnDefs: [{orderable: false, targets: 3}]}));

        //Suppression d'un prof
        table.on('click', '.delete', function(){
            var nRow = $(this).parents('tr')[0];
            //On récupère l'id du prof
            var idProf = this.getAttribute('data-id');
            // -------------- Faire une requête AJAX à la place ------------
            // Possibilité d'envoyer une requete à l'adresse "urls.delete" et "idProf" en paramètre POST
            // En fonction du retour de la requête AJAX
            if(ajaxResponse){
                oTable.row(nRow).remove().draw();
                toastr.success('Le professeur a été supprimé.');
            }
            else
                toastr.warning('Erreur lors de la suppression du professeur.');
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });

        //Voir la fiche d'un prof
        table.on('click', '.view_prof', function(){
            //On récupère l'id du prof
            var idProf = this.getAttribute('data-id');
            // ------------------------- Faire requête AJAX à la place -----------------
            // Utiliser urls.seeProf pour aller chercher le html de la fenetre modal
            // --------
            //Générer la variable resAjax.html côté serveur (simule la réponse ajax)
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'admin', action:'view_prof'}, function(resAjax){
                if(ajaxResponse && resAjax.success)
                    mainInterface.displayModal(resAjax.html);
                else
                    toastr.warning('Une erreur est survenue.');
            });
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });
    };

    return {
        init: function(){
            handleTable();
            handleBW(); // Test BEW-Works A SUPPRIMER
        }
    };
}();

$(document).ready(function(){adminProf.init();});