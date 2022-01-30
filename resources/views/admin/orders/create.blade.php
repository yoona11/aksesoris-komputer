@extends('layouts.app')

@section('content')
<!DOCTYPE html>
    <html>
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


        <style>

            h1 {
                font-size:30px;
                font-weight:bold;
                border:5px #fff solid;
                display:inline-block;
                padding:5px 20px
            }
        </style>
    </head>
    <body>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col mt-4">
            <br><h2 style="text-align: center;"><b><i class="far fa-address-card"></i> Menambahkan Alamat</b></h2><br><br>

            <br />
            @if(count($errors))
            <div class="form-group">
              <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
                </ul>
              </div>
            </div>
            @endif
            <br />
          
          <div class="container">
              <form action="{{ route('admin.orders.store') }}" method="POST">
              @csrf
                <div class="form-group mb-3">
                  <label><h4><b><i class="fas fa-home"></i> Alamat Pengiriman</b></h4></label>
                  <textarea name="shipping_address" class="form-control" rows="3" placeholder="Alamat Pengiriman"></textarea>
                </div>
                
                <div class="form-group mb-3">
                  <label><h4><b><i class="fas fa-list-ol"></i> Kode Pos</b></h4></label>
                  <input type="number" name="zip_code" class="form-control" placeholder="Kode Pos">
                </div>
                <div class="mb-3">
                                <label for="provinsi" class="form-label"><h4><b><i class="fas fa-map-marked-alt"></i> Provinsi</b></h4></label>
                                <select class="form-control" name="" id="provinsi">
                                    <option hidden>Pilih provinsi</option>
                                    @foreach ($provinsi as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kota" class="form-label"><h4><b><i class="fas fa-map-marked-alt"></i> kota</b></h4></label>
                                <select class="form-control" name="kota" id="kota"></select>
                            </div>
                            <div class="mb-3">
                                <label for="kecamatan" class="form-label"><h4><b><i class="fas fa-map-marked-alt"></i> kecamatan</b></h4></label>
                                <select class="form-control" name="kecamatan" id="kecamatan"></select>
                            </div>
                            <div class="mb-3">
                                <label for="kelurahan" class="form-label"><h4><b><i class="fas fa-map-marked-alt"></i> kelurahan</b></h4></label>
                                <select class="form-control" name="kelurahan" id="kelurahan"></select>
                            </div>
                <button type="submit" class="btn btn-warning mt-3"><i class="fas fa-location-arrow"></i> Simpan</button>
              </form>
            </div>
          </div>
        </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
              <script>
                  $(document).ready(function() {
                  $('#provinsi').on('change', function() {
                    var provinsiID = $(this).val();
                    if(provinsiID) {
                        $.ajax({
                            url: '/getKota/'+provinsiID,
                            type: "GET",
                            data : {"_token":"{{ csrf_token() }}"},
                            dataType: "json",
                            success:function(data)
                            {
                              if(data){
                                  $('#kota').empty();
                                  $('#kota').append('<option hidden>Pilih Kota</option>'); 
                                  $.each(data, function(key, kota){
                                      $('select[name="kota"]').append('<option value="'+ kota.id +'">' + kota.name+ '</option>');
                                  });
                              }else{
                                  $('#kota').empty();
                              }
                          }
                        });
                    }else{
                          $('#kota').empty();
                    }
                  });

                  $('#kota').on('change', function() {
                    var kotaID = $(this).val();
                    console.log(kotaID)
                    if(kotaID) {
                        $.ajax({
                            url: '/getKecamatan/'+kotaID,
                            type: "GET",
                            data : {"_token":"{{ csrf_token() }}"},
                            dataType: "json",
                            success:function(data)
                            {
                              if(data){
                                  $("#kecamatan").empty();
                                  $('#kecamatan').append('<option hidden>Pilih Kecamatan</option>'); 
                                  $.each(data, function(key, kecamatan){
                                      $('select[name="kecamatan"]').append('<option value="'+ kecamatan.id +'">' + kecamatan.name+ '</option>');
                                  });
                              }else{
                                  $('#kecamatan').empty();
                              }
                          }
                        });
                    }else{
                          $('#kecamatan').empty();
                    }
                  });
                  
                  $('#kecamatan').on('change', function() {
                    var kecamatanID = $(this).val();
                    console.log(kecamatanID)
                    if(kecamatanID) {
                        $.ajax({
                            url: '/getKelurahan/'+kecamatanID,
                            type: "GET",
                            data : {"_token":"{{ csrf_token() }}"},
                            dataType: "json",
                            success:function(data)
                            {
                              if(data){
                                  $("#kelurahan").empty();
                                  $('#kelurahan').append('<option hidden>Pilih Kelurahan</option>');  
                                  $.each(data, function(key, kelurahan){
                                      $('select[name="kelurahan"]').append('<option value="'+ kelurahan.id +'">' + kelurahan.name+ '</option>');
                                  });
                              }else{
                                  $('#kelurahan').empty();
                              }
                          }
                        });
                    }else{
                          $('#kelurahan').empty();
                    }
                  });
                  });
          </script>
      </div>

      <!-- Vanila-tilt-js -->
      <script type="text/javascript" src="{{ asset('tilt/vanilla-tilt.min.js') }}" ></script>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>
@endsection