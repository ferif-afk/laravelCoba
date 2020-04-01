@section('js')
<script type="text/javascript">

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });

</script>

@stop

@extends('layout.main')


@section('title','About')

@section('container')
 
<div class="container">
  <div class="row">
    <div class="col-10">

      <h1 class="mt-3">Hello, Daftar Obat!</h1>

      <form method="post" action="/gd/{{ $gudang->id }}" enctype="multipart/form-data">
        @method('patch')
        @csrf
      <table class="table">
      	<thead class="thead-dark">
      		<tr>
        		<th scope="col">Nama Obat</th>
            <th><input type="text" name="nama" id="nama" value="{{ $gudang->nama_obat }}"></th>
          </tr>
          <tr>
      		    <th scope="col">Jenis Obat</th>
              <th><input type="text" name="jenis" id="jenis" value="{{ $gudang->jenis_obat }}" ></th>
          </tr>
          <tr>
          		<th scope="col">Harga</th>
              <th><input type="text" name="harga" id="harga" value="{{ $gudang->harga }}"></th>
          </tr>
          <tr>
              <th scope="col">Stok</th>
              <th><input type="text" name="stok" id="stok" value="{{ $gudang->stok }}"></th>
          </tr>
          <tr>
          		<th scope="col">Upload Gambar</th>
              <th><input type="file" id="inputgambar" name="photo" value="{{ $gudang->gambar }}"></th>
          </tr>   
          <tr>
            <th></th>
            <th><button type="submit">Ubah Data</button></th>
          </tr>           
      	</thead>

      	<tbody>

      	</tbody>
      </table> 	
      </form>
    </div>
  </div>
</div>
@endsection

