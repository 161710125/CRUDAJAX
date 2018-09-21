<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
	protected $fillable = array('nama','kelas','jurusan','jk','alamat');
	public $timestamp = true;
}
