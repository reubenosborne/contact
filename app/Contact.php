<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	use SoftDeletes;

    public $fillable = ['firstname', 'lastname', 'email'];
}
