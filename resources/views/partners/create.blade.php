@extends('layouts.app')

@section('content')
    <h1>{{ isset($partner) ? 'Редагувати партнера' : 'Додати партнера' }}</h1>

    <form action="{{ isset($partner) ? route('partners.update', $partner) : route('partners.store') }}" method="POST">
        @csrf
        @if(isset($partner))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="company_name">Назва компанії</label>
            <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name', $partner->company_name ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="contact_person">Контактна особа</label>
            <input type="text" name="contact_person" id="contact_person" class="form-control" value="{{ old('contact_person', $partner->contact_person ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="region_id">Регіон</label>
            <select name="region_id" id="region_id" class="form-control" required>
                <option value="">Виберіть регіон</option>
                @foreach($regions as $region)
                    <option value="{{ $region->id }}" {{ (old('region_id') ?? $partner->region_id ?? '') == $region->id ? 'selected' : '' }}>
                        {{ $region->region_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="contract_count">Кількість контрактів</label>
            <input type="number" name="contract_count" id="contract_count" class="form-control" value="{{ old('contract_count', $partner->contract_count ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($partner) ? 'Оновити' : 'Додати' }}</button>
    </form>
@endsection
