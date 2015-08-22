
$(document).ready(function(){
$(function(){
$("#table").tablesorter();
});
});



        $("#btnExport").click(function () {
            $("#table").btechco_excelexport({
                containerid: "table",
                 datatype: $datatype.Table
            });
        });
 
