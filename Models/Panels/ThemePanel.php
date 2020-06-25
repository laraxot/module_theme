<?php
namespace Modules\Theme\Models\Panels;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

//--- Services --
use Modules\Xot\Services\StubService;
use Modules\Xot\Services\RouteService;


use Modules\Xot\Models\Panels\XotBasePanel;

class ThemePanel extends XotBasePanel {
	/**
	 * The model the resource corresponds to.
	 *
	 * @var string
	 */
	public static $model = 'Modules\Theme\Models\Theme';

	/**
	 * The single value that should be used to represent the resource when being displayed.
	 *
	 * @var string
	 */
	public static $title = "title"; 

	/**
	 * The columns that should be searched.
	 *
	 * @var array
	 */
	public static $search = array (
) ;

	/**
	* The relationships that should be eager loaded on index queries.
	*
	* @var array
	*/
	public static function with(){
	  return [];
	}

	public function search(){
		return [];
	}

	/**
	 * on select the option id
	 *
	 */

	public function optionId($row){
		return $row->area_id;
	}

	/**
	 * on select the option label 
	 *
	 */

	public function optionLabel($row){
		return $row->area_define_name;
	}

	/**
	 * Get the fields displayed by the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array

		'col_bs_size' => 6,
		'sortable' => 1,
		'rules' => 'required',
		'rules_messages' => ['it'=>['required'=>'Nome Obbligatorio']],
		'value'=>'..',

	 */
	public function indexNav(){
		return null;
	}

	/**
	 * Build an "index" query for the given resource.
	 *
	 * @param  Request  $request
	 * @param  \Illuminate\Database\Eloquent\Builder  $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */

	public static function indexQuery($data, $query){
		//return $query->where('auth_user_id', $request->user()->auth_user_id);
		return $query; 
	}

	/**
	 * Build a "relatable" query for the given resource.
	 *
	 * This query determines which instances of the model may be attached to other resources.
	 *
	 * @param  Request  $request
	 * @param  \Illuminate\Database\Eloquent\Builder  $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public static function relatableQuery(Request $request, $query){
		//return $query->where('auth_user_id', $request->user()->auth_user_id);
		 //return $query->where('user_id', $request->user()->id);
	}



	public function fields(){
		return array (
  0 => 
  (object)(array(
     'type' => 'Id',
     'name' => 'id',
     'comment' => NULL,
  )),
  1 => 
  (object)(array(
     'type' => 'String',
     'name' => 'title',
     'comment' => NULL,
  )),
  2 => 
  (object)(array(
     'type' => 'String',
     'name' => 'version',
     'comment' => NULL,
  )),
  3 => 
  (object)(array(
     'type' => 'Text',
     'name' => 'txt',
     'comment' => NULL,
  )),
  4 => 
  (object)(array(
     'type' => 'String',
     'name' => 'link',
     'comment' => NULL,
  )),
  5 => 
  (object)(array(
     'type' => 'Integer',
     'name' => 'status',
     'comment' => NULL,
  )),
  6 => 
  (object)(array(
     'type' => 'DateTime',
     'name' => 'created_at',
     'comment' => NULL,
  )),
  7 => 
  (object)(array(
     'type' => 'String',
     'name' => 'created_by',
     'comment' => NULL,
  )),
  8 => 
  (object)(array(
     'type' => 'DateTime',
     'name' => 'updated_at',
     'comment' => NULL,
  )),
  9 => 
  (object)(array(
     'type' => 'String',
     'name' => 'updated_by',
     'comment' => NULL,
  )),
);
	}
	 
	/**
	 * Get the tabs available 
	 *
	 * @return array  
	 */
	public function tabs(){
		$tabs_name = [];
		return $tabs_name;
	}
	/**
	 * Get the cards available for the request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function cards(Request $request){
		return [];
	}

	/**
	 * Get the filters available for the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function filters(Request $request=null){
		return [];
	}

	/**
	 * Get the lenses available for the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function lenses(Request $request){
		return [];
	}

	/**
	 * Get the actions available for the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function actions(Request $request=null){
		return [];
	}

}
