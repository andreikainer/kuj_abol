<div class="row">
    <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center">
        <h2 class="heading">{{ trans('adminpanel.sponsors-management') }}</h2>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover mt-3em">
        <thead>
        <tr id="admin-logo-form">

            <th class="col-xs-4">Logo</th>
            <th class="col-xs-4">{{ trans('adminpanel.business-name') }}</th>
            <th class="col-xs-4">{{ trans('adminpanel.online-since') }}</th>
            <th class="col-xs-4"></th>

        </tr>
        </thead>
        <tbody>
            <tr>
                <td><h4 id="add-logo" type="button" class="btn btn-xs button-main button-user">{{ trans('adminpanel.add-logo') }}</h4></td>
            </tr>
            {!! Form::open(['action' => 'AdminController@addSponsor', 'class' => 'row', 'method' => 'post', 'files' => 'true']) !!}
            <tr>
                <td>
                    {!! Form::file('logo', ['class' => 'admin-logo-upload', 'accept' => 'image/*']) !!}
                </td>

                <td>
                    {!! Form::text('business_name', '', array('required', 'class'=>'form-input form-inline')) !!}
                </td>

                <td>
                    {!! Form::text('url', 'http://', array('required', 'class'=>'form-input form-inline')) !!}
                </td>

                <td>
                   {!! Form::submit('ADD') !!}
                </td>
            </tr>
            {!! Form::close() !!}
            @foreach($allSponsors as $Sponsor)
            <tr>

                <td class="col-md-3 col-sm-2">
                    <img src="@if($Sponsor->logo !== null)
                                {{ asset('img/logos/'. $Sponsor->logo) }}
                                @else
                    {{ asset('img/avatars/avatar-placeholder.svg') }}
                                @endif" alt="{{ asset($Sponsor->business_name) }}" class="img-responsive"/>
                </td>

                <td class="col-md-3 col-sm-2 col-xs-3">
                    <p>{{ $Sponsor->business_name }}</p>
                </td>

                <td class="col-md-3 col-sm-2 col-xs-3">
                    {{ $Sponsor->online_since }}
                </td>

                <td class="col-md-3 col-sm-2 col-xs-3">
                    @if($Sponsor->active == 1)
                    <a href="{{ action('AdminController@removeSponsor', $Sponsor->id) }}" type="button" id="username-btn" class="btn btn-xs button-main button-user">{{ trans('adminpanel.remove') }}</a>
                    @else
                        <a href="{{ action('AdminController@relistSponsor', $Sponsor->id) }}" type="button" class="btn btn-xs button-main button-user">{{ trans('adminpanel.relist') }}</a>
                    @endif
                </td>

            </tr>
        @endforeach

        </tbody>
    </table>
</div>