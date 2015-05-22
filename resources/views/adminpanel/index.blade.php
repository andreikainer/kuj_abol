@extends('app')

@section('content')

    <div class="container-fluid" role="main">
        <div class="account">

            <div class="row">
                <div class="col-xs-12 col-md-9 mt-3em">
                    <!-- Tabs -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-4 text-center form-section-tab form-section-tab-border-left form-section-tab-active" data-section="0">{{ trans('adminpanel.project-approve') }}</div>
                            <div class="col-sm-4 text-center form-section-tab" data-section="1">{{ trans('adminpanel.user-management') }}</div>
                            <div class="col-sm-4 text-center form-section-tab" data-section="2">{{ trans('adminpanel.sponsors-management') }}</div>
                        </div>
                    </div>
                <!-- end tabs -->

                <!-- Panel content -->
                    <div class="row-fluid bt-none clearfix content">
                        <div id="userpanel-wrapper" class="col-sm-12">

                            @include('adminpanel.tabs-overview')

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
                    <div class="list-group add-nav">
                        <a href="#" data-section="0" class="list-group-item sidemenu-item"><i class="fa fa-check"></i> {{ trans('adminpanel.project-approve') }}</a>
                        <a href="#" data-section="1" class="list-group-item sidemenu-item"><i class="fa fa-users"></i> {{ trans('adminpanel.user-management') }}</a>
                        <a href="#" data-section="2" class="list-group-item sidemenu-item"><i class="fa fa-cube"></i> {{ trans('adminpanel.sponsors-management') }}</a>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('additional_js')
    <script src="{{ asset('js/FormValidation.js') }}"></script>
    <script src="{{ asset('js/userpanel/userpanel.js') }}"></script>
@endsection