<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PageController extends Controller {

    public function about(){

        $name = [
            'Laravel', 'PHP5', 'MySQL','Bootstrap','HTML5', 'CSS3',
            'Google.com'
        ];
        return view('pages.about',compact('name'));
    }

    public function contact(){

        return view('pages.contact');
    }

}
