<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
	use SoftDeletes;

    public $fillable = ['name', 'email', 'phone1', 'phone2'];
}