<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'barang';
    protected $fillable = [
        'nama_barang','no_asset'
    ];
    public function pinjam(){
        return $this->hasMany(Pinjam::class, 'id_barang');
    }
    public function Jumlah(){
        return $this->count();
    }
    public function ShowAll(){
        return $this->latest()->get();
    }
    public function Selection(){
        return $this->orderBy('nama_barang','ASC')->get();
    }
    public function Store($data){
        return $this->create($data);
    }
    public function Edit($id,$data){
        return $this->find($id)->update($data);
    }
    public function Hapus($id){
        return $this->find($id)->delete();
    }
}
