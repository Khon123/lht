<?php

namespace App\Http\Controllers\frontend;

use App\Article;
use App\Career;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\Language;
use Illuminate\Database\Eloquent\paginate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CareerFrontendController extends Controller
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

        $this->datas['careers'] = Career::where('lang', '=', $lang)->orderBy('id', 'desc')->paginate(10);
        $this->datas['menu'] = Article::where('lang', '=', $lang)->get();

        return view('FrontEnd.pages.career', $this->datas);
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
    public function showCareer(Request $request, $id)
    {
        Language::checkLang($request->lang);
        $lang = Language::getTitleLang();

        $decryptId = Crypt::decrypt($id);

        $this->datas['menu'] = Article::where('lang', '=', $lang)->get();
        $this->datas['career'] = Career::find($decryptId);
        return view('FrontEnd.pages.career-detial', $this->datas);
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
