<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePartnerRequest;
use App\Models\Partner;
use App\Models\Region;
use App\Models\Contract;
use App\Models\ContractType;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContractTypeController;
class PartnerController extends Controller
{
    public function index(Request $request)
{
    $sortOrder = $request->get('order', 'asc');
    $search = $request->get('search');

    $partners = Partner::with('region')
        ->when($search, function($query, $search) {
            return $query->where('company_name', 'like', "%{$search}%")
                         ->orWhereHas('region', function($query) use ($search) {
                             $query->where('region_name', 'like', "%{$search}%");
                         });
        })
        ->orderBy('company_name', $sortOrder)
        ->paginate(10);
    
    return view('partners.index', compact('partners', 'sortOrder', 'search'));
}


    public function create()
    {
        $regions = Region::all();
        return view('partners.create', compact('regions'));
    }

    public function store(StorePartnerRequest $request)
{
    Partner::create($request->validated());
    return redirect()->route('partners.index');
}

public function update(StorePartnerRequest $request, Partner $partner)
{
    $partner->update($request->validated());
    return redirect()->route('partners.index');
}


    public function edit(Partner $partner)
    {
        $regions = Region::all();
        return view('partners.edit', compact('partner', 'regions'));
    }

    

    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('partners.index');
    }

    public function show(Partner $partner)
{
    $contracts = $partner->contracts;
    return view('partners.show', compact('partner', 'contracts'));
}

}
