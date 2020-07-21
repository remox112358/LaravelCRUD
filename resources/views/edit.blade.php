@extends('layouts.master')

@section('content')
    <h2 class="text-center mb-4">Редактировать информацию о работнике</h2>
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <a class="d-block mb-4" href="{{ route('home') }}">← К списку работников</a>
            <form method="POST" action="{{ route('workers.update', $worker) }}">
                @csrf
                @method('PATCH') 
                <div class="form-group" title="Обязательно к заполнению">
                    <label for="worker-name">Имя<span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{ old('name') ?? $worker->name }}" 
                           class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="worker-name">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group" title="Обязательно к заполнению">
                    <label for="worker-surname">Фамилия<span class="text-danger">*</span></label>
                    <input type="text" name="surname" value="{{ old('surname') ?? $worker->surname }}" 
                           class="form-control {{ $errors->has('surname') ? 'is-invalid' : '' }}" id="worker-surname">
                    @if ($errors->has('surname'))
                        <div class="invalid-feedback">{{ $errors->first('surname') }}</div>
                    @endif
                </div>
                <div class="form-group" title="Обязательно к заполнению">
                    <label for="worker-profession">Профессия<span class="text-danger">*</span></label>
                    <input type="text" name="profession" value="{{ old('profession') ?? $worker->profession }}" 
                           class="form-control {{ $errors->has('profession') ? 'is-invalid' : '' }}" id="worker-profession">
                    @if ($errors->has('profession'))
                        <div class="invalid-feedback">{{ $errors->first('profession') }}</div>
                    @endif
                </div>
                <div class="form-group" title="Обязательно к заполнению">
                    <label for="worker-experience">Стаж работы<span class="text-danger">*</span></label>
                    <input type="text" name="experience" value="{{ old('experience') ?? $worker->experience }}" 
                           class="form-control {{ $errors->has('experience') ? 'is-invalid' : '' }}" id="worker-experience">
                    @if ($errors->has('experience'))
                        <div class="invalid-feedback">{{ $errors->first('experience') }}</div>
                    @endif
                </div>
                <div class="form-group" title="Обязательно к заполнению">
                    <label for="worker-salary">Зарплата<span class="text-danger">*</span></label>
                    <input type="number" min="1000" name="salary" value="{{ old('salary') ?? $worker->salary }}" 
                           class="form-control {{ $errors->has('salary') ? 'is-invalid' : '' }}" id="worker-salary">
                    @if ($errors->has('salary'))
                        <div class="invalid-feedback">{{ $errors->first('salary') }}</div>
                    @endif
                </div>
                <button type="submit" class="btn btn-dark">Обновить</button>
            </form>
        </div>
    </div>
@endsection