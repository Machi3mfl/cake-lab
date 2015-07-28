$(function() {

function cargar_change(modelo_padre, modelo_hijo, path, other_field) {
	$(document).on('change', 'select[id*=UploadCopias][id*=' + modelo_padre + ']', function(event) {
		var key,
			option,
			modelo_padre_id,
			position,
			other_value,
			url;

		position = $(this).attr('id').replace('UploadCopias', '').replace(modelo_padre, '');

		$('#UploadCopias' + position + modelo_hijo).html('');
		$('#UploadCopias' + position + modelo_hijo).change();

		if (event.target !== null) {
			
			modelo_padre_id = $(this).val();
			url = base_url + path + modelo_padre_id;

			if (typeof other_field != 'undefined') {
				other_value = 	$('#UploadCopias' + position + other_field).val();
				url += '/' + other_value;
			}

			$.get(url, function(data) {
				

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

cargar_change('Categoria', 'Papel', '/Productos/superficies_by_category/');
cargar_change('Papel', 'Tamano', '/Productos/tamano_by_superficie/', 'Categoria');

});