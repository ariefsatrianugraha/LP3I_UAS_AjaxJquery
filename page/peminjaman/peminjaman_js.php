<script>
    $(document).ready(function(){

        $('.datepicker_pinjam').datepicker({
            onSelect: function(dateText,inst){
                $(".datepicker_pengembalian").datepicker('option','minDate','dateText');
            }
        });

        $('.datepicker_pinjam').datepicker('option','dateFormat','yy-mm-dd');

        $('.datepicker_pengembalian').datepicker({
            dateFormat: 'yy-mm-dd'
        })

        $.ajax({
            url: '<?php echo API_URL ?>/member/proses.php',
            data: {mode:'get'},
            dataType:'json',
            type: 'POST',
            success:function(result){
                let option = "<option value=''>~~ PILIH ~~</option>";
                for(let i=0; i < result.length ; i++){
                    
                    option += "<option value='"+result[i].nama+"'>"+result[i].nama+"</option>";
                }
                $('#nama_pinjam').html(option);
            }
        });

        $.ajax({
            url: '<?php echo API_URL ?>/buku/proses.php',
            data: {mode : 'get'},
            dataType : 'json',
            type : 'POST',
            success:function(result){
                let option = "<option value=''>~~ PILIH ~~</option>";
                for(let i = 0; i<result.length ; i++){
                    option += "<option valu'"+result[i].idbuku+"'>"+result[i].judul+"</option>";
                }
                $('#judul_buku').html(option);
            }
        })

        let = 0;
        $('#btnProses').click(function(){

            let no = 1;
            var name = $('#nama_pinjam').val();
            var tanggal_pinjam = $('#tanggal_pinjam').val();
            var tanggal_pengembalian = $('#tanggal_pengembalian').val();
            var judul_buku = $('#judul_buku').val();
            var jumlah_pinjam = $('#jumlah_pinjam').val();

            var isi = `<tr><td>${no}</td><td>${name}</td><td>${tanggal_pinjam}</td><td>${tanggal_pengembalian}</td><td>${judul_buku}</td><td>${jumlah_pinjam}</td>`;

            $('table tbody').append(isi);
        })

        $.fn.clearForm= function (){
			$('#nama_pinjam').val('');
            $('#tanggal_pinjam').val('');
            $('#tanggal_pengembalian').val('');
            rowItem = [];
			$(this).showItem();
		}

        $('#btnTambah').click(function(){
            let data = {
                mode       : 'add',
                peminjam  : $('#nama_pinjam').val(),
                tglpinjam : $('#tanggal_pinjam').val(),
                tglkembali: $('#tangal_pengembalian').val(),
                detail    : rowItem 
            }
            
            $.ajax({
                url:'<?php echo API_URL ?>peminjaman/proses.php',
                data:data,
                dataType:'json',
                type:'POST',
                success:function(res){
                    let title = (res.status==true)?"Success":"Error";
                    let icon = (res.status==true)?"success":"error";
                    $(this).clearForm();
					
					Swal.fire({
                        title: title,
                        text: res.messages,
                        icon: icon,
                        confirmButtonText: 'Ok'
                    });
                }
            });
        });
    })

</script>