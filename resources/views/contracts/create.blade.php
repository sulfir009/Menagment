@extends('layouts.app')

@section('title', isset($contract) ? 'Редагувати контракт' : 'Додати новий контракт')
@section('header-title', isset($contract) ? 'Редагувати контракт' : 'Додати новий контракт')
@section('header-subtitle', isset($contract) ? 'Внесіть зміни до контракту' : 'Заповніть дані для нового контракту')

@section('content')
    <h1 class="mb-4">{{ isset($contract) ? 'Редагувати контракт' : 'Додати новий контракт' }}</h1>

    <!-- Форма добавления/редактирования контракта -->
    <form action="{{ isset($contract) ? route('contracts.update', $contract) : route('contracts.store') }}" method="POST">
        @csrf
        @if(isset($contract))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="partner_id" class="form-label">Партнер</label>
            <select name="partner_id" id="partner_id" class="form-control" required>
                <option value="">Виберіть партнера</option>
                @foreach($partners as $partner)
                    <option value="{{ $partner->id }}" {{ isset($contract) && $contract->partner_id == $partner->id ? 'selected' : '' }}>
                        {{ $partner->company_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="contract_date" class="form-label">Дата підписання</label>
            <input type="date" name="contract_date" id="contract_date" class="form-control" value="{{ isset($contract) ? $contract->contract_date : old('contract_date') }}" required>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Сума контракту</label>
            <input type="number" name="amount" id="amount" class="form-control" value="{{ isset($contract) ? $contract->amount : old('amount') }}" required>
        </div>

        <div class="mb-3">
            <label for="types" class="form-label">Тип контракту</label>
            <select name="types[]" id="types" class="form-control" multiple required>
                @foreach($contractTypes as $type)
                    <option value="{{ $type->id }}" {{ isset($contract) && in_array($type->id, $selectedTypes ?? []) ? 'selected' : '' }}>
                        {{ $type->type_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($contract) ? 'Оновити контракт' : 'Додати контракт' }}</button>
    </form>
@endsection
