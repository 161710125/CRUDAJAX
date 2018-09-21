<!DOCTYPE html>
<html>
   <head>
      <title>Datatables</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>       
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
   </head>
   <body>
      <div class="container">
      <br />
      <h3 align="center">DataTables Daftar Siswa</h3>
      <br />
      <button type="button" name="add" id="Tambah" class="btn btn-primary btn-sm">Tambah</button><br>
      <table id="stud" class="table table-bordered" style="width:100%">
         <thead>
            <tr>
               <th>ID</th>
               <th>Nama Siswa</th>
               <th>Kelas</th>
               <th>Jurusan</th>
               <th>Jenis Kelamin</th>
               <th>Alamat</th>
               <th width="200px"><center>Action</center></th>
            </tr>
         </thead>
      </table>
      <ul id="pagination" class="pagination-sm"></ul>
      @include('siswa.form')
      <script type="text/javascript">
         $(function() {
         $('#stud').DataTable({
         processing: true,
         serverSide: true,
         ajax: '/json',
         columns: [
            { data: 'id', name: 'id' },
            { data: 'nama', name: 'nama' },
            { data: 'kelas', name: 'kelas' },
            { data: 'jurusan', name: 'jurusan' },
            { data: 'jk', name: 'jk' },
            { data: 'alamat', name: 'alamat' },
            { data: 'action', orderable:false, searchable: false}
         ],
         "lengthMenu": [[-1, 10, 5, 2], ["All", 10, 5, 2]]
         });
         
         $('#Tambah').click(function(){
              $('#studentModal').modal('show');
              $('#student_form')[0].reset();
              state = "insert";
            });
           $('#student_form').submit(function(e){
             $.ajaxSetup({
               header: {
                 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
               }
             });
             e.preventDefault();
             if (state == 'insert'){
             $.ajax({
               type: "POST",
               url: "{{url ('/store')}}",
               data: $('#student_form').serialize(),
               dataType: 'json',
               success: function (data){
                 console.log(data);
                 $('#studentModal').modal('hide');
                 $('#stud').DataTable().ajax.reload();
               },
               error: function (data){
                $('input').on('keydown keypress keyup click change', function(){
                  $(this).parent().removeClass('has-error');
                  $(this).next('.help-block').hide()
                });
                var coba = new Array();
                console.log(data.responseJSON.errors);
                $.each(data.responseJSON.errors,function(name, value){
                  console.log(name);
                  coba.push(name);
                  $('input[name='+name+']').parent().addClass('has-error');
                  $('input[name='+name+']').next('.help-block').show().text(value);
                });
                $('input[name='+coba[0]+']').focus();
               }
             }); 
           }else {
            $.ajax({
               type: "POST",
               url: "{{url ('/siswa/edit')}}"+ '/' + $('#id').val(),
               data: $('#student_form').serialize(),
               dataType: 'json',
               success: function (data){
                 console.log(data);
                 $('#studentModal').modal('hide');
                 $('#stud').DataTable().ajax.reload();
               },
               error: function (data){
                $('input').on('keydown keypress keyup click change', function(){
                  $(this).parent().removeClass('has-error');
                  $(this).next('.help-block').hide()
                });
                var coba = new Array();
                console.log(data.responseJSON.errors);
                $.each(data.responseJSON.errors,function(name, value){
                  console.log(name);
                  coba.push(name);
                  $('input[name='+name+']').parent().addClass('has-error');
                  $('input[name='+name+']').next('.help-block').show().text(value);
                });
                $('input[name='+coba[0]+']').focus();
               }
             }); 
           }
             
           });

         $(document).on('click', '.delete', function(){
        var dele = $(this).attr('id');
        if(confirm("Apakah Anda Yakin Menghapus Data Ini?"))
        {
            $.ajax({
                url:"{{route('delete')}}",
                method:"get",
                data:{id:dele},
                success:function(data)
                {
                    alert(data);
                    $('#stud').DataTable().ajax.reload();
                }
            })
        }
        else
        {
            return false;
        }
    }); 
       });

         $(document).on('click', '.edit', function(){
        var edit = $(this).data('id');
        $('#form_output').html('');
        $.ajax({
            url:"{{url('getedit')}}" + '/' + edit,
            method:'get',
            data:{id:edit},
            dataType:'json',
            success:function(data)
            {
              console.log(data);
                state = "update";
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                if(data.jk == 'Laki-Laki'){
                  $('#l').prop('checked',true);
                }else{
                  $('#p').prop('checked',true);
                }
                $('#nama').val(data.nama);
                $('#kelas').val(data.kelas);
                $('#jurusan').val(data.jurusan);
                $('#jk').val(data.jk);
                $('#alamat').val(data.alamat);
                $('#student_id').val(edit);
                $('#studentModal').modal('show');
                $('#aksi').val('Edit');
                $('.modal-title').text('Edit Data');
            }
        })
    });
      </script>
   </body>
</html>