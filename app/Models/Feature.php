<?php namespace Greengo\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model {

	protected $fillable = [
		'title',
		'description',
		'created_by',
		'assigned_to',
		'project',
		'project_category',
		'priority',
		'status',
		'progress',
		'software_version',
		'closed'
	];

}
