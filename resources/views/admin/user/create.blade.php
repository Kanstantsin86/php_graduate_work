@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Форма для создания пользователя</div>
                    <div class="card-body">
                        <form role="form" action="{{ route('admin.user.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="login">Логин</label>
                                <input type="text" class="form-control" id="login" name="login" required value="{{ old('login') }}">
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
                            </div>

                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Создать пользователя</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection