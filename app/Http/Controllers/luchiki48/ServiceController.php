<?php namespace App\Http\Controllers\luchiki48;

use App\Http\Controllers\Controller;
use App\Models\Sites;
use App\Models\Category as Cats;
use Request;
use App\Models\Comments;
use App\Http\Requests\Site\CommentRequest;
use Session;
use Kalnoy\Nestedset\Collection as Colect;

class ServiceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index($sitename = "luchiki48", $sitedomen = "ru")
    {

		$query = Sites::where('domen', '=', $sitename . "." . $sitedomen)->with('categories.goods')->first();

		return view($sitename . $sitedomen . '/service', [
				'data' => $query->categories
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
	public function store(CommentRequest $request, $sitename = "luchiki48", $sitedomen = "ru")
	{
        $getSites = Sites::where('domen', '=', $sitename . "." . $sitedomen)->first();

        $comment = new Comments([
            'fio' => $request->fio,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'content' => $request->comment,
            'comments_id' => 0, // Вложенные комментарии никому не нужны
            'goods_id' => $request->goods,
            'ids' => $getSites->id,
        ]);
        $comment->save();
        Session::flash('good', 'Спасибо, что написали, ваше сообщение будет опубликовано после модерации.');
        return redirect()->back();

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function show($id, $sitename = "luchiki48", $sitedomen = "ru")
	{

        $getSites = Sites::where('domen', '=', $sitename . "." . $sitedomen)->first();

        $Goods = $getSites->getGoods()->where('id', $id)->first();
        $Category = $getSites->getCategory()->findorFail($Goods->category_id);

        $Comments = $Goods->comments()->where('publish', true)->orderBy('fio', 'asc')->simplepaginate(5);
        $GoodsCat = $getSites->getGoods()->where('category_id', $Goods->category_id)->orderBy('name','asc')->get();

        $getLastNews = $getSites->getNews()->orderBy('id', 'desc')->limit(5)->get();
        return view($sitename . $sitedomen . '/goods', ['Good' => $Goods,'Category' => $Category, 'Goods' => $GoodsCat, 'Comments' => $Comments,  'LastNews' => $getLastNews]);
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
