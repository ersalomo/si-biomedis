<?php

namespace App\Models;

use App\Trait\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class RegistrasiPasien extends Model
{
    use HasFactory, Uuids;
    protected $table = 'registrasi_pasiens';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $guarded = ['uuid'];


    public function anamnesa(): BelongsTo
    {
        return $this->belongsTo(AnamnesaPasien::class);
    }
    // public function createdAt(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($date) => $date ?  Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d') : '',
    //     );
    // }
}
