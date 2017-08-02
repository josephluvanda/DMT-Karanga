<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Upload;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $roleCount = \App\Role::count();
		if($roleCount != 0) {
			if($roleCount != 0) {
                $categories = Category::all();

                if($categories){
                    for($x = 0; $x < count($categories); $x++){
                        $categories[$x]->upload = Upload::find($categories[$x]->category_image);
                    }
                }
				return view('home',compact('categories'));
			}
		} else {
			return view('errors.error', [
				'title' => 'Migration not completed',
				'message' => 'Please run command <code>php artisan db:seed</code> to generate required table data.',
			]);
		}
    }
}