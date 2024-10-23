<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'contract_date',
        'amount',
    ];

    // Связь с партнерами
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    // Связь с типами контрактов
    public function contractType()
    {
        return $this->belongsTo(ContractType::class);
    }
}
