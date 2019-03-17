/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var directeurEmploiTemps = function () {
    //---------------- Test Bew-Works A SUPPRIMER ---------
    var idEventTest = 50;
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    var urls = {
        getForm:        "url_pour_avoir_html_du_form",
        getView:        "url_pour_avoir_html_view",
        saveForm:       "url_pour_save_form"
    };

    var handleFullCalendar = function() {
        if (!jQuery().fullCalendar)
            return false;

        //Variable pour stocker le html vierge
        var formEvent = undefined;
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
            editable:           true,           //Si les events sont modifiables. (Changer le début de l'event et sa durée)
            selectable:         true,           //Possibilité d'ajouter un event sur le calendrier
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
        //Date aujourd'hui
        var today = oCalendar.moment().clone();
        //Numéro de la semaine (Combiné avec l'année, pour gérer le passage à l'année suivante)
        var numberWeek = today.year()+''+today.week();
        //Pour limiter les events sur une seule journée
        var limitHours = getLimitHours();
        //Pour stocker les events d'une semaine copiée
        var copyWeek = {
            start:  null,
            events: []
        };
        //Pour l'intégration des boutons dans le plugin
        var initButton = true;
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

        //Avertir par e-mail---------------------------------------------------------------------------------------------------------------------------------------
        calendar.on('click', '#warn_email', function(){
            //Si pas de classe sélectionné
            if(!classSelected(idClass))
                return false;

            //On récupère la vue actuelle
            var view = calendar.fullCalendar('getView');
            //On récupère le numéro de la semaine en cours (Combiné à l'année)
            var numberViewWeek = today.year()+''+view.start.week();
            //Si on est sur une semaine dans le passé
            if(numberViewWeek < numberWeek){
                //Options pour les messages de notifications
                toastr.options = mainInterface.defaultToastr;
                toastr.warning('Cette semaine est déjà passée, avertir par e-mail n\'a plus d\'intérêt.');
                return false;
            }

            var dataPost = {
                id_classe: idClass,
                start: view.start.format('DD/MM/YYYY'),
                //RAPPEL : On retire un jour car la date de fin est exclusive, c'est à dire que pour cet exemple de base on est sur dimanche
                end: view.end.clone().subtract(1, 'day').format('DD/MM/YYYY')
            };
            /*--------------------- REQUETE AJAX A FAIRE A LA PLACE-------------------*/
            //Utiliser dataPost pour générer l'e-mail
            //Retour valide (true)
            var ajaxResponse = true;
            if(ajaxResponse){
                //Options pour les messages de notifications
                toastr.options = mainInterface.defaultToastr;
                toastr.success('E-mail envoyé.');
            }else{
                //Options pour les messages de notifications
                toastr.options = mainInterface.defaultToastr;
                toastr.warning('Une erreur est survenue');
            }
            /*--------------------------------------------------------------------------*/
        });

        //On supprime une semaine-------------------------------------------------------------------------------------------------------------------------------
        calendar.on('click', '#trash_week', function(){
            //Si pas de classe sélectionné
            if(!classSelected(idClass))
                return false;

            //On récupère la vue actuelle
            var view = calendar.fullCalendar('getView');
            //On récupère le numéro de la semaine en cours (Combiné à l'année)
            var numberViewWeek = today.year()+''+view.start.week();
            //Si on est sur une semaine dans le passé
            if(numberViewWeek < numberWeek){
                //Options pour les messages de notifications
                toastr.options = mainInterface.defaultToastr;
                toastr.warning('Aucune action possible pour les semaines antérieures');
                return false;
            }

            //--------------------------------IMPORTANT------------------------------------------
            // On récupère les events du calendrier, avec la méthode "clientEvents"
            // Cela fonctionne pour 2 raisons :
            // 1er) Il n'y a qu'une seule vue et elle est par semaine
            // 2eme) Lorsqu'on utilise la méthode "renderEvent", le 3eme paramètre [stick] (Voir la doc), est laissé à false.
            //      Ce qui signifie que les events ne sont pas stockés, ainsi lors d'un refetch seuls les events visibles sont en mémoire du plugin.
            // Si vous venez à changer un des 2 paramètres précédents, par exemple, autoriser la vue mensuelle, il faudra revoir le système de récupération des events
            //-----------------------------------------------------------------------------------
            //Les events de la semaine affichée, à supprimer
            var delEvents = calendar.fullCalendar('clientEvents');
            //Si la même semaine
            if(numberViewWeek == numberWeek){
                //On doit retirer les events qui sont avant aujourd'hui
                delEvents = delEvents.reduce(function(result, event){
                    if(event.start.isSame(today, 'day') || event.start.isAfter(today, 'day'))
                        result.push(event);

                    return result;
                }, []);
            }

            //On garde que les id
            delEvents = delEvents.map(function(event){
                return event.id;
            });

            //Si pas d'event, return true
            if(delEvents.length == 0)
                return true;
            else{
                /*--------------------- REQUETE AJAX A FAIRE A LA PLACE-------------------*/
                //Utiliser delEvents en dataPost
                //En attente de la réponse AJAX, on empêche d'autres actions d'être effectuées
                App.blockUI({
                    target: $('#calendar').closest('.row'),
                    animate: true
                });
                //Retour valide (true)
                var ajaxResponse = true;
                if(ajaxResponse){
                    $.each(delEvents, function(k,id){
                        //On supprime
                        calendar.fullCalendar('removeEvents', id);
                    });

                    //Petit message, pour avertir
                    if(numberViewWeek == numberWeek){
                        //Options pour les messages de notifications
                        toastr.options = mainInterface.defaultToastr;
                        toastr.info('Seules les évènements à partir d\'aujourd\'hui peuvent être supprimé.');
                    }
                }else{
                    //Options pour les messages de notifications
                    toastr.options = mainInterface.defaultToastr;
                    toastr.warning('Une erreur est survenue');
                }
                //On réactive le calendrier
                App.unblockUI($('#calendar').closest('.row'));
                /*--------------------------------------------------------------------------*/
            }
        });

        //On colle une semaine--------------------------------------------------------------------------------------------------------------------------------------
        calendar.on('click', '#paste_week', function(){
            //Si pas de classe sélectionné
            if(!classSelected(idClass))
                return false;

            //Pas d'events ou pas de date enregistré
            if(copyWeek.start == null || copyWeek.events.length == 0){
                //On désactive le bouton
                $('#paste_week').addClass('fc-state-disabled').prop('disabled', true);
                //Options pour les messages de notifications
                toastr.options = mainInterface.defaultToastr;
                //Message warning
                toastr.warning('Rien à coller');
                return false;
            }

            //On récupère la vue actuelle
            var view = calendar.fullCalendar('getView');
            //On récupère le numéro de la semaine affichée (Combiné à l'année)
            var numberViewWeek = today.year()+''+view.start.week();
            //Si on est sur une semaine dans le passé
            if(numberViewWeek < numberWeek){
                //Options pour les messages de notifications
                toastr.options = mainInterface.defaultToastr;
                toastr.warning('Aucune action possible pour les semaines antérieures');
                return false;
            }

            //La différence entre les semaines
            var diffWeek = view.start.clone().startOf('week').diff(copyWeek.start, 'minutes');
            //Les events à coller
            var pasteEvents = copyWeek.events;
            //On ajuste les dates des events par rapport à la semaine affichée
            pasteEvents = pasteEvents.map(function(event){
                event.copy_start = event.start.clone().add(diffWeek, 'minute');
                event.copy_end = event.end.clone().add(diffWeek, 'minute');
                return event;
            });

            //Si la même semaine
            if(numberViewWeek == numberWeek){
                //On doit garder les events qui sont à partir d'aujourd'hui
                pasteEvents = pasteEvents.reduce(function(result, event){
                    if(event.copy_start.isSame(today, 'day') || event.copy_start.isAfter(today, 'day'))
                        result.push(event);

                    return result;
                }, []);
            }

            //Si pas d'event, return true
            if(pasteEvents.length == 0){
                //Options pour les messages de notifications
                toastr.options = mainInterface.defaultToastr;
                //Message explications
                toastr.info('Rien à coller. Les nouvelles dates des évènements copiés étaient avant aujourd\'hui');
                return true;
            }
            else{
                pasteEvents = pasteEvents.map(function(event){
                    return {
                        start:      event.copy_start.format(),
                        end:        event.copy_end.format(),
                        id_classe:  idClass,
                        info:       event.info,
                        matiere:    event.matiere,
                        professeur: event.professeur,
                        salle:      event.salle
                    };
                });

                /*--------------------- REQUETE AJAX A FAIRE A LA PLACE-------------------*/
                mainInterface.ajaxRequest('../response_ajax.php', {compte:'admin', action:'paste_calendar', data:pasteEvents, idTestAdd:idEventTest}, function(resAjax){
                    if(resAjax.success){
                        //Juste pour le test
                        idEventTest = resAjax.idEventTest;
                        //On recharge le calendrier
                        calendar.fullCalendar('refetchEvents');   //A utiliser pour la version finale, on recharge la vue entière. Pour récupérer les events collés et ceux qui étaient déjà présent
                        /*----------------A SUPPRIMER---------------------------*/
                        //---Juste pour le test pour avoir un visuel----
                        calendar.fullCalendar('renderEvents', resAjax.events);
                        /*------------------------------------------------------*/
                    }
                    else{
                        //Options pour les messages de notifications
                        toastr.options = mainInterface.defaultToastr;
                        toastr.warning('Une erreur est survenue.');
                    }
                });
            }
        });

        //On copie une semaine---------------------------------------------------------------------------------------------------------------------------------------
        calendar.on('click', '#copy_week', function(){
            //Si pas de classe sélectionné
            if(!classSelected(idClass))
                return false;

            //On met à zéro la var event copié
            copyWeek.start = null;
            copyWeek.events = [];
            //On désactive le bouton "coller"
            $('#paste_week').addClass('fc-state-disabled').prop('disabled', true);

            //Les events à copier
            // VOIR LE BLOCK COMMENTAIRE DANS "Supprimer une semaine" POUR LA METHODE "clientEvents"
            var copyEvents = $.extend(true, [], calendar.fullCalendar('clientEvents'));
            //Si pas d'event
            if(copyEvents.length == 0)
                return true;

            //On récupère la vue actuelle
            var view = calendar.fullCalendar('getView');
            //On stocke la date de début de semaine
            copyWeek.start = view.start.clone().startOf('week');
            //On retire les id
            copyEvents = copyEvents.map(function(event){
                event.id = null;
                return event;
            });
            //On stocke les events
            copyWeek.events = copyEvents;
            //On active le bouton "coller"
            $('#paste_week').removeClass('fc-state-disabled').prop('disabled', false);
            //Options pour les messages de notifications
            toastr.options = mainInterface.defaultToastr;
            //Message info
            toastr.info('Semaine copiée');
        });

        //Click pour supprimer un event----------------------------------------------------------------------------------------------------------------------------------
        calendar.on('click', '.event_trash', function(){
            //id de l'event
            var idEvent = $(this).attr('data-id');
            //On récupère l'event
            var event = calendar.fullCalendar('clientEvents', idEvent)[0];
            //Si l'event n'existe pas
            if(event == undefined)
                return false;

            //Si l'event supprimé est avant aujourd'hui
            if(event.start.isBefore(today, 'day')){
                //Options pour les messages de notifications
                toastr.options = mainInterface.defaultToastr;
                toastr.warning('Aucune action possible avant aujourd\'hui');
            }else{
                /*---------------REQUETE AJAX A FAIRE------------------*/
                //On supprime l'event
                calendar.fullCalendar('removeEvents', idEvent);
            }
        });

        //Click pour editer un event-----------------------------------------------------------------------------------------------------------------------------------------
        calendar.on('click', '.event_edit', function(e){
            //id de l'event
            var idEvent = $(this).attr('data-id');
            //On récupère l'event
            var event = calendar.fullCalendar('clientEvents', idEvent)[0];
            //Si l'event n'existe pas
            if(event == undefined)
                return false;

            //Les données à insérer dans le form
            var values = {
                start:      event.start.format(),
                end:        event.end.format(),
                id:         event.id,
                id_classe:  event.id_classe,
                matiere:    event.matiere,
                professeur: event.professeur,
                salle:      event.salle,
                info:       event.info
            };

            //On récupère le form et on l'affiche
            getForm(event.start, event.end, values);
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
                //Si on doit mettre les boutons personnalisés, une seule fois au chargement de la page
                if(initButton){
                    setCustomButtons();
                    initButton = false;
                }
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

        //Lors d'un resize d'un event---------------------------------------------------------------------------------------------------------------------------------------------------
        oCalendar.on('eventResize', function(event, delta, revertFunc){
            //Si l'event qui est resize est dans le passé
            if(event.start.isBefore(today, 'day')){
                //Options pour les messages de notifications
                toastr.options = mainInterface.defaultToastr;
                toastr.warning('Aucune action possible avant aujourd\'hui');
                //L'event retourne à sa position de départ
                revertFunc();
                return false;
            }

            //Si l'event est au-delà de la plage horaire du calendrier pour la même journée
            if(!withinOfDay(event.start, event.end)){
                revertFunc();
                return false;
            }

            /*--------------------- REQUETE AJAX A FAIRE A LA PLACE-------------------*/
            var dataPost = {
                id:     event.id,
                end:    event.end.format()
            };

            //Seule cas à gérer, est le retour false
            var ajaxResponse = false;
            if(ajaxResponse){
                //Options pour les messages de notifications
                toastr.options = mainInterface.defaultToastr;
                toastr.warning('Une erreur est survenue');
                revertFunc();
            }
            //Sinon le retour true, n'exige aucune action particulière
            /*-----------------------------------------------------------------------*/
        });

        //Lors d'un déplacement d'un event------------------------------------------------------------------------------------------------------------------------------------------------
        oCalendar.on('eventDrop', function(event, delta, revertFunc){
            //On calcule la date de départ, avant le drop
            var oldStart = event.start.clone().subtract(delta.asMinutes(), 'minutes');
            //Si l'event est drop depuis/vers le passé
            if(event.start.isBefore(today, 'day') || oldStart.isBefore(today, 'day')){
                //Options pour les messages de notifications
                toastr.options = mainInterface.defaultToastr;
                toastr.warning('Aucune action possible avant aujourd\'hui');
                //L'event retourne à sa position de départ
                revertFunc();
                return false;
            }

            //Si l'event est au-delà de la plage horaire du calendrier pour la même journée
            if(!withinOfDay(event.start, event.end)){
                revertFunc();
                return false;
            }

            /*--------------------- REQUETE AJAX A FAIRE A LA PLACE-----------------------------*/
            var dataPost = {
                id:     event.id,
                start:  event.start.format(),
                end:    event.end.format()
            };

            //Seule cas à gérer, est le retour false
            var ajaxResponse = false;
            if(ajaxResponse){
                //Options pour les messages de notifications
                toastr.options = mainInterface.defaultToastr;
                toastr.warning('Une erreur est survenue');
                revertFunc();
            }
            //Sinon le retour true, n'exige aucune action particulière
            /*-----------------------------------------------------------------------*/
        });


        //Avant d'afficher un event sur le calendrier--------------------------------------------------------------------------------------------------------------------------------------
        oCalendar.on('eventRender', function(event, element){
            element
                //On ajoute le bouton supprimer
                .prepend('<span title="Supprimer la plage horaire" class="btn btn-circle btn-xs red event_action event_trash" data-id="'+event.id+'"><i class="fa fa-trash"></i></span>')
                //On ajoute le bouton modifier
                .prepend('<span title="Modifier la plage horaire" class="btn btn-circle btn-xs bg-white font-green event_action event_edit" data-id="'+event.id+'"><i class="fa fa-edit"></i></span>');
            element.find('.fc-content')
                .addClass('text-center')    //On centre le texte
                .append('<div class="desc_event margin_t5"><p class="no-margin">'+event.description+'</p></div>');  //On affiche la description de l'event
            element.find('.fc-title').addClass('bold'); //Titre (la matière) de l'event en bold
        });

        //Lors d'un select (un ajout)--------------------------------------------------------------------------------------------------------------------------------------------
        oCalendar.on('select', function(start, end){
            //Si pas de classe sélectionné
            if(!classSelected(idClass)){
                calendar.fullCalendar('unselect');
                return false;
            }

            //Les données à insérer dans le form
            var values = {
                start:      start.format(),
                end:        end.format(),
                id_classe:  idClass
            };

            //On récupère le form et on l'affiche
            getForm(start, end, values);
        });

        //Validation form pour ajout/edition d'un event------------------------------------------------------------------------------------------------------------------------------
        $('body').on('submit', '.form_calendar', function(e){
            //Petit spinner de chargement
            var ladda = Ladda.create($('.form_calendar button[type="submit"]')[0]);
            ladda.start();

            e.preventDefault();
            //On récupèrer les valeurs du form
            var dataPost = JSON.stringify($(this).serializeFormJSON());
            // ------------------------------- Faire requête AJAX à la place ----------------------
            // Utiliser urls.saveForm pour sauvegarder le form, si le champ id est à -1 alors c'est un ajout, sinon c'est une modification
            // Pour la réponse, l'id doit être renvoyé dans tout les cas
            // --------
            //Simulation requête AJAX (idEventAdd est là pour un ajout pour la version test)
            mainInterface.ajaxRequest('../response_ajax.php', {compte:'admin', action:'submit_form_calendar', data:dataPost, idTestAdd:idEventTest}, function(resAjax){
                if(resAjax.success){
                    //Juste pour le test
                    idEventTest = resAjax.idEventTest;
                    //On supprime l'ancien, s'il existe
                    calendar.fullCalendar('removeEvents', resAjax.event.id);
                    //On ajoute l'event au calendrier
                    calendar.fullCalendar('renderEvent', resAjax.event);
                }
                else{
                    //Options pour les messages de notifications
                    toastr.options = mainInterface.defaultToastr;
                    toastr.warning('Une erreur est survenue.');
                }

                //Stop le spinner
                ladda.stop();
                //Quelque soit la réponse, on ferme la fenetre modal
                $('#myModal').modal('hide');
            });
        });

        //Après la fermeture de la fenetre modal------------------------------------------------------------------------------------------------------------------------------------------
        $('body').on('hidden.bs.modal', '#myModal', function(e){
            //On déselectionne la sélection
            calendar.fullCalendar('unselect');
        });

        /**
         * Retourne les heures min et max de la plage horaire du calendrier sous forme object
         *
         * @returns {{start: {hour: *, minute: *, second: number, millisecond: number}, end: {hour: *, minute: *, second: number, millisecond: number}}}
         */
        function getLimitHours(){
            var minTimeCalendar = calendar.fullCalendar('option', 'minTime').split(':');
            var maxTimeCalendar = calendar.fullCalendar('option', 'maxTime').split(':');

            return {
                start:  {'hour': minTimeCalendar[0], 'minute': minTimeCalendar[1], 'second': 0, 'millisecond': 0},
                end:    {'hour': maxTimeCalendar[0], 'minute': maxTimeCalendar[1], 'second': 0, 'millisecond': 0}
            }
        }

        /**
         * Détermine si un event est dans les limites du calendrier pour la même journée
         *
         * @param start - Moment - Date de début de l'event
         * @param end - Moment - Date de fin de l'event
         * @returns {boolean} - Event dans les limites ou pas
         */
        function withinOfDay(start, end){
            //Si l'event est sur plusieurs journée ou au-delà de la plage horaire du même jour
            //C'est start qui sert de référence pour le jour
            //On fixe la limit start, en fonction de la plage horaire du calendrier
            var startLimitDay = start.clone().set(limitHours.start);
            //On fixe la limit end, en fonction de la plage horaire du calendrier
            var endLimitDay = start.clone().set(limitHours.end);
            if(start.isBefore(startLimitDay) || end.isAfter(endLimitDay)){
                //Options pour les messages de notifications
                toastr.options = mainInterface.defaultToastr;
                toastr.warning('L\'évènement doit être compris dans la plage horaire du même jour');
                return false;
            }
            else
                return true;
        }

        /**
         * Permet d'ajouter les boutons supplémentaries dans le plugin
         *
         */
        function setCustomButtons(){
            calendar.find('.fc-header-toolbar .fc-right')
                .prepend('<div class="fc-button-group">' +
                '<button type="button" id="paste_week" class="fc-button fc-state-default fc-corner-left fc-state-disabled" data-toggle="confirmation" data-placement="left" data-original-title="Êtes-vous sûr ?" data-singleton="true" disabled>Coller la semaine</button>' +
                '<button type="button" id="copy_week" class="fc-button fc-state-default fc-corner-right">Copier la semaine</button>' +
                '</div>')
                .append('<button type="button" id="warn_email" data-original-title="Avertir par e-mail les parents et élèves pour la semaine affichée" class="tooltips fc-button fc-state-default fc-corner-left fc-corner-right">Avertir par e-mail</button>' +
                '<button type="button" id="trash_week" class="fc-button fc-state-default fc-corner-left fc-corner-right" data-toggle="confirmation" data-placement="left" data-original-title="Êtes-vous sûr ?" data-singleton="true">Supprimer la semaine</button>');

            //On initialise les confirmation pour les boutons
            $('[data-toggle=confirmation]').confirmation({ btnOkClass: 'btn btn-sm btn-success', btnCancelClass: 'btn btn-sm btn-danger'});
            //On initialise les tooltips
            $('.tooltips').tooltip();
        }

        /**
         * Permet de récupérer, affecter et afficher le form d'ajout et modification d'un event
         *
         * @param eventStart - Moment - Date du début de l'event
         * @param eventEnd - Moment - Date de fin de l'event
         * @param values - array - Les valeurs a insérer dans le form
         * @returns {boolean}
         */
        function getForm(eventStart, eventEnd, values){
            //Si l'event est ajouté avant aujourd'hui
            if(eventStart.isBefore(today, 'day')){
                //Options pour les messages de notifications
                toastr.options = mainInterface.defaultToastr;
                toastr.warning('Aucune action possible avant aujourd\'hui');
                calendar.fullCalendar('unselect');
                return false;
            }

            //Si l'event est au-delà de la plage horaire du calendrier pour la même journée
            if(!withinOfDay(eventStart, eventEnd)){
                calendar.fullCalendar('unselect');
                return false;
            }

            //Récupération du form event, si pas le html du form
            if(formEvent == undefined){
                //On va chercher le form vierge (Utiliser urls.getForm)
                mainInterface.ajaxRequest('../response_ajax.php', {compte:'admin', action:'form_calendar'}, function(resAjax){
                    if(resAjax.success){
                        //On stocke le form vierge dans la var
                        formEvent = resAjax.html;
                        //On supprime les modals s'il y en a. Pas de doublon
                        $('#myModal').remove();
                        //On ajoute la nouvelle modal dans le document
                        $('body').append(resAjax.html);
                        //On affecte les valeurs au form
                        setValues(values);
                        //On affiche la modal maintenant
                        mainInterface.displayModal(true);
                    }
                    else{
                        //Options pour les messages de notifications
                        toastr.options = mainInterface.defaultToastr;
                        toastr.warning('Une erreur est survenue.');
                        calendar.fullCalendar('unselect');
                    }
                });
            }else{ //On a déjà le form vierge
                //On supprime les modals s'il y en a. Pas de doublon
                $('#myModal').remove();
                //On ajoute la modal vierge dans le document
                $('body').append(formEvent);
                //On affecte les valeurs au form
                setValues(values);
                //On affiche la modal maintenant
                mainInterface.displayModal(true);
            }
        }
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
     * Permet de savoir si une classe a été sélectionné ou pas
     *
     * @param id -int - La valeur du select "Classe"
     * @returns {boolean}
     */
    function classSelected(id){
        //Si pas de classe sélectionné
        if(id == null){
            //Options pour les messages de notifications
            toastr.options = mainInterface.defaultToastr;
            toastr.warning('Veuillez sélectionner une classe pour activer le calendrier');
            //On bloque de nouveau le calendrier
            App.blockUI({
                target: $('#calendar').closest('.row'),
                animate: true
            });
            return false;
        }

        return true;
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

$(document).ready(function(){directeurEmploiTemps.init();});