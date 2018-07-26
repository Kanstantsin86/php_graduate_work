@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Форма для изменения пароля</div>
                    <div class="card-body">
                        <form role="form" action="{{ route('admin.user.update', [$user->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="userPassword">Новый пароль</label>
                                <input type="password" class="form-control" id="userPassword" name="password" required>
                            </div>

                            <div class="form-group">
                                <label for="userPassword">Повторите пароль</label>
                                <input type="password" class="form-control" id="userPassword" name="password_repeat" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Сохранить пароль</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection