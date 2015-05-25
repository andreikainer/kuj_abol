<div class="row">
    <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 text-center">
        <h2 class="heading">{{ trans('userpanel.my-favourites') }}</h2>
    </div>
</div>


@if($favourites->isEmpty())
    <br>
    <h4 class="text-center no-contributions">You don't have any favoured projects. <a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.LaravelLocalization::transRoute('routes.current-projects')) }}">See all current projects</a> </h4>

@else
<div class="table-responsive">
    <table class="table table-striped table-hover mt-3em">
        <thead>
            <tr>
                <th></th>
                <th class="col-md-2 col-sm-3 col-xs-3">{{ trans('my-contributions.project-title') }}</th>
                <th class="col-md-2 col-sm-2 col-xs-2">{{ trans('my-contributions.status') }}</th>
                <th class="col-md-2 col-sm-1 col-xs-1"></th>
                <th class="col-md-1 col-sm-2 col-xs-2"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($favourites as $key => $favourite)
            <tr>
                @foreach($favourite->project->mainImage as $image)
                    <td class="col-md-2 col-sm-2 col-xs-2 hidden-xs">
                        <img src="{{ asset('img/'.$favourite->project->slug.'/small/'.$image->filename) }}" alt="{{ $favourite->project->slug }}" width="100%"/>
                    </td>
                @endforeach
                <td class="col-md-3 col-sm-3 col-xs-3">
                    {{ $favourite->project->project_name }}
                </td>

                <td class="col-md-2 col-sm-2 col-xs-2">
                    @if($favourite->project->succ_funded == 1)
                        <p class="finished-td mb-0">{{ trans('home-page.finished') }}</p>
                    @else
                        <p class="ongoing-td mb-0">{{ trans('my-contributions.ongoing') }}</p>
                    @endif
                </td>

                <td class="col-md-3 col-sm-3 col-xs-3">
                    <a href="{{ action('UserpanelController@removeFavourite', $favourite->project->id) }}" type="button" class="btn btn-xs orange_btn">{{ trans('my-contributions.unfavourite') }}</a>
                </td>

                <td class="col-md-2 col-sm-2 col-xs-2">
                    @if($favourite->project->succ_funded == 1)
                        <a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.LaravelLocalization::transRoute('routes.project').'/'.$favourite->project->slug) }}" class="btn btn_sec-td">{{ trans('userpanel.view-project') }}</a>
                    @else
                        <a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.LaravelLocalization::transRoute('routes.project').'/'.$favourite->project->slug) }}" class="btn button-main contribute-td">{{ trans('my-contributions.contribute') }}</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endif
