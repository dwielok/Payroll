<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ikk extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_ikk',
        'dana_ikk',
        'nilai_ikk'
    ];

    public function tunjanganKarya()
    {
        return $this->hasMany(TunjanganKarya::class);
    }
}
