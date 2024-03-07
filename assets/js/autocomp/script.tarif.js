function autocompletTarif() {
	var min_length = 1; // nombre de caractère avant lancement recherch 
	var keyword = $('#refb').val();  // nom_id fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh
	if (keyword.length >= min_length) {
		$.ajax({
			url: '../../php/ajax/ajax_refresh.tarif.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#bien_list_id').show();
				$('#bien_list_id').html(data);
			}
		});
	} else {
		$('#bien_list_id').hide();
	}
}

// Lors du choix dans la liste
function set_item(item, item2) {
	// change input value
	$('#refb').val(item);
	$('#refb2').val(item2);
	// hide proposition list
	$('#bien_list_id').hide();
}
