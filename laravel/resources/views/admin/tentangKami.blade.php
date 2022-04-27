<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang | Kita Serba Digital</title>
</head>
<body>
    <div id="wrapper">
    @include('layouts/app2')
        <div class="content-page">
            <div class="content">

                <!-- Start -->
                <div class="container-fluid">
                    <br>
                    @if (session('success'))
	    			<div class="alert alert-success alert-dismissable">
	    				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                    <strong>Berhasil!</strong>  {{ session('success') }}
	                </div>
	    			@endif

					@if($errors->any())
					<div class="alert alert-error alert-dismissable bg-danger text-white">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<strong>Gagal!</strong> {!! implode('', $errors->all('<div>:message</div>')) !!}
					</div>
					@endif
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="card-box table-responsive">
                                <div class="card-header">
                                    <h2>Tentang Kami</h2>
                                </div>
                                <button type="button" class="btn btn-primary tambah float-right" data-toggle="modal" data-target="tentangModal" style="margin-top: -4.5%;">
                                    Tambah isi
                                </button>
                                <div class="card-body">

                                    <table id="tentangTable" width="100%" class="table table-bordered dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Media</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                            <tbody>
                                                @foreach ($tentang as $ttg)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$ttg->judul}}</td>
                                                    <td><?= $ttg->deskripsi ?></td>
                                                    <td>
                                                        @if($ttg->media == null)
                                                        <h3>Tidak ada gambar</h3>
                                                        @else
                                                            <img src="{{ asset('/storage/tentang/'.$ttg->media->name) }}" width="150" alt="">
                                                        @endif
                                                    </td>
                                                    <td><button class="btn btn-warning btnEdit rounded" id="{{$ttg->id}}"><i class="fa fa-pencil mr-1"></i> Edit</button>
                                                        <button class="btn btn-danger btnDelete rounded" id="{{$ttg->id}}" value="{{$ttg->media->id}}"><i class="fa fa-trash mr-1"></i> Delete</button></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                    </table>                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal add-->
<div class="modal fade" id="tentangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="DataAbout" enctype="multipart/form-data" action="/tentang-store" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="Judul">Judul</label>
                        <input type="text" class="form-control" parsley-trigger="change" name="judul_tentang" id="judul_tentang" >
                    </div>
                    <div class="form-group">
                        <label for="Gambar">Gambar</label>
                        <input type="file" class="form-control dropify" parsley-trigger="change" id="gambar" name="gambar" >
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control ckeditor" id="deskripsi" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="tentangModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="DataAbout" enctype="multipart/form-data" action="/tentang-update" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="editID" id="editID">
                        <input type="hidden" name="Filename" id="Filename">
                        <input type="hidden" name="mediaID" id="mediaID">
                        <label for="Judul">Judul</label>
                        <input type="text" class="form-control" parsley-trigger="change" name="judul_tentang" id="judul_tentang_edit" required>
                    </div>
                    <div class="form-group">
                        <label for="Gambar">Gambar</label>
                        <input type="file" class="form-control dropify" parsley-trigger="change" id="gambar_edit" name="gambar">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi_edit" class="form-control ckeditor" id="deskripsi_edit" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#gambar').dropify();
        $('#gambar_edit').dropify();
        $('#tentangTable').DataTable();

        $(document).on('click','.tambah',function(e){
            $('#tentangModal').modal('show');
        })

        $(document).on('click','.btnEdit',function(e){
            var id = $(this).attr('id');
            $.ajax({
                method:"get",
                url:"/tentang-edit/"+id,
                success:function(response){
                    console.log('Data Berhasil Didapatkan');
                    $('#judul_tentang_edit').val(response[0].judul);
                    $('#editID').val(response[0].id);
                    $('#Filename').val(response[0].media.name);
                    $('#mediaID').val(response[0].media_id);
                    
                    CKEDITOR.instances['deskripsi_edit'].setData(response[0].deskripsi);
                    if(response[0].media ==null){
                        $('#gambar_edit').attr("required")
                    }else{
                        var lokasi_gambar = "{{ asset('storage/tentang') }}"+'/'+response[0].media.name;
                        var fileDropper = $("#gambar_edit").dropify({
                            messages: { default: "Seret dan lepas logo di sini atau klik", replace: "Seret dan lepas logo di sini atau klik", remove: "Remove", error: "Terjadi kesalahan" },
                            error: { fileSize: "Ukuran file gambar terlalu besar (Maksimal 5 MB)" },
                        });
    
                        fileDropper = fileDropper.data('dropify');
                        fileDropper.resetPreview();
                        fileDropper.clearElement();
                        fileDropper.settings['defaultFile'] = lokasi_gambar;
                        fileDropper.destroy();
                        fileDropper.init();    
                    }
                }
            })
            $('#tentangModalEdit').modal('show');
        })
        $(document).on('click','.btnDelete',function(e){
            var id=$(this).attr('id');
            var media_id=$(this).attr('value');
            var data = {
                        'id': id,
                        'media_id': media_id,
                    };
            Swal.fire({
            title: 'Are you sure?',
            text: "Yakin untuk menghapus data?",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yakin'
            }).then((result) => {
                if(result.value) {
                    $.ajax({
                        method:'get',
                        url : '/tentang-delete/'+id,
                        success: function(data) {
                            swal.fire({
                                type: 'success',
                                title:"Berhasil Dihapus",
                                confirmButtonText: 'Yakin',
                            }).then((result) => {
                                location.reload();
                            })
                        }
                    })
                }
            })
        })
    }); 
</script>
</body>
</html>