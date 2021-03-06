<?php namespace App\Http\Controllers\zdorovie48;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Sites;
use DB;
use Request;
use Session;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($sitename = 'zdorovie48', $sitedomen = 'ru')
    {
        $getSites = Sites::where('domen', '=', $sitename . "." . $sitedomen)->first();
        $getNews = $getSites->getNews()->orderBy('updated_at', 'desc')->limit(4)->get();
        $getShare = $getSites->getShares()
            ->select(['id', 'name'])
            ->orderByRaw("RANDOM()")
            ->limit(1)
            ->orderByRaw('RANDOM()')
            ->first();

        $getComplexGoods = Category::has('complexGoods')->with([
            'complexGoods' => function ($query) {
                $query->where('onmain', '=', 'true')->orderBy('sort', 'asc');
            }
        ])->take(3)->get();

        $specialization = DB::table('timetable')->select('specialization')->distinct()->get();
        return view('new' . $sitename . $sitedomen . '/index', [
            'getNews' => $getNews,
            'getShare' => $getShare,
            'specialization' => $specialization,
            'complexGoods' => $getComplexGoods,
        ]);
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
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
