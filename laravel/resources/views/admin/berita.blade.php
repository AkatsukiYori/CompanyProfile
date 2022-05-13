<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Berita | Kita Serba Digital</title>
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
                                    <h2>Berita</h2>
                                    <div class="btn-toolbar float-right" role="toolbar" style="margin-top: -4.5%;">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-primary btnTambah" data-toggle="modal" data-target="#beritaModal">
                                                Tambah Berita
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="tableBerita" width="100%" class="table table-bordered nowrap dt-responsive table-stripped">
                                        <thead class="text-center">
                                            <tr>
                                                <th>No</th>
                                                <th>Judul Berita</th>
                                                <th>Headline</th>
                                                <th>Kategori</th>
                                                <th>Jumlah Views</th>
                                                <th>Foto</th>
                                                <th>Isi Berita</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dataBerita as $data)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>
                                                    <?php 
                                                       $data->judul = \Illuminate\Support\Str::limit($data->judul, 70, $end='...')
                                                    ?>
                                                    {{ $data->judul }}
                                                </td>
                                                <td class="text-center">
                                                    @if ($data->headline == 'y')
                                                        Yes
                                                    @elseif ($data->headline == 'n')
                                                        No
                                                    @endif
                                                </td>
                                                <td>{{ $data->kategori }}</td>
                                                <td>{{ $data->views }} views</td>
                                                <td class="text-center">
                                                    <img src="{{ asset('/storage/berita/'.$data->media->name) }}" width="150" alt="">
                                                </td>
                                                <td>
                                                    <?php
                                                        $data->isi = \Illuminate\Support\Str::limit($data->isi, 150, $end='...')
                                                    ?>
                                                    <?= $data->isi ?>
                                                </td>

                                                <td>
                                                    <button class="btn btn-warning btnEdit rounded btn-sm" id="{{$data->id}}"><i class="fa fa-pencil mr-1"></i> Edit</button>

                                                    <button class="btn btn-danger btnDelete rounded btn-sm" id="{{$data->id}}" value="{{$data->media->id}}"><i class="fa fa-trash mr-1"></i> Delete</button>
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
    <div class="modal fade" id="beritaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah data berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('berita') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="judulBerita">Judul Berita</label>
                            <input type="text" class="form-control" id="judulBerita" name="judulBerita" parsley-trigger="change" placeholder="Masukan judul berita">
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control dropify" id="foto" name="foto" data-allowed-file-extensions="png jpg jpeg" accept=".jpg, .png, .jpeg">
                        </div>
                        <div class="form-group">
                            <label for="isiBerita">Isi Berita</label>
                            <textarea name="isiBerita" id="isiBerita" cols="30" rows="5" class="form-control ckeditor"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" parsley-trigger="change" placeholder="Masukan judul berita">
                        </div>
                        <div class="form-group">
                            <label for="">Headline</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="headline" id="optionYes" value="y">
                                <label class="form-check-label" for="optionYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="headline" id="optionNo" value="n">
                                <label class="form-check-label" for="optionNo">No</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="beritaModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit data berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('berita-update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="fotoName" id="fotoName">
                            <input type="hidden" name="beritaID" id="beritaID">
                            <input type="hidden" name="mediaID" id="mediaID">
                            <label for="judulBeritaEdit">Judul Berita</label>
                            <input type="text" class="form-control" id="judulBeritaEdit" name="judulBeritaEdit" parsley-trigger="change" placeholder="Masukan judul berita">
                        </div>
                        <div class="form-group">
                            <label for="fotoEdit">Foto</label>
                            <input type="file" class="form-control dropify" id="fotoEdit" name="fotoEdit" data-allowed-file-extensions="png jpg jpeg" accept=".jpg, .png, .jpeg">
                        </div>
                        <div class="form-group">
                            <label for="isiBeritaEdit">Isi Berita</label>
                            <textarea name="isiBeritaEdit" id="isiBeritaEdit" cols="30" rows="5" class="form-control ckeditor"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="kategoriEdit">kategoriEdit</label>
                            <input type="text" class="form-control" id="kategoriEdit" name="kategoriEdit" parsley-trigger="change" placeholder="Masukan judul berita">
                        </div>
                        <div class="form-group">
                            <label for="">Headline</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="headlineEdit" id="optionYesEdit" value="y">
                                <label class="form-check-label" for="optionYesEdit">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="headlineEdit" id="optionNoEdit" value="n">
                                <label class="form-check-label" for="optionNoEdit">No</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Save Change</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
            $('#tableBerita').DataTable();

            $(document).on('click','.btnEdit',function(e) {
                e.preventDefault();
                var id = $(this).attr('id');
                $.ajax({
                    method:"get",
                    url:"/berita-edit/"+id,
                    success:function(response){
                        console.log(response);
                        $('#beritaID').val(response[0].id);
                        $('#judulBeritaEdit').val(response[0].judul);
                        $('#fotoName').val(response[0].media.name);
                        $('#mediaID').val(response[0].media_id);
                        if(response[0].headline == "y") {
                            $('#optionYesEdit').attr('checked', 'checked');
                        } else {
                            $('#optionNoEdit').attr('checked', 'checked');
                        }
                        CKEDITOR.instances['isiBeritaEdit'].setData(response[0].isi);
                        $('#kategoriEdit').val(response[0].kategori);
                        var lokasi_gambar = "{{ asset('storage/berita') }}"+'/'+response[0].media.name;
                        var fileDropper = $("#fotoEdit").dropify({
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
                $('#beritaModalEdit').modal('show');
            });

            $(document).on('click', '.btnDelete', function(e) {
                e.preventDefault();
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
                            url : '/berita-delete/'+id,
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