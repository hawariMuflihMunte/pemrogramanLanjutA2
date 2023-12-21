<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "matakuliah";
    protected $fillable = [
        'kode',
        'nama',
        'sks',
        'dosen',
        'kelas'
    ];
}
