<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
				<div class="alert alert-error alert-dismissable bg-danger text-white">
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
                            <button type="button" onclick="openModal()" class="btn btn-primary float-right mr-2" data-toggle="modal" data-target="#karyawanModal" style="margin-top: -5.5%;">
                                Tambah data karyawan
                            </button>
                            <div class="card-body">
                                <table id="karyawanTable" width="100%" class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>no.HP</th>
                                            <th>Email</th>
                                            <th>Instagram</th>
                                            <th>Kode</th>
                                            <th>Kategori</th>
                                            <th>Jabatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
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
            <form id="karyawanForm" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control dropify" id="foto" name="foto" data-allowed-file-extensions="png jpg jpeg" accept=".jpg, .png, .jpeg">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama karyawan" required>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukan NO HP karyawan" required>
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email karyawan" required>
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="instagram" class="form-control" id="instagram" name="instagram" placeholder="Masukan instagram karyawan" required>
                    </div>
                    <div class="form-group">
                        <label for="kategory">Divisi</label>
                        <select class="form-control" name="kategori" id="kategori">
                            <option selected hidden>-- Divisi Karyawan --</option>
                            <option value="programer">Programer</option>
                            <option value="design">Design</option>
                            <option value="relation">Relation</option>
                            <option value="executive">Executive</option>
                            <option value="network">Network</option>
                            <option value="augmented reality">Augmented Reality</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Masukan jabatan karyawan" required>
                    </div>
                </div>
                <div id="form_result"></div>
                <div class="modal-footer">
                    <button type="submit" id="actionBtn" value="save" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var openModal = () => {
        $('#form_result').html('');
        clearModal();
    }

    var clearModal = () => {
        $('#karyawanForm')[0].reset();
        $('.dropify-clear').click();
        $('#actionBtn').val('save');
        $('#actionBtn').text('Save');
        $('#actionBtn').prop('disabled', false);
    }

    $('#karyawanForm').submit((e) => {
        e.preventDefault();

        $('#form_result').html('');

        var formData = new FormData($('#karyawanForm')[0]);
        
        if($('#actionBtn').val() == 'save'){
            $.ajax({
                method: 'POST',
                url: `{{ route('karyawanTambah') }}`,
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                beforeSend: () => {
                    $('#actionBtn').text('Saving...');
                    $('#actionBtn').prop('disabled', true);
                }
            }).done(res => {
                $('#actionBtn').text('Save');
                $('#actionBtn').prop('disabled', false);

                if(res == "success"){
                    $('#form_result').html(`<div class="alert alert-success">Data Berhasil Dimasukkan</div>`);
                    clearModal();
                    $('#karyawanTable').DataTable().ajax.reload();
                }else{
                    Object.entries(res).forEach(message => {
                        $('#form_result').append(`<div class="alert alert-danger">${message}</div>`);
                    })
                }
            }).catch(err => {
                $('#actionBtn').text('Save');
                $('#actionBtn').prop('disabled', false);
                $('#form_result').html(`<div class="alert alert-danger">Data Gagal Dimasukkan</div>`);
                console.log(err.responseJSON.message)
            })
        }else{
            $.ajax({
                method: 'POST',
                url: `{{ route('karyawanUpdate') }}`,
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                beforeSend: () => {
                    $('#actionBtn').text('Saving...');
                    $('#actionBtn').prop('disabled', true);
                }
            }).done(res => {
                $('#actionBtn').text('Edit');
                $('#actionBtn').prop('disabled', false);

                if(res == "success"){
                    $('#form_result').html(`<div class="alert alert-success">Data Berhasil Diubah</div>`);
                    clearModal();
                    $('#karyawanTable').DataTable().ajax.reload();
                    $('#karyawanModal').modal('hide');
                }else{
                    Object.entries(res).forEach(message => {
                        $('#form_result').append(`<div class="alert alert-danger">${message}</div>`);
                    })
                }
            }).catch(err => {
                $('#actionBtn').text('Edit');
                $('#actionBtn').prop('disabled', false);
                $('#form_result').html(`<div class="alert alert-danger">Data Gagal Diubah</div>`);
                console.log(err.responseJSON.message)
            })
        }
    })

    $(document).ready(function() {
        $('#foto').dropify();

        $.ajaxSetup({
            headers: ({
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            })
        })

        $(document).on('click','.btnEdit',function(e) {
            e.preventDefault();
            var id = $(this).attr('id');

            $.ajax({
                method: 'get',
                url: '/karyawanEdit/'+id,
                success:function(response) {
                    $('#form_result').html('')
                    $('#id').val(response[0].id);
                    $('#nama').val(response[0].nama);
                    $('#no_hp').val(response[0].no_hp);
                    $('#email').val(response[0].email);
                    $('#instagram').val(response[0].instagram);
                    $('#kategori').val(response[0].kategori);
                    $('#jabatan').val(response[0].jabatan);
                    $('#Filename').val(response[0].media.name);
                    $('#mediaID').val(response[0].media_id);
                    $('#actionBtn').val('edit');
                    $('#actionBtn').text('Edit');

                    if(response[0].media == null){
                        $('#foto').attr("required")
                    }else{
                        var lokasi_gambar = "{{ asset('storage/karyawan') }}"+'/'+response[0].media.name;
                        var fileDropper = $("#foto").dropify({
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

                    $('#karyawanModal').modal('show');
                }
            })
        })

        $(document).on('click','.btnDelete',function(e){
            e.preventDefault();
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
                                $('#karyawanTable').DataTable().ajax.reload();
                            })
                        }
                    })
                }
            })
        })

        $('#karyawanTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: {
                    details: {
                        type: 'column'
                    }
                },
                ajax: {
                    url: `{{ route('karyawan.datatable') }}`,
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
                    {data: 'image', name: 'image', 
                        render: (data, type) => {
                            return `<img src="{{ asset('/storage/karyawan/${data}') }}" width="250px" alt="">`;
                        }
                    },
                    {data: 'nama', name: 'nama'},
                    {data: 'no_hp', name: 'no_hp'},
                    {data: 'email', name: 'email'},
                    {data: 'instagram', name: 'instagram'},
                    {data: 'kode', name: 'kode'},
                    {data: 'kategori', name: 'kategori'},
                    {data: 'jabatan', name: 'jabatan'},
                    {data: 'aksi', name: 'aksi'},
                ],
                columnDefs: [
                    {width: "10px", target:0},
                    {
                        render: (data, type, row) => {
                            return `<div class="text-wrap">${data}</div>`;
                        },
                        targets: [1,4]
                    }
                ]
            })
    })
</script>
    
</body>
</html>