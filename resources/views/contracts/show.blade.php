@extends('layouts.app')

@section('title', 'Contract Details')
@section('header-title', 'Contract Details')
@section('header-subtitle', 'View details about the selected contract')

@section('content')
    <h1 class="mb-4">Деталі контракту</h1>

    <div class="card card-custom shadow-lg">
        <div class="card-body">
            <h5 class="card-title">Партнер: {{ $contract->partner->company_name }}</h5>
            <p class="card-text">Тип контракту: {{ $contract->contractType->type_name }}</p>
            <p class="card-text">Дата підписання: {{ $contract->contract_date }}</p>
            <p class="card-text">Сума контракту: {{ $contract->amount }} грн</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('contracts.index') }}" class="btn btn-custom">Назад до списку</a>
        <a href="{{ route('contracts.edit', $contract) }}" class="btn btn-warning">Редагувати</a>
    </div>
@endsection
