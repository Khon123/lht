<?php

namespace App\Http\Controllers\backend;

use App\Career;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class CareerController extends Controller
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
        $this->datas['title'] = 'Career';

        Language::checkLang($request->lang);
        $lang = Language::getTitleLang();

        $this->datas['datas'] = Career::where('lang', '=', $lang)->orderBy('created_at', 'desc')->paginate(10);
        return view('backpack::careers.career', $this->datas);
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
        
        /*validation image*/        
        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $listLang = config('app.locales');
        $id_table = Career::max('id_table')+1;
        $filename = '';

        foreach ($listLang as $key => $value) {

            $career = new Career();

            /*check has file and validation image  */
            if($validator->passes()){

                if($request->hasFile("image")){                

                    $image = $request->file('image');
                    $filename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/uploads/images/') , $filename );

                    $career->image = $filename;
                }

            } 
            if($key =='kh'){
                $career->image = $filename;
            }
            $career->id_table        = $id_table;
            $career->job_title       = $request->job_title;
            $career->job_description = $request->job_description;
            $career->job_requirement = $request->job_requirement;
            $career->post_date       = $request->post_date;
            $career->close_date      = $request->close_date;
            $career->status          = $request->status;
            $career->lang            = $key;
            $career->created_by      = auth::id();
            $career->updated_by      = auth::id();
            $career->save();      
        } 
        return redirect(url(config('backpack.base.route_prefix', 'admin').'/career'));
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
    public function edit($career_id)
    {
         $career = Career::find($career_id);
        return Response()->json($career);  
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
        $career = Career::find($id);

        /*validation image*/        
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        /*check has file and validation image  */
        if($request->hasFile("image")){
            if($validator->passes()){

                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/uploads/images/') , $filename );

                $career->image = $filename;
            }
        }
        $career->job_title       = $request->job_title;
        $career->job_description = $request->job_description;
        $career->job_requirement = $request->job_requirement;
        $career->post_date = $request->post_date;
        $career->close_date = $request->close_date;
        $career->status = $request->status;
        $career->updated_by = auth::id();
        $career->save();
        return redirect(url(config('backpack.base.route_prefix', 'admin').'/career'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($career_id)
    {
        $career = Career::where('id_table', '=', $career_id)->delete();
        return response()->json($career);
    }
}
