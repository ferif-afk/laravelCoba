<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset ('asset_das/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('asset_das/assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset_das/assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_das/assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_das/assets/vendor/charts/chartist-bundle/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_das/assets/vendor/charts/morris-bundle/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_das/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_das/assets/vendor/charts/c3charts/c3.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_das/assets/vendor/fonts/flag-icon-css/flag-icon.min.css') }}">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">Obat Herbal</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="Search" placeholder="Search..">
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>
                            </li>
                                <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Resep Obat</a>
                            </li>   
                
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->

        <div class="main">
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="right">
                                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle">
                                        </i></button>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Id</th>
                                                        <th class="border-0">Nama Obat</th>
                                                        <th class="border-0">Jenis Obat</th>
                                                        <th class="border-0">Harga</th>
                                                        <th class="border-0">Pembeli</th>
                                                        <th class="border-0">Gambar</th>
                                                        <th class="border-0">Aksi</th>
                                                    </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $obat)
                                           <tr>
                                                    <td>{{ $obat->id}}</td>
                                                    <td>{{ $obat->nama_obat}}</td>
                                                    <td>{{ $obat->jenis_obat}}</td>
                                                    <td>{{ $obat->harga}}</td>
                                                    <td>{{ $obat->pembeli}}</td>
                                                    <td><img src="{{ asset('images/'.$obat->gambar) }}" id="showgambar" style="max-width:200px;max-height:200px;" /></td>
                                        
                                                    <td>
                                                        <a href="/edit/{{ $obat->id }}" class="btn btn-warning">edit</a>
                                                        <form action="{{ $obat->id }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                    {{$data->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="footer">
                <div class="container-fluid" >
                    <div class="row">
                        <div class="col-md-12" style="text-align: center">
                             Copyright © Obat Herbal Tolak Miskin <a href="https://colorlib.com/wp/">Semangat Walau Tak Bisa.</a>
                        </div>
                        </div>
                    </div>
                </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="asset_das/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="asset_das/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="asset_das/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="asset_das/assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="asset_das/assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="asset_das/assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="asset_das/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="asset_das/assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="asset_das/assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="asset_das/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="asset_das/assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="asset_das/assets/libs/js/dashboard-ecommerce.js"></script>
</body>
 
</html>