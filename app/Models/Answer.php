<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
      'content'
  ];

  public function question() {
    return $this->belongsTo(Question::class, 'FK_QUESTION');
  }

  public function user() {
    return $this->belongsTo(User::class, 'FK_USER');
  }

}
