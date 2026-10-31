<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    public $timestamps = false;
    protected $fillable = ['nama', 'nomor_sip', 'spesialisasi', 'kontak'];
}
