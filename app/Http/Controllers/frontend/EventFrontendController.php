<?php

namespace App\Http\Controllers\frontend;

use App\Article;
use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EventFrontendController extends Controller
{
    protected $datas = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        Language::checkLang($request->lang);
        $lang = Language::getTitleLang();

        $this->datas['events'] = Event::where([['lang', '=', $lang], ['status', '=', 'Enabled']])->orderBy('id', 'desc')->take(10)->get();
        $this->datas['menu'] = Article::where('lang','=', $lang)->get();

        return view('FrontEnd.pages.event', $this->datas);

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEvent(Request $request, $id)
    {
        Language::checkLang($request->lang);
        $lang = Language::getTitleLang();

        $decryptId = Crypt::decrypt($id);

        $this->datas['event'] = Event::find($decryptId);
        $this->datas['menu'] = Article::where('lang','=', $lang)->get();

        return view('FrontEnd.pages.event-detial', $this->datas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
