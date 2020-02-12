@extends('layout/main')

@section('title','About')

@section('container')
 
<div class="container">
  <div class="row">
    <div class="col-10">

      <h1 class="mt-3">Hello, Daftar Obat!</h1>

      	<a href="/create">(+) Tambah Data Obat</a>

        <!-- Search form -->
<!-- <form method="get" action="{{url('search')}}" class="form-inline md-form form-sm active-pink active-pink-2 mt-2">
  <i class="fas fa-search" aria-hidden="true"></i>
  <input class="form-control form-control-sm ml-3 w-65" type="text" placeholder="search"
    aria-label="search">
</form> -->

        <form method="get" action="{{url('/obat/index')}}" class="form-inline my-2 my-lg-0">
        <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>



      <table class="table">
      	<thead class="thead-dark">
      		<tr>
      		<th scope="col">Nama Obat</th>
      		<th scope="col">Jenis Obat</th>
      		<th scope="col">Harga</th>
      		<th scope="col">Pembeli</th>
      		<th scope="col">Gambar</th>
      		<th scope="col">Aksi</th>
      		</tr>
      	</thead>

      	<tbody>
      		@foreach($data as $obat)
      		<tr>
      			<td>{{ $obat->nama_obat}}</td>
      			<td>{{ $obat->jenis_obat}}</td>
      			<td>{{ $obat->harga}}</td>
      			<td>{{ $obat->pembeli}}</td>
      			<td><img src="{{ asset('images/'.$obat->gambar) }}" id="showgambar" style="max-width:200px;max-height:200px;" /></td>
    
      			<td>
      				<a href="/edit/{{ $obat->id }}" class="badge badge-succes">edit</a>
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
      
    </div>
  </div>
</div>
@endsection

