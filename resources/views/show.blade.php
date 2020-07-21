@extends('layouts.master')

@section('content')
<h2 class="text-center mb-4">Информация о работнике</h2>
<a class="d-block mb-4" href="{{ route('home') }}">← К списку работников</a>
<div>
    <p class="h5"><strong>Имя: </strong>{{ $worker->name }}</p>
    <p class="h5"><strong>Фамилия: </strong>{{ $worker->surname }}</p>
    <p class="h5"><strong>Профессия: </strong>{{ $worker->profession }}</p>
    <p class="h5"><strong>Стаж работы: </strong>{{ $worker->experience }}</p>
    <p class="h5"><strong>Зарплата: </strong>{{ $worker->salary }}</p>
</div>
@endsection