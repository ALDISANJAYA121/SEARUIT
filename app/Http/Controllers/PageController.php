<?php

namespace App\Http\Controllers;

use App\Models\ListApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{
    //show
    public function index()
    {
        $lists_bps_ri = ListApp::where('pembuat', 'BPS RI')->orderBy('nama', 'asc')->get();
        $lists_bps_aceh = ListApp::where('pembuat', 'BPS Aceh')->orderBy('nama', 'asc')->get();
        $lists_bps_kabkot = ListApp::where('pengguna', 'BPS satker kako pembuat saja')->orderBy('nama', 'asc')->get();

        $tophits = ListApp::orderBy('hits', 'desc')->take(10)->get();

        $topItemsArray = $tophits->toArray();
        $lastElement = array_pop($topItemsArray);
        array_unshift($topItemsArray, $lastElement);
        $tophits = collect($topItemsArray);

        return view('index', compact('lists_bps_ri', 'lists_bps_aceh', 'lists_bps_kabkot', 'tophits'));
    }

    //search
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        
        $lists_bps_ri = ListApp::where('pembuat', 'BPS RI')->orderBy('nama', 'asc')->get();
        if($keyword != '') {
            $lists_bps_ri = ListApp::where('pembuat', 'BPS RI')
                        ->where(function ($query) use ($keyword) {
                            $query->where('nama', 'LIKE', '%' . $keyword . '%')
                                ->orWhere('pembuat', 'LIKE', '%' . $keyword . '%')
                                ->orWhere('deskripsi', 'LIKE', '%' . $keyword . '%');
                        })
                        ->orderBy('nama', 'asc')
                        ->get();
        }

        $lists_bps_aceh = ListApp::where('pembuat', 'BPS Aceh')->orderBy('nama', 'asc')->get();
        if($keyword != '') {
            $lists_bps_aceh = ListApp::where('pembuat', 'BPS Aceh')
                        ->where(function ($query) use ($keyword) {
                            $query->where('nama', 'LIKE', '%' . $keyword . '%')
                                ->orWhere('pembuat', 'LIKE', '%' . $keyword . '%')
                                ->orWhere('deskripsi', 'LIKE', '%' . $keyword . '%');
                        })
                        ->orderBy('nama', 'asc')
                        ->get();
        }

        $lists_bps_kabkot = ListApp::where('pengguna', 'BPS satker kako pembuat saja')->orderBy('nama', 'asc')->get();
        if($keyword != '') {
            $lists_bps_kabkot = ListApp::where('pengguna', 'BPS satker kako pembuat saja')
                        ->where(function ($query) use ($keyword) {
                            $query->where('nama', 'LIKE', '%' . $keyword . '%')
                                ->orWhere('deskripsi', 'LIKE', '%' . $keyword . '%')
                                ->orWhere('pembuat', 'LIKE', '%' . $keyword . '%');
                        })
                        ->orderBy('nama', 'asc')
                        ->get();
        }

        return response()->json([
            'lists_bps_ri' => $lists_bps_ri,
            'lists_bps_aceh' => $lists_bps_aceh,
            'lists_bps_kabkot' => $lists_bps_kabkot
         ]);
    }

    public function updateHits(Request $request)
    {
        $app = ListApp::find($request->item_id);

        if ($app) {
            $app->hits += 1;
            $app->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function admin()
    {
        $apps = ListApp::all();
        return view('admin', compact('apps'));
    }

    public function tambah()
    {
        return view('tambah');
    }

    public function tambahApp(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'akses' => "required",
            'pengguna' => 'required',
            'pembuat' => 'required',
            'link' => 'required',
            'deskripsi' => 'required',
            'logo' => 'mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
        
        $app = new ListApp;

        $app->nama = $request->nama;
        $app->pengguna = $request->pengguna;
        $app->pembuat = $request->pembuat;
        $app->akses = $request->akses;
        $app->hits = 0;
        $app->link = $request->link;
        $app->deskripsi = $request->deskripsi;

        if($request->file('logo') != NULL) {
            $image = time() . '_' . $request->file('logo')->getClientOriginalName();
            $app->logo = $image;
            $request->logo->move(public_path('/img'), $image);
        } else {
            $app->logo = 'logo_bps.png';
        }

        $app->save();

        return redirect('/admin');
    }

    public function edit($id)
    {
        $apps = ListApp::findorfail($id);
        return view('update', compact('apps'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'pengguna' => 'required',
            'pembuat' => 'required',
            'akses' => 'required',
            'link' => 'required',
            'deskripsi' => 'required',
            'logo' => 'mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $app = ListApp::findorfail($id);

        $app->nama = $request->nama;
        $app->pengguna = $request->pengguna;
        $app->pembuat = $request->pembuat;
        $app->akses = $request->akses;
        $app->link = $request->link;
        $app->deskripsi = $request->deskripsi;

        if ($request->hasFile('logo')) {
            $name = time() . '_' . $request->file('logo')->getClientOriginalName();

            File::delete(public_path('/img') . $app->logo);
            $request->logo->move(public_path('/img'), $name);
    
            $app->logo = $name;
        }

        $app->save();

        return redirect('/admin');
    }

    public function delete($id)
    {
        $app = ListApp::findorfail($id);

        File::delete(public_path('/img') . $app->logo);
        $app->delete();

        return redirect('/admin');
    }
}
