<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
</head>
<body>
    <div class="wrapper">
    @include('layouts/app2')

        <div class="content-page">
            <div class="content">

            <!-- start -->
                <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>Berhasil!</strong>  {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-error alert-dismissable alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>Gagal!</strong> {!! implode('', $errors->all('<div>:message</div>')) !!}
                    </div>
                @endif
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box table-responsive">
                            <div class="card-header">
                                <h2>Produk</h2>
                                <div class="btn-toolbar float-right" role="toolbar" style="margin-top: -4.5%;">
                                    <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary btnTambah" data-toggle="modal" data-target="#produkModal">
                                        Tambah produk
                                    </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="tableProduk" width="100%" class="table table-bordered nowrap dt-responsive table-stripped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Deskripsi</th>
                                            <th>Foto</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produks as $produk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $produk->name }}</td>
                                            <td>{{ $produk->deskripsi }}</td>
                                            <td>
                                                <img src="{{ asset('/storage/produk/'.$produk->media->name) }}" width="150" alt="">
                                            </td>
                                            <td>
                                                <button class="btn btn-warning btnEdit rounded" id="{{$produk->id}}"><i class="fa fa-pencil mr-1"></i> Edit</button>

                                                <button class="btn btn-danger btnDelete rounded" id="{{$produk->id}}" value="{{$produk->media->id}}"><i class="fa fa-trash mr-1"></i> Delete</button>
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

    <!-- Modal Add -->
    <div class="modal fade" id="produkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah data produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('produk') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" parsley-trigger="change" placeholder="Masukan nama produk">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control dropify" id="foto" name="foto" data-allowed-file-extensions="png jpg jpeg" accept=".jpg, .png, .jpeg">
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



    <!-- Modal Edit -->
    <div class="modal fade" id="produkModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('produk-update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nameEdit">Name</label>
                            <input type="hidden" name="produkID" id="produkID">
                            <input type="hidden" name="fotoName" id="fotoName">
                            <input type="hidden" name="mediaID" id="mediaID">
                            <input type="text" class="form-control" id="nameEdit" name="nameEdit" parsley-trigger="change" placeholder="Masukan nama produk">
                        </div>
                        <div class="form-group">
                            <label for="deskripsiEdit">Deskripsi</label>
                            <textarea name="deskripsiEdit" id="deskripsiEdit" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="fotoEdit">Foto</label>
                            <input type="file" class="form-control dropify" id="fotoEdit" name="fotoEdit" data-allowed-file-extensions="png jpg jpeg" accept=".jpg, .png, .jpeg">
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
            $('#foto').dropify();
            $('#fotoEdit').dropify();
            $('#tableProduk').DataTable();


            $(document).on('click','.btnTambah', function(e) {
                $('#produkModal').modal('show');
            });

            $(document).on('click','.btnEdit', function(e) {
                var id = $(this).attr('id');
                $.ajax({
                    method: 'GET',
                    url: '/produk-edit/' + id,
                    success: function(response) {
                        $('#produkID').val(response[0].id);
                        $('#nameEdit').val(response[0].name);
                        $('#fotoName').val(response[0].media.name);
                        $('#mediaID').val(response[0].media_id);
                        $('#deskripsiEdit').val(response[0].deskripsi);
                        var lokasi_foto = "{{ asset('storage/produk') }}"+'/'+response[0].media.name;
                        var fileDropper = $("#fotoEdit").dropify({
                            messages: { default: "Seret dan lepas logo di sini atau klik", replace: "Seret dan lepas logo di sini atau klik", remove: "Remove", error: "Terjadi kesalahan" },
                            error: { fileSize: "Ukuran file gambar terlalu besar (Maksimal 5 MB)" },
                        });
    
                        fileDropper = fileDropper.data('dropify');
                        fileDropper.resetPreview();
                        fileDropper.clearElement();
                        fileDropper.settings['defaultFile'] = lokasi_foto;
                        fileDropper.destroy();
                        fileDropper.init();
                    }
                });
                $('#produkModalEdit').modal('show');
            });


            $(document).on('click', '.btnDelete', function(e) {
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
                            url : '/produk-delete/'+id,
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