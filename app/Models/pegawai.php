<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;
    protected $table = "pegawais";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'nama', 'jabatan_id', 'umur', 'jk', 'alamat'
    ];

    public function jabatanfungsi()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
        
    }
}
