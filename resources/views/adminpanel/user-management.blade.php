<div class="row">
    <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center">
        <h2 class="heading">{{ trans('adminpanel.user-management') }}</h2>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover mt-3em">
        <thead>
            <tr>
                {{--<th class="col-md-2 col-sm-2 col-xs-2"></th>--}}
                <th class="col-md-4 col-sm-3 col-xs-3">{{ trans('adminpanel.user-avatar') }}</th>
                <th class="col-md-4 col-sm-2 col-xs-2">{{ trans('adminpanel.username') }}</th>
                <th class="col-md-2 col-sm-2 col-xs-2">{{ trans('adminpanel.status') }}</th>
                <th class="col-md-4 col-sm-1 col-xs-1">{{ trans('adminpanel.change') }}</th>
                {{--<th class="col-md-1 col-sm-2 col-xs-2"></th>--}}
            </tr>
        </thead>
        <tbody>

            @foreach($allUsers as $oneUser)
                    <tr>

                        <td class="col-md-2 col-sm-2 col-xs-2">
                            <img src="@if($oneUser->avatar !== null)
                                {{ asset('img/avatars/'. $oneUser->avatar) }}
                                @else
                                {{ asset('img/avatars/avatar-placeholder.svg') }}
                                @endif" alt="{{ asset($oneUser->user_name) }}" class="img-responsive img-rounded adminpanel-useravatar"/>
                        </td>

                        <td class="col-md-2 col-sm-2 col-xs-2">
                            <p>{{ $oneUser->user_name }}</p>
                        </td>

                        <td class="col-md-2 col-sm-2 col-xs-2">
                            @if($oneUser->active === 1)
                                <p class="finished-td mb-0">{{ trans('adminpanel.active') }}</p>
                            @else
                                <p class="banned-td mb-0">{{ trans('adminpanel.banned') }}</p>
                            @endif
                        </td>

                        <td class="col-md-3 col-sm-3 col-xs-3">
                            <a href="{{ action('UserpanelController@edit', $oneUser->id) }}" type="button" class="btn btn-xs button-main button-user">{{ trans('adminpanel.toggle') }}</a>
                        </td>

                    </tr>
            @endforeach

        </tbody>
    </table>
</div>
