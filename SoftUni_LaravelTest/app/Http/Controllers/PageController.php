<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PageController extends Controller {

    public function about(){

        $name = [
            'Minka', 'Jichka', 'Stamat'
        ];
        return view('pages.about',compact('name'));
    }

    public function contact(){

        return view('pages.contact');
    }

}
