/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var adminClasse = function () {
    //---------------- Test Bew-Works A SUPPRIMER ---------
    var ajaxResponse = true;
    var idClassTest = 50;

    var handleBW = function(){
        $('#bw_test').on('switchChange.bootstrapSwitch', function (event, state) {
            ajaxResponse = state;
        });
    };
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    var urls = {
        "delete":       "/GestionClasses/supprimerclasse/id/",
        "getForm":      "url_pour_avoir_rendu_html_modal_avec_form", //Si un id est envoyé en POST alors c'est pour éditer sinon c'est un ajout
        "saveForm":     "url_pour save_form" //Si l'input id est présent alors c'est une modification sinon c'est un ajout
    };

    var handleTable = function() {
        //Pour gérer l'event d'un ajout ou modification d'une ligne
        var eRow = false;
        var table = $('#table_classe');
        //Init les messages de notifications
        toastr.options = mainInterface.defaultToastr;

        var oTable = table.DataTable($.extend(mainInterface.defaultDatatable, {stateSave: true, columnDefs: [{orderable: false, targets: 4}]}));

        //Ajout d'une classe
        $('#add_classe').on('click', function(){
            // ------------------------- Faire requête AJAX à la place -----------------
            // Utiliser urls.getForm pour aller chercher le html de la fenetre modal. Dans le cas d'une édition on fournit l'id de la classe...
            // ... pour éviter de récupérer les valeurs côté client, toujours faire confiance au côté serveur
            // --------
            //Générer la variable resAjax.html côté serveur (simule la réponse ajax)
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'admin', action:'form_classe'}, function(resAjax){
                if(ajaxResponse && resAjax.success)
                    mainInterface.displayModal(resAjax.html);
                else
                    toastr.warning('Une erreur est survenue.');
            });
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });


        //Suppression d'une classe
        table.on('click', '.delete', function(){
            var nRow = $(this).parents('tr')[0];
            //On récupère l'id de la classe
            var idClasse = nRow.getAttribute('data-id');
            // -------------- Faire une requête AJAX à la place ------------
            // Possibilité d'envoyer une requete à l'adresse "urls.delete" et "idClasse" en paramètre POST (penser à adapter "urls.delete")...
            // ...ou sinon faire une concaténation : urls.delete+idClasse
            // En fonction du retour de la requête AJAX
            if(ajaxResponse){
                oTable.row(nRow).remove().draw();
                toastr.success('La classe a été supprimé.');
            }
            else
                toastr.warning('Erreur lors de la suppression de la classe.');
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });

        //Edition d'une classe
        table.on('click', '.editing', function(){
            var nRow = $(this).parents('tr')[0];
            //On récupère l'id de la classe
            var idClasse = nRow.getAttribute('data-id');
            // ------------------------- Faire requête AJAX à la place -----------------
            // Utiliser urls.getForm pour aller chercher le html de la fenetre modal, dans le cas d'une édition on fournit l'id de la classe...
            // ... pour éviter de récupérer les valeurs côté client, toujours faire confiance au côté serveur
            // --------
            //Générer la variable resAjax.html côté serveur (simule la réponse ajax)
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'admin', action:'form_classe', id:idClasse}, function(resAjax){
                if(ajaxResponse && resAjax.success)
                    mainInterface.displayModal(resAjax.html);
                else
                    toastr.warning('Une erreur est survenue.');
            });
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });

        //Validation form pour ajout/edition d'une classe
        $('body').on('submit', '.form_classe', function(e){
            //Petit spinner de chargement
            var ladda = Ladda.create($('.form_classe button[type="submit"]')[0]);
            ladda.start();

            e.preventDefault();
            //On récupèrer les valeurs du form
            var dataPost = JSON.stringify($(this).serializeFormJSON());
            // ------------------------------- Faire requête AJAX à la place ----------------------
            // Utiliser urls.saveForm pour sauvegarder le form, si le champ id est présent dans les datas alors c'est une modification, sinon c'est un ajout
            // Pour la réponse, l'id doit être renvoyé dans tout les cas, avec les données correspondant sous forme array, pour la valeur "cycle", il faut renvoyer le label
            // --------
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'admin', action:'submit_form_classe', data:dataPost, idTestAdd:idClassTest}, function(resAjax){
                if(ajaxResponse && resAjax.success){
                    //Juste pour le test
                    idClassTest = resAjax.idClassTest;
                    //On récupère la ligne, si possible
                    var nRow = table.find('tr[data-id="'+resAjax['id']+'"]');
                    //Passage à l'event
                    eRow = resAjax['id'];
                    if(nRow.length == 0){ //On est sur un ajout
                        //On ajoute la ligne
                        oTable.row.add(resAjax.row).draw().node().setAttribute('data-id', resAjax.id);
                    }else if(nRow.length == 1){   //Normalement pas besoin de faire else if, juste else est suffisant, mais on anticipe si jamais quelques malins modifient le html
                        nRow = nRow[0];
                        //Les valeurs actuelles
                        var currentData = oTable.row(nRow).data();
                        //Pour garder le numéro de classe affiché dans le tableau
                        resAjax['row'][0] = currentData[0];
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
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });

        //Après la fermeture de la fenetre modal
        $('body').on('hidden.bs.modal', '#myModal', function(e){
            //Pas de mise à jour ou d'ajout sur le tableau
            if(eRow == false) return false;

            //On attire l'attention
            $('tr[data-id="'+eRow+'"] td')
                .animate( { backgroundColor: "#1d9d38" }, 900 )
                .animate( { backgroundColor: "transparent" }, 600 );
            //Init var
            eRow = false;
            //On réinitialise les confirmation pour le bouton suppression
            $('[data-toggle=confirmation]').confirmation({ btnOkClass: 'btn btn-sm btn-success', btnCancelClass: 'btn btn-sm btn-danger'});
        });
    };

    return {
        init: function(){
            handleTable();
            handleBW(); // Test BEW-Works A SUPPRIMER
        }
    };
}();

$(document).ready(function(){adminClasse.init();});