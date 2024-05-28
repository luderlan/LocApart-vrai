// script.filtre.ville.js
function autocompletVille() {
    var min_length = 1; // nombre de caractères avant lancement recherche 
    var keyword = $('#ville').val();  // récupération du champ de recherche puis lancement de la recherche grâce à ajax_refresh
    if (keyword.length >= min_length) {
        $.ajax({
            url: '../../php/ajax/ajax_refresh.client.php',
            type: 'POST',
            data: { keyword: keyword },
            success: function(data) {
                $('#id_list_ville').show();
                $('#id_list_ville').html(data);
            }
        });
    } else {
        $('#id_list_ville').hide();
    }
}

// Lors du choix dans la liste
function set_item(item, item2) {
    // change input value
    $('#ville').val(item);
    $('#codeP_bien').val(item2);
    // hide proposition list
    $('#id_list_ville').hide();
}
