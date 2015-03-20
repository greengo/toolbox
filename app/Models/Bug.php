<?php namespace Greengo\Models;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model {

	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = ['created_by', 'title', 'repro_steps', 'expected_behaviour', 'observed_behaviour', 'assigned_to', 'status', 'project', 'software_version'];


}
