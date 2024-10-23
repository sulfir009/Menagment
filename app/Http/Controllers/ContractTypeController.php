<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContractType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreContractTypeRequest;
use App\Http\Requests\UpdateContractTypeRequest;
use App\Http\Requests\DestroyContractTypeRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PartnerController;

class ContractTypeController extends Controller
{
    public function index()
{
    $contractTypes = ContractType::paginate(10);
    return view('contract_types.index', compact('contractTypes'));
}


    public function create()
    {
        return view('contract_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_name' => 'required|string|max:255',
        ]);

        ContractType::create($request->all());

        return redirect()->route('contract_types.index');
    }

    public function edit(ContractType $contractType)
    {
        return view('contract_types.create', compact('contractType'));
    }

    public function update(Request $request, ContractType $contractType)
    {
        $request->validate([
            'type_name' => 'required|string|max:255',
        ]);

        $contractType->update($request->all());

        return redirect()->route('contract_types.index');
    }

    public function destroy(ContractType $contractType)
    {
        $contractType->delete();
        return redirect()->route('contract_types.index');
    }
}
