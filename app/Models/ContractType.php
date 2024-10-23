<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractType extends Model
{
    use HasFactory;

    // Разрешенные для массового заполнения поля
    protected $fillable = [
        'type_name', // Добавь здесь только те поля, которые нужны для массового заполнения
    ];
}
