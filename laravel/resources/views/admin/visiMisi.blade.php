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
				<div class="alert alert-error alert-dismissable">
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
                            </div>
                            <button type="button" class="btn btn-primary tambah" data-toggle="modal" data-target="visiMisiModal">
                                Tambah Visi Misi
                            </button>
                        </div>
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
        $(document).on('click','.tambah',function(e) {
            $('#visiMisiModal').modal('show');
        })
    });
</script>
</body>
</html>