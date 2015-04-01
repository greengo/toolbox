<?php namespace Greengo\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model {

	protected $fillable = [
		'project_id',
		'title',
		'description'
	];

}
