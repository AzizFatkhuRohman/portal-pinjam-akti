<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory,HasUuids;
    protected $table = 'peminjaman';
    protected $fillable = [
        'nama_peminjam','id_barang','nim_noreg', 'start','end','status','keterangan'
    ];
    public function Barang(){
        return $this->belongsTo(barang::class,'id_barang');
    }
    public function today(){
        return $this->whereDate('created_at', Carbon::today())->count();
    }
    public function belumKembali(){
        return $this->where('status','belum')->count();
    }
    public function kembali(){
        return $this->where('status','kembali')->count();
    }
    public function ShowAll(){
        return $this->with('barang')->latest()->get();
    }
    public function Store($data){
        return $this->create($data);
    }
    public function Edit($id, $data){
        return $this->find($id)->update($data);
    }
    public function End($id_pinjam, $data){
        return $this->find($id_pinjam)->update($data);
    }
}
