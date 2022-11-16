<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnamnesaPasien extends Model
{
    use HasFactory;
    protected $table = 'anamnesa_pasiens';
    protected $guarded = ['id'];

    public $with = ['pasien'];

    public function pasien()
    {
        return $this->hasMany(RegistrasiPasien::class, 'uuid', 'uuid_pasien');
    }
}
