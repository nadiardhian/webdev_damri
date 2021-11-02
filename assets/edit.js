
$.ajax({
	url: base_url + '/api/kab'
}).done(function(res){
	
	$('#asal').empty();
	$('#tujuan').empty();
	
	res.results.forEach(function(index){
		$('#asal').append(`<option value="${index.nama}">${index.nama}</option>`);
		$('#tujuan').append(`<option value="${index.nama}">${index.nama}</option>`);
	});
	
}).done(function(){
	$('#asal').val(_data_.asal).trigger('change');
	$('#tujuan').val(_data_.tujuan).trigger('change');
	
	$('#asal').select2();
	$('#tujuan').select2();
	
});
