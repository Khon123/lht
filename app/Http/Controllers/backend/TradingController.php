<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\Language;
use App\Trading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TradingController extends Controller
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
        $this->datas['title'] = 'Trading';
        Language::checkLang($request->lang);
        $lang = Language::getTitleLang();

        $this->datas['tradings']  =  Trading::where('lang', '=', $lang)->get();

        return view('backpack::tradings.trading', $this->datas);
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
        $trading = Trading::find($id);
        return Response()->json($trading);
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
        $trading = Trading::find($id);
        $trading->title = $request->title;

        if($request->description == null){
            return redirect(url(config('backpack.base.route_prefix', 'admin').'/trading'))->with('message', 'Caption can not be blank!')->with('type', 'danger');
        }
        $trading->description = $request->description;
        $trading->status = $request->status;
        $trading->updated_by = auth::id();
        $trading->save();
        
        return redirect(url(config('backpack.base.route_prefix', 'admin').'/trading')); 
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
