<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['name', 'surname', 'patronymic', 'email', 'telephone_number', 'topic', 'content', 'file',];
    protected $table= 'feedbacks';

    public function storeFile($file) {
        return $file->store('files');
    }
}
