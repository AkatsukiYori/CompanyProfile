<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Document</title>


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
	<script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
</head>
<style>
	#showCounter{
		display: none;
	}

	.chatLog{
		overflow: auto;
		max-height: 200px;
	}
</style>
<body>
	<div id="wrapper">
		@include('layouts/app2')

		<div class="content-page">
			<div class="content">

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

				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card-box table-responsive">
								<div class="card-header d-flex flex-wrap justify-space-around align-items-center my-2">
									<h1 class="col-lg-8">Presentation Meeting Management</h1>
									<div class="col-lg-4 d-flex justify-content-end">
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#karyawanModal">
			                                Tambah data
			                            </button>
									</div>
								</div>

								<div class="d-flex flex-wrap">
									<div id="showCounter" class="col-md-6 my-4 p-1 card-body bg-light">
										<div>
											<div id="event" class="text-break h4"></div>
											<div class="text-break my-3">
												<p class="font-weight-bolder h5">JAM AKTIF: <span id="jam" class="text-primary text-light bg-secondary p-1"></span></p>
											</div>
											<div id="counter" class="col-12 text-center h1 text-dark p-2"></div>

											<!-- Bagian Chat -->
											<div class="d-flex flex-wrap justify-content-center ">
												<div class="page-content page-container" id="page-content">
												    <div class="padding">
												        <div class="row col-12 container d-flex justify-content-center">
												            <div class="col-md-12">
												          
													            <div class="box box-warning bg-warning p-2 direct-chat direct-chat-warning">
													                <div class="box-header with-border">
													                	<h3 class="box-title">Chat Messages</h3>
													            	</div>
													            </div>
												        
												            	<div class="box-body col-md-12 chatLog">
												              
													                <div id="chatLog" class="direct-chat-messages">
													              		
												                    </div>
													                  
												                </div>
													            
													            <div class="box-footer">
													                <form action="#" method="post" id="chat">
													                	@csrf
													                	@method('post')
													                    <div class="input-group">
													                    	<input type="hidden" id="event_id" name="event_id">
													                        <input type="text" name="isi_message" id="isi_message" placeholder="Type Message ..." class="form-control">
													                        <span class="input-group-btn">
													                            <button type="submit" class="btn btn-warning btn-flat">Send</button>
													                        </span>
													                    </div>
													                </form>
													            </div>
													        
													        </div>
												      
												      	</div>
												    </div>
												  	</div>
												</div>

											</div>
										</div>
										<div class="col-md-6">
											<div class="card-body p-0">
												<table id="tableMeeting" class="table table-bordered dt-responsive nowrap">
													<thead class="text-center">
														<th>No.</th>
														<th>Nama Event</th>
														<th>Status</th>
														<th>Jumlah Menit</th>
														<th>Narasumber</th>
														<th>Kode</th>
														<th>jam mulai</th>
														<th>jam selesai</th>
														<th >action</th>
													</thead>

													<tbody>
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
		</div>
	</div>

	<!-- Modal add -->
	<div class="modal fade" id="karyawanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">Tambah data Meeting Management</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <form action="{{ route('presentation_meeting_management_add') }}" method="post">
	                @csrf
	                <div class="modal-body">
	                    <div class="form-group">
	                        <label for="nama_event">nama event</label>
	                        <input type="text" class="form-control" placeholder="Masukkan nama Event" id="nama_event" name="nama_event" required >
	                    </div>
	                    <div class="form-group">
	                        <label for="narasumber">narasumber</label>
	                        <input type="text" class="form-control" id="narasumber" name="narasumber" placeholder="Masukan nama narasumber" required>
	                    </div>
	                    <div class="form-group">
	                        <label for="jumlah_menit">jumlah menit</label>
	                        <input type="number" class="form-control" required name="jumlah_menit" id="jumlah_menit" name="kategori" placeholder="Masukkan jumlah menit">
	                    </div>
	                    <div class="form-group">
	                        <label for="jam_mulai">jam mulai</label>
	                        <input type="datetime-local" name="jam_mulai" id="jam_mulai" class="form-control" placeholder="Masukan jam mulai presentasi" required>
	                    </div>
	                    <div class="form-group">
	                        <label for="jam_selesai">jam selesai</label>
	                        <input type="datetime-local" name="jam_selesai" id="jam_selesai" class="form-control" placeholder="Masukan jam selesai presentasi" required>
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

	<!-- Modal Edit -->
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">Edit data Meeting management</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <form id="updateData" action="{{ route('presentation_meeting_management_add') }}" method="post">
	                @csrf
	                @method('put')
	                <div class="modal-body">
	                	<input type="hidden" id="idEdit" name="id" >
	                    <div class="form-group">
	                        <label for="nama_event">nama event</label>
	                        <input type="text" class="form-control" placeholder="Masukkan nama Event" id="nama_event_edit" required name="nama_event" >
	                    </div>
	                    <div class="form-group">
	                        <label for="narasumber">narasumber</label>
	                        <input type="text" class="form-control" id="narasumber_edit" name="narasumber" placeholder="Masukan nama narasumber" required>
	                    </div>
	                    <div class="form-group">
	                        <label for="jumlah_menit">jumlah menit</label>
	                        <input type="number" class="form-control" required name="jumlah_menit" id="jumlah_menit_edit" name="kategori" placeholder="Masukkan jumlah menit">
	                    </div>
	                    <div class="form-group">
	                        <label for="jam_mulai">jam mulai</label>
	                        <input type="datetime-local" name="jam_mulai" id="jam_mulai_edit" class="form-control" placeholder="Masukan jam mulai presentasi" required>
	                    </div>
	                    <div class="form-group">
	                        <label for="jam_selesai">jam selesai</label>
	                        <input type="datetime-local" name="jam_selesai" id="jam_selesai_edit" class="form-control" placeholder="Masukan jam selesai presentasi" required>
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

<script>
	//variable untuk menunjukkan sisaWaktu
	var waktu = 0;
	var timerJalan = false;

	var getWaktuPerMenit = () => {
		var timerWaktu = setInterval(() => {
			if(!timerJalan){
				return;
			}
			timerJalan = false;
			getTimerPrecise();
		}, 60 * 1000)
	}

	//function untuk load chat
	var loadChat = (event_id) => {
		$.ajax({
			method: 'GET',
			url: `/chatlog/get/${event_id}`,
		})
		.done(res => {
			$('#chatLog').empty();
			if(res != ''){
				res.forEach((value) => {
					$('#chatLog').append(`
						<div class="direct-chat-msg py-2 right">
		                    <div class="direct-chat-info clearfix">
		                        <span class="direct-chat-name pull-right">${value.nama}</span>
		                        <span class="direct-chat-timestamp pull-left">${value.tanggal}</span>
		                    </div>
		                    
		                    <img class="direct-chat-img" src="https://img.icons8.com/office/36/000000/person-female.png" alt="message user image">
		                    
		                    <div class="direct-chat-text">
		                        ${value.isi_message}
		                    </div>
		                
		                </div>
					`);
				})
			}$('#chatLog').html();
		})
		.catch(err => {
			console.log(err.message);
		})
	}

	//function yang digunakan untuk getdata dari localStorage
	var getData = (sisa_waktu) => {
    	$('#showCounter').show();
    	var meetingData = JSON.parse(localStorage.getItem('meetingData'));

    	$('#showCounter').show();
		$('#event').text(meetingData.nama_event);
		$('#jam').text(meetingData.jam_aktif);

    	if(localStorage.getItem('sisa_waktu')){
    		localStorage.setItem('sisa_waktu', sisa_waktu);
			startTimer(sisa_waktu);
			$('#event_id').val(localStorage.getItem('id'));
			loadChat(localStorage.getItem('id'));
			if(localStorage.getItem('count') == 'mulai'){
				notificationMessage('Presentasi akan dimulai');
			}else{
				return;
			}
    	}else{
    		localStorage.clear();
    	}

    }

    var getTimerPrecise = () => {
    	$.ajax({
			method: 'GET',
			url: `/meeting-management/count_reload/${localStorage.getItem('id')}`,
		})
		.done(res => {
    		if(res.status == 'aktif'){
    			getData(res.sisa_waktu);
    		}else{
    			swal('Oops', 'Waktu Presentasi Telah Habis', 'error')
    		}
		})
		.catch(err => {
			console.log(err.message)
		})
    }

	$(document).ready(()=>{
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        loadTable();

    	if(localStorage.getItem('count')){
    		getTimerPrecise();
        }

        getWaktuPerMenit();

        $('#jam_mulai_edit').on('change', function() {
        	$('#jam_selesai_edit').attr('min', $('#jam_mulai_edit').val());
        });

        $('#jam_mulai').on('change', function() {
        	$('#jam_selesai').attr('min', $('#jam_mulai').val());
        });

		//untuk load datatable
		function loadTable() {
			$('#tableMeeting').DataTable({
				deferRender: true,
	        	scrollY: 400,
	        	scrollCollapse: true,
	        	paging: true,
				ajax: "{{ route('presentation_meeting_management_data') }}",
				columns: [
					{data: 'DT_RowIndex', name: 'DT_RowIndex', orderAble: false},
					{data: 'nama_event', name:'nama_event'},
					{data: 'status', name:'status',
						render: (data, type, row) => {
							var color = 'text-muted';
							if(data == 'belum aktif'){
								color = 'text-danger';
								if(localStorage.getItem('count')){
									$('#showCounter').show();
								}
							}else if(data == 'aktif'){	
								color = 'text-primary'
							}

							return `<span class="${color}">${data}</span>`;
						}
					},
					{data: 'jumlah_menit', name:'jumlah_menit',
						render: (data, type, row) => {
							return `<span>${data} Menit</span>`
						}
					},
					{data: 'narasumber', name:'narasumber'},
					{data: 'kode', name:'kode'},
					{data: 'jam_mulai', name:'jam_mulai'},
					{data: 'jam_selesai', name:'jam_selesai'},
					{data: 'action', name:'action'},
				],
				columnDefs : [
					{"width" : "10px", "targets" : 0},
					{	
						render: function (data, type, full, meta) {
	                        return "<div class='text-wrap'>" + data + "</div>";
	                    },
	                    targets: [1,2,3,4]
	                },
				],
			});
		}

		//ambil data dari database sesuai id
		$(document).on('click', '.edit', function(e) {
			e.preventDefault();
			var id = $(this).attr("id");
			$.ajax({
				method: 'GET',
				url: `/meeting-management/edit/${id}`,
			})
			.done(res => {
				document.getElementById('idEdit').value = res.id;
				document.getElementById('nama_event_edit').value = res.nama_event;
				document.getElementById('narasumber_edit').value = res.narasumber;
				document.getElementById('jumlah_menit_edit').value = res.jumlah_menit;
				document.getElementById('jam_mulai_edit').value = res.jam_mulai.replace(' ', 'T');
				document.getElementById('jam_selesai_edit').value = res.jam_selesai.replace(' ', 'T');
			})
			.catch(err => {
				console.log(err.message)
			})
			$('#editModal').modal('show');
		});

		//untuk update data sesuai id
		$('#updateData').on('submit', (e) => {
			e.preventDefault();

			$.ajax({
				method: 'POST',
				url: "{{ route('presentation_meeting_management_update') }}",
				data: $('#updateData').serialize(),
			})
			.done(res => {
				if(res.status == 'error'){
					swal("Oops!", "Ada field yang kosong", "error");
				}else{
					$('#editModal').modal('hide');	
					swal("Yay", "Data Berhasil Diupdate", "success");
					$('#tableMeeting').DataTable().ajax.reload();
				}
			})
			.catch(err => {
				console.log(err.message)
			})
		});

		//delete data dari database sesuai id
		$(document).on('click', '.delete', function(e) {
			e.preventDefault();
			var id = $(this).attr("id");

			swal.fire({
				title: 'Are you sure?',
                text: "Yakin untuk menghapus data?",
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin'
			}).then(res => {
				if(res.value){	
					$.ajax({
						method: 'POST',
						url: `/meeting-management/delete/${id}`,
					})
					.done(res => {
						swal("Yay", "Data Berhasil Dihapus", "success");
						if(localStorage.getItem('id') == id){
							localStorage.setItem('sisa_waktu', 0);
							waktu = 0;
							timerJalan = false;
							localStorage.clear();
							$('#showCounter').hide();
						}
						$('#tableMeeting').DataTable().ajax.reload();
					})
					.catch(err => {
						console.log(err.message)
					})
				}
			})
		});


		//start countdown timer
		$(document).on('click', '.start', function(e) {
			e.preventDefault();
			var id = $(this).attr("id");

			//jika di localstorage tidak ada item count maka akan dijalankan ajax
			if(!localStorage.getItem('count')){
				$.ajax({
					method: 'GET',
					url: `/meeting-management/count/${id}`,
				})
				.done(res => {
					if(res.status == "habis"){
						swal("Sad", "Waktu Presentasi telah berakhir", "error");
						localStorage.removeItem('count');
						$('#showCounter').hide();
						loadTable();
					}else if(res.status == "progress"){
						swal("Warning", "Meeting sedang dijalankan oleh di device lain", "warning");
					}else{
						if(localStorage.getItem('count') != 'mulai'){

							var jamAktif = `${res.meeting.jam_mulai} - ${res.meeting.jam_selesai}`;

							var meetingData = {
								"nama_event" : res.meeting.nama_event,
								"jam_aktif" : jamAktif
							};

							if(!localStorage.getItem('id') && localStorage.getItem('sisaWaktu') != 0){
								localStorage.setItem('sisa_waktu', res.meeting.sisa_waktu);
								localStorage.setItem('id', res.meeting.id);
								localStorage.setItem('count', 'mulai');
								localStorage.setItem('meetingData', JSON.stringify(meetingData));
								$('#event_id').val(res.meeting.id);		
							}


							$('#counter').removeClass('text-danger');
							$('#counter').addClass('text-dark');
							
							getData(res.meeting.sisa_waktu);
						}
					}
				})
				.catch(err => {
					console.log(err.message)
				})
			}
		})

		//chat 		
		$('#chat').submit((e) => {
			e.preventDefault();
			var formData = {
				'event_id': $('#event_id').val(),
				'isi_message': $('#isi_message').val()
			};
			$.ajax({
				method: 'POST',
				url: `{{ route('chatlog_add') }}`,
				data: formData
			})
			.done(res=>{
				loadChat($('#event_id').val());
				$('#isi_message').val('');
			})
			.err(err => {
				console.log(err.message)
			})
		});


	});
	
	//function to show JS notification API 
	var  notificationMessage = (message) => {
		if(Notification.permission == 'granted'){
			showNotification(message);
		}else if(Notification.permission !== 'denied'){
			Notification.requestPermission().then(permission => {
				if(permission == 'granted'){
					showNotification(message);
				}
			})
		}
	}

	//function to call Notification API
	var showNotification = (message) => {
		const notification = new Notification("Sisa Waktu Presentasi", {
			body: message,
			icon: 'images/logo.png'
		});
	}

	let waktuTimer = 0;

	//function untuk startTimer
	var startTimer = (sisaWaktu) => {

		timerJalan = true;

		var timerStart = setInterval((waktu) => {
			var timer = reduceTimer()

			$('#counter').text(timer)

			if(waktuTimer < 60){
				waktuTimer += 1;
			}else{
				clearInterval(timerStart);
				waktuTimer = 0;
			}

			if(!timerJalan){
				clearInterval(timerStart)
			}
		}, 1000);

		//jika sisa waktu telah mencapai waktu yang telah ditentukan maka akan berhenti
		if(localStorage.getItem('sisa_waktu')){
			setTimeout(() => {
				if(localStorage.getItem('sisa_waktu')){
					localStorage.setItem('count', 'selesai')
					$('#counter').removeClass('text-dark');
					$('#counter').addClass('text-danger');
					$('#counter').html('00:00:00');
					notificationMessage('waktu presentasi telah berakhir');

					var id = localStorage.getItem('id');

					$.ajax({
						method: 'GET',
						url: `/meeting-management/countend/${id}`,
					})
					.done(res => {
						clearInterval(timerStart);
						localStorage.clear();
						swal('Hai kamu :))', 'waktu presentasi telah berakhir', 'success');
						$('#tableMeeting').DataTable().ajax.reload();
					})
					.catch(err => {
						console.log(err.message)
					})
				}

			}, sisaWaktu * 1000)
		}
	}

	//function yang digunakan untuk mengurani sisa waktu per detik hingga 0
	var reduceTimer = () => {
		waktu = localStorage.getItem('sisa_waktu');
		if(waktu > 0){
			waktu -= 1;
			localStorage.setItem('sisa_waktu', waktu);
		}

		if(timerJalan){
			return updateTimer(waktu);
		}
	}

	//function yang digunakan untuk convert sisa waktu dari detik menjadi jam:menit:detik
	var updateTimer = (sisaWaktu) => {
		var sisaJam = Math.floor(sisaWaktu / 3600);
		var sisaMenit = Math.floor((sisaWaktu % 3600) / 60);
		var sisaDetik = Math.floor(sisaWaktu % 60);

		if(sisaJam < 10){
			sisaJam = `0${sisaJam}`;
		}
		if(sisaMenit < 10){
			sisaMenit = `0${sisaMenit}`;
		}
		if(sisaDetik < 10){
			sisaDetik = `0${sisaDetik}`;
		}

		let strWaktu = sisaJam+":"+sisaMenit+":"+sisaDetik;

		return strWaktu;
	}
</script>

</body>
</html>