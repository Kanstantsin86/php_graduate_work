<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['topic', 'user_id'];
    
    /**
     * Получаем пользователя создавшего тему
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Получаем вопросы, относящиеся к указанной теме
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    protected function questions() 
    {
        return $this->hasMany(Question::class);
    }
}
