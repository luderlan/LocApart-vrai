// autocompletion
function autocomplet() {
	var min_length = 1; // nombre de caractère avant lancement recherch 
	var keyword = $('#id_bien').val();  // nom_id fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh
	if (keyword.length >= min_length) {
		$.ajax({
			url: '../ajax/ajax_refresh.photo.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#id_list_bien').show();
				$('#id_list_bien').html(data);
			}
		});
	} else {
		$('#id_list_bien').hide();
	}
}

// Lors du choix dans la liste
function set_item(item) {
	// change input value
	$('#id_bien').val(item);
	// hide proposition list
	$('#id_list_bien').hide();
}