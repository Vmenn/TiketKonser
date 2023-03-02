<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PesananController extends Controller
{
    public function pesanan()
    {
        if (request()->ajax()) {
            $query = Order::where('status', 'valid')->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {

                    $btn = '<a href="' . route('checkin', $item->id) . '"  type="button" class="btn btn-success"> Aproved</a>';
                    return $btn;
                })
                // ->addColumn('photo', function ($item) {
                //     $btn = '<img class="tbl-thumb" src="' . asset('Upload/tiket/' . $item->image) . '" alt="No img"
                //     style="height:40px; width:40px " />';
                //     return $btn;
                // })
                ->addColumn('status', function ($item) {
                    if ($item->status == 'valid') {
                        $btn = '<span class="badge rounded-pill bg-success">Belum Check In</span>';
                    } else {
                        $btn = '<span class="badge rounded-pill bg-danger">Sudah Check In</span>';
                    }
                    return $btn;
                })
                ->rawColumns(['action', 'description',  'status',])
                ->make();
        }

        return view('admin.pesanan.index');
    }

    public function Checkin($id)
    {

        Order::findOrFail($id)->update(['status' => 'expired']);

        return redirect()->back();
    } // End Method
}
