<?php

namespace App\Http\Controllers\frontend;

use App\Article;
use App\Home;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\Language;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
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

        $this->datas['slides'] = Slider::where([['lang', '=', $lang], ['article_id', '=', 1]])->orderBy('id', 'desc')->take(3)->get();

        $this->datas['homes'] = Home::where('lang', '=', $lang)->take(1)->get();

        $this->datas['menu'] = Article::where('lang', '=', $lang)->get();

        return view('FrontEnd.pages.home', $this->datas);
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
