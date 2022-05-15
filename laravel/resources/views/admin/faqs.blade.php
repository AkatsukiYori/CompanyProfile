<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQS</title>
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
                        <div class="alert alert-error bg-danger text-white alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Gagal!</strong> {!! implode('', $errors->all('<div>:message</div>')) !!}
                        </div>
                    @endif

                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box table-responsive">
                                <div class="card-header">
                                    <h2>FAQ</h2>
                                </div>
                                <button type="button" class="btn btn-primary tambah float-right" data-toggle="modal" data-target="faqsModal" style="margin-top: -5.5%; margin-right: 2%;">
                                    Tambah FAQs
                                </button>

                                <div class="card-body">
                                    <div id="tabelFAQ">
                                        <table class="table table-bordered dt-responsive nowrap" width="100%" id="faqsTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Pertanyaan</th>
                                                    <th>Jawaban</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($faqs as $faq)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            {{ \Illuminate\Support\Str::limit($faq->pertanyaan, 70, $end='...') }}
                                                        </td>
                                                        <td>
                                                            {{ \Illuminate\Support\Str::limit($faq->jawaban, 100, $end='...') }}
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-warning btn-edit" id="{{ $faq->id }}">Edit</button>
                                                            <button class="btn btn-danger btn-delete" id="{{ $faq->id }}">Delete</button>
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
    </div>
    
    <!-- Modal add-->
    <div class="modal fade" id="faqsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="DataFAQ" action="{{ route('faqs') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="PertanyaanFAQ">Pertanyaan</label>
                            <input type="text" class="form-control" parsley-trigger="change" name="pertanyaan_faq" id="PertanyaanFAQ" required>
                        </div>
                        <div class="form-group">
                            <label for="JawabanFAQ">Jawaban</label>
                            <textarea name="jawaban_faq" class="form-control" id="JawabanFAQ" cols="30" rows="10"></textarea>
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



    <!-- Modal Edit-->
    <div class="modal fade" id="faqsModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelEdit" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelEdit">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="DataFAQ" action="{{ route('faqs-update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" id="editID" name="id_faq">
                            <label for="PertanyaanFAQ_Edit">Pertanyaan</label>
                            <input type="text" class="form-control" parsley-trigger="change" name="pertanyaan_faq" id="PertanyaanFAQ_Edit" required>
                        </div>
                        <div class="form-group">
                            <label for="JawabanFAQ_Edit">Jawaban</label>
                            <textarea name="jawaban_faq" class="form-control" id="JawabanFAQ_Edit" cols="30" rows="10"></textarea>
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
            // $('#gambar').dropify();
            // CKEDITOR.replace('#Jawaban');
            $('#faqsTable').DataTable();
    
            $(document).on('click','.tambah',function(e){
                $('#faqsModal').modal('show');
            });

            $(document).on('click', '.btn-edit', function(e){
                var id = $(this).attr('id');
                $('#faqsModalEdit').modal('show');

                $.ajax({
                    url:'faqs-edit/'+id,
                    success: function(data) {
                        $('#editID').val(data.id)
                        $('#PertanyaanFAQ_Edit').val(data.pertanyaan);
                        $('#JawabanFAQ_Edit').val(data.jawaban);
                    }
                })
            });

            $(document).on('click', '.btn-delete', function(e){
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
                            url : 'faqs-delete/'+id,
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