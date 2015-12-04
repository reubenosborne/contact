<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
	use SoftDeletes;

    public $fillable = ['type', 'avatar', 'name', 'company', 'email1', 'email2', 'email3', 'phone1', 'phone2', 'phone3', 'address', 'state', 'status', 'notes', 'contactPerson', 'eventStart', 'eventEnd'];

    public function files() {
    	return $this->hasMany('App\File', 'contact_id');
    }
}