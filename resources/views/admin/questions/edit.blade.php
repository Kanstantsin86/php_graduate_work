@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Форма для редактирования вопроса</div>

                    <div class="card-body">
                        <form role="form" action="{{ route('admin.question.update', [$question->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <label for="authorName">Автор</label>
                                <input type="text" class="form-control" id="authorName" name="author" required value="{{ $question->author }}">
                            </div>
                            <div class="form-group">
                                <label for="authorEmail">E-mail</label>
                                <input type="email" class="form-control" id="authorEmail" name="email" required value="{{ $question->email }}">
                            </div>
                            <div class="form-group">
                                <label for="topicsList">Тема вопроса</label>
                                <select class="form-control" name="topic_id" id="topicsList">
                                    <option value="{{ $question->topic->id }}">{{ $question->topic->topic }}</option>
                                    @foreach ($topics as $topic)
                                        @if ($topic->id !== $question->topic->id)
                                            <option value="{{ $topic->id }}">{{ $topic->topic }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="questionText">Вопрос</label>
                                <textarea class="form-control" name="question" id="questionText" rows="6" required>{{ $question->question }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="answerText">Ответ</label>
                                <textarea class="form-control" name="answer" id="answerText" rows="6">{{ $question->answer }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="statusList">Статус вопроса</label>
                                <select class="form-control" name="status" id="statusList">
                                    <option value="{{ $question->status }}">
                                        @if ($question->status === 0)
                                            Ожидает ответа
                                        @elseif ($question->status === 1)
                                            Опубликован
                                        @else
                                            Скрыт
                                        @endif
                                    </option>
                                    @if ($question->status === 0)
                                        <option value="1">Опубликовать</option>
                                        <option value="2">Скрыть</option>
                                    @elseif ($question->status === 1)
                                        <option value="2">Скрыть</option>
                                    @elseif ($question->status === 2)
                                        <option value="1">Опубликовать</option>
                                    @endif
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                        </form>
                        <hr>
                        <form action="{{ route('admin.question.destroy', [$question->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Удалить вопрос</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection