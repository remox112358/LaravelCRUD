@extends('layouts.master')

@section('content')
<h2 class="text-center mb-4">Список работников</h2>
<button id="workerAdd" class="btn btn-dark mb-4">Добавить работника</button>

<table class="table" id="table">
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
            <tr id="worker{{ $worker->id }}">
                <th scope="row">{{ $worker->id }}</th>
                <td>{{ $worker->name }}</td>
                <td>{{ $worker->surname }}</td>
                <td>{{ $worker->profession }}</td>
                <td>{{ $worker->experience }}</td>
                <td>{{ $worker->salary . '₽' }}</td>
                <td class="table-buttons">
                    <button class="btn btn-primary worker-update" value="{{ $worker->id }}">
                        <i class="fa fa-pencil" ></i>
                    </button>
                    <button class="btn btn-danger worker-delete" value="{{ $worker->id }}">
                        <i class="fa fa-trash"></i>
                    </button>
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