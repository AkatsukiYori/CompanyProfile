<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitra</title>
</head>
<body>
    <div id="wrapper">
    @include('layouts/app2')

        <div class="content-page">
            <div class="content">

                <!-- Start -->
                <div class="container-fluid">
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
                                <div class="card-header mb-1">
                                    <h2>Mitra</h2>
                                </div>
                                <button type="button" class="btn btn-primary tambah" data-toggle="modal" data-target="mitraModal">
                                    Tambah Mitra
                                </button>
                                <div class="card-body">

                                    <table id="mitraTable" width="100%" class="table table-bordered dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Media</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                            <tbody>
                                                @foreach ($mitras as $mitra)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$mitra->name}}</td>
                                                    <td>
                                                        <img src="{{ asset('/storage/mitra/'.$mitra->media->name) }}" width="150" alt="">
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-warning btnEdit rounded" id="{{$mitra->id}}"><i class="fa fa-pencil mr-1"></i> Edit</button>

                                                        <button class="btn btn-danger btnDelete rounded" id="{{$mitra->id}}" value="{{$mitra->media->id}}"><i class="fa fa-trash mr-1"></i> Delete</button>
                                                    </td>
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
    <div class="modal fade" id="mitraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mitra</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="DataMitra" enctype="multipart/form-data" action="{{ route('mitra') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" parsley-trigger="change" name="name" id="name" placeholder="Masukan nama mitra">
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control dropify" parsley-trigger="change" id="image" name="image" data-allowed-file-extensions="png jpg jpeg" accept=".jpg, .png, .jpeg">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal edit-->
    <div class="modal fade" id="mitraModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelEdit" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelEdit">Tambah Data Mitra</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="DataMitraEdit" enctype="multipart/form-data" action="{{ route('mitra-update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nameEdit">Name</label>
                            <input type="hidden" name="mitraID" id="mitraID">
                            <input type="hidden" name="imageName" id="imageName">
                            <input type="hidden" name="mediaID" id="mediaID">
                            <input type="text" class="form-control" parsley-trigger="change" name="nameEdit" id="nameEdit" placeholder="Masukan nama mitra">
                        </div>
                        <div class="form-group">
                            <label for="imageEdit">Foto</label>
                            <input type="file" class="form-control dropify" parsley-trigger="change" id="imageEdit" name="imageEdit" data-allowed-file-extensions="png jpg jpeg" accept=".jpg, .png, .jpeg">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#image').dropify();
            $('#imageEdit').dropify();
            $('#mitraTable').DataTable();

            $(document).on('click','.tambah',function(e) {
                $('#mitraModal').modal('show');
            });


            $(document).on('click','.btnEdit',function(e) {
                var id = $(this).attr('id');
                $.ajax({
                    method:"get",
                    url:"/mitra-edit/"+id,
                    success:function(response){
                        // console.log(response);
                        $('#mitraID').val(response[0].id);
                        $('#nameEdit').val(response[0].name);
                        $('#imageName').val(response[0].media.name);
                        $('#mediaID').val(response[0].media_id);
                        var lokasi_gambar = "{{ asset('storage/mitra') }}"+'/'+response[0].media.name;
                        var fileDropper = $("#imageEdit").dropify({
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
                });
                $('#mitraModalEdit').modal('show');
            });




            $(document).on('click','.btnDelete',function(e){
                var id=$(this).attr('id');
                var media_id=$(this).attr('value');
                // console.log(id, media_id);
                var data = {
                            'id': id,
                            'media_id': media_id,
                };
                // location.href = "/mitra-delete/"+data;
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
                            url : '/mitra-delete/'+id,
                            data : data,
                            success: function(data) {
                                swal.fire({
                                    type: 'success',
                                    title:"Berhasil Dihapus",
                                    confirmButtonText: 'Yakin',
                                }).then((result) => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
            });


        });
    </script>
</body>
</html>