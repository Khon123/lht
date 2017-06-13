<?php

namespace App\Http\Controllers\frontend;

use App\About;
use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\Language;
use App\Slider;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        Language::checkLang($request->lang);
        $lang = Language::getTitleLang();

        $this->datas['abouts'] = About::where('lang', '=', $lang)->get();//get about content;

        $this->datas['images'] = Slider::where([['lang', '=', $lang], ['article_id', '=', 3]])->orderBy('id', 'desc')->take(3)->get();// get slide in page about;

        $this->datas['menu'] = Article::where('lang', '=', $lang)->get();//get menu in page about;

        return view('FrontEnd.pages.about', $this->datas); //return to view page about;
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
