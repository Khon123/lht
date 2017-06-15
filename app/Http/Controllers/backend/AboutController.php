<?php

namespace App\Http\Controllers\backend;

use App\About;
use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    protected $datas = [];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {

        $this->datas['title'] = 'About';
        Language::checkLang($request->lang);
        $lang = Language::getTitleLang();

        $this->datas['abouts']  =  About::where('lang', '=', $lang)->orderBy('created_at', 'desc')->get();

        return view('backpack::abouts.about', $this->datas);
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
    public function get($id)
    {
        $about = About::find($id);
        return Response()->json($about);
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

        $home = About::find($id);
        $home->title = $request->title;
        
        if($request->detial == null){
            return redirect(config('backpack.base.route_prefix', 'admin').'/about')->with('message', 'detial can not be blank!')->with('type', 'danger');
        }

        $home->detial = $request->detial;
        $home->status = $request->status;
        $home->updated_by = auth::id();
        $home->save();
        return redirect(config('backpack.base.route_prefix', 'admin').'/about'); 
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
