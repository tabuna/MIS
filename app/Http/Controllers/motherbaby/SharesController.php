<?php

namespace App\Http\Controllers\motherbaby;

use App\Http\Controllers\Controller;
use App\Models\Sites;
use Illuminate\Http\Request;

class SharesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sitename = 'motherbaby', $sitedomen = 'ru')
    {
        $getSites = Sites::where('domen', '=', $sitename . "." . $sitedomen)->first();
        $getShares = $getSites->getShares()->orderBy('id', 'desc')->paginate(6);
        return view($sitename . $sitedomen . '/shares', ['Shares' => $getShares]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($Share, $sitename = 'mother-baby', $sitedomen = 'ru')
    {
        $getSites = Sites::where('domen', '=', $sitename . "." . $sitedomen)->first();


        $getShare = $getSites->getShares()->findOrFail($Share->id);

        $crumbs = [
            ['name' => $getShare->name, 'slug' => ($getShare->slug) ? $getShare->slug : $getShare->id],
        ];

        return view($sitename . $sitedomen . '/sharesItem', ['Share' => $getShare, 'crumbs' => $crumbs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
