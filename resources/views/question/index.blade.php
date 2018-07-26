@extends('layouts.app')

@section('content')
    <section class="cd-faq">
        <ul class="cd-faq-categories">
            @foreach ($topics as $topic)
                @if ($topic->questions->where('status', 1)->count() > 0)
                    <li><a href="#{{ $topic->id }}">{{ $topic->topic }}</a></li>
                @endif
            @endforeach
        </ul>

        <div class="cd-faq-items">
            <a class="btn btn-success" href="{{ route('question.create') }}" role="button">Задай свой вопрос</a>
            @foreach ($topics as $topic)
                    <ul id="{{ $topic->id }}" class="cd-faq-group">
                        @if ($topic->questions->where('status', 1)->count() > 0)
                            <li class="cd-faq-title">
                                <h2>{{ $topic->topic }}</h2>
                            </li>
                        @endif
                        @foreach ($questions as $question)
                            @if (!empty($question->answer) && ($question->topic_id === $topic->id))
                                <li>
                                    <a href="#" class="cd-faq-trigger">{{ $question->question }}</a>
                                    <div class="cd-faq-content">
                                        <p>{{ $question->answer }}</p>
                                        <hr>
                                        <p>Автор вопроса: {{ $question->author }}</p>
                                        <p>Дата создания: {{ $question->created_at->format('H.i d.M.Y') }}</p>
                                        <p>Дата последнего обновления: {{ $question->updated_at->format('H.i d.M.Y') }}</p>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
            @endforeach
        </div>
    </section>
@endsection