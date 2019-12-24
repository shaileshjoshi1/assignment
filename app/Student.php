<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
	
	protected $fillable = [
        'first_name',
        'last_name',
		'parent_name',
        'email_id',
        'mobile_number',
        'standard',
        'course',
		'document1'
    ];
	
	
	
	
	
}
