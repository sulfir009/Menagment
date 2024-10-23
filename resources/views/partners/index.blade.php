@extends('layouts.app')

@section('title', 'List of Partners')
@section('header-title', 'Partners')
@section('header-subtitle', 'Manage all your partners here')

@section('content')
    <h1 class="mb-4">Список партнерів</h1>

    <!-- Форма поиска -->
    <form method="GET" action="{{ route('partners.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Пошук за назвою компанії або регіоном" value="{{ request('search') }}">
            <button class="btn btn-custom" type="submit">Пошук</button>
        </div>
    </form>

    <div class="mb-4">
        <a href="{{ route('partners.create') }}" class="btn btn-success">Додати новий партнер</a>
        <a href="{{ route('contract_types.create') }}" class="btn btn-success">Додати новий тип контракту</a>
        <a href="{{ route('contract_types.index') }}" class="btn btn-success">Список типів контрактів</a>
    </div>
    <!-- Таблица -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    <a href="{{ route('partners.index', ['sort' => 'company_name', 'order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
                        Назва компанії
                    </a>
                </th>
                <th>Контактна особа</th>
                <th>
                    <a href="{{ route('partners.index', ['sort' => 'region_name', 'order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
                        Регіон
                    </a>
                </th>
                <th>
                    <a href="{{ route('partners.index', ['sort' => 'contract_count', 'order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
                        Кількість контрактів
                    </a>
                </th>
                <th>Дії</th>
            </tr>
        </thead>
        <tbody>
            @foreach($partners as $partner)
            <tr>
                <td>{{ $partner->company_name }}</td>
                <td>{{ $partner->contact_person }}</td>
                <td>{{ $partner->region->region_name }}</td>
                <td>{{ $partner->contract_count }}</td>
                <td>
                    <a href="{{ route('partners.show', $partner) }}" class="btn btn-info btn-sm">Деталі</a>
                    <a href="{{ route('partners.edit', $partner) }}" class="btn btn-warning btn-sm">Редагувати</a>
                    <form action="{{ route('partners.destroy', $partner) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Ви впевнені, що хочете видалити партнера?');">Видалити</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Пагинация -->
    <div class="d-flex justify-content-center">
        {{ $partners->links() }}
    </div>
@endsection
