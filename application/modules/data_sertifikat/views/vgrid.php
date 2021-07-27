		
		

          <table id="datatableTable" class="table table-striped table-bordered table-hover table-condensed display" width="100%">
              <thead>
                 <tr>
					<th></th>
					<th>Id</th>
					<th width="5%">No</th>
					<th>Judul</th>
					<th>Category</th>
					<th width="10%">Status</th>
					<th>Date post</th>
					<th>User</th>
					<th></th>
                 </tr>
              </thead>
           </table>
       
		  
		<script type="text/javascript">
			var dataTable = $('#datatableTable').DataTable( {			
			"processing": true,
			"language": {
				"processing": '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> <br><b style="color:white;background:#33AFFF">Data sedang di tampilkan..</b>',
				  "oPaginate": {
					"sFirst": "Halaman Pertama",
					"sLast": "Halaman Terakhir",
					 "sNext": "Selanjutnya",
					 "sPrevious": "Sebelumnya"
					 },
				"sInfo": "Total Data :  _TOTAL_ dan ini (_START_ - _END_)",
				"sInfoEmpty": "Tidak ada data yang di tampilkan",
				"sZeroRecords": "Data tidak atau belum tersedia, silahkan hubungi administrator",
				"sLengthMenu": "&nbsp;&nbsp; Show   _MENU_ entries &nbsp;&nbsp;",
				"select": {
					rows: ''
				}
			},
			"serverSide": true,
			"searching": true,
			"responsive": true,
			"dom": 'Blfrtip',
			"buttons": [
				{
					text:'<span class="fa fa-trash"></span> Delete',
					className :"btn btn-default btn-sm delsel"
				},
				{
					extend: 'excelHtml5',
					exportOptions: { columns: [ 1,2,3,4,5,6] },
					text:'<span class="fa fa-file-excel-o"></span> Excel',
					className :"btn btn-default btn-sm"
				},
				{
					extend: 'csvHtml5',
					exportOptions: { columns: [ 1,2,3,4,5,6] },
					text:'<span class="fa fa-file-archive-o "></span> CSV ',
					className :"btn btn-default btn-sm"
				},
				{
					extend: 'colvis',
					text:'<span class="fa fa-columns "></span> Kolom ',
					className :"btn btn-default btn-sm",
					columns: ':gt(1)'
				}
			],
			'columnDefs': [{
			    'targets': [0],
				'orderable': false,
				'searchable': false,
                'width': '1%',
				'checkboxes': {
					'selectRow': true,
				},
			},
			{
                "targets": [1],
                "visible": false,
                "searchable": false
			}],
			"select": {
				style:    'multi',
				selector: 'td:first-child'
			},
			'order': [[1, 'asc']],
			"ajax":{
				url : site_url+"ablog/data_tampil", 
				type: "post", 
				"data": function ( data ) {
				 data.f_category = $('#f_category').val();
				 data.f_status = $('#f_status').val();
				}
				},
				"rowCallback": function( row, data ) {
				}
			});
		
		//$(document).on('input change', '#f_category', function (event, messages) {			
			//dataTable.ajax.reload(null,false);	 	
       // });

</script>
		  
    
		
	

	

					
			
		
	

					
			
