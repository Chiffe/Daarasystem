/**
 * Created by Jr on 20/04/2015.
 */

var bwMain = {
    init: function(){
        this.hoveredFunc('#container>header p.pull-right a', '.sprite_main');
        this.initSequence();
        this.initMoreBtn();
        this.initBtnScroll();
        this.initLogSchool();

        //Supprime les messages visiteurs au bout de 10 secondes
        setTimeout(function(){
            $('div.alert').hide('slow', function() {$('div.alert').remove();});
        }, 10000);
    },
    initLogSchool: function(){
        $('.login_cont').on('click', function(e){
            if($(e.target).closest('div.overlays').length == 0){
                if($(this).hasClass('open')){
                    $(this).removeClass('open');
                    $('.overlays').removeClass('open', {
                        duration: 500,
                        easing: 'linear',
                        children: true,
                        complete: function(){
                            $('.overlays').hide();
                        }
                    });
                }
                else{
                    $(this).addClass('open').focus();
                    $('.overlays').show({
                        effect: 'clip',
                        easing: 'linear',
                        duration: 0,
                        complete: function(){
                            $('.overlays').addClass('open', 500, 'easeOutQuad');
                        }
                    });
                }
            }
        });

        $('body').on('click', function(e){
            if($(e.target).closest('.login_cont').length == 0 && $('.login_cont').hasClass('open')){
                $('.login_cont').removeClass('open');
                $('.overlays').removeClass('open', {
                    duration: 500,
                    easing: 'linear',
                    children: true,
                    complete: function(){
                        $('.overlays').hide();
                    }
                });
            }
        });
    },
    initBtnScroll: function(){
        $('.scroll_link').on('click', function(){
            //On récupère la cible du lien
            var cible = $(this).attr('data-target');
            if(cible == 'home'){
                bwMain.scrollTop();
            }else{
                var targetScroll = $('#'+cible).offset().top;
                bwMain.scrollTop((targetScroll-40));
            }
        });
    },
    scrollTop: function(top){
        if(top === undefined)
            top = 0;
        //On remonte en haut de la page
        $('html, body').animate({scrollTop: top}, {duration:900, queue:false});
    },
    initMoreBtn: function(){
        $('.more_btn').on('click', function(){
            if($(this).parents('.more_parent').find('.about').hasClass('view_more')){
                $(this).parents('.more_parent').find('.about').removeClass('view_more');
                $(this).html('Lire la suite');
            }else{
                $(this).parents('.more_parent').find('.about').addClass('view_more');
                $(this).html('Réduire');
            }
        })
    },
    hoveredFunc: function(selector, target){
        $(selector).hover(
            function(){
                if(target == undefined){
                    var nameClass = $(this).attr('class');
                    $(this).attr('class', nameClass+'_hover');
                }else{
                    var nameClass = $(this).find(target).attr('class');
                    $(this).find(target).attr('class', nameClass+'_hover');
                }
            },
            function(){
                if(target == undefined){
                    var nameClass = $(this).attr('class');
                    nameClass = nameClass.replace('_hover', '');
                    $(this).attr('class', nameClass);
                }else{
                    var nameClass = $(this).find(target).attr('class');
                    nameClass = nameClass.replace('_hover', '');
                    $(this).find(target).attr('class', nameClass);
                }
            }
        );
    },
    initSequence: function(){
        // Get the Sequence element
        var sequenceElement = document.getElementById("sequence-home");

        // Change Sequence's default options
        var options = {
            autoPlayInterval: 5000,
            autoPlay: true,
            autoPlayPauseOnHover: false,
            pagination: true
        };

        // Initiate Sequence
        var sequence1 = sequence(sequenceElement, options);
    }
};

$(document).ready(function(){bwMain.init();});