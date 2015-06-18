<?php namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Sites;

class BlogController extends Controller {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($sitename, $sitedomen)
	{
        $getSites = Sites::where('domen','=',$sitename.".".$sitedomen)->first();
        $getNews =$getSites->getNews()->orderBy('id', 'desc')->paginate(5);
        return view( $sitename.$sitedomen.'/blog', ['News' => $getNews]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($sitename, $sitedomen,$id)
	{
        $getSites = Sites::where('domen','=',$sitename.".".$sitedomen)->first();
        $getNews =$getSites->getNews()->find($id);
        return view($sitename.$sitedomen.'/blogNews', ['New' => $getNews]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
		//
	}

}