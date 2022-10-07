/* Appel jQuery plugin dataTables pour gérer les données des tables
 -filtre
 - ordre
 -...
 */
$(document).ready(function() {
    $('#dataTable-list_etd').DataTable();
    $('#dataTable-list_ens').DataTable();
    $('#dataTable-list_sess_eval').DataTable();
});

/*
 fonction pour gérer l'affichage exclusive des différentes sessions
 */
function afficher_user(actuel)
{
    var actif = $('#add_user .actuel');
    $('.'+actuel).css('display', 'block');
    $('.'+actuel).addClass('actuel');
    actif.removeClass('actuel');
    actif.css('display', 'none');
}

function active_sess_eval(actuel)
{
    var actif = $('#session_eval .actuel');
    $('.'+actuel).css('display', 'block');
    $('.'+actuel).addClass('actuel');
    actif.removeClass('actuel');
    actif.css('display', 'none');
}

function affichage_ok()
{
    if(affichage('section-dash1'))
    {
        alert("ok");
        affichage('section-dash1');
    }
}
function affichage(actuel){

    var actif = $('.actuel');
    var current_li = $('.nav-item');
    var current_a = $('.collapse-item');

    /**
     * Gestion de l'affichage des différentes sessions
     */
    if($('.'+actuel).hasClass('actuel')){
        return;
    }else{
        $(this).addClass('active');
        $('.'+actuel).css('display', 'block');
        $('.'+actuel).addClass('actuel');
        actif.removeClass('actuel');
        actif.css('display', 'none');
    }

    /**
     * Gestion de la surbrillance sur les menus de la sidebar
     */
    current_li.click(function(){
        if(current_li.hasClass('active'))
        {
            current_li.removeClass('active');
        }
        $(this).addClass('active');
        //  current_a.addClass('active');
        current_a.click(function() {
            if(current_a.hasClass('active'))
            {
                current_a.removeClass('active');
            }
            $(this).addClass('active');
        });
    });

    return true;

}
