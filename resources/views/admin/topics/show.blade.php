@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Вопросы по теме {{ $topic->topic }}</h1>
        <hr>
        <form action="{{ route('admin.topic.destroy', [$topic->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить тему</button>
        </form>

        <table class="table table-hover" style="margin-top: 15px;">
            <tr>
                <th>#</th>
                <th>Автор</th>
                <th>E-mail</th>
                <th>Вопрос</th>
                <th>Ответ</th>
                <th>Статус</th>
                <th>Дата создания</th>
                <th>Дата обновления</th>
                <th>Действия</th>
            </tr>
            @foreach ($topic->questions as $question)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $question->author }}</td>
                    <td>{{ $question->email }}</td>
                    <td>{{ $question->question }}</td>
                    <td>{{ $question->answer }}</td>
                    <td>
                        @if ($question->status === 0)
                            <span style="color: orange">Ожидает ответа</span>
                        @elseif ($question->status === 1)
                            <span style="color: green">Опубликован</span>
                        @else
                            <span style="color: red">Скрыт</span>
                        @endif
                    </td>
                    <td>{{ $question->created_at->format('H.i d.M.Y') }}</td>
                    <td>{{ $question->updated_at->format('H.i d.M.Y') }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('admin.question.edit', [$question->id]) }}" role="button">
                            Редактировать
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection