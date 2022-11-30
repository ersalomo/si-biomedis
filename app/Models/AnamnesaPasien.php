<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

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
    public function createdAt(): Attribute
    {
        return new Attribute(
            get: fn ($value): string => Carbon::parse($value)->format('Y-m-d'),
        );
    }
}
