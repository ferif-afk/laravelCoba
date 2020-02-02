<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}   
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    DATABASE OBAT
              <!--   </div>

                <div class="links">
                    <a href="https://laravel.com/docs">ID</a>
                    <a href="https://laracasts.com">Nama Obat</a>
                    <a href="https://laravel-news.com">Jenis Obat</a>
                    <a href="https://blog.laravel.com">Harga</a>
                    <a href="https://nova.laravel.com">Pembeli</a>
                    <!-- <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a> -->

                </div>
                <table style="width:100%">
  <tr  style="color: #000;">
    <th>ID</th>
    <th style="background-color: #FFEBCD;">Nama Obat</th>
    <th style="background-color: #FFEBCD;">Jenis</th>
    <th style="background-color: #FFEBCD;">Harga</th>
    <th style="background-color: #FFEBCD;">Pembeli</th>
  </tr>
  @foreach($data_obat ?? '' as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->nama_obat}}</td>
                                <td>{{ $p->jenis_obat }}</td>
                                <td>{{ $p->harga }}</td>
                                <td>{{ $p->pembeli }}</td>
                            </tr>
                            @endforeach
 <!--  <tr>
    <td>Jill</td>
    <td>Smith</td>
    <td>50</td>
  </tr>
  <tr>
    <td>Eve</td>
    <td>Jackson</td>
    <td>94</td>
  </tr>
</table> -->
            </div>
        </div>
    </body>
</html>
