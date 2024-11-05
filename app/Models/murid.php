<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class murid extends Model
{
     /** @use HasFactory<\Database\Factories\muridFactory> */
    use HasFactory, Notifiable;
    protected $table = 'murids';
    protected $fillable = ['nis', 'password', 'nama_kelas'];
    protected $guarded = ['id'];
    protected $hidden = ['password'];


    public function kelas(){
        return $this->belongsTo(kelas::class);
    }

    public function nilai(){
        return $this->hasMany(nilai::class);
    }
}
