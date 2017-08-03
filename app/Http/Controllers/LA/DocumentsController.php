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

use App\Models\Document;
use App\Models\Upload;

class DocumentsController extends Controller
{
	public $show_action = true;
	public $view_col = 'title';
	public $listing_cols = ['id', 'title', 'category', 'document', 'description', 'ward', 'tags'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Documents', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Documents', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Documents.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Documents');
		
		if(Module::hasAccess($module->id)) {
			return View('la.documents.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new document.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created document in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Documents", "create")) {
		
			$rules = Module::validateRules("Documents", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("Documents", $request);

			// Renaming the uploaded file
			$upload = Upload::find($request->document);
			$old_name = $upload->name;
			$old_name_arr = explode(".",$old_name);

			$date_append = date("Y-m-d-His-");
			$new_name = $date_append.$request->title.".".$old_name_arr[count($old_name_arr)-1];

			$old_path = $upload->path;
			$new_path = storage_path('uploads')."/".$new_name;

			rename($old_path,$new_path);

			$upload->name = $new_name;
			$upload->path = $new_path;

			$upload->save();
			
			return redirect()->route(config('laraadmin.adminRoute') . '.documents.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified document.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Documents", "view")) {
			
			$document = Document::find($id);
			if(isset($document->id)) {
				$module = Module::get('Documents');
				$module->row = $document;
				
				return view('la.documents.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('document', $document);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("document"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified document.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Documents", "edit")) {			
			$document = Document::find($id);
			if(isset($document->id)) {	
				$module = Module::get('Documents');
				
				$module->row = $document;
				
				return view('la.documents.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('document', $document);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("document"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified document in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Documents", "edit")) {
			
			$rules = Module::validateRules("Documents", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("Documents", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.documents.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified document from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Documents", "delete")) {
			Document::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.documents.index');
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
		$values = DB::table('documents')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Documents');

		$tags_column_index = 0;
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];

				// Finding tags column index
				if($col == "tags") $tags_column_index = $j;
				
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/documents/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}

			// Handling tags display
			if($data->data[$i][$tags_column_index] != ""){
				$tags = preg_replace('/[\"\[\]]/','',$data->data[$i][$tags_column_index]);
				$tags = explode(",",$tags);
				
				$tags_elements = "";

				foreach($tags as $tag){
					$tags_elements .= '<span class="label label-primary">'.$tag.'</span>&nbsp;&nbsp;';
				}

				$data->data[$i][$tags_column_index] = $tags_elements;
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Documents", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/documents/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Documents", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.documents.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
					$output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
					$output .= Form::close();
				}
				$data->data[$i][] = (string)$output;
			}
		}
		$out->setData($data);
		return $out;
	}
}
