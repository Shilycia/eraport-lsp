<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    use HasFactory;
    protected $table = 'nilais';
    protected $fillable = [
        'siswa_id',
        'walas_id',
        'matematika',
        'indonesia',
        'inggris',
        'kejuruan',
        'pilihan',
        'rata-rata'
    ];

    public function siswa(){
        return $this->belongsTo(murid::class);
    }

    public function walas(){
        return $this->belongsTo(walas::class);
    }
}
