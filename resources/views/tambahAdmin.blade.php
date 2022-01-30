<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Tambah Produk</title>
    </head>
    <body>
        <div class="container">
            <div class="col-6 col-sm-3">
                <p class="text-info fs-2 fw-bold">Data Admin</p>
                <br>
                <a class="btn btn-primary" href="/admin" role="button">Kembali</a>
            </div>
            <br>
            <br>

            <form action="/admin/store" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Produk</label>
                    <input type="text" name="name" class="form-control" required="required">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">image url</label>
                    <input type="file" name="image" required="required" class="form-control">
                </div>
                 <div class="mb-3">
                    <label class="form-label fw-bold">video url</label>
                    <input type="file" name="video" required="required" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Deskripsi</label>
                    <textarea type="text" name="deskripsi" id="mytextarea" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Quantity</label>
                    <input type="text" name="quantity" required="required" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Harga</label>
                    <input type="text" name="harga" required="required" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://cdn.tiny.cloud/1/nfpr3jeu5lkid54en6g4bkw418bk7yuj1is8k7r5q35ht0ay/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: '#mytextarea'
            });
        </script>
    </body>
    </html>
</div>

</x-app-layout>
 