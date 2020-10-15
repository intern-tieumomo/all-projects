<?php

use App\Flight;
use App\Product;
use App\User;
use Faker\Factory;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Example
Route::get('/hello-world', function() {
	return view('hello-world');
});

//Truyen tham so tren Route
Route::get('name/{name}', function($name) {
	echo "Your name is : ".$name;
});

Route::get('date/{date}', function($date) {
	echo "Date: ".$date;
})->where(['date' => '[0-9]+']);
//[a-zA-Z]+ is Regular Expression

//Dinh danh cho Route
Route::get('route1', ['as' => 'my-route-1', function() {
	echo "Identified";
}]);

Route::get('/route2', function() {
	echo "This is route 2";
})->name('my-route-2');

Route::get('call-route-1', function() {
	return redirect()->route('my-route-1');
});

Route::get('call-route-2', function() {
	return redirect()->route('my-route-2');
});

//Route group
Route::group(['prefix' => 'my-group'], function() {
    Route::get('user-1', function() {
        echo "user-1";
    });
    Route::get('user-2', function() {
        echo "user-2";
    });
    Route::get('user-3', function() {
        echo "user-3";
    });
});

//Call controller
Route::get('call-controller', 'MyController@Hello');

Route::get('params/{name}', 'MyController@Course');

//URL
Route::get('my-request', 'MyController@GetURL');
Route::get('my-admin', 'MyController@GetURL');

//Send data in request
Route::get('getForm', function() {
    return view('postForm');
});

Route::post('postForm', ['as' => 'postForm', 'uses' => 'MyController@postForm']);

//Cookie
Route::get('set-cookie', 'MyController@setCookie');
Route::get('get-cookie', 'MyController@getCookie');

//Upload file
Route::get('upload-file', function() {
	return view('post-file');
});

Route::post('post-file', [
	'as' => 'post-file', 
	'uses' => 'MyController@postFile'
]);

//JSON
Route::get('get-json', 'MyController@getJSON');

//VIews
Route::get('my-view', 'MyController@myView');

//View params
Route::get('time/{t}', 'MyController@time');

View::share('name', 'Pham Hong Quan');
View::share('ROWS_PER_PAGE', 5);

//css
Route::get('link-css', function() {
	return view('pages.laravel');
});

Route::get('blade-template/{str}', 'MyController@blade');

//mysql
Route::get('database', function() {
	// Schema::create('product_type', function ($table) {
	//     $table->increments('id');
	//     $table->string('name', 200);
	// });

	Schema::create('type', function ($table) {
	    $table->increments('id');
	    $table->string('name', 200)->nullable();
	    $table->string('producer')->default('producer');
	});

	echo "Created";
});

Route::get('connect-table', function() {
    Schema::create('product', function ($table) {
        $table->increments('id');
        $table->string('name', 100);
        $table->float('price');
        $table->integer('quantity')->default(0);
        $table->integer('product_type_id')->unsigned();
        $table->foreign('product_type_id')->references('id')->on('product_type');
    });

    echo "Created product table";
});

Route::get('drop-column', function() {
    Schema::table('type', function($table) {
    	$table->dropColumn('producer');
    });

    echo "Dropped column producer";
});

Route::get('add-column', function() {
    Schema::table('type', function($table) {
    	$table->string('email');
    });

    echo "Added column email";
});

Route::get('rename/{from}/{to}', function($from, $to) {
    Schema::rename($from, $to);

    echo "Renamed table ".$from." to ".$to;
});

Route::get('drop-table', function() {
    // Schema::drop('user');
		Schema::dropIfExists('user');

    echo "Deleted table user";
});

//Query Builder
Route::get('qb/get', function() {
	$data = DB::table('users')->get();
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.": ".$value."<br>";
		}
		echo "<hr>";
	}
});

Route::get('qb/where-id-{id}', function($id) {
	$data = DB::table('users')->where('id', '=', $id)->get();
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.": ".$value."<br>";
		}
		echo "<hr>";
	}
});

Route::get('qb/get-id-name-email-{id}', function($id) {
	$data = DB::table('users')->select(['id', 'name', 'email'])->where('id', $id)->get();
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.": ".$value."<br>";
		}
		echo "<hr>";
	}
});

//DB::raw
Route::get('qb/get-raw-{id}', function($id) {
 	$data = DB::table('users')->select(DB::raw('id, name as fullname, email'))->where('id', $id)->get();
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.": ".$value."<br>";
		}
		echo "<hr>";
	}
});

Route::get('qb/order-by', function() {
 	$data = DB::table('users')->select(DB::raw('id, name as fullname, email'))->where('id', '>=', 1)->orderBy('id', 'desc')->take(2)->get();
	foreach ($data as $row) {
		foreach ($row as $key => $value) {
			echo $key.": ".$value."<br>";
		}
		echo "<hr>";
	}
});

//Update
Route::get('qb/update-{id}', function($id) {
	DB::table('users')->where('id', $id)->update([
		'name'  => 'pham hong quan',
		'email' => Str::random(5).'@gmail.com'
	]);
    
  echo 'Updated id = '.$id;
});

Route::get('qb/delete-{id}', function($id) {
	DB::table('users')->where('id', $id)->delete();
  echo 'Deleted id = '.$id;
});

Route::get('qb/truncate', function() {
	DB::table('users')->truncate();
  echo 'Deleted all';
});

//Model
Route::get('model/save', function() {
    $user = new User();

    $user->name = 'Pham Hong Quan';
    $user->email = 'quan@gmail.com';
    $user->password = 'password';

    $user->save();
    echo "Saved new user";
});

Route::get('model/get-user-{id}', function($id) {
    $user = User::find($id);
    echo "<pre>";
    print_r($user);
    echo "</pre>";
});

Route::get('model/product/save-{name}', function($name) {
    $product = new Product();
    $product->name = $name;
    $product->quantity = 1;

    $product->save();
    echo "Saved new product - ".$name;
});

Route::get('model/product/get-all', function() {
    //$product = Product::all()->toJson();
    $product = Product::all()->toArray();
    echo "<pre>";
    print_r($product);
    echo "</pre>";
});

Route::get('model/product/name', function() {
    $product = Product::where('name', 'Acer')->get()->toArray();

   	echo "<pre>";
   	print_r($product);
   	echo "</pre>";
});

Route::get('model/product/delete-{id}', function($id) {
    Product::destroy($id);

   	echo "Deleted product id = ".$id;
});

//Middleware
Route::get('age/{age}', function($age) {
    echo $age;
})->middleware('checkage');

Route::get('home', function() {
	echo "home"; 
})->name('home');

Route::get('array', function() {
    return [1, 2, 3];
});

Route::get('url/current', function() {
    echo "<pre>";
    print_r(url()->current());
    echo "</pre>";
    echo "<pre>";
    print_r(url()->full());
    echo "</pre>";
    echo "<pre>";
    print_r(url()->previous());
    echo "</pre>";
});

Route::get('/post/{post}', function () {
    echo route('post.show', ['post' => 1]);
})->name('post.show');

//Session
Route::get('session', function() {
		session([
			'key'  => 'value',
			'key2' => 'value2'
		]);
    $data = session()->all();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('session/controller', 'MyController@mySession');

//Eloquent
Route::get('flight/get-all-name', function() {
    $flights = Flight::all();

   	foreach ($flights as $flight) {
   		echo "<pre>";
   		print_r($flight->name);
   		echo "</pre>";
   	}
});

Route::get('flight/get-name-by-{id}', function($id) {
    $flights = Flight::where('id', $id)->orderBy('name', 'desc')->take(10)->get();

   	foreach ($flights as $flight) {
   		echo "<pre>";
   		print_r($flight->name);
   		echo "</pre>";
   	}
});

Route::get('faker', function() {
  $faker = Faker\Factory::create();

	// generate data by accessing properties
	echo $faker->name."<br>";
  // 'Lucy Cechtelar';
	echo $faker->address."<br>";
  // "426 Jordy Lodge
  // Cartwrightshire, SC 88120-6700"
	echo $faker->text."<br>";
  // Dolores sit sint laboriosam dolorem culpa et autem. Beatae nam sunt fugit
  // et sit et mollitia sed.
  // Fuga deserunt tempora facere magni omnis. Omnis quia temporibus laudantium
  // sit minima sint.
  for ($i = 0; $i < 10; $i++) {
	  echo $faker->name, "<br>";
	}
});

Route::get('flight', function() {
    $flight = Flight::where('name', 'trKiZ')->get()->first();
		$flight->name = 'Quan';
		
		$freshFlight = $flight->fresh();

		echo "<pre>";
		print_r($freshFlight->name);
		echo "</pre>";
		echo "<pre>";
		print_r($flight->name);
		echo "</pre>";
});