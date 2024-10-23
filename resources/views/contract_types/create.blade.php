@extends('layouts.app')

@section('title', isset($contractType) ? 'Редагувати тип контракту' : 'Додати новий тип контракту')
@section('header-title', isset($contractType) ? 'Редагувати тип контракту' : 'Додати новий тип контракту')
@section('header-subtitle', isset($contractType) ? 'Внесіть зміни до типу контракту' : 'Заповніть дані для нового типу контракту')

@section('content')
    <h1 class="mb-4">{{ isset($contractType) ? 'Редагувати тип контракту' : 'Додати новий тип контракту' }}</h1>

    <form action="{{ isset($contractType) ? route('contract_types.update', $contractType) : route('contract_types.store') }}" method="POST">
        @csrf
        @if(isset($contractType))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="type_name" class="form-label">Назва типу контракту</label>
            <input type="text" name="type_name" id="type_name" class="form-control" value="{{ isset($contractType) ? $contractType->type_name : old('type_name') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($contractType) ? 'Оновити тип' : 'Додати тип' }}</button>
    </form>
@endsection
