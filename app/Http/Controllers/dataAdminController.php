<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\auth;
use App\Models\Images;
use App\Models\Product;
use Image;

class dataAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataProduk()
    {
        // mengambil data dari tabel produk
        $products = DB::table('products')->get();

        // mengirim data produk ke view dataproduk
        return view('admin',['products'=>$products]);
    }

    public function tambahProduk()
    {
        
        // Memanggil view tambah
        return view('tambahAdmin');
    }


    //method untuk edit data Admin
    public function editAdmin($id)
    {
        // mengambil data Admin berdasarkan id yang di pilih
        $admin = DB::table('products')->where('id', $id)->get();

        // passing data admin yang dapat ke view editAdmin.blade.php
        return view('editAdmin',['koko'=>$admin]);
    }

    // update data Admin
    public function updateAdmin(Request $request)
    {
        //update data products
        DB::table('products')->where('id', $request->id)->update([
            'image_url'=>$request->image,
            'video_url'=>$request->video,
            'description'=>$request->deskripsi,
            'quantity'=>$request->quantity,
            'price'=>$request->harga
        ]);
        
        // mengalihkan halaman ke halaman admin
        return redirect('/admin');
    }

    // method untuk hapus data produk
    public function hapusAdmin($id)
    {
        // menghapus data products berdasarkan id yang di pilih
        DB::table('products')->where('id', $id)->delete();

        // alihkan halaman ke halaman pantun
        return redirect('/admin');
    }



    // method untuk insert data ke tabel 
    public function storeProduk(Request $request)
    {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();

        $dateTime = date('Ymd_his');
        $newName = 'image_'.$dateTime.'.'.$ext;

        $file->move(public_path('/storage'.env('PATH_IMAGE')),$newName);

        $images = new images;
        $images->image_src = $newName;
        //insert data ke tabel 
        DB::table('products')->insert([
            'id'=>$request->id,
            'user_id'=>auth::user()->id,
            'name'=>$request->name,
            'description'=>$request->deskripsi,
            'price'=>$request->harga,
            'quantity'=>$request->quantity,
            'image_url'=>$newName,
            'video_url'=>$request->video
        ]);
        
        // mengalihkan halaman ke halaman Admin
        return redirect('/admin');
    }

    // menampilkan image
    public function produk()
    {

        $images = Product::all();
        return view(
            'produk',[
                'images' => $images
            ]
        );
    }

    public function showProduk($id)
    {
        $koko = Product::find($id);
        if ($koko) {
            return view('showProduk', compact('koko'));
        } else {
            return redirect('/produk')->with('errors', 'Produk tidak di temukan');
        }
    }

}
