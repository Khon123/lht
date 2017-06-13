<?php

namespace App\Http\Controllers\frontend;

use App\Article;
use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\Language;
use App\SubCompany;
use Illuminate\Http\Request;

class GroupCompanyController extends Controller
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

        $this->datas['menu'] = Article::where('lang', '=', $lang)->get();//get menu to page group company;
        $this->datas['subCompanies'] = SubCompany::where([['lang', '=', $lang], ['status', '=', 'Enabled']])->get();//get sub company to page group company;

        $this->datas['companys'] = Company::where([['lang', '=', $lang], ['status', '=', 'Enabled']])->get();//get company to page group company;

        return view('FrontEnd.pages.company', $this->datas);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSubCompany(Request $request, $id)
    {
        Language::checkLang($request->lang);
        $lang = Language::getTitleLang();

        $this->datas['menu'] = Article::where('lang', '=', $lang)->get();//get menu to page group company;
        $this->datas['subCompanies'] = SubCompany::where([['lang', '=', $lang], ['status', '=', 'Enabled']])->get();//get sub company to page sub company;
        $subCompany = SubCompany::find($id);

        return view('FrontEnd.pages.sub-company', compact('subCompany'))->with($this->datas);
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
