@extends('layouts.app')

@section('title', 'Edit Contract')
@section('header-title', 'Edit Contract')
@section('header-subtitle', 'Edit the details of the selected contract')

@section('content')
    <h1 class="mb-4">Редагувати контракт</h1>

    <form action="{{ route('contracts.update', $contract) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="partner" class="form-label">Партнер</label>
            <select name="partner_id" id="partner" class="form-select">
                @foreach($partners as $partner)
                    <option value="{{ $partner->id }}" {{ $contract->partner_id == $partner->id ? 'selected' : '' }}>
                        {{ $partner->company_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="contract_type" class="form-label">Тип контракту</label>
            <select name="contract_type_id" id="contract_type" class="form-select">
                @foreach($contractTypes as $contractType)
                    <option value="{{ $contractType->id }}" {{ $contract->contract_type_id == $contractType->id ? 'selected' : '' }}>
                        {{ $contractType->type_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="contract_date" class="form-label">Дата підписання</label>
            <input type="date" name="contract_date" id="contract_date" class="form-control" value="{{ $contract->contract_date }}">
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Сума контракту (грн)</label>
            <input type="number" name="amount" id="amount" class="form-control" value="{{ $contract->amount }}">
        </div>

        <button type="submit" class="btn btn-custom">Зберегти зміни</button>
        <a href="{{ route('contracts.index') }}" class="btn btn-secondary">Назад</a>
    </form>
@endsection
