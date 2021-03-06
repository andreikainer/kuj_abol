<div class="row">
    <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 text-center">
        <h2 class="heading">{{ trans('userpanel.my-projects') }}</h2>
    </div>
</div>

@if($user->projects->isEmpty())
    <br>
    <h4 class="text-center no-contributions">{{ trans('my-contributions.no-project') }}</h4>
@else
<div class="table-responsive">


    <table class="table table-striped table-hover mt-3em">
        <thead>
        <tr>
            <th></th>
            <th class="col-md-2 col-sm-3 col-xs-3">{{ trans('my-contributions.project-title') }}</th>
            <th class="col-md-2 col-sm-2 col-xs-2">{{ trans('my-contributions.application-status') }}</th>
            <th class="col-md-2 col-sm-1 col-xs-1">{{ trans('my-contributions.project-status') }}</th>
            <th class="col-md-1 col-sm-2 col-xs-2"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($user->projects as $submittedproject)
            <tr>
                @foreach($submittedproject->mainImage as $image)
                    <td class="col-md-2 col-sm-2 col-xs-2">
                        <img src="{{ asset('img/'.$submittedproject->slug.'/small/'.$image->filename) }}" alt="{{ $submittedproject->title }}" width="100%"/>
                    </td>
                @endforeach
                <td class="col-md-3 col-sm-3 col-xs-3">
                    {{ $submittedproject->project_name }}
                </td>

                <td class="col-md-2 col-sm-2 col-xs-2">
                    @if($submittedproject->application_status == 1 && $submittedproject->approved == 0)
                        <p class="ongoing-td mb-0">{{ trans('my-contributions.pending') }}</p>
                    @elseif($submittedproject->application_status == 1 && $submittedproject->approved == 1)
                        <p class="finished-td mb-0">{{ trans('my-contributions.approved') }}</p>
                    @endif
                </td>

                <td class="col-md-2 col-sm-2 col-xs-2">
                    @if($submittedproject->succ_funded == 1)
                        <p class="finished-td mb-0">{{ trans('home-page.finished') }}</p>
                    @else
                        <p class="ongoing-td mb-0">{{ trans('my-contributions.ongoing') }}</p>
                    @endif
                </td>

                <td class="col-md-2 col-sm-2 col-xs-2">
                    @if($submittedproject->approved == 1)
                    <a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.LaravelLocalization::transRoute('routes.project').'/'.$submittedproject->slug) }}" class="btn btn_sec-td">{{ trans('userpanel.view-project') }}</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endif