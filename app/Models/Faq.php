<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'question_en', 'answer', 'answer_en'];
    protected $appends = ['show_question', 'show_answer'];

    public function getShowQuestionAttribute()
    {
        $lang = app()->getLocale();
        return $lang == 'en' ? $this->question_en : $this->question;
    }

    public function getShowAnswerAttribute()
    {
        $lang = app()->getLocale();
        return $lang == 'en' ? $this->answer_en : $this->answer;
    }

}
