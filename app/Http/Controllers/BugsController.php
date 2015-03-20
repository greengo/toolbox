<?php namespace Greengo\Http\Controllers;

use Greengo\Http\Requests;
use Greengo\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Greengo\Models\Bug;

class BugsController extends Controller {

	public function __construct()
	{
		$this->middleware('sentry.auth');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bugs = Bug::all();
		return view('bugs.index', compact('bugs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('bugs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\CreateBugRequest $request)
	{

		Bug::create($request->all());

		return redirect('bugs');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$bug = Bug::findOrFail($id);

		return view('bugs.show', compact('bug'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bug = Bug::findOrFail($id);

		return view('bugs.edit', compact('bug'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Bug::findOrFail($id)->delete();

		return redirect('bugs');
	}

}
