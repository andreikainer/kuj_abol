<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Project;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Support\Facades\Input;

class HeaderController extends Controller {

    protected $fillable = 'search_inputfield';  // user input

    /*
     * to search in project_tbl
     */
    public function search()
    {
        // filtering user's input
        $user_input = strtolower(trim(Input::get('search_inputfield')));
        $search_terms = filter_var($user_input, FILTER_SANITIZE_STRING);
        $message = '';

        // search for filtered input terms
        $projects_results = Project::where('approved', 1)->search($search_terms)->paginate(12);

        // if there are some results => show them; if no results found => show “No results” message
        if ( count($projects_results)>0 ) {
            return view('search.search-results', compact('projects_results', 'message'));
        } else {
            $message = $search_terms;
            return view('search.search-results', compact('projects_results', 'message'));
        }

    }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
