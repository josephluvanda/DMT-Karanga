<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
use Illuminate\Support\Facades\Log;

use App\Models\Registration;

class RegistrationsController extends Controller
{
	public $show_action = true;
	public $view_col = 'email';
	public $listing_cols = ['id', 'email','firstname', 'middlename',  'surname', 'mobile', 'registration_reason'];

	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Registrations', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Registrations', $this->listing_cols);
		}
	}

	/**
	 * Display a listing of the Registrations.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Registrations');

		if(Module::hasAccess($module->id)) {
			return View('la.registrations.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new registration.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created registration in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Registrations", "create")) {

			$rules = Module::validateRules("Registrations", $request);

			$validator = Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}

			$insert_id = Module::insert("Registrations", $request);

			return redirect()->route(config('laraadmin.adminRoute') . '.registrations.index');

		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified registration.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Registrations", "view")) {

			$registration = Registration::find($id);
			if(isset($registration->id)) {
				$module = Module::get('Registrations');
				$module->row = $registration;

				return view('la.registrations.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('registration', $registration);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("registration"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified registration.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Registrations", "edit")) {
			$registration = Registration::find($id);
			if(isset($registration->id)) {
				$module = Module::get('Registrations');

				$module->row = $registration;

				return view('la.registrations.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('registration', $registration);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("registration"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified registration in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Registrations", "edit")) {

			$rules = Module::validateRules("Registrations", $request, true);

			$validator = Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			Log::info($request);
			$insert_id = Module::updateRow("Registrations", $request, $id);

			return redirect()->route(config('laraadmin.adminRoute') . '.registrations.index');

		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified registration from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Registrations", "delete")) {
			Registration::find($id)->delete();

			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.registrations.index');
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Datatable Ajax fetch
	 *
	 * @return
	 */
	public function dtajax()
	{
		$values = DB::table('registrations')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Registrations');

		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) {
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/registrations/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}

			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Registrations", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/registrations/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}

				if(Module::hasAccess("Registrations", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.registrations.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
					$output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
					$output .= Form::close();
				}
				$data->data[$i][] = (string)$output;
			}
		}
		$out->setData($data);
		return $out;
	}
	/**
	 * Handles front registration requests
	 *
	 */
	 public function access_request(Request $request){
	    $rules = array(
	      'firstname' => 'required|alpha|max:30',
	      'middlename' => 'alpha|max:30',
	      'surname' => 'required|alpha|max:30',
	      'email' => 'required|unique:registrations,email',
	      'mobile' => 'required|numeric|unique:registrations,mobile',
	      'registration_reason' => 'required',
	    );
	    $validator = Validator::make($request->all(), $rules);

	    if( $validator->fails()){
	      return redirect('access_request')->withErrors($validator)->withInput();
	    }else{
	      $registration = new Registration;

	      $registration->firstname = $request->firstname;
	      $registration->middlename = $request->middlename;
	      $registration->surname = $request->surname;
	      $registration->email = $request->email;
	      $registration->mobile = $request->mobile;
	      $registration->registration_reason = $request->registration_reason;
	      $registration->save();

	      return redirect('access_request')->with('message', "Your request is being processed. We'll notify you once done");

	    }

	 }

}
