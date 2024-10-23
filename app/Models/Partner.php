<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'contact_person',
        'region_id',
        'contract_count',
    ];

    // Связь с моделью Region
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    // Связь с контрактами
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
