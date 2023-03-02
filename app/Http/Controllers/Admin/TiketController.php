<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tiket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TiketController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Tiket::latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {

                    if ($item->status == 1) {
                        $btn =  '<a href="' . route('tiket.edit', $item->id) . '"  class="btn btn-success "><i
                        class="fas fa-pencil-alt"></i></a>';
                        $btn = $btn . ' <a href="' . route('tiket.delete', $item->id) . '"  class="btn btn-success" id="delete"><i
                        class="far fa-trash-alt"></i></a>';
                        $btn = $btn . '<a href="' . route('tiket.inactive', $item->id) . '"  type="button" class="btn btn-success">
                        <i class="far fa-eye" class="btn btn-success"></i></i></a>';
                    } else {

                        $btn = '<a href="' . route('tiket.edit', $item->id) . '"  class="btn btn-success "><i
                        class="fas fa-pencil-alt"></i></a>';
                        $btn = $btn . ' <a href="' . route('tiket.delete', $item->id) . '"  class="btn btn-success" id="delete"><i
                        class="far fa-trash-alt"></i></a>';
                        $btn = $btn . '<a href="' . route('tiket.active', $item->id) . '"  type="button" class="btn btn-success">
                        <i class="far fa-eye-slash" class="btn btn-success"></i></i></a>';
                    }
                    return $btn;
                })
                ->addColumn('photo', function ($item) {
                    $btn = '<img class="tbl-thumb" src="' . asset('Upload/tiket/' . $item->image) . '" alt="No img"
                    style="height:40px; width:40px " />';
                    return $btn;
                })->addColumn('status', function ($item) {
                    if ($item->status == 0) {
                        $btn = '<span class="badge rounded-pill bg-success">Active</span>';
                    } else {
                        $btn = '<span class="badge rounded-pill bg-danger">InActive</span>';
                    }
                    return $btn;
                })->addColumn('price', function ($item) {

                    $btn = '<td>Rp ' . number_format($item->price) . '</td>';

                    return $btn;
                })
                ->rawColumns(['action', 'description', 'photo', 'status', 'price'])
                ->make();
        }
        return view('admin.tiket.index');
    }


    public function AddTiket(Request $request)
    {
        $image = $request->file('image');
        $destinationPath = 'Upload/tiket/';
        $name_gen = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $name_gen);
        $save_url = $name_gen;

        $user = new Tiket();
        $user->id = $request->id;
        $user->name = $request->name;
        $user->desc = $request->desc;
        $user->location = $request->location;
        $user->price = $request->price;
        $user->event_time = $request->event_time;
        $user->image = $save_url;
        $user->status = 0;
        $user->save();



        return back();
    }



    public function EditTiket($id)
    {
        $tiket = Tiket::findorfail($id);
        return view('admin.tiket.edit', compact('tiket',));
    }


    public function UpdateTiket(Request $request)
    {
        $art_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('image')) {

            $image = $request->file('image');
            $destinationPath = 'Upload/tiket/';
            $name_gen = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name_gen);
            $save_url = $name_gen;


            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Tiket::findOrFail($art_id)->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'price' => $request->price,
                'location' => $request->location,
                'event_time' => $request->event_time,
                'image' => $save_url,
            ]);



            return redirect()->route('tiket');
        } else {

            Tiket::findOrFail($art_id)->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'price' => $request->price,
                'location' => $request->location,
                'event_time' => $request->event_time,
            ]);



            return redirect()->route('tiket');
        } // end else
    } // End Method


    public function DeleteTiket($id)
    {

        $Happening = Tiket::findOrFail($id);
        $img = $Happening->image;
        unlink($img);

        Tiket::findOrFail($id)->delete();

        return redirect()->back();
    } // End Method

    public function TiketInActive($id)
    {

        Tiket::findOrFail($id)->update(['status' => 0]);

        return redirect()->back();
    } // End Method

    public function TiketActive($id)
    {

        Tiket::findOrFail($id)->update(['status' => 1]);

        return redirect()->back();
    } // End Method
}
