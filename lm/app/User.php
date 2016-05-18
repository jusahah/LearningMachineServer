<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Tag;
use App\Sequence;

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
        return Sequence::where('user_id', $this->id)->get();
    }
}
