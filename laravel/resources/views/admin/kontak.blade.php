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
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box table-responsive">
                            <div class="card-header">
                                <h2>Kontak</h2>
                                <div class="btn-toolbar float-right" role="toolbar" style="margin-top: -4.5%;">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-primary tambah mr-1" data-toggle="modal" data-target="kontakModal">
                                            Tambah kontak
                                        </button>
                                        @foreach($kontak as $tak)
                                        <button type="button" class="btn btn-warning btnEdit mr-1" id="{{ $tak->id }}" data-toggle="modal" data-target="kontakeditModal">
                                            Edit Kontak
                                        </button>
                                        <button type="button" class="btn btn-danger btnDelete" id="{{ $tak->id }}" value="{{$tak->media->id}}">
                                            Hapus Kontak
                                        </button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($kontak as $tak)
                <input type="hidden" id="kontakID" value="<?php $tak->id ?>">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <div class="card-box shadow rounded justify-content-center text-center">
                            <h3 class="text-center"><i class="mdi mdi-star-half-full"></i> Foto</h3>
                            @if($tak->media == null)
                            <h3>Tidak ada gambar</h3>
                            @else
                            <img width="450rem" src="{{ asset('/storage/kontak/'.$tak->media->name) }}" alt="">
                            @endif
                            <br>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-4">
                        <div class="card-box shadow rounded justify-content-center text-center">
                            <h3 class="text-center"><i class="fa fa-phone"></i> no Whatsapp</h3>
                            <h5><a href="{{ $tak->no_hp }}">{{ $tak->no_hp }}</a></h5>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-box shadow rounded justify-content-center text-center">
                            <h3 class="text-center"><i class="fa fa-envelope"></i> Email</h3>
                            <h5>{{ $tak->email }}</h5>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-box shadow rounded justify-content-center text-center">
                            <h3 class="text-center"><i class="fa-solid fa-map-marker"></i> Alamat</h3>
                            <h5>{{ $tak->alamat }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row flex justify-content-center">
                    <div class="col-md-9">
                        <div class="card-box shadow rounded justify-content-center text-center">
                            <h3 class="text-center"><i class="fa fa-map-location-dot"></i> Link maps</h3>
                            <h5><?= $tak->namaLink ?></h5>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-4">
                        <div class="card-box shadow rounded justify-content-center text-center">
                            <h3 class="text-center"><i class="mdi mdi-youtube"></i> youtube</h3>
                            <h5> <a href="{{ $tak->youtube }}" target="_blank">{{ $tak->youtube }}</a> </h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-box shadow rounded justify-content-center text-center">
                            <h3 class="text-center"><i class="mdi mdi-twitter"></i> Twitter</h3>
                            <h5> <a href="{{ $tak->twitter }}" target="_blank">{{ $tak->twitter }}</a></h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-box shadow rounded justify-content-center text-center">
                            <h3 class="text-center"><i class="mdi mdi-instagram"></i> Instagram</h3>
                            <h5 style="word-break: break-all;"><a href="{{ $tak->instagram }}" target="_blank">{{ $tak->instagram }}</a></h5>
                        </div>
                    </div>
                    @endforeach
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
                <form id="Datakontak" enctype="multipart/form-data" action="{{ route('kontak-store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control dropify" parsley-trigger="change" name="foto" id="foto" data-allowed-file-extensions="png jpg jpeg" accept=".jpg, .png, .jpeg">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" parsley-trigger="change" name="alamat" id="alamat" placeholder="Masukan Alamat">
                    </div>
                    <div class="form-group">
                        <label for="Link">Link Google Maps</label>
                        <input type="text" class="form-control" parsley-trigger="change" id="namaLink" name="namaLink" placeholder="Masukan Link">
                        <span>Note: Linknya harus dalam bentuk embed</span>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">no Whatsapp</label>
                        <input type="tel" class="form-control" parsley-trigger="change" id="no_hp" name="no_hp" placeholder="Masukan No Whatsapp">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" parsley-trigger="change" id="email" name="email" placeholder="Masukan email">
                    </div>
                    <div class="form-group">
                        <label for="youtube">youtube</label>
                        <input type="text" class="form-control" parsley-trigger="change" id="youtube" placeholder="Masukan link youtube" name="youtube">
                        <span> Contoh : https://youtube.com </span>
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
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="kontakeditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mengubah data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="Datakontakedit" enctype="multipart/form-data" action="{{ route('kontak-update') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="editID" id="editID">
                        <input type="hidden" name="Filename" id="Filename">
                        <input type="hidden" name="mediaID" id="mediaID">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control dropify" parsley-trigger="change" name="fotoEdit" id="fotoEdit" data-allowed-file-extensions="png jpg jpeg" accept=".jpg, .png, .jpeg">
                    </div>
                    <div class="form-group">
                        <label for="link">Link Google Maps</label>
                        <input type="text" class="form-control" parsley-trigger="change" id="namaLinkEdit" name="namaLinkEdit">
                        <span>Linknya harus dalam bentuk embed</span>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" parsley-trigger="change" id="alamatEdit" name="alamatEdit">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No Whatsappd</label>
                        <input type="text" class="form-control" parsley-trigger="change" id="no_hpEdit" name="no_hpEdit">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" parsley-trigger="change" id="emailEdit" name="emailEdit">
                    </div>
                    <div class="form-group">
                        <label for="youtube">youtube</label>
                        <input type="text" class="form-control" parsley-trigger="change" id="youtubeEdit" name="youtubeEdit">
                        <span> Contoh : https://youtube.com </span>
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" class="form-control" parsley-trigger="change" id="instagramEdit" name="instagramEdit">
                        <span> Contoh : https://instagram.com </span>
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" class="form-control" parsley-trigger="change" id="twitterEdit" name="twitterEdit">
                        <span> Contoh : https://twitter.com </span>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save change</button>
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

        $(document).on('click','.tambah',function(e) {
            $('#kontakModal').modal('show');
        })

        $(document).on('click','.btnEdit', function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            // console.log(id);
            $.ajax({
                method: "get",
                url: "/kontak-edit/"+id,
                success:function(response) {
                    console.log(response[0]);
                    $('#fotoEdit').val(response.foto);
                    $('#alamatEdit').val(response[0].alamat);
                    $('#namaLinkEdit').val(response[0].namaLink);
                    $('#no_hpEdit').val(response[0].no_hp);
                    $('#emailEdit').val(response[0].email);
                    $('#youtubeEdit').val(response[0].youtube);
                    $('#instagramEdit').val(response[0].instagram);
                    $('#twitterEdit').val(response[0].twitter);
                    $('#editID').val(response[0].id);
                    $('#Filename').val(response[0].media.name);
                    $('#mediaID').val(response[0].media_id);

                    if(response[0].media == null) {
                        $('#fotoEdit').attr("required");
                    }else{
                        var lokasi_foto = "{{ asset('storage/kontak') }}"+'/'+response[0].media.name;
                        var fileDropper = $('#fotoEdit').dropify({
                            messages: { default: "Seret dan lepas logo di sini atau klik", replace: "Seret dan lepas logo disini atai kilk", remove: "Remove", error: "Terjadi kesalahan" },
                            error: { fileSize: "Ukuran file gambar terlalu besar (Maksimal 5 MB)" },
                        });

                        fileDropper = fileDropper.data('dropify');
                        fileDropper.resetPreview();
                        fileDropper.clearElement();
                        fileDropper.settings['defaultFile'] = lokasi_foto;
                        fileDropper.destroy();
                        fileDropper.init();
                    }
                }
            })
            $('#kontakeditModal').modal('show');
        })

        $(document).on('click','.btnDelete',function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            var media_id=$(this).attr('value');
            var data = {
                'id' : id,
                'media_id' : media_id,
            };
            
            Swal.fire({
                title: 'Are you sure?',
                text: "Yakin mau menghapus data?",
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin'
            }).then((result) => {
                if(result.value) {
                    $.ajax({
                        method: 'get',
                        url: '/kontak-delete/'+id,
                        data : data,
                        success: function(data) {
                            swal.fire({
                                type: 'success',
                                title: 'Berhasil dihapus!',
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