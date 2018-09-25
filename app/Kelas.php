<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
	protected $fillable = array('nama','kelas','jurusan','tgl_lahir','jk','alamat','hobi','Photo');
	public $timestamp = true;
}
