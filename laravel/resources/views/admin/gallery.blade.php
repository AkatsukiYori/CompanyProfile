<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery | Kita Serba Digital</title>
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
                                <h2>Gallery</h2>
                            </div>
                            <button type="button" class="btn btn-primary tambah" data-toggle="modal" data-target="galleryModal">
                                Tambah Album
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

<!-- Modal add-->
<div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="DataGallery" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_album">Nama Album</label>
                        <input type="text" class="form-control" parsley-trigger="change" name="nama_album" id="nama_album" placeholder="Masukan nama album">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" parsley-trigger="change" id="deskripsi" name="deskripsi" placeholder="Masukan deskripsi">
                    </div>
                    <div class="form-group">
                        <input type="radio" id="image" name="image" value="Image">
                        <label for="image">Gambar</label>
                        <input type="radio" id="video" name="video" value="Video">
                        <label for="video">Video</label>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal foto</label>
                        <input type="date" class="form-control" parsley-trigger="change" id="tanggal" name="tanggal">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click','.tambah',function(e) {
            $('#galleryModal').modal('show');
        })
    });
</script>
</body>
</html>