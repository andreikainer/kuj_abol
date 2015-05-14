@extends('app')

@section('content')

    <div class="container-fluid account" role="main">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 text-center mt-3em">
                <h2 class="heading">{{ trans('userpanel.dashboard')  }}</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-9 mt-3em">
                <!-- Tabs -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="cpp-error error-box form-error"></div>
                    </div>
<<<<<<< HEAD

                    {{--<div class="col-sm-12">--}}
                        {{--<div class="col-sm-3 text-center form-section-tab form-section-tab-border-left form-section-tab-active" data-section="0">{{ trans('userpanel.my-contributions') }}</div>--}}
                        {{--<div class="col-sm-3 text-center form-section-tab" data-section="1">{{ trans('userpanel.my-favourites') }}</div>--}}
                        {{--<div class="col-sm-3 text-center form-section-tab" data-section="2">{{ trans('userpanel.my-projects') }}</div>--}}
                        {{--<div class="col-sm-3 text-center form-section-tab" data-section="3">{{ trans('userpanel.my-details') }}</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--<!-- end tabs -->--}}

            {{--<!-- Panel content -->--}}
                {{--<div class="row-fluid bt-none">--}}
                    {{--<div id="userpanel-wrapper" class="col-sm-12 fieldset-active">--}}
                        {{--@include('userpanel.tabs-overview')--}}
                        {{--pipa--}}
                    {{--</div>--}}
                {{--</div> <!-- end panel content -->--}}
            {{--</div>--}}



            {{--<!-- Side menu -->--}}
            {{--<div class="hidden-xs hidden-sm col-md-3 mt-2em">--}}
                {{--<img class="img-responsive center-block" src="@if($user->avatar === null )--}}
                        {{--{{ asset('img/avatars/avatar-placeholder.svg') }}"--}}
                    {{--@else--}}
                        {{--{{ asset('img/avatars/'.$user->avatar) }}"--}}
                    {{--@endif--}}
                        {{--alt="{{ $user->user_name }}" />--}}
                {{--<h3 class="text-center"> {{ $user->first_name }} {{ $user->last_name }}</h3>--}}
                {{--@if($user->business_name == !null)--}}
                {{--<h4 class="text-center"> {{ $user->business_name }} </h4>--}}
                {{--@endif--}}
                {{--<div class="list-group add-nav">--}}
                    {{--<a href="#" data-scroll class="list-group-item sidemenu-item"><i class="fa fa-cubes"></i> {{ trans('userpanel.my-contributions') }}</a>--}}
                    {{--<a href="#" data-scroll class="list-group-item sidemenu-item"><i class="fa fa-star"></i> {{ trans('userpanel.my-favourites') }}</a>--}}
                    {{--<a href="#" data-scroll class="list-group-item sidemenu-item"><i class="fa fa-line-chart"></i> {{ trans('userpanel.my-projects') }}</a>--}}
                    {{--<a href="#" data-scroll class="list-group-item sidemenu-item"><i class="fa fa-user"></i> {{ trans('userpanel.my-details') }}</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}


=======

                    <div class="col-sm-12">
                        <div class="col-sm-3 text-center form-section-tab form-section-tab-border-left form-section-tab-active" data-section="0">{{ trans('userpanel.my-contributions') }}</div>
                        <div class="col-sm-3 text-center form-section-tab" data-section="1">{{ trans('userpanel.my-favourites') }}</div>
                        <div class="col-sm-3 text-center form-section-tab" data-section="2">{{ trans('userpanel.my-projects') }}</div>
                        <div class="col-sm-3 text-center form-section-tab" data-section="3">{{ trans('userpanel.my-details') }}</div>
                    </div>
                </div> <!-- end section tabs -->

                <div class="row">
                    <div class="col-sm-12">
                        @include('userpanel.tabs-overview')
                    </div>
                </div> <!-- end panel content -->
            </div>

            <div class="hidden-xs hidden-sm col-md-3 mt-3em">
                <img class="img-responsive center-block" src="{{ asset('img/avatars/'.$user->avatar) }}" alt="{{ $user->user_name }}" />
                <h3 class="text-center"> {{ $user->first_name }} {{ $user->last_name }}</h3>
                @if($user->business_name == !null)
                    <h4 class="text-center"> {{ $user->business_name }} </h4>
                @endif
                <div class="list-group">
                    <a href="#tips_for_success" data-scroll class="list-group-item sidemenu-item"><i class="fa fa-compass"></i> {{ trans('userpanel.my-contributions') }}</a>
                    <a href="#faq" data-scroll class="list-group-item sidemenu-item"><i class="fa fa-comments-o"></i> {{ trans('userpanel.my-favourites') }}</a>
                    <a href="#our_goal" data-scroll class="list-group-item sidemenu-item"><i class="fa fa-life-ring"></i> {{ trans('userpanel.my-projects') }}</a>
                    <a href="#our_team" data-scroll class="list-group-item sidemenu-item"><i class="fa fa-group"></i> {{ trans('userpanel.my-details') }}</a>
                </div>
            </div>
        </div>
>>>>>>> 357ba9839556e6dd16330c98ff0acaacbe32d8c0

@endsection

@section('additional_js')

    <script src="{{ asset('js/userpanel-page/userpanel.js') }}"></script>

    <script src="{{ asset('js/FormValidation.js') }}"></script>
    {{--<script src="{{ asset('js/userpanel-page/userpanel.js') }}"></script>--}}

@endsection