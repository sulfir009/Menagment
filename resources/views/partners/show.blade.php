@extends('layouts.app')

@section('title', 'Partner Details')
@section('header-title', 'Partner Details')
@section('header-subtitle', 'View details about the selected partner')

@section('content')
    <h1 class="mb-4">{{ $partner->company_name }}</h1>

    <div class="card card-custom shadow-lg">
        <div class="card-body">
            <h5 class="card-title">Контактна особа: {{ $partner->contact_person }}</h5>
            <p class="card-text">Регіон: {{ $partner->region->region_name }}</p>
            <p class="card-text">Кількість контрактів: {{ $partner->contract_count }}</p>
            <p class="card-text">Дата підписання останнього контракту: {{ $partner->last_contract_date }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('partners.index') }}" class="btn btn-custom">Назад до списку</a>
        <a href="{{ route('partners.edit', $partner) }}" class="btn btn-warning">Редагувати</a>
    </div>
@endsection
