<?php

namespace App\Http\Controllers\backend;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
class CompanyController extends Controller
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
        $this->datas['title'] = 'Company';
        // check Language
        Language::checkLang($request->lang);
        // get Language
        $lang = Language::getTitleLang();


        $this->datas['datas'] = Company::where('lang', '=', $lang)->orderBy('created_at', 'desc')->paginate(10);

        return view('backpack::company.company', $this->datas);
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        
        $listLang = config('app.locales');
        $id_table = Company::max('id_table')+1;

        $filename = '';

        foreach ($listLang as $key => $value) {
           $company = new Company();

            if($key =='kh'){
                $company->image   = $filename; 
            }

            if($request->hasFile('image')){
                if($validator->passes()){
                    $image = $request->file('image');
                    $filename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/uploads/images/') , $filename );

                    $company->image = $filename;
                }
            }
            $company->id_table          = $id_table;
            $company->company_name      = $request->company_name;
            $company->url               = $request->url;
            $company->description       = $request->description;
            $company->status            = $request->status;
            $company->lang              = $key;
            $company->created_by        = auth::id();
            $company->updated_by        = auth::id();
            $company->save();
        }
       
        return redirect(config('backpack.base.route_prefix', 'admin').'/company'); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        $company = Company::find($id);
        return Response()->json($company);  
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

        $company 				= Company::find($id);
        $company->company_name 	= $request->company_name;
        $company->url               = $request->url;        

        if($request->hasFile('image')){
            if($validator->passes()){
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/uploads/images/') , $filename );

                $company->image = $filename;
            }
        }

        $company->description 	= $request->description;
        $company->status 		= $request->status;
        $company->updated_by 	= auth::id();
        $company->save();
        return redirect(config('backpack.base.route_prefix', 'admin').'/company'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($company_id)
    {

         $company = Company::where('id_table', '=', $company_id)->delete();
        return response()->json($company);

    }
}
