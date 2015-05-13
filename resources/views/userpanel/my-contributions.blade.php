
<h3 class="text-center">{{ trans('userpanel.my-contributions') }}</h3>

<table class="table table-striped table-hover table-responsive mt-3em">
    <tr>
        <thead>
        <th></th>
        <th>Project Title</th>
        <th>Contribution Date</th>
        <th>Amount</th>
        <th>Status</th>
        <th></th>
        </thead>
    </tr>
    <tbody>
    @foreach($user->project as $key => $pr)
    <tr>
        <td><img src="{{ asset('img/ergotherapie-fuer-jonathan/small/jonathan1.jpg') }}" width="170" /></td>
        <td>{{ $pr->project_name }}</td>
        <td>{{ $pr->completed_on }}</td>
        <td>60</td>
        <td>
            @if($pr->succ_funded == 1)
                OK
            @endif
        </td>
        <td><a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.LaravelLocalization::transRoute('routes.project'), $pr->slug) }}" class="btn btn_sec">{{ trans('userpanel.view-project') }}</a></td>
    </tr>
    @endforeach
    </tbody>

</table>