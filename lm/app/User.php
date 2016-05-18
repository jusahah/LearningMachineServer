<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Tag;
use App\Sequence;
use App\Sequenceable;
use App\Question;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function allTags() {
        return Tag::where('user_id', $this->id)->get();
    }

    public function getSequences() {
        return Sequence::where('user_id', $this->id)->paginate(25);
    }

    public function getSequenceables() {
        return Sequenceable::where('user_id', $this->id)->get();
    }

    public function getQuestions() {
        return Question::where('user_id', $this->id)->paginate(25);
    }
}
