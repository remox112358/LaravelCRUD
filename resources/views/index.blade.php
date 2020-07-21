@extends('layouts.master')

@section('content')
<h2 class="text-center mb-4">Список работников</h2>
<a href="{{ route('workers.create') }}" class="btn btn-dark mb-4">Добавить работника</a>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Профессия</th>
            <th scope="col">Стаж работы</th>
            <th scope="col">Зарплата</th>
            <th scope="col">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($workers as $worker)   
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $worker->name }}</td>
                <td>{{ $worker->surname }}</td>
                <td>{{ $worker->profession }}</td>
                <td>{{ $worker->experience }}</td>
                <td>{{ $worker->salary . '₽' }}</td>
                <td class="table-buttons">
                    <a href="{{ route('workers.show', $worker) }}" class="btn btn-success">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route('workers.edit', $worker) }}" class="btn btn-primary">
                        <i class="fa fa-pencil" ></i>
                    </a>
                    <form method="POST" action="{{ route('workers.destroy', $worker) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@include('partials.modal')

<div class="d-flex justify-content-center">
    {{ $workers->links() }}
</div>
@endsection