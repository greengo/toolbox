<?php namespace Greengo\Models;

use Illuminate\Database\Eloquent\Model;

class BugStatus extends Model {

	protected $table = 'bug_statuses';
	protected $fillable = [
		'title'
	];

}
