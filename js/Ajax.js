$(document).ready(function(){
    chargecategorie();
});

function chargecategorie(){
    $.get("categorie.php",function(rep){
        $("#divCat").html(rep);
        $("#cats").change(function(){
            chargeProduit($(this).val());
        });
    });
}

function getparam(idc){
    let param= new URLSearchParams(window.location.search);
    return param.get(idc);
}

function chargeProduit(idc){
    $.get("prod.php?idCat="+idc,"id="+getparam("id"),function(rep){
        $("#divProduits").html(rep);
    });
}