<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use Validator;

class BarangController extends Controller
{
    protected $barang;
    public function __construct(barang $barang){
        $this->barang = $barang;
    }
    public function Get(){
        $title = 'Data Barang';
        $collection = $this->barang->ShowAll();
        return view('barang.index',compact('title', 'collection'));
    }
    public function Post(Request $request){
        $val = Validator::make($request->all(),[
            'nama_barang'=>'required'
        ]);
        if ($val->fails()) {
            return redirect()->back()->withErrors($val);
        } else {
            $this->barang->Store([
                'nama_barang'=>$request->nama_barang,
                'no_asset'=>$request->no_asset
            ]);
            return redirect()->back()->with('create','Create success');
        }
        
    }
    public function Put(Request $request, $id){
        $val = Validator::make($request->all(),[
            'nama_barang'=>'required'
        ]);
        if ($val->fails()) {
            return redirect()->back()->withErrors($val);
        } else {
            $data = [
                'nama_barang'=>$request->nama_barang,
                'no_asset'=>$request->no_asset
            ];
            $this->barang->Edit($id, $data);
            return redirect()->back()->with('edit','Edit success');
        }
        
    }
    public function Destroy($id){
        $this->barang->Hapus($id);
        return redirect('data-barang')->with('delete','Delete Success');
    }
}
