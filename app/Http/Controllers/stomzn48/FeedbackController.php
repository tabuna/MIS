<?php namespace App\Http\Controllers\stomzn48;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\FeedbackRequest;
use App\Models\Feedback;
use Session;

class FeedbackController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('stomzn48ru.feedback');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($sitename, $sitedomen)
    {
        // Тут должна быть обработка

        return view($sitename . $sitedomen . '/feedback');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(FeedbackRequest $request)
    {
        $new = new Feedback([
            'fio' => $request->fio,
            'phone' => $request->phone,
            'email' => $request->email,
            'content' => $request->message,
            'ids' => 10,
        ]);
        $new->save();

        Session::flash('good', 'Спасибо, что на	писали, мы обязательно ответим вам.');
        return redirect()->back();
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
