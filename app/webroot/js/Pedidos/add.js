$(function() {

	$(document).on('change', 'select[id*=UploadCopias][id*=Categoria]', function(event) {
		var key,
			option,
			categoria_id,
			position;

		position = $(this).attr('id').replace('UploadCopias', '').replace('Categoria', '');

		$('#UploadCopias' + position + 'Papel').html('');
		if (event.target !== null) {
			

			categoria_id = $(this).val();
			$.get(base_url + '/CategoriaSuperficies/superficies_by_category/' + categoria_id, function(data) {
				

				for (key in data) {
					option = $('<option>', {
						value: key,
						text: data[key]
					});
					$('#UploadCopias' + position + 'Papel').append(option);
				}
			}, 'json');
		}
	});
});