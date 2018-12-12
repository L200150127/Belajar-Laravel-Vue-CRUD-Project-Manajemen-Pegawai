<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';

    protected $fillable = [
    	'nama_pegawai', 'jenis_kelamin',
    	'tanggal_lahir', 'id_jabatan', 'foto',
    	'keterangan'
    ];

    public function jabatan()
    {
    	return $this->belongsTo('App\Jabatan');
    }
}
