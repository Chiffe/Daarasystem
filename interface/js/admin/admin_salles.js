/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var adminSalle = function () {
    //---------------- Test Bew-Works A SUPPRIMER ---------
    var ajaxResponse = true;
    var idSalleTest = 50;

    var handleBW = function(){
        $('#bw_test').on('switchChange.bootstrapSwitch', function (event, state) {
            ajaxResponse = state;
        });
    };
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    var urls = {
        "delete":   "url_pour_supprimer_salle",
        "saveForm": "url_pour_save_form" //Si l'input id est présent alors c'est une modification sinon c'est un ajout
    };

    var handleSalle = function() {
        var nEditing = null;
        var dataEditing = null;
        var nNew = false;
        var table = $('#table_salle');
        //Init les messages de notifications
        toastr.options = mainInterface.defaultToastr;

        var oTable = table.DataTable($.extend(mainInterface.defaultDatatable, {stateSave: true, columnDefs: [{orderable: false, targets: 2}]}));

        //Ajout d'une classe
        $('#add_salle').on('click', function(){
            //Si une ligne est déjà en mode ajout
            if(nNew) return false;
            //Si une ligne est en édition
            if(nEditing !== null)
                restoreRow(oTable, nEditing, dataEditing);
            //On passe en mode ajout
            nNew = true;
            //Ajouter la nouvelle ligne dans le tableau
            var nRow = oTable.row.add([
                '',
                '',
                getBtnActions()
            ]).draw().node();
            //On ajoute l'attribut data-id à -1 synonyme d'un ajout
            nRow.setAttribute('data-id', '-1');
            //La rendre editable
            editRow(oTable, nRow);
        });


        //Suppression d'une salle
        table.on('click', '.delete', function(){
            var nRow = $(this).parents('tr')[0];
            //On récupère l'id de la salle
            var idSalle = nRow.getAttribute('data-id');
            // -------------- Faire une requête AJAX à la place ------------
            // Possibilité d'envoyer une requete à l'adresse "urls.delete" et "idSalle" en paramètre POST (penser à adapter "urls.delete")...
            // ...ou sinon faire une concaténation : urls.delete+idSalle
            // En fonction du retour de la requête AJAX
            if(ajaxResponse){
                oTable.row(nRow).remove().draw();
                toastr.success('La salle a été supprimé.');
            }
            else
                toastr.warning('Erreur lors de la suppression de la salle.');
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });

        //Edition d'une salle
        table.on('click', '.edit', function(){
            //On récupère la ligne qui doit être modifié
            var nRow = $(this).parents('tr')[0];

            //S'il y a une ligne en mode ajout
            if(nNew){
                oTable.row($('tr[data-id="-1"]')).remove().draw();
                nNew = false;
            }
            //Une modification est-elle en cours ?
            else if(nEditing !== null)
                restoreRow(oTable, nEditing, dataEditing);

            //On rend la ligne éditable
            editRow(oTable, nRow);
            nEditing = nRow;
        });

        //Annulation d'un ajout/edition d'une salle
        table.on('click', '.cancel', function(){
            //On récupère la ligne qui doit être annulé
            var nRow = $(this).parents('tr')[0];
            //Si une ligne qui est en mode ajout est annulé
            if(nNew && nRow.getAttribute('data-id') == '-1'){
                oTable.row(nRow).remove().draw();
                nNew = false;
                return false;
            }
            //Si pas de ligne en édition ou si annulation d'une ligne qui n'est pas celle éditée
            if(nEditing === null || nEditing !== nRow){
                //On cache les boutons de confirmation, qui normalement devraient pas être visible
                toggleBtnActions(nRow, 'confirmation');
                return false;
            }
            //Annulation d'une ligne et restauration des valeurs
            restoreRow(oTable, nEditing, dataEditing);
        });

        //Validation pour ajout/edition d'une salle
        table.on('click', '.save', function(){
            //Petit spinner de chargement
            var ladda = Ladda.create(this);
            ladda.start();

            //On récupère la ligne qui doit être save
            var nRow = $(this).parents('tr')[0];
            var idSalle = nRow.getAttribute('data-id');
            //Si pas de ligne en édition ou si save d'une ligne qui n'est pas celle éditée
            if((nNew && idSalle != '-1') || (!nNew && (nEditing === null || nEditing !== nRow))){
                toggleBtnActions(nRow, 'confirmation');
                return false;
            }
            //On récupèrer les valeurs de la ligne
            var dataPost = $('input', nRow).serializeFormJSON();
            //Si c'est une édition, on rajoute l'id
            if(!nNew)
                dataPost['id'] = idSalle;
            //JSON format
            dataPost = JSON.stringify(dataPost);
            // ------------------------------- Faire requête AJAX à la place ----------------------
            // Utiliser urls.saveForm pour sauvegarder le form, si le champ id est présent dans les datas alors c'est une modification, sinon c'est un ajout
            // Pour la réponse, l'id doit être renvoyé dans tout les cas, avec les données
            // --------
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'admin', action:'submit_form_salle', data:dataPost, idTestAdd:idSalleTest}, function(resAjax){
                if(ajaxResponse && resAjax.success){
                    //Juste pour le test
                    idSalleTest = resAjax.idSalleTest;
                    //On update la ligne
                    oTable.row(nRow).data(resAjax.row);
                    //Si c'est un ajout, on modifie l'attribut data-id
                    if(nNew)
                        nRow.setAttribute('data-id', resAjax['id']);

                    //Init des vars globales
                    nNew = false;
                    nEditing = null;
                    dataEditing = null;
                    //On réinitialise les confirmation pour le bouton suppression
                    $('[data-toggle=confirmation]').confirmation({ btnOkClass: 'btn btn-sm btn-success', btnCancelClass: 'btn btn-sm btn-danger'});

                    toastr.success('Action effectuée.');
                }
                else
                    toastr.warning('Une erreur est survenue.');

                //Stop le spinner
                ladda.stop();
            });
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        });

        /**
         * Fourni le html de la colonne "Actions"
         *
         * @returns {string}
         */
        function getBtnActions(){
            return '<div class="btn_actions">'+
                '<a href="javascript:;" class="btn btn-xs blue edit"><i class="icon-pencil"></i> Modifier</a>'+
                '<a href="javascript:;" class="btn btn-xs red delete" data-toggle="confirmation" data-placement="left" data-original-title="Êtes-vous sûr ?" data-singleton="true"><i class="icon-trash"></i> Supprimer</a></div>'+
                '<div class="btn_confirmation">'+
                '<a href="javascript:;" class="btn btn-icon-only green save"><i class="icon-check"></i></a>'+
                '<a href="javascript:;" class="btn btn-icon-only red cancel"><i class="icon-close"></i></a></div>';
        }

        /**
         * Retourne les valeurs d'une ligne
         *
         * @param oTable
         * @param row
         * @returns {*}
         */
        function getDataRow(oTable, row){
            //Si on reçoit un id
            if($.isNumeric(row))
                row = $('tr[data-id="'+row+'"]')[0];

            return oTable.row(row).data();
        }

        /**
         * Permet de rendre une ligne éditable
         *
         * @param oTable
         * @param row
         */
        function editRow(oTable, row){
            //On récupère les données de la ligne
            dataEditing = getDataRow(oTable, row);
            //On insère les input
            oTable.row(row).data([
                '<input type="text" name="nomsalle" class="form-control" value="'+dataEditing[0]+'">',
                '<input type="number" nim="1" max="100" name="effsalle" class="form-control" value="'+dataEditing[1]+'">',
                dataEditing[2]
            ]);
            //On cache les boutons d'action et on affiche les boutons de confirmations
            toggleBtnActions(row);
        }

        /**
         * Permet de restaurer les valeurs d'une ligne
         *
         * @param oTable - Objet dataTable
         * @param row - La ligne en question
         * @param data array Les données à restaurer
         */
        function restoreRow(oTable, row, data){
            //On restaure la ligne avec les données en paramètres
            oTable.row(row).data([
                data[0],
                data[1],
                data[2]
            ]);

            nEditing = null;
            dataEditing = null;

            //On réinitialise les confirmation pour le bouton suppression
            $('[data-toggle=confirmation]').confirmation({ btnOkClass: 'btn btn-sm btn-success', btnCancelClass: 'btn btn-sm btn-danger'});
        }

        /**
         * Permet de switcher entre les boutons d'actions et de confirmation
         *
         * @param row - La ligne qui est liée aux boutons
         * @param tohide - Permet de choisir quels boutons doivent être cachés
         */
        function toggleBtnActions(row, tohide){
            //On doit cacher les boutons actions
            if(tohide !== undefined && tohide == 'actions'){
                $('.btn_actions', row).hide('fast');
                $('.btn_confirmation', row).show('fast');
            }else if(tohide !== undefined && tohide == 'confirmation'){ //Cacher les boutons confirmation
                $('.btn_confirmation', row).hide('fast');
                $('.btn_actions', row).show('fast');
            }
            //Sinon si les boutons actions sont visibles
            else if($('.btn_actions', row).is(':visible')){
                $('.btn_actions', row).hide('fast');
                $('.btn_confirmation', row).show('fast');
            }else{
                $('.btn_confirmation', row).hide('fast');
                $('.btn_actions', row).show('fast');
            }
        }
    };

    return {
        init: function(){
            handleSalle();
            handleBW(); // Test BEW-Works A SUPPRIMER
        }
    };
}();

$(document).ready(function(){adminSalle.init();});