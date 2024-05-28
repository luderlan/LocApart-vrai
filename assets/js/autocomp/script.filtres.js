// autocompletion Type de Bien
function autocompletTBfiltres() {
	var min_length = 1; // nombre de caractère avant lancement recherche
	var keyword = $('#ntypeb').val();  // nom_id fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh_bien
	if (keyword.length >= min_length) {
		$.ajax({
			url: '../../php/ajax/ajax_refresh_filtreTB.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#filtres_tb_list').show();
				$('#filtres_tb_list').html(data);
			}
		});
	} else {
		$('#filtres_tb_list').hide();
	}
}

// Lors du choix dans la liste
function set_itemTBfiltres(item, item2) {
	// change input value
	$('#ntypeb').val(item);
	$('#type_bien').val(item2);
	// hide proposition list
	$('#filtres_tb_list').hide();
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