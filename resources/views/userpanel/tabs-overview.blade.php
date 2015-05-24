@if(Session::has('section_key') && Session::get('section_key') == 1)
    <div class="userpanel-section" data-section="0">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                @include('userpanel.my-contributions')
            </div>
        </div>
    </div>

    <div class="userpanel-section userpanel-active" data-section="1">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                @include('userpanel.my-favourites')
            </div>
        </div>
    </div>

    <div class="userpanel-section" data-section="2">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                @include('userpanel.my-projects')
            </div>
        </div>
    </div>

    <div class="userpanel-section" data-section="3">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                @include('userpanel.my-details')
            </div>
        </div>
    </div>
@elseif(Session::has('section_key') && Session::get('section_key') == 3)
    <div class="userpanel-section" data-section="0">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                @include('userpanel.my-contributions')
            </div>
        </div>
    </div>

    <div class="userpanel-section" data-section="1">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                @include('userpanel.my-favourites')
            </div>
        </div>
    </div>

    <div class="userpanel-section" data-section="2">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                @include('userpanel.my-projects')
            </div>
        </div>
    </div>

    <div class="userpanel-section userpanel-active" data-section="3">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                @include('userpanel.my-details')
            </div>
        </div>
    </div>
@else
<div class="userpanel-section userpanel-active" data-section="0">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            @include('userpanel.my-contributions')
        </div>
    </div>
</div>

<div class="userpanel-section" data-section="1">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            @include('userpanel.my-favourites')
        </div>
    </div>
</div>

<div class="userpanel-section" data-section="2">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            @include('userpanel.my-projects')
        </div>
    </div>
</div>

<div class="userpanel-section" data-section="3">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            @include('userpanel.my-details')
        </div>
    </div>
</div>
@endif