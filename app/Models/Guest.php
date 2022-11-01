<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip', 'nama', 'jenis_kelamin', 'opd_kode', 'jabatan', 'no_hp', 'signed'
    ];

    // protected $appends = [
    //     'jk'
    // ];

    protected $attributes = [
        'nip' => null
    ];

    // public function getJkAttribute()
    // {
    //     $jk='';
    //     if ($this->jenis_kelamin === 'L') {
    //         $jk='Laki-laki';
    //     } else {
    //         $jk='Perempuan';
    //     }
    //     return ucfirst($jk);
    // }

    protected $with = ['opds'];

    public function opds(){
        return $this->belongsTo(Opd::class,'opd_kode','kode');
    }
}
