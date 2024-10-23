<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreContractRequest;
use App\Models\Contract;
use App\Models\Partner;
use App\Models\ContractType;


class ContractController extends Controller
{
    public function index()
{
    $contracts = Contract::with('partner', 'contractType')->paginate(10); // Заменено 'types' на 'contractType'
    return view('contracts.index', compact('contracts'));
}
public function show(Contract $contract)
{
    return view('contracts.show', compact('contract'));
}


    public function create()
    {
        $partners = Partner::all();
        $contractTypes = ContractType::all();
        return view('contracts.create', compact('partners', 'contractTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'partner_id' => 'required|exists:partners,id',
            'contract_date' => 'required|date',
            'amount' => 'required|numeric',
            'types' => 'required|array',
        ]);

        $contract = Contract::create($request->only('partner_id', 'contract_date', 'amount'));
        $contract->types()->attach($request->types);

        return redirect()->route('contracts.index');
    }

    public function edit(Contract $contract)
    {
        $partners = Partner::all();
        $contractTypes = ContractType::all();
        $selectedTypes = $contract->types->pluck('id')->toArray();
        return view('contracts.edit', compact('contract', 'partners', 'contractTypes', 'selectedTypes'));
    }

    public function update(Request $request, Contract $contract)
    {
        $request->validate([
            'partner_id' => 'required|exists:partners,id',
            'contract_date' => 'required|date',
            'amount' => 'required|numeric',
            'types' => 'required|array',
        ]);

        $contract->update($request->only('partner_id', 'contract_date', 'amount'));
        $contract->types()->sync($request->types);

        return redirect()->route('contracts.index');
    }

    public function destroy(Contract $contract)
    {
        $contract->delete();
        return redirect()->route('contracts.index');
    }
}
