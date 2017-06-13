<?php

namespace App\Http\Controllers\frontend;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
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

        $this->datas['menu'] = Article::where('lang', '=', $lang)->get();

        return view('FrontEnd.pages.contact', $this->datas);
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
    public function sendEmail(Request $request)
    {
        $datas = array(
            'email'    => $request->email,
            'phone'    => $request->phone,
            'name'     => $request->name,
            'message'  => $request->message,
            );
        dd($datas);

        Mail::send('Email.contact', $datas, function($message) use ($datas){
            $message->from($datas['email']);
            $message->to('sokhonpang7373@gmail.com');
        });

        redirect('/contact');
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
