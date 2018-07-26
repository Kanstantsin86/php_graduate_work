<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    /**
     * Определяем, авторизован ли пользователь
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Получаем правила валидации для обработки запроса при создании вопроса
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question' => 'required|max:1000',
            'answer' => 'sometimes|required|max:1000',
            'author' => 'required|max:50',
            'email' => 'required|email|max:50',
            'topic_id' => 'required'
        ];
    }
}
