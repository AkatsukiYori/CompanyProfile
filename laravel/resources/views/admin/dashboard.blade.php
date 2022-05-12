<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    @include('layouts/app2')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row scorebox justify-content-center">
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function() {
        $.ajax({
            url:"/dashboard-scorebox",
            success: function(response){
                $('.scorebox').append(`
                <div class=" mt-1 col-md-4 p-2 justify-content-center" >
                        <div class="card text-center p-4 justify-content-center card3">
                            <p style="color: #800b2c;font-size:24px;">Jumlah Mitra</p>
                            <center><h3 id="divisi" style="color: #800b2c;">${response.jumlah_mitra}</h3></center>
                        </div>
                </div>
                <div class=" mt-1 col-md-4 p-2 justify-content-center" >
                        <div class="card text-center p-4 justify-content-center card3">
                            <p style="color: #800b2c;font-size:24px;">Jumlah Produk</p>
                            <center><h3 id="divisi" style="color: #800b2c;">${response.jumlah_produk}</h3></center>
                        </div>
                </div>
                <div class=" mt-1 col-md-4 p-2 justify-content-center" >
                        <div class="card text-center p-4 justify-content-center card3">
                            <p style="color: #800b2c;font-size:24px;">Jumlah Album</p>
                            <center><h3 id="divisi" style="color: #800b2c;">${response.jumlah_album}</h3></center>
                        </div>
                </div>
                <div class=" mt-1 col-md-4 p-2 justify-content-center" >
                        <div class="card text-center p-4 justify-content-center card3">
                            <p style="color: #800b2c;font-size:24px;">Jumlah Berita</p>
                            <center><h3 id="divisi" style="color: #800b2c;">${response.jumlah_berita}</h3></center>
                        </div>
                </div>
                <div class=" mt-1 col-md-4 p-2 justify-content-center" >
                        <div class="card text-center p-4 justify-content-center card3">
                            <p style="color: #800b2c;font-size:24px;">Jumlah Faqs</p>
                            <center><h3 id="divisi" style="color: #800b2c;">${response.jumlah_faqs}</h3></center>
                        </div>
                </div>
                <div class=" mt-1 col-md-4 p-2 justify-content-center" >
                        <div class="card text-center p-4 justify-content-center card3">
                            <p style="color: #800b2c;font-size:24px;">Jumlah Karyawan</p>
                            <center><h3 id="divisi" style="color: #800b2c;">${response.jumlah_karyawan}</h3></center>
                        </div>
                </div>
                `);
            }
        })
    })
</script>
</body>
</html>