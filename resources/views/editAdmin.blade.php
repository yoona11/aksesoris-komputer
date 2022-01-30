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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Edit Produk</title>
    </head>
    <body>
        <h3>Edit Produk</h3>
        <a href="/admin" class="btn btn-primary">Kembali</a>
        <br>
        <br>

        @foreach($koko as $product)
        <form action="/admin/update" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <table>
                <div class="mb-3">
                    <input type="hidden" name="id" value="{{ $product->id }}"> 
                </div>
                <div class="mb-3">
                    <tr>
                        <th><label class="form-label fw-bold">image url</label></th>
                        <td><input type="file" name="image" required="required" class="form-control" value="{{ $product->image_url }}"></td>
                    </tr>
                </div>
                 <div class="mb-3">
                    <tr>
                        <th><label class="form-label fw-bold">video url</label></th>
                        <td><input type="file" name="video" required="required" class="form-control" value="{{ $product->video_url }}"></td>
                    </tr>
                </div>
                <div class="mb-3">
                    <tr>
                        <th><label class="form-label fw-bold">Deskripsi</label></th>
                        <td><textarea type="text" name="deskripsi" required="required" class="form-control" value="{{ $product->description }}"></textarea></td>
                    </tr>
                </div>
                <div class="mb-3">
                    <tr>
                        <th><label class="form-label fw-bold">Quantity</label></th>
                        <td><input type="text" name="quantity" required="required" class="form-control" value="{{ $product->quantity }}"></td>
                    </tr>
                </div>
                <div class="mb-3">
                    <tr>
                        <th><label class="form-label fw-bold">Harga</label></th>
                        <td><input type="text" name="harga" required="required" class="form-control" value="{{ $product->price }}"></td>
                    </tr> 
                </div>
            </table>
            <br><br>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
        @endforeach
 

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
    </html>
</div>

</x-app-layout>
 