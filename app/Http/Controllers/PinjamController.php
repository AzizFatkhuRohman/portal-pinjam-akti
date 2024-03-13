<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\Pinjam;
use Illuminate\Http\Request;
use Validator;

class PinjamController extends Controller
{
    protected $pinjam;
    protected $barang;
    public function __construct(Pinjam $pinjam, barang $barang)
    {
        $this->pinjam = $pinjam;
        $this->barang = $barang;
    }
    public function Get()
    {
        $title = 'Data Pinjaman';
        $collection = $this->pinjam->ShowAll();
        $n_b = $this->barang->Selection();
        return view('pinjaman.index', compact('title', 'collection', 'n_b'));
    }
    public function Post(Request $request)
    {
        $val = Validator::make($request->all(), [
            'nama_peminjam' => 'required',
            'id_barang' => 'required',
            'nim_noreg' => 'required',
            'start' => 'required',
            'keterangan'=>'required'

        ]);
        if ($val->fails()) {
            return redirect()->back()->withErrors($val);
        } else {
            $this->pinjam->Store([
                'id_barang' => $request->id_barang,
                'nama_peminjam' => $request->nama_peminjam,
                'nim_noreg' => $request->nim_noreg,
                'start' => $request->start,
                'keterangan'=>$request->keterangan
            ]);
            return redirect()->back()->with('create', 'Create success');
        }

    }
    public function Put(Request $request, $id)
    {
        $val = Validator::make($request->all(), [
            'nama_peminjam' => 'required',
            'id_barang' => 'required',
            'nim_noreg' => 'required',
            'start' => 'required',
            'keterangan'=>'required'

        ]);
        if ($val->fails()) {
            return redirect()->back()->withErrors($val);
        } else {
            if ($request->end != null) {
                $data = [
                    'id_barang' => $request->id_barang,
                    'nama_peminjam' => $request->nama_peminjam,
                    'nim_noreg' => $request->nim_noreg,
                    'start' => $request->start,
                    'end'=>$request->end,
                    'keterangan'=>$request->keterangan,
                    'status'=>'kembali'
                ];
            } else {
                $data = [
                    'id_barang' => $request->id_barang,
                    'nama_peminjam' => $request->nama_peminjam,
                    'nim_noreg' => $request->nim_noreg,
                    'start' => $request->start,
                    'end'=>$request->end,
                    'keterangan'=>$request->keterangan
                ];
            }
            $this->pinjam->Edit($id, $data);
            return redirect()->back()->with('edit', 'Edit Success');
        }

    }
}
