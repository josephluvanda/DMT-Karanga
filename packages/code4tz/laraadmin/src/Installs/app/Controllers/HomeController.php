<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Log;
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
      $this->middleware('auth');
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
          if(!Auth::user()){
            return redirect('/login');
          }else{
            return redirect('/admin');
          }
    		} else {
      			return view('errors.error', [
      				'title' => 'Migration not completed',
      				'message' => 'Please run command <code>php artisan db:seed</code> to generate required table data.',
      			]);
    		}
    }
}
