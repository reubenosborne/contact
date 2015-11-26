<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;

    public $fillable = ['name'];

    public function contact() {
    	return $this->belongsTo('App\Contact', 'contact_id');
    }
    
}
