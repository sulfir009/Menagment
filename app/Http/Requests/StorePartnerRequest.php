<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartnerRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Здесь можно добавить логику проверки прав
    }

    public function rules()
    {
        return [
            'company_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id',
            'contract_count' => 'required|integer',
        ];
    }
}
