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
                                <h2>Gallery</h2>
                            </div>
                            <button type="button" class="btn btn-primary tambah float-right" data-toggle="modal" data-target="galleryModal" style="margin-top: -5.5%; margin-right: 2%;">
                                Tambah Album
                            </button>
                            <div class="card-body">
                                <table id="galleryTable" width="100%" class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Album</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal Album</th>
                                        <th>Total Media</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                        <tbody>
                                           @foreach ($album as $alb)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{$alb->name}}</td>
                                                    <td>
                                                        {{  \Illuminate\Support\Str::limit($alb->deskripsi, 100, $end='...') }}
                                                    </td>
                                                    <td>{{date("j F Y",strtotime($alb->tgl_album))}}</td>
                                                    <td>{{$alb->jumlah}}</td>
                                                    <td><button class="btn btn-dark btnDetail" onclick="detail({{$alb->id}})"><i class="fa-solid fa-circle-info" style="font-size:20px;"></i></button>
                                                    <button class="btn btn-warning btnEdit" id="{{$alb->id}}"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-danger btnDelete" id="{{$alb->id}}"><i class="fa fa-trash"></i></button></td>
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
                <form id="DataGallery" enctype="multipart/form-data" action="/Gallery-store" method="post">
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
                        <input type="radio" id="image" name="jenis" value="Image">
                        <label for="image">Gambar</label>
                        <input type="radio" id="video" name="jenis" value="Video">
                        <label for="video">Video</label>
                    </div>
                    <div class="form-group">
                        <label for="File">File</label>
                        <input type="file" name="file[]" id="file" class="form-control dropify" multiple="multiple" >
                        <label>Resolusi untuk image 3:2</label>
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
                <form id="DataGallery" enctype="multipart/form-data" action="/gallery-update" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama_album">Nama Album</label>
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" name="foldername" id="foldername">
                        <input type="text" class="form-control" parsley-trigger="change" name="nama_album" id="nama_album_edit" placeholder="Masukan nama album">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" parsley-trigger="change" id="deskripsi_edit" name="deskripsi" placeholder="Masukan deskripsi">
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
    function detail(id){
        location.href = '/gallery'+'/detail/'+id;
    }
    $(document).ready(function() {
        $('#file').dropify();
        $('#galleryTable').DataTable();
        $(document).on('click','.tambah',function(e) {
            $('#galleryModal').modal('show');
        })
        $(document).on('click','.btnEdit',function(e) {
            var id=$(this).attr('id'); 
            $.ajax({
                url:'/gallery-edit/'+id,
                success: function(response){
                    console.log(response);
                    $('#id').val(response.id);
                    $('#foldername').val(response.name);
                    $('#nama_album_edit').val(response.name);
                    $('#deskripsi_edit').val(response.deskripsi);                    
                }
            })
            $('#galleryModalEdit').modal('show');
        })
        $(document).on('click', '.btnDelete', function(e){
                var id = $(this).attr('id');

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
                            url : '/gallery-delete/'+id,
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
                        // console.log("hello");
                    }
                })
        });
    });
</script>
</body>
</html>