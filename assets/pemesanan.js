var tbl    = $('#tbl')
var _trash = null;

function showing()
{
	let no = 0;
	
	tbl.DataTable({
		info:false,
		responsive:false,
		lengthChange:true,
		ajax:{
			url: base_url+'api/data'
		},
		columns:[
			{
				render:function(){
					no++;
					return no;
				}
			},
			{'data':'asal'},
			{'data':'tujuan'},
			{'data':'seat'},
			{
				render:function(a,b,c){
					return c.tglJadwal.toLocaleString()+' '+c.jamKeberangkatan.toLocaleString()
				}
			},
			{
				render:function(a,b,c){
					return `
						<a href="${base_url}dashboard/edit/${c.id}" class="btn btn-warning">
							<i class="fa fa-edit"></i>
						</a>
						<button class="btn btn-primary" onClick="handleDetails(${c.id})">
							<i class="fa fa-eye"></i>
						</button>
						<button class="btn btn-danger" onClick="handleTrash(${c.id})"><i class="fa fa-trash"></i></button>
					`;
				}
			}
		]
	});
}
function handleDetails(id)
{
	$.ajax({
		url: base_url + 'api/find/'+id
	}).done(function(res){
		
		$('#asal').empty().append(res.asal);
		$('#tujuan').empty().append(res.tujuan);
		$('#jadwal').empty().append(res.tglJadwal);
		$('#waktu').empty().append(res.jamKeberangkatan);
		$('#kursi').empty().append(res.seat);
		$('#biaya').empty().append(res.harga.toLocaleString());
		
		$('#modal-detail').modal('show');
	});
}

function handleTrash(id)
{
	$('#modal-trash').modal('show');
	_trash = id;
}

function doTrash()
{
	if (_trash != null) {
		
		$.ajax({
			url: base_url + 'dashboard/delete/'+_trash
		}).done(function(){
			window.location = window.location.href;
		})
	}
}

showing();
