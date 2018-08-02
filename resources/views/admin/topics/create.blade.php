@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Форма для создания темы</div>
                    <div class="card-body">
                        <form role="form" action="{{ route('admin.topic.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="topicName">Название темы</label>
                                <input type="text" class="form-control" id="topicName" name="topic" required value="{{ old('topic') }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Добавить тему</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection