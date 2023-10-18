<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Carbon\Carbon;
use Image;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userDashboard(){
        return view('user.dashboard');
    }
    public function articleAdd(){
        return view('user.article.article_add');
    }
    public function store(Request $request){

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        'Image'::make($image)->resize(800,800)->save('upload/article/'.$name_gen);
        $save_url = 'upload/article/'.$name_gen;

        $article = Article::insert([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'published_date' => $request->publish_date,
            'image' => $save_url,
            'created_at' => Carbon::now(),

        ]);
        return redirect()->route('article.manage')->with('success','Your Article successfully added');



    }

    public function manage(){
        $articles = Article::all();
        return view('user.article.manage',compact('articles'));
    }

    public function editArticle($id){

        $article = Article::findOrFail($id);
        return view('user.article.edit',compact('article'));

    }
    public function updateArticle(Request $request,$id){

     $article_id = $request->id;
    $old_img = $request->old_image;

    if ($request->file('image')) {

    $image = $request->file('image');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    "Image"::make($image)->resize(300,300)->save('upload/article/'.$name_gen);
    $save_url = 'upload/article/'.$name_gen;

    if (file_exists($old_img)) {
       unlink($old_img);
    }

    $articles = new Article;
    $article = Article::findOrFail($id);
    $article->title = $request->title;
    $article->content = $request->content;
    $article->Author = $request->author;
    $article->published_date = $request->publish_date;
    $article->image =  $save_url;
    $article->update();

}
else{
    $articles = new Article;
    $article = Article::findOrFail($id);
    $article->title = $request->title;
    $article->content = $request->content;
    $article->Author = $request->author;
    $article->published_date = $request->publish_date;

    $article->update();

}





        return redirect()->route('article.manage')->with('success','Your Article successfully updated');

        }

        public function deleteArticle($id){

            $deleted = Article::findOrFail($id);

            $deleted->delete();
            return redirect()->route('article.manage')->with('success','deleted');

        }

        public function showArticle(){
            $shows = Article::orderBy('title','DESC')->latest()->get();
            return view('welcome',compact('shows'));
        }
}


