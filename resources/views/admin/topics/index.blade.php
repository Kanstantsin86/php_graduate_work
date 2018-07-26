@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Темы</h1>

        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Автор</th>
                <th>Всего вопросов в теме</th>
                <th>Вопросов опубликовано</th>
                <th>Вопросов без ответа</th>
                <th>Вопросов скрыто</th>
                <th>Дата создания</th>
                <th>Действия</th>
            </tr>
            @foreach ($topics as $topic)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $topic->topic }}</td>
                    <td>{{ $topic->user->login }}</td>
                    <td>{{ $topic->questions->count() }}</td>
                    <td>{{ $topic->questions->where('status', 1)->count() }}</td>
                    <td>{{ $topic->questions->where('answer', null)->count() }}</td>
                    <td>{{ $topic->questions->where('status', 2)->count() }}</td>
                    <td>{{ $topic->created_at->format('H.i d.M.Y') }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('admin.topic.show', [$topic->id]) }}" role="button">
                            К списку вопросов
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>

        <a class="btn btn-success" href="{{ route('admin.topic.create') }}" role="button">Добавить новую тему</a>
    </div>
@endsection