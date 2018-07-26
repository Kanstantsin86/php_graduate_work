@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($questionsEmpty) != 0)
            <h1>Вопросы без ответа</h1>

                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>Тема</th>
                        <th>Автор</th>
                        <th>E-mail</th>
                        <th>Вопрос</th>
                        <th>Ответ</th>
                        <th>Статус</th>
                        <th>Дата создания</th>
                        <th>Дата обновления</th>
                        <th>Действия</th>
                    </tr>
                    @foreach ($questionsEmpty as $questionEmpty)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $questionEmpty->topic->topic }}</td>
                            <td>{{ $questionEmpty->author }}</td>
                            <td>{{ $questionEmpty->email }}</td>
                            <td>{{ $questionEmpty->question }}</td>
                            <td>{{ $questionEmpty->answer }}</td>
                            <td>
                                @if ($questionEmpty->status === 0)
                                    <span style="color: orange">Ожидает ответа</span>
                                @elseif ($questionEmpty->status === 1)
                                    <span style="color: green">Опубликован</span>
                                @else
                                    <span style="color: red">Скрыт</span>
                                @endif
                            </td>
                            <td>{{ $questionEmpty->created_at->format('H.i d.M.Y') }}</td>
                            <td>{{ $questionEmpty->updated_at->format('H.i d.M.Y') }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('admin.question.edit', [$questionEmpty->id]) }}" role="button">
                                    Редактировать
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
        @else
            <h1>Вопросов без ответов не найдено</h1>
        @endif
            <hr>
            @foreach ($topics as $topic)
                @if ($topic->questions->count() > 0)
                    <h2>{{ $topic->topic }}</h2>
                    <table class="table table-hover">
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
                @endif
            @endforeach
    </div>
@endsection
