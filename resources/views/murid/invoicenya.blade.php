<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:18px;
            margin:0;
        }
        .container{
            margin:0 auto;
            margin-top:35px;
            padding:40px;
            width:750px;
            height:auto;
            background-color:#fff;
        }
        caption{
            font-size:28px;
            margin-bottom:15px;
            margin-right:120px;
        }
        table{
            border:1px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            margin-left:20px;
            width:600px;
        }
        td, tr, th{
            padding:12px;
            border:1px solid #333;
            width:185px;
        }
        th{
            background-color: #f0f0f0;
        }
        h4, p{
            margin:0px;
        }
    </style>
</head>
<body>
    <div >
        <table>
            <caption>
                Inofa Course
            </caption>
            <thead>
                <tr>
                    <th colspan="2"><strong>#</strong>
                    @foreach($invoice as $i)
                    {{ $i->invoice }}
                    @endforeach</th>
                    <th colspan="2">
					<?php 
                    echo date("d-m-Y")
                    ?>
                    </th>
					</th>
                </tr>
                <tr>
                    <td colspan="2">
                        <h4>Bimbingan Belajar: </h4>
                        <p>Inofa Course<br>
                            Jl Persatuan<br>
                            085343966997<br>
                            inofacourse.co.id
                        </p>
                    </td>
                    <td colspan="2">
                        <h4>Pelanggan: </h4>
                        <p>{{ Auth::user()->name }}<br>
                        @php $no = 1; @endphp
                        @foreach($alamat as $a)
                        {{ $a->kecamatan }}, {{ $a->kota }}, {{ $a->provinsi }}
                        @endforeach<br>
                        {{ Auth::user()->phone }} <br>
                        {{ Auth::user()->email }}
                        </p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th colspan="2">Program</th>
                    <th colspan="2">Harga</th>
                </tr>
                <tr>
                    <td colspan="2">
                    @php $no = 1; @endphp
                    @foreach($data as $d)
                    {{ $d->program }}
                    @endforeach
                    </td>
                    <td colspan="2"> 
                    @php $no = 1; @endphp
                    @foreach($invoice as $d)
                    {{ $d->harga }}
                    @endforeach</td>
                
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2">Total</th>
                    <td colspan="2"> @php $no = 1; @endphp
                    @foreach($invoice as $d)
                    {{ $d->harga }}
                    @endforeach</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>