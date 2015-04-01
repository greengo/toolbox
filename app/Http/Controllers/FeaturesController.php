<?php namespace Greengo\Http\Controllers;

use Greengo\Http\Requests;
use Greengo\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Greengo\Models\Feature;
use Greengo\Http\Requests\FeatureRequest;


class FeaturesController extends Controller {

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
		$features = Feature::where('closed', '=', 0)->whereNull('status')->get();
		return view('features.index', compact('features'));
	}

	public function indexStatus($status = null)
	{
		if(!is_null($status)){
			$features = Feature::where('status', '=', $status)->get();
		} else {
			$features = Feature::where('closed', '=', 0)->get();
		}
		return view('features.index', compact('features'));
	}

	public function indexBy($user = null)
	{
		if(!is_null($user))
		{
			$features = Feature::where('created_by', '=', $user)->get();

			return view('features.index', compact('features'));
		} else
		{
			return redirect()->back();
		}
	}

	public function indexAssigned($user = null)
	{
		if(!is_null($user))
		{
			$features = Feature::where('assigned_to', '=', $user)->get();

			return view('features.index', compact('features'));
		} else
		{
			return redirect()->back();
		}
	}

	public function indexPending()
	{

		$features = Feature::where('closed', '=', 0)->whereNotNull('status')->get();


		return view('features.index', compact('features'));
	}

	public function indexClosed()
	{

		$features = Feature::where('closed', '=', 1)->get();


		return view('features.index', compact('features'));
	}

	public function close($id)
	{
		Feature::findOrFail($id)->close();
		return redirect()->back();
	}

	public function open($id)
	{
		Feature::findOrFail($id)->open();
		return redirect()->back();
	}



	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('features.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(FeatureRequest $request)
	{

		Feature::create($request->all());

		return redirect('features');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$feature = Feature::findOrFail($id);

		return view('features.show', compact('feature'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$feature = Feature::findOrFail($id);

		return view('features.edit', compact('feature'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, FeatureRequest $request)
	{
		$feature = Feature::findOrFail($id);

		$feature->update($request->all());

		return redirect('features');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Feature::findOrFail($id)->delete();

		return redirect('features');
	}

}
