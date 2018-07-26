@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Форма для создания вопроса</div>
                    <div class="card-body">
                        <form role="form" action="{{ route('question.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="authorName">Ваше имя</label>
                                <input type="text" class="form-control" id="authorName" name="author" required value="{{ old('author') }}">
                            </div>
                            <div class="form-group">
                                <label for="authorEmail">Ваш E-mail</label>
                                <input type="email" class="form-control" id="authorEmail" name="email" required value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="topicsList">Выберите тему для вопроса</label>
                                <select class="form-control" name="topic_id" id="topicsList">
                                    @foreach ($topics as $topic)
                                        <option value="{{ $topic->id }}">{{ $topic->topic }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="questionText">Вопрос</label>
                                <textarea class="form-control" name="question" id="questionText" rows="6" required>
                                    {{ old('question') }}
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Отправить вопрос</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection