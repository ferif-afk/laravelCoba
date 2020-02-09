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

      <form method="post" action="/" enctype="multipart/form-data">
        @csrf
      <table class="table">
      	<thead class="thead-dark">
      		<tr>
        		<th scope="col">Nama Obat</th>
            <th><input type="text" name="nama" id="nama"></th>
          </tr>
          <tr>
      		    <th scope="col">Jenis Obat</th>
              <th><input type="text" name="jenis" id="jenis"></th>
          </tr>
          <tr>
          		<th scope="col">Harga</th>
              <th><input type="text" name="harga" id="harga"></th>
          </tr>
          <tr>
          		<th scope="col">Pembeli</th>
              <th><input type="text" name="pembeli" id="pembeli"></th>
          </tr>
          <tr>
            <th>preview gambar  </th>
            <th><img src="http://placehold.it/100x100" id="showgambar" style="max-width:200px;max-height:200px;float:left;" /> </th>
          </tr>

          <tr>
          		<th scope="col">Upload Gambar</th>
              <th><input type="file" id="inputgambar" name="photo"></th>
          </tr>   
          <tr>
            <th></th>
            <th><button type="submit">Tambah Data</button></th>
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

