<?php

namespace App\Http\Controllers\backend;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\Language;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
use Validator;

class SliderController extends Controller
{

    /**
     *The information we send to the view
     *@var array
     */
        protected $datas = []; 
        
    /**

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
        $this->datas['title'] = 'Slider';

        $slide = new Slider();
        $article = new Article();
        // check Language
        Language::checkLang($request->lang);
        // get Language
        $lang = Language::getTitleLang();

        $this->datas['datas'] = $slide->where('lang', '=', $lang)->orderBy('created_at', 'desc')->paginate(10);

        
        $this->datas['articles']=$article->whereIn('id_table', [1,2,6])->where('lang', '=', 'en')->get();

        return view('backpack::slides.slide', $this->datas );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
            validation image;
         */
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $listLang = config('app.locales');
        $id_table = Slider::max('id_table')+1;
        $filename = '';

        foreach ($listLang as $key => $value) {
            $slide = new Slider();

            $slide->id_table    = $id_table;
            $slide->article_id  = $request->article_id;

            if($key =='kh'){
                $slide->image = $filename;
            }

            if($request->hasFile('image')){
                if($validator->passes()){
                    $image = $request->file('image');
                    $filename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/uploads/images/') , $filename );

                    $slide->image = $filename;
                }
            }

            $slide->detial     = $request->detial;
            $slide->status          = $request->status;
            $slide->lang            = $key;
            $slide->created_by      = auth::id();
            $slide->updated_by      = auth::id();
            $slide->save(); 
        }

        
        return redirect(url(config('backpack.base.route_prefix', 'admin').'/slide')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get($slide_id)
    {
        $slide = Slider::find($slide_id);
        return Response()->json($slide);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slide_id)
    {
        
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);

        $slide               = Slider::find($slide_id);
        $slide->article_id   = $request->article_id;

        if($request->hasFile('image')){
            if($validator->passes()){
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/uploads/images/') , $filename );

                $slide->image = $filename;
            }
        }

        $slide->detial     = $request->detial;
        $slide->status          = $request->status;
        $slide->updated_by      = auth::id();

        $slide->save();

        $update = ['article_id' => $request->article_id];
        DB::table('sliders')->where('id' ,'=', $slide_id+1)->update($update);

        return redirect(url(config('backpack.base.route_prefix', 'admin').'/slide')); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slide_id)
    {
        $slide = Slider::where('id_table', '=', $slide_id)->delete();
        return response()->json($slide);
    }
}
