/*
	$('#asal').select2({
		ajax:{
			url: base_url + 'api/kab'
		}
	})
	url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi'
*/

$.ajax({
	url: base_url + '/api/kab'
}).done(function(res){
	
	$('#asal').empty();
	$('#tujuan').empty();
	
	res.results.forEach(function(index){
		$('#asal').append(`<option>${index.nama}</option>`);
		$('#tujuan').append(`<option>${index.nama}</option>`);
	})
}).done(function(){
	$('#asal').select2();
	$('#tujuan').select2();
});

