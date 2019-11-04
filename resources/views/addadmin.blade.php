@extends('layouts.app')

@section('content')
@if(Auth::user() and Auth::user()->validate == 0)
<strong>Ожидайте валидации</strong>
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('admin.add') }}">
                <div class="form-group">
                    <label for="nick">Никнейм</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="nick" name="nick" placeholder="Введите ник в формате Имя_Фамилия">
                </div>
                <div class="form-group">
                    <label for="level">Уровень</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="level" name="level" placeholder="Введите уровень админки">
                </div>
                <div class="form-group">
                    <label for="server">Основной сервер</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="server" name="server" placeholder="Введите сервер">
                </div>
                <button type="submit" class="btn btn-primary">Добавить админа</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
@endif
@endsection
