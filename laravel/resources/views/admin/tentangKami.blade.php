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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box table-responsive">
                                <div class="card-header">
                                    <h2>Tentang Kami</h2>
                                </div>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="tentangModal">
                                    Tambah isi
                                </button>

                                <table id="tentangkamiTable" class="table table-bordered dt-responsive nowrap table-striped" width="100%">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Judul Tentang Kami</td>
                                            <td>Gambar</td>
                                            <td>Deskripsi</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
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
            <div class="modal-body">
                <form id="DataAbout" enctype="multipart/form-data">
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
                        <input type="text" class="form-control ckeditor" parsley-trigger="change" id="deskripsi" name="deskripsi" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>