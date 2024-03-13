<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\Pinjam;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected $barang;
    protected $pinjam;
    public function __construct(barang $barang, Pinjam $pinjam){
        $this->barang = $barang;
        $this->pinjam = $pinjam;
    }
    public function index(){
        $title = 'Dashboard';
        $j_b = $this->barang->Jumlah();
        $t_p = $this->pinjam->today();
        $b = $this->pinjam->belumKembali();
        $k = $this->pinjam->kembali();
        return view('index',compact('title','j_b','t_p','b','k'));
    }
}
