<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Project;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Support\Facades\Input;


class SearchController extends Controller {

    /*
     * to search in project_tbl
     */
    public function show()
    {
        // filtering user's input
        $user_input = strtolower(trim(Input::get('search_inputfield')));
        $search_terms = filter_var($user_input, FILTER_SANITIZE_STRING);
        $message = '';

        // if the input didn't pass filtering
        if( $search_terms == null)
        {
            $message =  '<strong>' . trans('app.search-invalid') . '</strong>';
            return view('search.search-results', compact('projects_results', 'message'));
        }else{
            // search for filtered input terms
            $projects_results = Project::where('approved', 1)->search($search_terms)->paginate(6);

            // if there are some results => show them; if no results found => show “No results” message
            if ( count($projects_results)>0 ) {
                return view('search.search-results', compact('projects_results', 'message'));
            } else {
                $message = trans('app.no-search-results') . ' <strong>"' . $search_terms . '"</strong>';
                return view('search.search-results', compact('projects_results', 'message'));
            }
        }

    }

}
