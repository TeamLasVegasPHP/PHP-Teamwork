<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\CreateCRequest;
use Illuminate\Support\Facades\Auth; //Illuminate\Http\Request;

class ArticlesController extends Controller {

    public function index(){

        $articles = Article::latest('published_at')->get();

        $authors=[];
        foreach($articles as $article){
            $authors[]=User::findOrFail($article->user_id)->toArray()['name'];
        }

        return view('articles.index',['articles'=>$articles,'authors'=>$authors]);
    }

    public function show($id){
        $article=Article::findOrFail($id);
        $author=User::findOrFail($article->user_id)->toArray()['name'];
        return view('articles.show',['article'=> $article, 'author'=>$author]);
    }

    public function create(CreateCRequest $request){

        return view('articles.create');
    }


    public function store(CreateArticleRequest $request){
        $input= $request->all();
        $input['published_at'] = Carbon::now();
        $article=new Article($input);
        Auth::user()->articles()->save($article);
        //Article::create($input);

        return redirect('articles');
    }
}
