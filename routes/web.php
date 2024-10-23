<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ContractController;
use Illuminate\Support\Facades\Auth;
use App\Models\Partner;
use App\Models\Region;
use App\Models\Contract;
use App\Models\ContractType;
use App\Http\Controllers\ContractTypeController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('partners', PartnerController::class);
Route::apiResource('api/partners', PartnerController::class)->names([
    'index' => 'api.partners.index',
    'store' => 'api.partners.store',
    'show' => 'api.partners.show',
    'update' => 'api.partners.update',
    'destroy' => 'api.partners.destroy',
]);

Route::resource('contract_types', ContractTypeController::class);
Route::resource('contracts', ContractController::class);

Route::apiResource('api/contracts', ContractController::class)->names([
    'index' => 'api.contracts.index',
    'store' => 'api.contracts.store',
    'show' => 'api.contracts.show',
    'update' => 'api.contracts.update',
    'destroy' => 'api.contracts.destroy',
]);

// Аутентификация
Auth::routes();

Route::middleware('auth')->group(function() {
    Route::resource('contracts', ContractController::class);
});
