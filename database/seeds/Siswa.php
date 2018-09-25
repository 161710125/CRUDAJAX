<?php

use Illuminate\Database\Seeder;
use App\Kelas;

class Siswa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $siswa = Kelas::create(['nama'=>'Asep Mourinho','kelas'=>'XI','jurusan'=>'TSM','tgl_lahir'=>'1999-12-12','jk'=>'Laki-Laki','alamat'=>'Tonggoh','hobi'=>'Sepak Bola','photo'=>'/upload/photo/hmm.jpg']);
        $siswa1 = Kelas::create(['nama'=>'Ateng Zidane','kelas'=>'XI','jurusan'=>'TKR','tgl_lahir'=>'1999-12-12','jk'=>'Laki-Laki','alamat'=>'Kaler','hobi'=>'Sepak Bola']);
        $siswa2 = Kelas::create(['nama'=>'Mang Ibra','kelas'=>'XI','jurusan'=>'RPL','tgl_lahir'=>'1999-12-12','jk'=>'Laki-Laki','alamat'=>'Kulon','hobi'=>'Sepak Bola']);
    }
}
