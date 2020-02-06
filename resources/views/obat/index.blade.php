@extends('layout.main')

@section('title','About')

@section('container')
 
<div class="container">
  <div class="row">
    <div class="col-10">

      <h1 class="mt-3">Hello, Daftar Obat!</h1>

      <table class="table">
      	<thead class="thead-dark">
      		<tr>
      		<th scope="col">#</th>
      		<th scope="col">Nama</th>
      		<th scope="col">Jenis Obat</th>
      		<th scope="col">Harga</th>
      		<th scope="col">Alamat</th>
      		<th scope="col">Aksi</th>
      		</tr>
      	</thead>

      	<tbody>
      		<tr>
      			<th scope="row">1</th>
      			<td>Pablo</td>
      			<td>Herbal</td>
      			<td>50000</td>
      			<td>Veteran</td>
      			<td>
      				<a href="" class="badge badge-succes">edit</a>
      				<a href="" class="badge badge-danger">delete</a>
      			</td>
      		</tr>
      	</tbody>
      </table> 	
    </div>
  </div>
</div>
@endsection

