<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['name', 'surname', 'patronymic', 'email', 'telephone_number', 'topic_id', 'content', 'file',];
    protected $table= 'feedbacks';

}
