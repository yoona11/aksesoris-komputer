<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <br>
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            .tengah{
                text-align: center;
            }
            .font{
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="col-6 col-sm-3">
            <p class="text-info fs-2 fw-bold">Data Produk</p>
            <br>
            <a class="btn btn-primary" href="/admin/tambah" role="button">+ Tambah Produk Baru</a>
        </div>
        <br>
        <br>

        <table class="table table-primary table-bordered">
            <tr class="tengah">
                <th>Id</th>
                <th>User ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>quantity</th>
                <th>harga</th>
                <th>Edit atau Hapus</th>
            </tr>
            @foreach($products as $product)
            <tr class="font">
                
                <td class="tengah">{{ $product->id}}</td>
                <td class="tengah">{{ $product->user_id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description}}</td>
                <td>{{ $product->quantity}}</td>
                <td class="tengah">{{ $product->price}}</td>

                <td class="tengah" width="170px">
                    <a href="/admin/edit/{{ $product->id }}" class="btn btn-warning">Edit</a>
                    <a href="/admin/hapus/{{ $product->id }}" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            @endforeach
        </table>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
    </html>
</div>

</x-app-layout>
 