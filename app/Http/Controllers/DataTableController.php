<?php

namespace App\Http\Controllers;

use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class DataTableController extends Controller
{
    public function serverside(Request $request)
    {

        if ($request->ajax()) {

            $data = new User;
            $data = $data->latest();


            return DataTables::of($data)
                ->addColumn('no', function ($data) {
                    return 'ini nomor';
                })
                ->addColumn('photo', function ($data) {
                    return '<img src="' . asset('storage/photo-user/' . $data->image) . '" alt=""  width="100">';
                })
                ->addColumn('name', function ($data) {
                    return $data->name;
                })
                ->addColumn('email', function ($data) {
                    return $data->email;
                })
                ->addColumn('action', function ($data) {
                    return '<a href="' . route('admin.user.edit', ['id' => $data->id]) . '" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a>
                    <a data-toggle="modal" data-target="#modal-hapus-' . $data->id . '" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a>';
                })
                ->rawColumns(['photo','action'])
                ->make(true);
        }


        return view('datatable.serverside', compact('request'));
    }
}
