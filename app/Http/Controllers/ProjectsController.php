<?php namespace App\Http\Controllers;

use App\Document;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProjectRequest;
use App\Project;
use Intervention\Image\Facades\Image;

class ProjectsController extends Controller {

    /**
     * Show the create-project page.
     *
     * @return \Illuminate\View\View
     */
    public function createProject()
    {
        return view('create-project.index');
    }

    public function store(CreateProjectRequest $request)
    {
        $projectDetails = [
            'project_name'  => $request->get('project_name'),
            'short_desc'    => $request->get('short_desc'),
            'full_desc'     => $request->get('full_desc'),
            'target_amount' => $request->get('target_amount'),
            'child_name'    => $request->get('child_name'),
            'slug'          => strtolower(preg_replace('/[\s-]+/', '-', $request->get('project_name'))),
            'application_status' => 1, // completely entered
            'user_id'       => 1 // Needs to be Auth::user->id()
        ];

        $userDocuments = [
            $request->file('doc_1_mand'),
            $request->file('doc_2_mand'),
            $request->file('doc_3'),
            $request->file('doc_4'),
            $request->file('doc_5'),
            $request->file('doc_6')
        ];

        $userImages = [
            'main_img'  => $request->file('main_img'),
            'img_2'     => $request->file('img_2'),
            'img_3'     => $request->file('img_3'),
            'img_4'     => $request->file('img_4')
        ];

        // Save the new Project.
        $project = Project::create($projectDetails);

        // Make the image and document directories.
        $imageFolderPath = public_path("img/$project->slug");
        $documentFolderPath = app_path("documents/$project->slug");

        if(! is_dir($imageFolderPath))
        {
            mkdir($imageFolderPath);
        }
        if(! is_dir($imageFolderPath.'/large'))
        {
            mkdir($imageFolderPath.'/large');
        }
        if(! is_dir($imageFolderPath.'/medium'))
        {
            mkdir($imageFolderPath.'/medium');
        }
        if(! is_dir($imageFolderPath.'/small'))
        {
            mkdir($imageFolderPath.'/small');
        }
        if(! is_dir($documentFolderPath))
        {
            mkdir($documentFolderPath);
        }

        // Create new Document instances.
        // Move the documents to their directory.
        foreach($userDocuments as $file)
        {
            if( ! is_null($file))
            {
                Document::create(['filename' => preg_replace('/[\s]+/', '_', $file->getClientOriginalName()), 'project_id' => $project->id]);
                $file->move($documentFolderPath, preg_replace('/[\s]+/', '_', $file->getClientOriginalName()));
            }
        }

        // Resize the images to our needs, and save them in their directories.
        foreach($userImages as $key => $image)
        {
            if( ! is_null($image))
            {
                Image::make($image)->resize(1250, 700, function($constraint)
                {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                })->limitColors(255)
                    ->save($imageFolderPath.'/large/'.preg_replace('/[\s]+/', '_', $image->getClientOriginalName()));

                Image::make($image)->resize(970, 534, function($constraint)
                {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                })->limitColors(255)
                    ->save($imageFolderPath.'/medium/'.preg_replace('/[\s]+/', '_', $image->getClientOriginalName()));

                Image::make($image)->resize(768, 430, function($constraint)
                {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                })->limitColors(255)
                    ->save($imageFolderPath.'/small/'.preg_replace('/[\s]+/', '_', $image->getClientOriginalName()));
            }
        }

        // Create new Image instances.
        foreach($userImages as $key => $image)
        {
            if( ! is_null($image))
            {
                if( $key != 'main_img')
                {
                    \App\Image::create([
                        'filename' => preg_replace('/[\s]+/', '_', $image->getClientOriginalName()),
                        'project_id' => $project->id
                    ]);
                }
                else
                {
                    \App\Image::create([
                        'filename' => preg_replace('/[\s]+/', '_', $image->getClientOriginalName()),
                        'project_id' => $project->id,
                        'main_img' => 1
                    ]);
                }
            }
        }

        return json_encode('the success html');
    }

}
