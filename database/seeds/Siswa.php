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
        $siswa = Kelas::create(['nama'=>'Asep Mourinho','kelas'=>'XI','jurusan'=>'TSM','jk'=>'Laki-Laki','alamat'=>'Tonggoh']);
        $siswa1 = Kelas::create(['nama'=>'Ateng Zidane','kelas'=>'XI','jurusan'=>'TKR','jk'=>'Laki-Laki','alamat'=>'Kaler']);
        $siswa2 = Kelas::create(['nama'=>'Mang Ibra','kelas'=>'XI','jurusan'=>'RPL','jk'=>'Laki-Laki','alamat'=>'Kulon']);
    }
}
