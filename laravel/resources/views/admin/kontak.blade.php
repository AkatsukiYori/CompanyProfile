<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak | Kita Serba Digital</title>
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
                                <h2>Kontak</h2>
                            </div>
                            <button type="button" class="btn btn-primary tambah" data-toggle="modal" data-target="kontakModal">
                                Tambah kontak
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

<!-- Modal add-->
<div class="modal fade" id="kontakModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="Datakontak" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control dropify" parsley-trigger="change" name="foto" id="foto" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" parsley-trigger="change" id="alamat" name="alamat" placeholder="Masukan alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="telp">Telepon</label>
                        <input type="text" class="form-control" parsley-trigger="change" id="telp" name="telp" placeholder="Masukan No telp" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" parsley-trigger="change" id="email" name="email" placeholder="Masukan email" required>
                    </div>
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" parsley-trigger="change" id="facebook" placeholder="Masukan link facebook" name="facebook">
                        <span> Contoh : https://facebook.com </span>
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" class="form-control" parsley-trigger="change" id="instagram" placeholder="Masukan link instagram" name="instagram">
                        <span> Contoh : https://instagram.com </span>
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" class="form-control" parsley-trigger="change" id="twitter" placeholder="Masukan link twitter" name="twitter">
                        <span> Contoh : https://twitter.com </span>
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
        $('#foto').dropify();

        $(document).on('click','.tambah',function(e) {
            $('#kontakModal').modal('show');
        })
    });
</script>
</body>
</html>