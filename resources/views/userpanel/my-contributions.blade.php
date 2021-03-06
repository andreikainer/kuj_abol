<div class="row">
    <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 text-center">
        <h2 class="heading">{{ trans('userpanel.my-contributions') }}</h2>
    </div>
</div>

@if(! $contributions->isEmpty())
    <div class="table-responsive">
        <table class="table table-striped table-hover mt-3em">
            <thead>
                <tr>
                    <th class="col-md-2 col-sm-2 col-xs-2"></th>
                    <th class="col-md-2 col-sm-3 col-xs-3">{{ trans('my-contributions.project-title') }}</th>
                    <th class="col-md-2 col-sm-2 col-xs-2">{{ trans('my-contributions.contribution-date') }}</th>
                    <th class="col-md-2 col-sm-1 col-xs-1">{{ trans('my-contributions.amount') }}</th>
                    <th class="col-md-1 col-sm-2 col-xs-2">{{ trans('my-contributions.status') }}</th>
                    <th class="col-md-1 col-sm-2 col-xs-2"></th>
                </tr>
            </thead>
            <tbody>
        @foreach($contributions as $pledge)
            <tr>
                @foreach($pledge->project->mainImage as $image)
                    <td class="col-md-2 col-sm-2 col-xs-2">
                        <img src="{{ asset('img/'.$pledge->project->slug.'/small/'.$image->filename) }}" alt="{{ $pledge->project->slug }}" width="100%"/>
                    </td>
                @endforeach
                    <td class="col-md-3 col-sm-3 col-xs-3">
                        {{ $pledge->project->project_name }}
                    </td>
                    <td class="col-md-3 col-sm-2 col-xs-2">
                        {{ $pledge->created_at }}
                    </td>
                    <td class="col-md-1 col-sm-1 col-xs-1">
                        {{ '&euro; '.$pledge->amount }}
                    </td>
                    <td class="col-md-2 col-sm-2 col-xs-2">
                        @if($pledge->project->succ_funded == 1)
                            <p class="finished-td mb-0">{{ trans('home-page.finished') }}</p>
                        @else
                            <p class="ongoing-td mb-0">{{ trans('my-contributions.ongoing') }}</p>
                        @endif
                    </td>
                    <td class="col-md-2 col-sm-2 col-xs-2">
                        @if($pledge->project->succ_funded == 1)
                            <a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.LaravelLocalization::transRoute('routes.project').'/'.$pledge->project->slug) }}" class="btn btn_sec-td">{{ trans('userpanel.view-project') }}</a>
                        @else
                            <a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.LaravelLocalization::transRoute('routes.project').'/'.$pledge->project->slug) }}" class="btn button-main contribute-td">{{ trans('my-contributions.contribute') }}</a>
                        @endif
                    </td>
            </tr>
        @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="col-md-12 col-sm-12 text-center no-contributions">
        <h4>{{ trans('my-contributions.no-contributions') }} <a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.LaravelLocalization::transRoute('routes.current-projects')) }}">{{ trans('my-contributions.contribute-link') }}</a></h4>
    </div>
@endif