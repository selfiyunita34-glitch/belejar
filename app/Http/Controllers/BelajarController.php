<?php

namespace App\Http\Controllers;

use App\Imports\MultipleSheetsImport;
// use App\Imports\UserImport;
use App\Models\User;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;

// use Maatwebsite\Excel\Excel as MaatwebsiteExcel;

// use Illuminate\Support\Facades\Crypt;
// use Illuminate\Support\Facades\Hash;
// use PhpParser\Node\Stmt\Return_;

class BelajarController extends Controller
{
    public function cache(Request $request)
    {

        $data = Cache::remember('users', now()->addMinutes(5), function () {
            return User::get();
        });

        return view('belajar.cache', compact('data'));
    }

    public function import(Request $request)
    {

        return view('import');
    }

    public function import_proses(Request $request)
    {
        try {

            Excel::import(new MultipleSheetsImport(), $request->file('file'));
            return redirect()->back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function enkripsi(Request $request)
    {
        $string   = "Saya suka makan sate padang";
        $enkripsi = Crypt::encryptString($string);
        $deskripsi = Crypt::decryptString($enkripsi);

        echo "String : " . $string . "<br><br>";
        echo "Hasil Enkripsi : " . $enkripsi . "<br><br>";
        echo "Hasil Dekripsi : " . $deskripsi;

        $params = [
            'nama' => 'Selfi Yunita',
            'hobby' => 'Menari',
            'makanan_favorit' => 'Bakso dan sate padang',
        ];

        $params = Crypt::encrypt($params);

        echo "<a href=" . route('enkripsi-detail', ['params' => $params]) . ">Lihat detail disini</a>";
    }
    public function enkripsi_detail($params)
    {
        $params = Crypt::decrypt($params);

        dd($params);
    }
}
