<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi Misi | Kita Serba Digital</title>
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
                                <h2>Visi Misi</h2>
                                <div class="btn-toolbar float-right" role="toolbar" style="margin-top: -3.5%;">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-primary tambah mr-1" data-toggle="modal" data-target="visiMisiModal" style="margin-top: -4.5%;">
                                            Tambah Visi Misi
                                        </button>
                                        @foreach ($visiMisi as $viMi)
                                        <button type="button" class="btn btn-warning btnEdit mr-1" id="{{ $viMi->id }}" data-toggle="modal" data-target="editModal" style="margin-top: -4.5%;">Ubah</button>
                                        <button type="button" class="btn btn-danger btnDelete" id="{{ $viMi->id }}" style="margin-top: -4.5%;">Delete</button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($visiMisi as $viMi)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header" style="background-color: #9333EA;">
                                        <h3 class="text-center text-white">Visi</h3>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="text-center">{{ $viMi->visi }}</h4>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header" style="background-color: #9333EA;">
                                        <h3 class="text-center text-white">Misi</h3>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="text-center">{{ $viMi->misi }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

<!-- Modal add-->
<div class="modal fade" id="visiMisiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="DataVisiMisi" enctype="multipart/form-data" method="post" action="{{ route('visiMisitambah') }}">
                    @csrf
                    <div class="form-group">
                        <label for="Visi">Visi</label>
                        <input type="text" class="form-control" parsley-trigger="change" name="visi" id="visi" placeholder="Masukan Visi" required>
                    </div>
                    <div class="form-group">
                        <label for="misi">Misi</label>
                        <input type="text" class="form-control" parsley-trigger="change" id="misi" name="misi" placeholder="Masukan Misi" required>
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
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mengubah data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="visiMisiupdate" id="visiMisidata" enctype="multiple/form-data" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="editId" id="editId" parsley-trigger="change" required class="form-control">
                        <label for="visi">Visi</label>
                        <input type="text" class="form-control" id="visiEdit" name="visiEdit" parsley-trigger="change">
                    </div>
                    <div class="form-group">
                        <label for="misi">Misi</label>
                        <input type="text" class="form-control" id="misiEdit" name="misiEdit" parsley-trigger="change">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btnUpdate">Save change</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click','.tambah',function(e) {
            $('#visiMisiModal').modal('show');
        })

        $(document).on('click','.btnEdit',function(e) {
            var id = $(this).attr("id");
            $('#editModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/visiMisiedit/"+id,
                success: function(response){
                    // console.log(response);
                    $('#editId').val(response.id);
                    $('#visiEdit').val(response.visi);
                    $('#misiEdit').val(response.misi);
                }
            })
        })

        $(document).on('click','.btnDelete',function(e){
            e.preventDefault();
            var id=$(this).attr("id");
            
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
                        url : '/visiMisihapus/'+id,
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
        })
    });
</script>
</body>
</html>