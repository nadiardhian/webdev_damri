var _tbl    = $('#tbl-user');
var _trash = null;

function showing()
{
	let no = 0;
	
	_tbl.DataTable({
		info:false,
		lengthChange:true,
		ajax:{
			url: base_url+'api/dataUser'
		},
		columns:[
			{
				render:function(){
					no++;
					return no;
				}
			},
			{'data':'username'},
			{'data':'email'},
			{
				render:function(a,b,c){
					return `
						<a href="${base_url}dashboard/editUser/${c.username}" class="btn btn-warning">
							<i class="fa fa-edit"></i>
						</a>
						<button onClick="handleTrash('${c.username}')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
					`;
				}
			}
		]
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
			url: base_url + 'dashboard/deleteUser/'+_trash
		}).done(function(){
			window.location = window.location.href;
		})
	}
}

showing();
