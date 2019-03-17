/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var profEmploiTemps = function () {

    var urls = {
        getForm:        "url_pour_avoir_html_du_form",
        getView:        "url_pour_avoir_html_view",
        saveForm:       "url_pour_save_form"
    };

    var handleFullCalendar = function() {
        if (!jQuery().fullCalendar)
            return false;

        //Variable pour stocker le html vierge
        var viewEvent = undefined;
        var calendar = $('#calendar');
        var idClass = null;

        //Init Calendar
        calendar.fullCalendar({
            hiddenDays:         [0],            //On cache dimanche
            defaultView:        'agendaWeek',   //Vue par défaut : Par semaine (Les autres modes ne sont pas affichés. Pour les afficher voir la propriété "header")
            allDaySlot:         false,          //Désactivation de l'emplacement des event sur une journée entière
            slotDuration:       '00:15:00',     //Intervalle des minutes (15min)
            slotLabelFormat:    'HH[h]mm',      //Affichage des heures
            minTime:            '08:00:00',     //Plage horaire (début)
            maxTime:            '17:00:00',     //Plage horaire (fin)
            slotEventOverlap:   false,          //Empêcher les events de se superposer
            contentHeight:      'auto',         //Hauteur du calendrier, en mode automatique
            weekNumbers:        true,           //Affiche le numéro de la semaine
            nowIndicator:       true,           //Affiche un curseur sur l'heure actuelle. (Plus utile pour le compte parent par exemple)
            editable:           false,           //Si les events sont modifiables. (Changer le début de l'event et sa durée)
            selectable:         false,           //Possibilité d'ajouter un event sur le calendrier
            eventColor:         '#1d9d38',      //Couleur des events (Couleur Daarasystem)
            unselectCancel:     '#myModal',     //Un click sur un élèment (et enfant) avec cette classe n'enlèvera pas la sélection sur le calendrier.
            validRange: calendarValidRange(),   //Limite le calendrier sur l'année scolaire en cours
            events: {
                url:    '../response_ajax.php',
                type:   'POST',
                data: function(){
                    return {
                        compte:     'admin',
                        action:     'event_calendar',
                        idClass:    idClass
                    };
                },
                error: function(){
                    //Options pour les messages de notifications
                    toastr.options = mainInterface.defaultToastr;
                    toastr.warning('Erreur lors de la récupération du planning.');
                }
            }
        });

        var oCalendar = calendar.fullCalendar('getCalendar');
        //En attente de la sélection d'une classe
        App.blockUI({
            target: $('#calendar').closest('.row'),
            animate: true
        });

        //Au chargement de la page, on vérifie le select-----------------------------------------------------------------------------------------------------
        if($('#filter_classe').val() != ''){
            idClass = $('#filter_classe').val();
            //On recharge le calendrier
            calendar.fullCalendar('refetchEvents');
        }else{
            toastr.options = {
                "closeButton": true,
                "tapToDismiss": false,
                "debug": false,
                "newestOnTop": true,
                "positionClass": "toast-bottom-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "1000",
                "hideDuration": "1000",
                "timeOut": "0",
                "extendedTimeOut": "0",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "slideDown",
                "hideMethod": "fadeOut"
            };

            toastr.info('Sélectionnez une classe pour activer le calendrier');
        }

        //Sélection sur le filtre classe------------------------------------------------------------------------------------------------------------------------
        $('#filter_classe').on('change', function(){
            if($(this).val() == ''){
                idClass = null;
                toastr.options = {
                    "closeButton": true,
                    "tapToDismiss": false,
                    "debug": false,
                    "newestOnTop": true,
                    "positionClass": "toast-bottom-center",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "1000",
                    "hideDuration": "1000",
                    "timeOut": "0",
                    "extendedTimeOut": "0",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "slideDown",
                    "hideMethod": "fadeOut"
                };

                toastr.info('Sélectionnez une classe pour activer le calendrier');
            }
            else{
                toastr.clear();
                idClass = $(this).val();
            }

            //On recharge le calendrier
            calendar.fullCalendar('refetchEvents');
        });

        //Pendant un chargement des events-------------------------------------------------------------------------------------------------------------------------------------
        oCalendar.on('loading', function(isLoading){
            if(isLoading)
                //En attente des données
                App.blockUI({
                    target: $('#calendar').closest('.row'),
                    animate: true
                });
            else{
                //Si une classe a été sélectionné
                if(idClass != null)
                    //On désactive le loading
                    App.unblockUI($('#calendar').closest('.row'));
            }
        });

        //Click pour voir un event--------------------------------------------------------------------------------------------------------------------------------------------------
        oCalendar.on('eventClick', function(event, jsEvent){
            //Si c'est bien un click sur l'event et non pas sur les span event_action (edit/delete)
            if(jsEvent.target.closest('span.event_action') == null){
                //Les valeurs à insérer
                var values = {
                    date_event :    event.start.format('LLLL')+' à '+event.end.format('LT'),
                    title_event :   event.title,
                    desc_event :    event.description
                };

                //Récupération du viewHtml, si pas le html
                if(viewEvent == undefined){
                    //On va chercher le viewHtml vierge (Utiliser urls.getView)
                    mainInterface.ajaxRequest('../response_ajax.php', {compte:'admin', action:'view_calendar'}, function(resAjax){
                        if(resAjax.success){
                            //On stocke le viewHtml vierge dans la var
                            viewEvent = resAjax.html;
                            //On supprime les modals s'il y en a. Pas de doublon
                            $('#myModal').remove();
                            //On ajoute la nouvelle modal dans le document
                            $('body').append(resAjax.html);
                            //On affecte les valeurs à la view
                            setValues(values, true);
                            //On affiche la modal maintenant
                            mainInterface.displayModal(true);
                        }
                        else{
                            //Options pour les messages de notifications
                            toastr.options = mainInterface.defaultToastr;
                            toastr.warning('Une erreur est survenue.');
                        }
                    });
                }else{ //On a déjà le viewHtml vierge
                    //On supprime les modals s'il y en a. Pas de doublon
                    $('#myModal').remove();
                    //On ajoute la modal vierge dans le document
                    $('body').append(viewEvent);
                    //On affecte les valeurs à la view
                    setValues(values, true);
                    //On affiche la modal maintenant
                    mainInterface.displayModal(true);
                }
            }
        });

        //Avant d'afficher un event sur le calendrier--------------------------------------------------------------------------------------------------------------------------------------
        oCalendar.on('eventRender', function(event, element){
            element.find('.fc-content')
                .addClass('text-center')    //On centre le texte
                .append('<div class="desc_event margin_t5"><p class="no-margin">'+event.description+'</p></div>');  //On affiche la description de l'event
            element.find('.fc-title').addClass('bold'); //Titre (la matière) de l'event en bold
        });
    };

    /**
     * Permet d'insérer les valeurs dans le formulaire ou dans le viewHtml
     *
     * @param values - array - Les valerus à insérer
     * @param view - boolean - Si c'est en mode view ou pas
     */
    function setValues(values, view){
        if(view == undefined)
            view = false;

        //Pour chaque valeur
        $.each(values, function(id, value){
            if(view){
                if(value == '')
                    return true;
                $('#'+id).html(value);
            }
            else
                $('#'+id).val(value);
        });
    }

    /**
     * Fixe les dates limites du calendrier
     *
     * @returns {{start: *, end: *}}
     */
    function calendarValidRange(){
        var now = moment(); //Date actuelle
        var startYear = null;
        var endYear = null;
        //Date de transition, qui permet de faire passer le calendrier à l'année scolaire suivante.
        //La date de transition est fixée au 1 août de l'année actuelle
        var dateTransition = now.clone().month(7).date(1);

        //Si on est avant le 1 août, alors cela signifie que l'année scolaire a démarré l'année dernière et se finit cette année
        if (now.isBefore(dateTransition, 'day')) {
            startYear = now.year() - 1; //Juste l'année d'avant
            endYear = now.year();   //L'année actuelle
        } else {    //Sinon, alors l'année scolaire a démarré cette année et finira l'année prochaine
            startYear = now.year(); //L''année actuelle
            endYear = now.year() + 1;   //Année suivante
        }

        return {
            //La date du début de l'année scolaire a été fixé au 1er Septembre.
            //(Si vous modifiez cette valeur, ayez en tête qu'aucune action ne sera possible sur le calendrier avant cette date)
            start: moment([startYear, 8]),
            //La date de fin de l'année scolaire a été fixé au 1er Juillet (exclusif).
            //(Si vous modifiez cette valeur, ayez en tête qu'aucune action ne sera possible sur le calendrier après cette date)
            end: moment([endYear, 6])
        };
    }

    return {
        init: function(){
            handleFullCalendar();
        }
    };
}();

$(document).ready(function(){profEmploiTemps.init();});