@extends('app')

@section('content')

    <div class="container-fluid" role="main">
        <div class="account">

            <div class="row">
                <div class="col-xs-12 col-md-9 mt-3em">
                <!-- Tabs -->

                    <div class="row">
                        <div class="col-sm-12">
                            @if(Session::has('section_key') && Session::get('section_key') == 1)
                                <div class="col-sm-3 text-center form-section-tab form-section-tab-border-left" data-section="0">{{ trans('userpanel.my-contributions') }}</div>
                                <div class="col-sm-3 text-center form-section-tab form-section-tab-active" data-section="1">{{ trans('userpanel.my-favourites') }}</div>
                                <div class="col-sm-3 text-center form-section-tab" data-section="2">{{ trans('userpanel.my-projects') }}</div>
                                <div class="col-sm-3 text-center form-section-tab" data-section="3">{{ trans('userpanel.my-details') }}</div>
                            @elseif(Session::has('section_key') && Session::get('section_key') == 3)
                                <div class="col-sm-3 text-center form-section-tab form-section-tab-border-left" data-section="0">{{ trans('userpanel.my-contributions') }}</div>
                                <div class="col-sm-3 text-center form-section-tab" data-section="1">{{ trans('userpanel.my-favourites') }}</div>
                                <div class="col-sm-3 text-center form-section-tab" data-section="2">{{ trans('userpanel.my-projects') }}</div>
                                <div class="col-sm-3 text-center form-section-tab form-section-tab-active" data-section="3">{{ trans('userpanel.my-details') }}</div>
                            @else
                                <div class="col-sm-3 text-center form-section-tab form-section-tab-border-left form-section-tab-active" data-section="0">{{ trans('userpanel.my-contributions') }}</div>
                                <div class="col-sm-3 text-center form-section-tab" data-section="1">{{ trans('userpanel.my-favourites') }}</div>
                                <div class="col-sm-3 text-center form-section-tab" data-section="2">{{ trans('userpanel.my-projects') }}</div>
                                <div class="col-sm-3 text-center form-section-tab" data-section="3">{{ trans('userpanel.my-details') }}</div>
                            @endif
                        </div>
                    </div>
                <!-- end tabs -->

                <!-- Panel content -->
                    <div class="row-fluid bt-none clearfix">
                        <div id="userpanel-wrapper" class="col-sm-12">

                            @include('userpanel.tabs-overview')

                        </div>
                    </div> <!-- end panel content -->
                </div>



                <!-- Side menu -->
                <div class="hidden-xs hidden-sm col-md-3 mt-3em">
                    <img class="img-responsive img-rounded center-block avatar" src="@if($user->avatar === null )
                            {{ asset('img/avatars/avatar-placeholder.svg') }}"
                        @else
                            {{ asset('img/avatars/'.$user->avatar) }}"
                        @endif
                            alt="{{ $user->user_name }}" />
                    <h3 class="text-center"> {{ $user->first_name }} {{ $user->last_name }}</h3>
                    @if($user->business_name == !null)
                    <h4 class="text-center"> {{ $user->business_name }} </h4>
                    @endif
                    <div class="list-group add-nav">
                        <a href="" data-section="0" class="list-group-item sidemenu-item"><i class="fa fa-cubes"></i> {{ trans('userpanel.my-contributions') }}</a>
                        <a href="" data-section="1" class="list-group-item sidemenu-item"><i class="fa fa-star"></i> {{ trans('userpanel.my-favourites') }}</a>
                        <a href="" data-section="2" class="list-group-item sidemenu-item"><i class="fa fa-line-chart"></i> {{ trans('userpanel.my-projects') }}</a>
                        <a href="" data-section="3" class="list-group-item sidemenu-item"><i class="fa fa-user"></i> {{ trans('userpanel.my-details') }}</a>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('additional_js')
    <script src="{{ asset('js/FormValidation.js') }}"></script>
    <script src="{{ asset('js/timing.js') }}"></script>
    <script src="{{ asset('js/userpanel/userpanel.js') }}"></script>
@endsection