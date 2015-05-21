<div class="row">
    <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 text-center">
        <h2 class="heading">{{ trans('adminpanel.project-approve') }}</h2>
    </div>
</div>

@if(! $pendingProjects->isEmpty())
    <div class="table-responsive">
        <table class="table table-striped table-hover mt-3em">
            <thead>
                <tr>
                    <th>{{ trans('adminpanel.project-title') }}</th>
                    <th>{{ trans('adminpanel.uploaded-images') }}</th>
                    <th>{{ trans('adminpanel.supporting-evd') }}</th>
                    <th>{{ trans('adminpanel.edit') }}</th>
                    <th>{{ trans('adminpanel.approve') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendingProjects as $project)
                    <tr>
                        <td>{{ $project->project_name }}</td>
                        <td>
                            <a href="{{ '#'.$project->slug }}" data-toggle="modal" data-target="{{ '#'.$project->slug }}">View Images</a>
                        </td>
                        <td>
                            <ul>
                                @foreach($project->documents as $document)
                                    <li>
                                        <a href="{{ url(asset('documents/'.$project->slug.'/'.$document->filename)) }}">{{ $document->filename }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.LaravelLocalization::transRoute('routes.admin/edit-project').'/'.$project->slug) }}" class="btn btn-xs button-main button-user">{{ trans('adminpanel.edit') }}</a>
                        </td>
                        <td>
                            <a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.LaravelLocalization::transRoute('routes.admin/approve-project').'/'.$project->slug) }}" class="btn btn-xs button-main button-user">{{ trans('adminpanel.approve') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @foreach($pendingProjects as $project)
        {{--<div class="row">--}}
            <div class="modal fade" id="{{ $project->slug }}" tabindex="-1" role="dialog" aria-labelledby="{{ $project->slug.'-label' }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" tabindex="1">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="{{ $project->slug.'-label' }}">{{ trans('adminpanel.uploaded-images') }}</h4>
                        </div>
                        <div class="modal-body">
                            <div id="{{ $project->slug.'-carousel' }}" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    @for($i = 0; $i < count($project->images); $i++)
                                        @if($i == 0)
                                            <div class="item active">
                                                <img src="{{ asset('img/'.$project->slug.'/medium/'.$project->images[$i]->filename) }}" alt="{{ $project->slug }}"/>
                                            </div>
                                        @else
                                            <div class="item">
                                                <img src="{{ asset('img/'.$project->slug.'/medium/'.$project->images[$i]->filename) }}" alt="{{ $project->slug }}"/>
                                            </div>
                                        @endif
                                    @endfor
                                </div>
                                <a class="left carousel-control" href="{{ '#'.$project->slug.'-carousel' }}" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left image-modal-control" aria-hidden="true"></span>
                                </a>
                                <a class="right carousel-control" href="{{ '#'.$project->slug.'-carousel' }}" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right image-modal-control" aria-hidden="true"></span>
                                </a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('create-project-form.terms-cond-3') }}</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        {{--</div>--}}
    @endforeach
@else
    <div class="col-md-12 col-sm-12 text-center no-contributions">
        <h4>{{ trans('adminpanel.no-approvals') }}</h4>
    </div>
@endif