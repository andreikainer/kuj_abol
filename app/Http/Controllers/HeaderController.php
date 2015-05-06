<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HeaderController extends Controller {

    protected $projects_tbl = 'projects';       // for getting results of appropriate projects
    protected $posts_tbl = 'posts';             // for getting results of appropriate blog posts
    protected $fillable = 'search_inputfield';  // user input

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('search.search-results');
	}


    public function search()
    {
        $user_input 	= 	strtolower(trim(Input::get('search_inputfield')));
	    $user_input		=	explode('', $user_input);

	    $search_terms	=	filter_var($user_input, FILTER_SANITIZE_STRING);

    // if user’s input passed filtering
	    if($search_terms != false)
        {
            foreach($search_terms as $term)
            {
                $projects_tbl->select('id')
				                ->where('project_name', 'LIKE', '%' . $term . '%')
				                ->orWhere('short_desc', 'LIKE', '%' . $term . '%')
				                ->orWhere('full_desc', 'LIKE', '%' . $term . '%')

			                // only search throughout published projects
			                	->having('approved', 1)
			                // show the project that was created most recently
			                	->orderBy('created_at', 'desc')
			                // show first 20 results and paginate the rest
			                	->paginate(20);

                $posts_tbl->select('id')
			                	->where('post_title', 'LIKE', '%' . $term . '%')
			                	->orWhere('post_content', 'LIKE', '%' . $term . '%')
			                // only search throughout published posts
			                	->having('hidden', 0)
			                // show the latests posts
			                	->orderBy('created_at', 'desc')
			                	->paginate(10);
		}

        // getting search results for projects and for blog’s posts
        $projects_results	= $projects_tbl->get();
        $posts_results	    = $posts_tbl->get();

        // if there is some results => show them; if no results found => show “No results” message
        if($projects_results->count() > 0 || $posts_results->count() > 0)
        {
            return view('search.search_results', compact('projects_results', 'posts_results'));
		}else{
            return view('search.search_results')->with('message', '<h3>Sorry, no project found for' . $user_input  .'</h3>');
		}
// if user’s input didn’t pass filtering => show validation message
    }else{
        return view('search_results')->with('message', '<h3>Not valid input.</h3>');
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
