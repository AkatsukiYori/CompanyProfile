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
					<div class="alert alert-error alert-dismissable">
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
                                <button type="button" class="btn btn-primary tambah" data-toggle="modal" data-target="tentangModal">
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
                                                    <td>{{$ttg->judul_id}}</td>
                                                    <td><?= $ttg->deskripsi ?></td>
                                                    <td>
                                                        @if($ttg->media == null)
                                                        <h3>Tidak ada gambar</h3>
                                                        @else
                                                            <img src="{{ asset('/storage/tentang/'.$ttg->media->name) }}" width="150" alt="">
                                                        @endif
                                                    </td>
                                                    <td><button class="btn btn-warning btnEdit">Edit</button></td>
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
                        <input type="text" class="form-control" parsley-trigger="change" name="judul_tentang" id="judul_tentang" required>
                    </div>
                    <div class="form-group">
                        <label for="Gambar">Gambar</label>
                        <input type="file" class="form-control dropify" parsley-trigger="change" id="gambar" name="gambar" required>
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
                        <input type="text" class="form-control" parsley-trigger="change" name="judul_tentang" id="judul_tentang" required>
                    </div>
                    <div class="form-group">
                        <label for="Gambar">Gambar</label>
                        <input type="file" class="form-control dropify" parsley-trigger="change" id="gambar" name="gambar" required>
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
<script>
    $(document).ready(function() {
        $('#gambar').dropify();
        CKEDITOR.replace('#deskripsi');
        $('#tentangTable').DataTable();

        $(document).on('click','.tambah',function(e){
            $('#tentangModal').modal('show');
        })
    });
</script>
</body>
</html>