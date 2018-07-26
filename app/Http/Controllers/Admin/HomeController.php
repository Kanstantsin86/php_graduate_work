<?php

namespace App\Http\Controllers\Admin;

use App\Topic;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Вернет список всех вопросов, а также вопросов без ответа
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();
        $questions = Question::all();
        $questionsEmpty = Question::empty()->get();

        return view('admin.home', compact('topics', 'questions', 'questionsEmpty'));
    }
}
