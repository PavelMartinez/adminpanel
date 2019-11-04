@extends('layouts.app')

@section('content')

@if(Auth::user() and Auth::user()->validate == 0)
<strong>Ожидайте валидации</strong>
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(count($admins) > 0)
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Nick</th>
                    <th>Level</th>
                    <th>Server</th>
                    <th>Lastlogin</th>
                    <th>Lastserver</th>
                    <th>LastIP</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach($admins as $item)
                    <tr>
                        <td>{{$item["id"]}}</td>
                        <td>{{$item["nick"]}}</td>
                        <td>{{$item["level"]}}</td>
                        <td>{{$item["server"]}}</td>
                        <td>{{$item["lastlogin"]}}</td>
                        <td>{{$item["lastserver"]}}</td>
                        <td>@if($item["lastIP"] !== null)<a href="http://ipgeobase.ru/?address={{ $item['lastIP'] }}">{{$item["lastIP"]}}</a>@else {{$item["lastIP"]}}@endif</td>
                        <td>
                        <span style="display: inline">
                            <form method="POST" action="{{ route('admin.up', $item['id']) }}">
                                <button type="submit" class="btn btn-primary" value="adm_up">Пов.</button>
                                {{ csrf_field() }}
                            </form>
                            @if($item["level"] > 1)
                            <form method="POST" action="{{ route('admin.down', $item['id']) }}">
                                <button type="submit" class="btn btn-primary" value="adm_down">Пон.</button>
                                {{ csrf_field() }}
                            </form>
                            @endif
                            <form method="POST" action="{{ route('admin.del', $item['id']) }}">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary" value="adm_del">Снять</button>
                            </form>
                        </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <center><a href="{{ route('home.add') }}" class="btn btn-primary">Назначить администратора</a></center>
            @else
            <center><strong>Администрации нет. <a href="{{ route('home.add') }}">Назначьте</a></strong></center>
            @endif
        </div>
    </div>
</div>
@endif

@endsection
