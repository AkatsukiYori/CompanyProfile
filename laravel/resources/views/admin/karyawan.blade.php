<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karyawan | Kita Serba Digital</title>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box table-responsive">
                            <div class="card-header">
                                <h2>Karyawan</h2>
                            </div>
                            <button type="button" class="btn btn-primary float-right mr-2" data-toggle="modal" data-target="#karyawanModal" style="margin-top: -5.5%;">
                                Tambah data karyawan
                            </button>
                            <div class="card-body">
                                <table id="karyawanTable" width="100%" class="table table-bordered dt-responsive nowrap table-stripped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($karyawan as $karya)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if($karya->media == null)
                                                    <h3>Tidak ada gambar</h3>
                                                    @else
                                                    <img src="{{ asset('/storage/karyawan/'.$karya->media->name) }}" width="250px" alt="">
                                                    @endif
                                                </td>
                                                <td>{{ $karya->nama }}</td>
                                                <td>{{ $karya->jabatan }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btnEdit rounded" id="{{ $karya->id }}" data-toggle="modal" data-target="#karyawanModaledit"><i class="fa-solid fa-pencil mr-1"></i> Edit</button>
                                                    <button type="button" class="btn btn-danger btnDelete rounded" id="{{ $karya->id }}" value="{{ $karya->id }}"><i class="fa-solid fa-trash mr-1"></i> Delete</button>
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


<!-- Modal add -->
<div class="modal fade" id="karyawanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah data karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('karyawanTambah') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control dropify" id="foto" name="foto" required>
                        <span>Resolution</span>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama karyawan" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Masukan jabatan karyawan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal edit -->
<div class="modal fade" id="karyawanModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit data karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('karyawanUpdate') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="editID" id="editID">
                        <input type="hidden" name="Filename" id="Filename">
                        <input type="hidden" name="mediaID" id="mediaID">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control dropify" id="fotoEdit" name="fotoEdit" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="namaEdit" name="namaEdit" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatanEdit" id="jabatanEdit" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#foto').dropify();
        $('#fotoEdit').dropify();

        $(document).on('click','.btnEdit',function(e) {
            var id = $(this).attr('id');
            $.ajax({
                method: 'get',
                url: '/karyawanEdit/'+id,
                success:function(response) {
                    // console.log(response);
                    $('#namaEdit').val(response[0].nama);
                    $('#jabatanEdit').val(response[0].jabatan);
                    $('#editID').val(response[0].id);
                    $('#Filename').val(response[0].media.name);
                    $('#mediaID').val(response[0].media_id);

                    if(response[0].media == null){
                        $('#fotoEdit').attr("required")
                    }else{
                        var lokasi_gambar = "{{ asset('storage/karyawan') }}"+'/'+response[0].media.name;
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
                }
            })
        })

        $(document).on('click','.btnDelete',function(e){
            var id=$(this).attr('id');

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
                        url : '/karyawanDelete/'+id,
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
    })
</script>
    
</body>
</html>