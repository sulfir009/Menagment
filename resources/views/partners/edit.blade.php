@extends('layouts.app')

@section('title', 'Редагувати партнера')
@section('header-title', 'Редагувати партнера')
@section('header-subtitle', 'Внесіть зміни до партнера')

@section('content')
    <h1 class="mb-4">Редагувати партнера</h1>

    <form action="{{ route('partners.update', $partner->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="company_name" class="form-label">Назва компанії</label>
            <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name', $partner->company_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="contact_person" class="form-label">Контактна особа</label>
            <input type="text" name="contact_person" id="contact_person" class="form-control" value="{{ old('contact_person', $partner->contact_person) }}" required>
        </div>

        <div class="mb-3">
            <label for="region_id" class="form-label">Регіон</label>
            <select name="region_id" id="region_id" class="form-control" required>
                <option value="">Виберіть регіон</option>
                @foreach($regions as $region)
                    <option value="{{ $region->id }}" {{ $partner->region_id == $region->id ? 'selected' : '' }}>
                        {{ $region->region_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="contract_count" class="form-label">Кількість контрактів</label>
            <input type="number" name="contract_count" id="contract_count" class="form-control" value="{{ old('contract_count', $partner->contract_count) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Оновити партнера</button>
    </form>
@endsection
