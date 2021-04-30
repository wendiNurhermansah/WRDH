<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;
use App\Models\Role;
use PDF;
use App\Models\User;
use App\Models\Categorie;
use App\Models\Brand;
use Faker\Provider\el_CY\Company;
use App\Models\Product;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        $user1 = User::all();
        return view('home', compact('user', 'user1'));
    }

    public function tambahData(){
        $role = Role::all();
        // dd($role);
        return view('TambahData', compact('role'));
    }

    public function create(Request $request){
    //    $request->validate([
    //     'name' => 'required',
    //     'username' => 'required',
    //     'email' => 'required | unique',
    //     'password' =>'required',
    //     'roles_id' => 'required'
    //    ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'roles_id' => $request->roles_id
        ]);
        return redirect()->route('admin.data_user')->with('sukses', 'data berhasil di tambahkan');
    
    }

    public function show($id){
        $user = User::find($id);
        $role = Role::all();
        return view('edit', compact('user', 'role'));
    }

    public function update(Request $request, $id){

        $user = User::find($id);
        $name = $request->name;
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $roles = $request->roles_id;

        $user->update([
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'roles_id' => $roles
        ]);
        return redirect()->route('admin.data_user')->with('sukses', 'data berhasil di ubah');
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete($id);
        return redirect()->route('admin.data_user')->with('sukses', 'data berhasil di hapus');
    }

    // kategori
    public function Kategori(){
        $kategori = Categorie::all();
        return view('Kategori', compact('kategori'));
    }

    public function TambahKategori(){
        return view('TambahKategori');
    }

    public function createKategori(Request $request){
        $request->validate([
            'kategori' => 'required',
            'keterangan' => 'required'
        ]);

            Categorie::create([
                'kategori' => $request->kategori,
                'keterangan' => $request->keterangan,
              
            ]);
            return redirect()->route('admin.Kategori')->with('sukses', 'data berhasil di tambahkan');               
        
    }

    public function edit($id){
       $kategori = Categorie::find($id);
        return view('editKategori', compact('kategori'));
    }

    public function updateKategori(Request $request, $id){

        $kategori = Categorie::find($id);
        $kat = $request->kategori;
        $ket = $request->keterangan;
       

        $kategori->update([
            'kategori' => $kat,
            'keterangan' => $ket,
           
        ]);
        return redirect()->route('admin.Kategori')->with('sukses', 'data berhasil di ubah');
    }

    public function Hapus($id){
        $kategori = Categorie::find($id);
        $kategori->delete($id);
        return redirect()->route('admin.Kategori')->with('sukses', 'data berhasil di hapus');
    }


    // Merek
    public function Merek(){
        $merek = Brand::all();
        return view('merek', compact('merek'));
    }

    public function TambahMerekBarang(){
        return view('TambahMerekBarang');
    }

    public function storeMerekBarang(Request $request){
        $request->validate([
            'merk' => 'required',
            'keterangan' => 'required'
        ]);

            Brand::create([
                'merk' => $request->merk,
                'keterangan' => $request->keterangan,
              
            ]);
            return redirect()->route('admin.Merek')->with('sukses', 'data berhasil di tambahkan');               
        
    }

    public function editMerek($id){
        $merk = Brand::find($id);
         return view('editMerekBarang', compact('merk'));
     }

     public function updateMerek(Request $request, $id){

        $merk = Brand::find($id);
        $merek = $request->merk;
        $ket = $request->keterangan;
       

        $merk->update([
            'kategori' => $merek,
            'keterangan' => $ket,
           
        ]);
        return redirect()->route('admin.Merek')->with('sukses', 'data berhasil di ubah');
    }

    public function HapusMerek($id){
        $merek = Brand::find($id);
        $merek->delete($id);
        return redirect()->route('admin.Merek')->with('sukses', 'data berhasil di hapus');
    }

// products

public function Produk(){
    $produk = Product::all();
    return view ('Produk', compact('produk'));
}

public function TambahProduk(){
    $kat = Categorie::all();
    $merk = Brand::all();
    return view('TambahProduk', compact('kat', 'merk'));
}

public function storeProduk(Request $request){
    $request->validate([
        'nama' => 'required',
        'categories_id' => 'required',
        'brands_id' => 'required',
        'harga' => 'required',
        'stok' => 'required',
        'foto' => 'required'
        
       
    ]);
    $file     = $request->file('foto');
    $fileName = time() . "." . $file->getClientOriginalName();
    $request->file('foto')->move("produk_barang", $fileName);

    $products = new Product();
    $products->nama = $request->nama;
    $products->categories_id = $request->categories_id;
    $products->brands_id  =$request->brands_id;
    $products->harga  =$request->harga;
    $products->stok  =$request->stok;
    $products->foto     = $fileName;
    $products->save();
        return redirect()->route('admin.produk')->with('sukses', 'data berhasil di tambahkan');               
    
}

public function RubahProduk($id){
    $produk = Product::find($id);
    $kat = Categorie::all();
    $merk = Brand::all();
    return view ('editProduk', compact('produk', 'kat', 'merk'));
}

public function updateProduk(Request $request, $id){
    $product = Product::find($id);
    $request->validate([
        'nama' => 'required',
        'categories_id' => 'required',
        'brands_id' => 'required',
        'harga' => 'required',
        'stok' => 'required',
        'foto' => 'required'
        
       
    ]);

    $nama = $request->nama;
    $kat = $request->categories_id;
    $merek = $request->brands_id;
    $harga = $request->harga;
    $stok = $request->stok;

    if ($request->foto != null) {
        $request->validate([
            'foto' => 'required|mimes:png,jpg,jpeg|max:1024'
        ]);

        // Proses Saved Foto
        $file     = $request->file('foto');
        $fileName = time() . "." . $file->getClientOriginalName();
        $request->file('foto')->move("produk_barang", $fileName);

      

        $product->update([
            'nama'    => $nama,
            'categories_id'   => $kat,
            'brands_id' => $merek,
            'harga' => $harga,
            'stok' => $stok,
            'foto'    => $fileName
        ]);
    } else {
        $product->update([
            'nama'    => $nama,
            'categories_id'   => $kat,
            'brands_id' => $merek,
            'harga' => $harga,
            'stok' => $stok,
           
        ]);
    }
    return redirect()->route('admin.produk')->with('sukses', 'data berhasil di ubah');
}

public function HapusProduk($id){
    $produk = Product::find($id);
        $produk->delete($id);
        return redirect()->route('admin.produk')->with('sukses', 'data berhasil di hapus');
}


// Laporan
public function Laporan(){
    $produk = Product::all();
    return view ('Laporan', compact('produk'));
}

public function print()
{
    $Produk = Product::all();

    $pdf = PDF::loadview('produk_pdf',['Produk'=>$Produk]);
    return $pdf->stream('laporan-Produk-pdf.pdf');
}




//     public function submit_product(Request $req)
//     {
//         $product = new Product;

//         $product->nama = $req->get('nama');
//         $product->categories_id = $req->get('categories_id');
//         $product->brands_id = $req->get('brands_id');
//         $product->harga = $req->get('harga');
//         $product->stok = $req->get('stok');

//         if ($req->hasFile('foto')) {
//             $extension = $req->file('foto')->extension();

//             $filename = 'foto_barang' . time() . '.' . $extension;
//             $req->file('foto')->storeAs(
//                 'public/foto_barang',
//                 $filename
//             );

//             $product->foto = $filename;
//         }
//         $product->save();

//         $notification = array(
//             'message' => 'Data buku berhasil ditambahkan',
//             'alert-type' => 'success'
//         );

//         return redirect()->route('admin.products')->with($notification);
//     }

// public function update_product(Request $req)
//     {
//         $product = Product::find($req->get('id'));

//         $product->nama = $req->get('nama');
//         $product->categories_id = $req->get('categories_id');
//         $product->brands_id = $req->get('brands_id');
//         $product->harga = $req->get('harga');
//         $product->stok = $req->get('stok');

//         if ($req->hasFile('foto')) {
//             $extension = $req->file('foto')->extension();

//             $filename = 'foto_barang' . time() . '.' . $extension;
//             $req->file('foto')->storeAs(
//                 'public/foto_barang',
//                 $filename
//             );
//             Storage::delete('public/foto_barang/'.$req->get('old_foto'));

//             $product->foto = $filename;
//         }
//         $product->save();

//         $notification = array(
//             'message' => 'Data Barang berhasil diubah',
//             'alert-type' => 'success'
//         );

//         return redirect()->route('admin.products')->with($notification);
//     }

//     public function delete_book(Request $req)
//     {
//         $product = Product::find($req->get('id'));

//         storage::delete('public/foto_barang/'.$req->get('old_foto'));

//         $product->delete();

//         $notification = array(
//             'message' => 'Data Barang Berhasil Dihapus',
//             'alert-type' => 'succes'
//         );

//         return redirect()->route('admin.products')->with($notification);
//     }


//     public function print_books(){
//         $books = Book::all();

//         $pdf = PDF::loadview('print_books', ['books' => $books]);
//         return $pdf->download('data_buku.pdf');
//     }

 }
