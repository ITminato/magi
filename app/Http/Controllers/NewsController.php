<?php

namespace App\Http\Controllers;

use App\Models\Admin_new;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( $this->middleware('auth') || $this->middleware('admin') ) {
            $news = Admin_new::all();
            if(count($news) < 1) {
                return $this->create();
            }else{
                return view('mypage.notices');
            }
        }else {
            return view('mypage.notices');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if($this->middleware('auth')) {
            if($this->middleware('admin')){
                return view('admin.news.admin_news');
            }
        }else{
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->validate(
            [
                'title' => ['required','string','max:1220'],
                'news_img_1' =>  ['required'],
                'content' => ['required'],
            ],
            [
                'title.required' => 'タイトルを入力してください。',
                'title.max' => 'タイトルは最大1220文字でなければなりません。',
                'content.required' => '内容は最大1220文字でなければなりません。',
                'news_img_1' => '一つの画像は必須です。'
            ]
        );
        $news = new Admin_new;
        $news->title = $request->title;
        $news->news_img_1 = $request->news_img_1;
        $news->news_img_2 = $request->news_img_2;
        $news->news_img_3 = $request->news_img_3;
        $news->content = $request->content;
        $news->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notice = Admin_new::find($id);
        return view('mypage.notice',['notice'=>$notice,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice = Admin_new::find($id);
        return view('admin.news.admin_news_edit',['notice'=>$notice,]);
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
        $credentials = $request->validate(
            [
                'title' => ['required','string','max:1220'],
                'news_img_1' =>  ['required'],
                'content' => ['required'],
            ],
            [
                'title.required' => 'タイトルを入力してください。',
                'title.max' => 'タイトルは最大1220文字でなければなりません。',
                'content.required' => '内容は最大1220文字でなければなりません。',
                'news_img_1' => '一つの画像は必須です。'
            ]
        );
        $news = Admin_new::find($id);
        $news->title = $request->title;
        $news->news_img_1 = $request->news_img_1;
        $news->news_img_2 = $request->news_img_2;
        $news->news_img_3 = $request->news_img_3;
        $news->content = $request->content;
        $news->save();
        return redirect(url('/admin/news'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin_new::find($id)->delete();
        return 'success';
    }
}
