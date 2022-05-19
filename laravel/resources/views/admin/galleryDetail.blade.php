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
                                <h2>Gallery Detail</h2>
                            </div>
                            <button type="button" class="btn btn-primary tambah float-right" data-toggle="modal" data-target="galleryModal" style="margin-top: -5.5%; margin-right: 2%;">
                                Tambah Media
                            </button>
                            <div class="card-body">
                                <table id="galleryTable" width="100%" class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Media</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                        <tbody>
                                           @foreach ($album as $alb)  
                                                    @foreach ($alb->album_media as $al)
                                                    <tr>
                                                        <td>{{$loop->iteration }}</td>
                                                            @if ($al->kategori == "image")
                                                                <td><img src="{{ asset('/storage/album'.'/'.$alb->name.'/'.$al->name) }}" width="250" alt=""></td>
                                                            @else 
                                                                <td><?= $al->link?></td>
                                                            @endif
                                                        <td>
                                                            <button class="btn btn-warning btnEdit" id="{{$al->id}}"><i class="fa fa-pencil"></i></button>
                                                            <button class="btn btn-danger btnDelete" id="{{$al->id}}" value="{{$alb->name}}"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
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
<div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Media</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="DataGallery" enctype="multipart/form-data" action="/gallery-detail-store" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$alb->id}}">
                    <input type="hidden" name="judul" value="{{$alb->name}}">
                    <div class="form-group">
                        <input type="radio" id="image" name="jenis" value="Image">
                        <label for="image">Gambar</label>
                        <input type="radio" id="video" name="jenis" value="Video">
                        <label for="video">Video</label>
                    </div>
                    <div class="form-group judul d-none">
                        <label for="judul_video">Judul Media</label>
                        <input type="text" class="form-control" parsley-trigger="change" name="judul_video" id="judul_video" placeholder="Masukan Judul Video">
                    </div>
                    <div class="form-group file d-none">
                        <label for="File">File</label>
                        <input type="file" name="file[]" id="file" class="form-control dropify" multiple="multiple" data-allowed-file-extensions="jpg png jpeg">
                    </div>
                    <div class="form-group link d-none">
                        <label for="Link">Link</label>
                        <input type="link" name="link" id="link" class="form-control dropify" multiple="multiple" placeholder="Masukan Link video" >
                        <span>Jika dari youtube harap gunakan link embed di bagian src. Contoh: https://www.youtube.com/embed/YzGH6odpwpc</span>
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
<div class="modal fade" id="galleryModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="DataGallery" enctype="multipart/form-data" action="/gallery-detail-update" method="post">
                    @csrf
                    <div class="form-group judulEdit d-none">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="filename" id="filename">
                        <input type="hidden" name="judul" value="{{$alb->name}}" id="judul">
                        <label for="judul_video">Judul Media</label>
                        <input type="text" class="form-control" parsley-trigger="change" name="judul_video" id="judul_videoEdit" placeholder="Masukan Judul Video">
                    </div>
                    <div class="form-group fileEdit d-none">
                        <label for="File">File</label>
                        <input type="file" name="file" id="fileEdit" class="form-control dropify" multiple="multiple" data-allowed-file-extensions="jpg png jpeg">
                    </div>
                    <div class="form-group linkEdit d-none">
                        <label for="Link">Link</label>
                        <input type="link" name="link" id="linkEdit" class="form-control dropify" multiple="multiple" placeholder="Masukan Link video" >
                        <span>Jika dari youtube harap menggunakan link embed (Tekan tombol share dan pilih yang embed)</span>
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
        $('#file').dropify();
        $('#fileEdit').dropify();
        $('#galleryTable').DataTable();
        $(document).on('click','.tambah',function(e) {
            $('#galleryModal').modal('show');
        })
        $(document).on('click','#video',function(e){
            $('.file').removeClass("d-block").addClass("d-none");
            $('.judul').removeClass("d-none").addClass("d-block");
            $('.link').removeClass("d-none").addClass("d-block")
        })
        $(document).on('click','#image',function(e){
            $('.file').removeClass("d-none").addClass("d-block");
            $('.judul').removeClass("d-block").addClass("d-none");
            $('.link').removeClass("d-block").addClass("d-none")
        })
        $(document).on('click','.btnEdit',function(e){
            var id = $(this).attr('id');
            var judul = $("#judul").val();
            $('#galleryModalEdit').modal('show');
            $.ajax({
                url:"/gallery-detail-edit/"+id,
                success: function(data){
                    $('#id').val(data.id);
                    if(data.kategori =="video"){
                        $('.fileEdit').removeClass("d-block").addClass("d-none");
                        $('.judulEdit').removeClass("d-none").addClass("d-block");
                        $('.linkEdit').removeClass("d-none").addClass("d-block")
                        $('#judul_videoEdit').val(data.name);
                        $('#linkEdit').val(data.link);
                    }else if(data.kategori =="image"){
                        $('.fileEdit').removeClass("d-none").addClass("d-block");
                        $('.judulEdit').removeClass("d-block").addClass("d-none");
                        $('.linkEdit').removeClass("d-block").addClass("d-none");
                        $('#filename').val(data.name);
                        var lokasi_gambar = "{{ asset('storage/album') }}"+'/'+judul+'/'+data.name;
                        var fileDropper = $("#fileEdit").dropify({
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
        })
        $(document).on('click', '.btnDelete', function(e){
                var id = $(this).attr('id');
                var judul_album = $(this).attr('value');
                var data = {
                    'name_album' : judul_album,
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
                            url : '/gallery-detail-delete/'+id,
                            data : data,
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
        });
    });
</script>
</body>
</html>