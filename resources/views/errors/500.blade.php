<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Internal Server Error (500)</title>
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
            max-width: 350px;
            margin: 50px auto 50px;
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
        <img src="{{ asset('img/500.png') }}" alt="Internal Server Error">
    </div>
    <h1>INTERNAL SERVER ERROR</h1>
    <p class="notif">TERDAPAT KESALAHAN PADA SERVER</p>
    <p>Sinkronisasi Laporan Keuangan Kabupaten Biak. Develop By: <a href="" target="blank">Bangsa Cerdas</a></p>
</body>
</html>