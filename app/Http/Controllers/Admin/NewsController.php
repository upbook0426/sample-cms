<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    public function index(Request $request)
    {

        $inputs = $request->all();
        $page_disp = $inputs['page_disp'] ?? null;

        //全件
        // if ($page_disp === 'all'){
        //     $page_disp = News::count();
        // }

        // if( false === pageCheck($page_disp) ){
        //     $request->query->remove('page_disp');
        //     return redirect()->route($request->route()->getName());
        // }

        //$records = News::filter($filter)->paginate($page_disp ?? config('const.paginate_pagernum'));

        // $role = Role::all();

        $records = News::get();

        return view('admin.news.index', compact('records', 'inputs'));
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function store(News $news, Request $request)
    {
        $inputs = $request->all();

        $result = $news->fill($inputs)->save();

        if ($result) {
            session()->flash('flash.success', '登録に成功しました');
        } else {
            session()->flash('flash.error', '登録に失敗しました');
        }

        return redirect()->route('admin_news');

    }

    public function delete()
    {
        $result = News::find(request('id'))->delete();

        if ($result) {
            flash_success('削除が完了しました');
        } else {
            flash_error('削除に失敗しました');
        }
        return redirect(url()->previous());
    }
}
