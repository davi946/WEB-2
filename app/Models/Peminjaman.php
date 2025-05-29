<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman'; // <- ini penting

    protected $fillable = [
        'ruang_id', 'pegawai_id', 'tanggal', 'jam_mulai', 'jam_akhir', 'keterangan'
    ];
    // App\Models\Peminjaman.php
public function ruang() {
    return $this->belongsTo(Ruang::class);
}
public function pegawai() {
    return $this->belongsTo(Pegawai::class);
}

}


