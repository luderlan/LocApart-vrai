function autocompletReseClient() {
	var min_length = 1; // nombre de caractère avant lancement recherch 
	var keyword = $('#id_client').val();  // nom_id fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh
	if (keyword.length >= min_length) {
		$.ajax({
			url: '../../php/ajax/ajax.reseClient.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#clientRese').show();
				$('#clientRese').html(data);
			}
		});
	} else {
		$('#clientRese').hide();
	}
}

// Lors du choix dans la liste
function set_itemCliRese(item, item2) {
	// change input value
	$('#id_client').val(item);
	$('#id_client2').val(item2);
	// hide proposition list
	$('#clientRese').hide();
}



function autocompletReseBien() {
	var min_length = 1; // nombre de caractère avant lancement recherch 
	var keyword = $('#id_bien').val();  // nom_id fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh
	if (keyword.length >= min_length) {
		$.ajax({
			url: '../../php/ajax/ajax.reseBien.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#bienRese').show();
				$('#bienRese').html(data);
			}
		});
	} else {
		$('#bienRese').hide();
	}
}

// Lors du choix dans la liste
function set_itemBienRese(item, item2) {
	// change input value
	$('#id_bien').val(item);
	$('#id_bien2').val(item2);
	// hide proposition list
	$('#bienRese').hide();
}