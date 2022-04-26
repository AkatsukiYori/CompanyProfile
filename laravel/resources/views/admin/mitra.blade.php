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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box table-responsive">
                                <div class="card-header">
                                    <h2>Mitra</h2>
                                </div>
                                <button type="button" class="btn btn-primary tambah" data-toggle="modal" data-target="mitraModal">
                                    Tambah Mitra
                                </button>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="DataMitra" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" parsley-trigger="change" name="nama" id="nama" placeholder="Masukan nama mitra" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control dropify" parsley-trigger="change" id="image" name="image" required>
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
        $('#image').dropify();
        $(document).on('click','.tambah',function(e) {
            $('#mitraModal').modal('show');
        })
    })
</script>
</body>
</html>