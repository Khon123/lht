<?php

namespace App\Http\Controllers\frontend;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\Language;
use App\Slider;
use App\Trading;
use Illuminate\Http\Request;

class TradingController extends Controller
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

        $this->datas['slides']  = Slider::where([['lang', '=', $lang], ['article_id', '=', 11]])->orderBy('id', 'desc')->take(3)->get();//get slide to page trading;
        $this->datas['tradings'] = Trading::where('lang', '=', $lang)->get();//get content trading; frontend 
        $this->datas['menu'] = Article::where('lang', '=', $lang)->get();//get menu in page trading frontend;

        return view('FrontEnd.pages.trading', $this->datas);//return view trading;
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
    public function show($id)
    {
        //
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
