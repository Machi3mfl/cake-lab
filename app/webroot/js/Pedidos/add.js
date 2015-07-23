$(function() {

function cargar_change(modelo_padre, modelo_hijo, url) {
	$(document).on('change', 'select[id*=UploadCopias][id*=' + modelo_padre + ']', function(event) {
		var key,
			option,
			modelo_padre_id,
			position;

		position = $(this).attr('id').replace('UploadCopias', '').replace(modelo_padre, '');

		$('#UploadCopias' + position + modelo_hijo).html('');
		$('#UploadCopias' + position + modelo_hijo).change();
		if (event.target !== null) {
			

			modelo_padre_id = $(this).val();
			$.get(base_url + url + modelo_padre_id, function(data) {
				

				for (key in data) {
					option = $('<option>', {
						value: key,
						text: data[key]
					});
					$('#UploadCopias' + position + modelo_hijo).append(option);
				}

				$('#UploadCopias' + position + modelo_hijo).change();
			}, 'json');
		}
	});
}
cargar_change('Categoria', 'Papel', '/CategoriaSuperficies/superficies_by_category/');
cargar_change('Papel', 'Tamano', '/SuperficieTamanos/tamano_by_superficie/');

});