<?php

namespace Database\Seeders;


use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class aboutseeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $about=About::create([
            'foto'=>'invito.jpg',
            'judul'=>'BPSDMP Kominfo Surabaya',
            'deskripsi'=>'<p>BPSDMP Kominfo Surabaya adalah Unit Pelaksana Teknis di Kementerian Kominfo
             yang berfokus pada kegiatan pengembangan SDM dan penelitian bidang komunikasi dan informatika
              dengan wilayah kerja meliputi Provinsi Jawa Timur dan Nusa Tenggara Barat
            </p>',
        ]);
    }
}
