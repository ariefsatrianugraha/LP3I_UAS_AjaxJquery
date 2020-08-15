<script>

    $(document).ready(function(){
        let mode = 'get';

        $.fn.getData = function(){
            $.ajax({
                url:'<?php echo API_URL ?>/member/proses.php',
                type: 'POST',
                data: {mode: mode},
                dataType: 'json',
                success:function(hasil){
					let row="";
					let nomor=1;
					
					for(let i=0; i<hasil.length; i++){
						let member = JSON.stringify(hasil[i]);
						
                        row +="<tr data-member='"+member+"'>";
						row +="<td>"+nomor+"</td>";
						row +="<td>"+hasil[i].nim+"</td>";
						row +="<td>"+hasil[i].nama+"</td>";
						row +="<td>"+hasil[i].telepon+"</td>";
						row +="<td>"+hasil[i].alamat+"</td>";
                        row +="<td><button data-member='"+member+"' onclick='$(this).deleteRow()'> Delete </button></td>";
                        row +="<td><button data-member='"+member+"' onclick='$(this).editRow()' data-toggle='modal' data-target='#myModal'> Edit </button></td>";
						row +="</tr>";
						
						nomor++
					}
					
					$('#tbl_member').html(row)
				    }
            })
        }

        $(this).getData();

        $.fn.saveData= function(){
            let parameter={
                id:$('#tid').val(),
                nim:$('#tnim').val(),
                nama:$('#tnama').val(),
                telepon:$('#ttelepon').val(),
                alamat:$('#talamat').val(),
                mode:mode
            }

            $.ajax({
                url:'<?php echo API_URL ?>member/proses.php',
                data:parameter,
                type:'POST',
                dataType:'json',
                success:function(hasil){
                    $('#exampleModal').modal('toggle')

                    Swal.fire({
                        title: 'Succsess',
                        text: hasil.messages,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                    
                    mode='get';
                    $(this).getData();
                }
            });
        }

        $.fn.editRow = function(){
            let data = $(this).data('member');
            $('#tid').val(data.id);
            $('#tnim').val(data.nim);
            $('#tnama').val(data.nama);
            $('#ttelepon').val(data.telepon);
            $('#talamat').val(data.alamat);
        }

        $('#btnsave').click(function(){
			let id = $('#tid').val();
			
			if(id !='')
				mode='update';
			else
				mode='add';

			$(this).saveData();
		});
        
        $.fn.ClearForm= function(){
            $('#tid').val('')
            $('#tnim').val('')
            $('#tnama').val('')
            $('#ttelepon').val('')
            $('#talamat').val('')
        }

        $('#btnadd').click(function(){
            $(this).ClearForm();
        });

        $.fn.deleteRow = function(){
            mode='delete';
            let data = $(this).data('member');
            let _this = $(this).parents("tr");
            $.ajax({
                url:'<?php echo API_URL ?>member/proses.php',
                dataType:'json',
                type:'POST',
                data:{id:data.id,mode:mode},
                success:function(res){
                    
                }
            });
            _this.fadeOut(200,function() {
                _this.remove();
            });
        }

        

	});
</script>