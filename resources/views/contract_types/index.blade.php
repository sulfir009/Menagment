@extends('layouts.app')

@section('title', 'Список типів контрактів')
@section('header-title', 'Список типів контрактів')
@section('header-subtitle', 'Управління всіма типами контрактів')

@section('content')
    <h1 class="mb-4">Список типів контрактів</h1>

    <!-- Кнопка для добавления нового типа контракта -->
    <div class="mb-4">
        <a href="{{ route('contract_types.create') }}" class="btn btn-primary">Додати новий тип контракту</a>
    </div>

    @if($contractTypes->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Назва типу контракту</th>
                    <th>Дії</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contractTypes as $type)
                    <tr>
                        <td>{{ $type->type_name }}</td>
                        <td>
                            <a href="{{ route('contract_types.edit', $type->id) }}" class="btn btn-warning btn-sm">Редагувати</a>

                            <!-- Форма для удаления -->
                            <form action="{{ route('contract_types.destroy', $type->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Ви впевнені, що хочете видалити цей тип контракту?')">Видалити</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Пагинация -->
        {{ $contractTypes->links() }}
    @else
        <p>Типи контрактів відсутні.</p>
    @endif
@endsection
