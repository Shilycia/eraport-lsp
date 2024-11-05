<?php

namespace Database\Seeders;

use App\Models\kelas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        kelas::created(['nama_kelas'=>'12 RPL 1']);
        kelas::created(['nama_kelas'=>'12 RPL 2']);
    }
}
