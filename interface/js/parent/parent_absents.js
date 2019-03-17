/**
 * Created by Jr on 28/06/2017.
 */

var parentAbsent = function () {

    var handleTable = function() {
        var table = $('#table_absent');

        table.DataTable($.extend(mainInterface.defaultDatatable, {order: [[2, 'desc']]}));
    };

    return {
        init: function(){
            handleTable();
        }
    };
}();

$(document).ready(function(){parentAbsent.init();});