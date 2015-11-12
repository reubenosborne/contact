<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
	use SoftDeletes;

    public $fillable = ['avatar', 'name', 'company', 'email', 'phone1', 'phone2', 'phone3', 'address', 'state', 'status'];
}