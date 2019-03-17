/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var adminSeeMatiere = function () {
    //---------------- Test Bew-Works A SUPPRIMER ---------
    var ajaxResponse = true;

    var handleBW = function(){
        $('#bw_test').on('switchChange.bootstrapSwitch', function (event, state) {
            ajaxResponse = state;
        });
    };
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    var urls = {
        dissociate: "url_pour_dissocier_une_matiere",
        getMatiere: "url_pour_avoir_donnees_du_tableau",
        getProf:    "url_pour avoir_les profs_de_la_matiere"
    };

    var handleTable = function() {
        var table = $('#table_matiere');
        var selectClasse = $('#filter_classe');
        //Init les messages de notifications
        toastr.options = mainInterface.defaultToastr;
        // On récupère l'id de la classe pour init la variable
        var idClasse = selectClasse.val();

        var oTable = table.DataTable($.extend(mainInterface.defaultDatatable, {columnDefs: [{orderable: false, targets: 4}]}));

        //Sélection sur le filtre étape
        $('#filter_etape').on('change', function(){
            oTable.column(0).search($(this).val()).draw();
        });


        //Dissociation d'une matière
        table.on('click', '.delete', function(){
            var nRow = $(this).parents('tr')[0];
            //On récupère l'id de la matière
            var idMatiere = this.getAttribute('data-id');
            // -------------- Faire une requête AJAX à la place ------------
            // Envoyer une requete à l'adresse "urls.dissociate" avec "idMatiere" et "idClasse" en paramètre POST
            // En fonction du retour de la requête AJAX
            if(ajaxResponse){
                oTable.row(nRow).remove().draw();
                toastr.success('La matière a été dissocié de la classe.');
            }
            else
                toastr.warning('Erreur lors de la dissociation de la matière.');
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });

        //Sélection sur le filtre classe
        selectClasse.on('change', function(){
            //On modifie la var idClasss
            idClasse = $(this).val();
            // ------------------------------- Faire requête AJAX à la place ----------------------
            // Utiliser urls.getMatiere pour récupérer les données du tableau et le nom de la clsse pour la classe corespondant à l'idClasse donnée en POST
            // Pour la réponse, un bool pour l'ajaxResponse et les données du tableau et le nom de la classe
            // Ne pas oublier de faire correspondre les données avec l'ordre des colonnes du tableau en cas de changement"
            // -----------
            //On simule le retour ajax
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'admin', action:'see_matieres', id: idClasse}, function(resAjax){
                if(ajaxResponse){
                    var tableData = [];
                    //On format les données pour le tableau
                    jQuery.each(resAjax.dataMatiere, function(i, row){
                        tableData.push([row.etape, row.matiere, row.notesur1, row.notesur2, getBtnActions(row.id)]);
                    });
                    //On clear le tableau
                    oTable.clear();
                    //On affiche le nom de la classe
                    $('#name_classe').html(resAjax.nameClasse);
                    //S'il y a des matières
                    if(tableData.length > 0){
                        //On re dessine
                        oTable.rows.add(tableData).draw();
                        //On réinitialise les confirmation pour le bouton suppression
                        $('[data-toggle=confirmation]').confirmation({ btnOkClass: 'btn btn-sm btn-success', btnCancelClass: 'btn btn-sm btn-danger'});
                        //On cahce le message d'informations
                        $('.info_ribbon').hide('slow');
                    }else{  //Si pas de matières
                        //On re dessine
                        oTable.draw();
                        //On affiche le message d'informations
                        $('.info_ribbon').show('slow');
                    }
                }
                else
                    toastr.warning('Une erreur est survenue.');
            });
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });

        //Affichage des professeurs
        table.on('click', '.view_prof', function(){
            //On récupère l'id de la matière
            var idMatiere = this.getAttribute('data-id');
            //Pensez à utliser "idClasse" si besoin
            // ------------------------- Faire requête AJAX à la place -----------------
            // Utiliser urls.getProf pour aller chercher le html de la fenetre modal. On fournit l'id de la matiere et si besoin de la classe
            // --------
            //Générer la variable resAjax.html côté serveur (simule la réponse ajax)
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'admin', action:'profs_matiere'}, function(resAjax){
                if(ajaxResponse && resAjax.success)
                    mainInterface.displayModal(resAjax.html);
                else
                    toastr.warning('Une erreur est survenue.');
            });
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });

        /**
         * Fourni le html de la colonne "Actions"
         *
         * @param id int L'id de la matière
         * @returns {string} Rendu html de la colonne "Actions"
         */
        function getBtnActions(id){
            return '<a data-id="'+id+'" href="javascript:;" class="btn btn-xs blue view_prof"><i class="icon-magnifier"></i> Voir les professeurs</a>'+
            '<a data-id="'+id+'" href="javascript:;" class="btn btn-xs red delete" data-toggle="confirmation" data-placement="left" data-original-title="Êtes-vous sûr ?" data-singleton="true"><i class="icon-shuffle"></i> Dissocier</a>';
        }
    };

    return {
        init: function(){
            handleTable();
            handleBW(); // Test BEW-Works A SUPPRIMER
        }
    };
}();

$(document).ready(function(){adminSeeMatiere.init();});