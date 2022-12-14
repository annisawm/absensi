<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'acara', 'tanggal', 'waktu', 'tempat', 'jam',
    ];

    public function notes(){
        return $this->hasMany(Note::class,'program_id','id');
    }
}
