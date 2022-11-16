<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Trait\Uuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistrasiPasien extends Model
{
    use HasFactory, Uuids;
    protected $table = 'registrasi_pasiens';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $guarded = [];

    public function anamnesa(): BelongsTo
    {
        return $this->belongsTo(AnamnesaPasien::class);
    }
}
