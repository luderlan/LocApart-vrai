// autocompletion Type de Bien
function autocompletBien() {
	var min_length = 1; // nombre de caractère avant lancement recherche
	var keyword = $('#id_type_bien').val();  // nom_id fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh_bien
	if (keyword.length >= min_length) {
		$.ajax({
			url: '../../php/ajax/ajax_refresh_bien.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#type_list_id').show();
				$('#type_list_id').html(data);
			}
		});
	} else {
		$('#type_list_id').hide();
	}
}

// Lors du choix dans la liste
function set_itemTB(item, item2) {
	// change input value
	$('#id_type_bien').val(item);
	$('#id_type_bien2').val(item2);
	// hide proposition list
	$('#type_list_id').hide();
}

// autocompletion Ville 
function autocompletVilleBien() {
	var min_length = 1; // nombre de caractère avant lancement recherch 
	var keyword = $('#vil_bien').val();  // nom_id fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh
	if (keyword.length >= min_length) {
		$.ajax({
			url: '../../php/ajax/ajax_refresh_bien_aj_ville.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#aj_ville').show();
				$('#aj_ville').html(data);
			}
		});
	} else {
		$('#aj_ville').hide();
	}
}

// Lors du choix dans la liste
function set_itemComm(item,item2) {
	// change input value
	$('#vil_bien').val(item);
	$('#codeP_bien').val(item2);
	// hide proposition list
	$('#aj_ville').hide();
}