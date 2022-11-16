<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'ketua', 'sekretaris', 'pencatat','peserta', 'isi',
        'pembuka', 'pembahasan', 'keputusan', 'program_id',
    ];


    public function programs(){
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }



}
