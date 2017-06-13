<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\Language;
use App\SubCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class SubCompanyController extends Controller
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

        $this->datas['title'] = 'SubCompany';
        Language::checkLang($request->lang);
        $lang = Language::getTitleLang();

        $this->datas['subCompanies'] = SubCompany::where('lang', '=', $lang)->get();
        return view('backpack::sub-companies.sub-company', $this->datas);
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
        $subCompany = SubCompany::find($id);
        return Response()->json($subCompany);
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
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);

        $subCompany = SubCompany::find($id);
        $subCompany->name = $request->name;
        $subCompany->url = $request->url;

        if($request->hasFile('image')){
            if($validator->passes()){
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/uploads/images/') , $filename );

                $subCompany->image = $filename;
            }
        }

        $subCompany->detial = $request->detial;
        $subCompany->status = $request->status;
        $subCompany->updated_by = auth::id();
        $subCompany->save();

        return redirect(url(config('backpack.base.route_prefix', 'admin').'/subcompany')); 
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
