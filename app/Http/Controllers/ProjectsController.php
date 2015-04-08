<?php namespace Greengo\Http\Controllers;

use Greengo\Http\Requests;
use Greengo\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Greengo\Models\Project;
use Greengo\Models\Feature;
use Greengo\Models\Bug;
use Greengo\Http\Requests\ProjectRequest;

class ProjectsController extends Controller {

	public function __construct()
	{
		$this->middleware('sentry.admin');
	}


	public function dashboard()
	{
		$data['projects'] = Project::all();
		$data['features'] = Feature::all();
		$data['bugs'] = Bug::all();


		return view('dashboard', $data);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = Project::all();
		return view('projects.index', compact('projects'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('projects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ProjectRequest $request)
	{
		Project::create($request->all());
		return redirect('projects');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$project = Project::findOrFail($id);
		return view('projects.show', compact('project'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$project = Project::findOrFail($id);
		return view('projects.edit', compact('project'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, ProjectRequest $request)
	{
		$project = Project::findOrFail($id);
		$project->update($request->all());

		return redirect('projects');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Project::findOrFail($id)->delete();
		return redirect('projects');
	}

}
