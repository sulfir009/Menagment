@extends('layouts.app')

@section('title', 'Список контрактів')
@section('header-title', 'Список контрактів')
@section('header-subtitle', 'Огляд усіх контрактів')

@section('content')
    <h1 class="mb-4">Список контрактів</h1>

    <!-- Кнопка для добавления нового контракта -->
    <div class="mb-4">
        <a href="{{ route('contracts.create') }}" class="btn btn-success">Додати новий контракт</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Партнер</th>
                <th>Тип контракту</th>
                <th>Дата підписання</th>
                <th>Сума</th>
                <th>Дії</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contracts as $contract)  <!-- Проходим по каждому контракту -->
            <tr>
                <td>{{ $contract->partner->company_name }}</td>  <!-- Доступ к партнеру -->
                <td>{{ $contract->contractType->type_name }}</td>  <!-- Доступ к типу контракта -->
                <td>{{ $contract->contract_date }}</td>  <!-- Дата контракта -->
                <td>{{ $contract->amount }} грн</td>  <!-- Сумма контракта -->
                <td>
                    <a href="{{ route('contracts.show', $contract) }}" class="btn btn-info btn-sm">Деталі</a>
                    <a href="{{ route('contracts.edit', $contract) }}" class="btn btn-warning btn-sm">Редагувати</a>
                    <form action="{{ route('contracts.destroy', $contract) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Видалити</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Пагинация -->
    <div class="d-flex justify-content-center">
        {{ $contracts->links() }}
    </div>
@endsection
