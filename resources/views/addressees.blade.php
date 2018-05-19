@extends('layouts.appfunc')

@section('headerappfunc')
<h1>Адресаты</h1>
<p>Alarm System</p>
@endsection

@section('contentappfunc')
    <div class="container-addresses">
        <div class="row col-md-8 col-md-offset-2 custyle">
            <table class="table table-striped custab">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th class="text-center">Управление</th>
                </tr>
                </thead>
                @foreach($addressees as $recipient)
                <tr>
                    <td>{{ $recipient->id }}</td>
                    <td>{{ $recipient->email }}</td>
                    <td class="text-center">
                        <form action="{{ action('AddresseesController@destroy', $recipient['id']) }}" method="post">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="container">
        <form method="post" action="{{url('addressees_resource')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Новый Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите Email">
                <small id="emailHelp" class="form-text text-muted">SMTP сервера имею лимиты!</small>
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection