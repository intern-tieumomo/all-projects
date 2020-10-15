<?php

namespace App\Http\Controllers;

use App\Http\Controllers\blade;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyController extends Controller
{
  public function Hello() {
  	echo "Hello World";
  }

  public function Course($name) {
  	echo "Param: ".$name;
  	return redirect()->route('my-route-1');
  }

  public function GetURL(Request $request) {
  	echo "path: ".$request->path()."<br>";
  	echo "url: ".$request->url()."<br>";
  	if($request->is('my*')) {
  		echo "isMy: ".$request->is('my*')."<br>";
  	}
  	if($request->isMethod('get')) {
  		echo "isGet: ".$request->isMethod('get');
  	}
  }

  public function postForm(Request $request) {
  	echo "name: ";
  	echo "<pre>";
  	print_r($request->all());
  	echo "</pre>";
  }

  public function setCookie() {
  	$response = new Response();
  	$response->withCookie(
  		'name',
  		'Pham Hong Quan',
  		2
  	);
  	return $response;
  }

  public function getCookie(Request $request) {
  	return "cookie name: ".$request->cookie('name');
  }

  public function postFile(Request $request) {
  	echo "<pre>";
  	print_r($request->input('fileName'));
  	echo "</pre>";

  	if($request->hasFile('fileName')) {
  		echo "Had";
  		$file = $request->file('fileName');
  		$name = $file->getClientOriginalName('fileName');
  		echo "<pre>";
  		print_r($name);
  		echo "</pre>";
  		// $file->move(
  		// 	'images',
  		// 	'picture.png'
  		// );
  	} else {
  		echo "Not yet";
  	}
  }

 	public function getJSON() {
 		$array = ['name' => 'Pham Hong Quan', 'age' => 21];
 		return response()->json($array);
 	}

 	public function myView() {
 		return view('view.quan');
 	}

 	public function time($t) {
 		return view('my-view', ['time' => $t]);
 	}

 	public function blade($str) {
 		$name = "<a href='\\'>Pham Hong Quan</a>";
 		$if1 = "";
 		return view('pages.laravel', ['str' => $str, 'name' => $name, 'if' => $if1]);
 	}

  public function mySession(Request $request) {
    $request->session()->pull('key2', 'default');
    echo "<pre>";
    print_r($request->session()->all());
    echo "</pre>";
  }
}