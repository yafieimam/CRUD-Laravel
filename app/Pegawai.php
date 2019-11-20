<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    //
	protected $table = "pegawai";
	
	public $primaryKey = 'id_pegawai';
	
	protected $fillable = ['nama_pegawai','email_pegawai','alamat_pegawai','no_telp_pegawai'];
}
