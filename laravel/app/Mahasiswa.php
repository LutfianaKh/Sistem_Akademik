<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = [
        'nim',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin'
    ];

    protected $dates = ['tanggal_lahir'];

    public function getNamaAttribute($nama){
        return ucwords($nama);
    }

    public function setNamaAttribute($nama){
        $this->attributes['nama'] = strtolower($nama);
    }

    public function telepon(){
        return $this->hasOne('App\Telepon', 'id_mahasiswa');
    }

 }
