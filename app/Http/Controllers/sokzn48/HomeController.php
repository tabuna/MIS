<?php namespace App\Http\Controllers\sokzn48;

use App\Http\Controllers\Controller;
use App\Models\QuestAnswer;
use App\Models\Sites;
use DB;

class HomeController extends Controller
{


    /**
     * @param string $sitename
     * @param string $sitedomen
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($sitename = "sokzn48", $sitedomen = "ru")
    {
        $getSites = Sites::where('domen', '=', $sitename . "." . $sitedomen)->first();
        $getNews = $getSites->getNews()->orderBy('updated_at', 'desc')->limit(3)->get();
        $getShares = $getSites->getShares()->orderBy('id', 'desc')->limit(3)->get();

        $getReviews = collect();

        $getReviews->push($getSites->getReviews()
            ->where('publish', true)
            ->orderBy(DB::raw('RANDOM()'))
            ->limit(1)
            ->get()
            ->first());

        $getReviews->push($getSites->getReviews()
            ->where('publish', true)
            ->where('id', '!=', $getReviews->first()->id)
            ->orderBy(DB::raw('RANDOM()'))
            ->limit(1)
            ->get()
            ->first());


        $getSpec = $getSites->getTeam()
            ->orderBy('sort', 'asc')
            ->limit(8)
            ->get();

        $QuestAnswers = QuestAnswer::whereRaw('ids = ? and publish = ?',
            [Sites::where('domen', '=', $sitename . "." . $sitedomen)->first()->id, true])
            ->orderBy(DB::raw('RANDOM()'))
            ->with('getCategory', 'getDoctor')
            ->limit(2)->get()->first();


        return view($sitename . $sitedomen . '/index', [
            'getNews' => $getNews,
            'getShares' => $getShares,
            'randomReview' => $getReviews,
            'randomQuestAnsver' => $QuestAnswers,
            'allspecs' => $getSpec,
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
