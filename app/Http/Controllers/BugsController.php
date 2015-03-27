<?php namespace Greengo\Http\Controllers;

use Greengo\Http\Requests;
use Greengo\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Greengo\Models\Bug;
use Greengo\Http\Requests\BugRequest;


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
		$bugs = Bug::where('closed', '=', 0)->whereNull('status')->get();
		return view('bugs.index', compact('bugs'));
	}

	public function indexStatus($status = null)
	{
		if(!is_null($status)){
			$bugs = Bug::where('status', '=', $status)->get();
		} else {
			$bugs = Bug::where('closed', '=', 0)->get();
		}
		return view('bugs.index', compact('bugs'));
	}

	public function indexBy($user = null)
	{
		if(!is_null($user))
		{
			$bugs = Bug::where('created_by', '=', $user)->get();

			return view('bugs.index', compact('bugs'));
		} else
		{
			return redirect()->back();
		}
	}

	public function indexAssigned($user = null)
	{
		if(!is_null($user))
		{
			$bugs = Bug::where('assigned_to', '=', $user)->get();

			return view('bugs.index', compact('bugs'));
		} else
		{
			return redirect()->back();
		}
	}

	public function indexPending()
	{

		$bugs = Bug::where('closed', '=', 0)->whereNotNull('status')->get();


		return view('bugs.index', compact('bugs'));
	}

	public function indexClosed()
	{

		$bugs = Bug::where('closed', '=', 1)->get();


		return view('bugs.index', compact('bugs'));
	}

	public function close($id)
	{
		Bug::findOrFail($id)->close();
		return redirect()->back();
	}

	public function open($id)
	{
		Bug::findOrFail($id)->open();
		return redirect()->back();
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
	public function store(BugRequest $request)
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
	public function update($id, BugRequest $request)
	{
		$bug = Bug::findOrFail($id);

		$bug->update($request->all());

		return redirect('bugs');
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
