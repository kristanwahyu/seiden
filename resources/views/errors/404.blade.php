<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page Not Found (404)</title>
    <style>
        body{
            font-family: "calibri";
            text-align: center;
        }
        h1{
            font-size: 40px;
            color: #C75C5C;
        }
        .img-wrap{
            max-width: 550px;
            margin: 100px auto 70px;
        }
        img{
            width: 100%;
            height: auto;
        }
        p.notif{
            font-size: 17px;
        }
    </style>
</head>
<body>
    <div class="img-wrap">
        <img src="{{ asset('img/404.png') }}" alt="Page Not Found">
    </div>
    <h1>PAGE NOT FOUND</h1>
    <p class="notif">HALAMAN YANG ANDA TUJU TIDAK DITEMUKAN</p>
    <p>Sinkronisasi Laporan Keuangan Kabupaten Biak. Develop By: <a href="#" target="blank">Bangsa Cerdas</a></p>
</body>
</html>