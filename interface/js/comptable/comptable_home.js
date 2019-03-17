var comptableHome = function () {
    var urls = {
        "getDataCheckout":  "url_pour_avoir_les_data_graphique_checkout"
    };

    var handleEChartsCheckout = function() {
        //En attente des données
        App.blockUI({
            target: $('#echarts_checkout').closest('.portlet-body'),
            animate: true
        });
        //Init eCharts
        var myChart = echarts.init(document.getElementById('echarts_checkout'));

        //!!!!!!!!!!!!!!!!!!!!!!!!!! Requête AJAX à la place !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        //On simule le retour AJAX, retourner la date d'aujourd'hui et le montant des 2 valeurs en respectant l'ordre : Scolarité | Banque
        // Utiliser urls.getDataCheckout
        mainInterface.ajaxRequest('../response_ajax.php', {compte:'comptable', action:'echarts_checkout'}, function(resAjax){
            if(resAjax.success){
                //Calcul de l'ecart (Encaisse - Versé) et affectation dans le span prévu pour
                $('#counterup_ecart').attr('data-value', (resAjax.sum.encaisse - resAjax.sum.verse));
                //Affectation des autres valeurs
                $('#counterup_encaisse').attr('data-value', resAjax.sum.encaisse);
                $('#counterup_verse').attr('data-value', resAjax.sum.verse);

                myChart.setOption({
                    tooltip: {
                        trigger: 'axis',
                        formatter: function(params){
                            //Calcul ecart
                            var ecart = params[0].value - params[1].value;
                            //Nom de la catégorie (axe x)
                            var html = params[0].axisValueLabel+'<br/>';
                            //Valeur de "Encaissé"
                            html+= params[0].marker+params[0].seriesName+' : '+params[0].value+'<br/>';
                            //Valeur de "Versé"
                            html+= params[1].marker+params[1].seriesName+' : '+params[1].value+'<br/>';
                            //Ecart
                            html+= 'Ecart : '+ecart;

                            return html;
                        }
                    },
                    legend: {
                        orient: 'vertical',
                        left: 'left',
                        data: ['Encaissé', 'Versé']
                    },
                    xAxis: [{
                        type: 'category',
                        data: resAjax.mois,
                        splitArea: {
                            show: true
                        }
                    }],
                    yAxis: [{
                        type: 'value',
                        splitArea: {
                            show: true
                        }
                    }],
                    series: [{
                        name: 'Encaissé',
                        type: 'bar',
                        itemStyle: {
                            normal: {
                                color: '#1d9d38'
                            }
                        },
                        data: resAjax.data[0]
                    }, {
                        name: 'Versé',
                        type: 'bar',
                        itemStyle: {
                            normal: {
                                color: '#E87E04'
                            }
                        },
                        data: resAjax.data[1]
                    }]
                });

                //On active le counterup
                $(".counterup_checkout").counterUp({
                    delay: 10,
                    time: 2500
                });
            }
            //On désactive le loading
            App.unblockUI($('#echarts_checkout').closest('.portlet-body'));
        });
        //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    };

    return {
        init: function(){
            handleEChartsCheckout();
        }
    };
}();

$(document).ready(function(){comptableHome.init();});