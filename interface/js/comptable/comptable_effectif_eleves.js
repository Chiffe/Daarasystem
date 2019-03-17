/**
 * Created by Jr on 28/06/2017.
 */

/**
 * Created by Jr on 20/04/2015.
 */

var comptableEffectifEleve = function () {
    var handleTable = function() {
        var table = $('.table');

        table.DataTable($.extend(mainInterface.defaultDatatable, {paging: false, searching: false, stateSave: true, info: false}));
    };

    return {
        init: function(){
            handleTable();
        }
    };
}();

$(document).ready(function(){comptableEffectifEleve.init();});