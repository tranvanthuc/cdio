<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Major;
use App\Http\Requests\AddNewsRequest;
use App\News;
use App\User;
use App\Report;
use DateTime;
use DB;

class NewsController extends Controller
{
// get add news
    public function getAddNews()
    {
    	$listMajors = Major::all();
    	return view('admin.news.add', compact('listMajors'));
    }

// post add news
    public function postAddNews(AddNewsRequest $request)
    {
    	$news = new News;
    	$news->title = $request->title;
    	$news->slug = str_slug($request->title);
    	$news->subject = $request->subject;
    	$news->price = $request->price;
    	$news->desc = $request->desc;
    	$news->status = 1;
    	$news->user_id = Auth::user()->id;
    	$news->major_id = $request->sltMajors;

        $imageName = $request->file('fImage')->getClientOriginalName(); // get name image

    	$news->image = $imageName;
    	$news->created_at = new DateTime;
    	$news->updated_at = new DateTime;

    	$news->save();
        //move image
        $request->file('fImage')->move('uploads/news'. $news->id , $imageName);

        //add report
        $report = new Report;
        $report->user_id = Auth::user()->id;
        $report->content = "Added News: ". str_limit($news->title,30);
        $report->created_at = new DateTime;
        $report->updated_at = new DateTime;
        $report->save();


    	return redirect()->route('getListNews')->with(['flash_level' => 'success', 'flash_message' => 'Added News Success !']);
    }
// get lock news
    public function getLockNews($id)
    {
        $news = News::find($id);
        ($news->status == 0) ? $news->status=1 : $news->status=0; 
        $news->save();

        //add report
        $report = new Report;
        $report->user_id = Auth::user()->id;
        
        $report->created_at = new DateTime;
        $report->updated_at = new DateTime;
        

        if($news->status == 1){
            $report->content = "Unlocked News: ". str_limit($news->title,30);
            $report->save();
            return redirect()->route('getListNews')->with(['flash_level' => 'success', 'flash_message' => 'Unlocked News Success !']);
        }
        else {
            $report->content = "Locked News: ". str_limit($news->title,30);
            $report->save();
            return redirect()->route('getListNews')->with(['flash_level' => 'success', 'flash_message' => 'Locked News Success !']);
        }
    }

    //get edit news
    public function getEditNews($id)
    {
        $news = News::find($id);
        $listMajors = Major::all();
        return view('admin.news.edit', compact('news', 'listMajors'));
    }

// get list news
    public function getListNews()
    {
        $listNews = DB::table('news')
            ->join('users', 'users.id', '=', 'news.user_id')
            ->select('news.*', 'users.level_id')
            ->orderBy('users.level_id', 'asc')
            ->get();

        return view('admin.news.list', compact('listNews'));
    }

//get delete news
    public function getDelNews($id)
    {
        $news = News::find($id);

        // add report
        $report = new Report;
        $report->user_id = Auth::user()->id;
        $report->content = "Deleted News: ". str_limit($news->title,30);
        $report->created_at = new DateTime;
        $report->updated_at = new DateTime;
        $report->save();

        //delete news
        $news->delete();
        return redirect()->route('getListNews')->with(['flash_level' => 'success', 'flash_message' => 'Deleted News Success !']);
    }
}
