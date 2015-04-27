@extends('app')

@section('content')

<!-- Jumbotron -->
        <div class="jumbotron">
            <div class="container-fluid clearfix main_carousel">
                <div class="main_carousel_item">
                    <img src="{{ asset('img/main-carousel/lg/home.jpg') }}" class="img-responsive text-center">

                    <div class="jumbotron-text">
                        <h1>Hello, world!</h1>
                        <p>blah-blah</p>
                        <p><a class="button-transparent" href="#" type="button">Contribute now</a></p>
                    </div>
                </div>

                <div class="main_carousel_item">
                    <img src="{{ asset('img/main-carousel/lg/two.jpg') }}" class="img-responsive">

                    <div class="jumbotron-text">
                        <h1>Hello, world!</h1>
                        <p>blah-blah</p>
                        <p><a class="button-transparent" href="#" type="button">View tips</a></p>
                    </div>
                </div>

                <div class="main_carousel_item">
                     <img src="{{ asset('img/main-carousel/lg/three.jpg') }}" class="img-responsive">

                    <div class="jumbotron-text">
                        <h1>Hello, world!</h1>
                        <p>blah-blah</p>
                        <p><a class="button-transparent" href="#" type="button">View our sponsors</a></p>
                    </div>
                </div>

                <div class="main_carousel_item">
                     <img src="{{ asset('img/main-carousel/lg/five.jpg') }}" class="img-responsive">

                     <div class="jumbotron-text">
                        <h1>Hello, world!</h1>
                        <p>blah-blah</p>
                        <p><a class="button-transparent" href="#" type="button">Read a blog</a></p>
                     </div>
                </div>
            </div>
        </div>


<!-- Main content -->
        <div class="container-fluid">
            <div class="row" role="main">

                <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-3em">
                    <h2 class="heading">Current Projects</h2>
                </div>

            </div>

            <div class="row" role="main">

                <div class="col-lg-10 col-lg-offset-1 mt-2em">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="{{ asset('img/main-carousel/xs/three.jpg') }}" alt="????">

                                <div class="caption">
                                    <h3>Project Name</h3>
                                    <p>hakjlghlaghalkfdhglkahg</p>

                                    <p class="percentage text-right">40%</p>

                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>

                                    <p><a href="#" class="btn btn-primary button-main" role="button">Button</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="{{ asset('img/main-carousel/xs/three.jpg') }}" alt="????">
                                <div class="caption">
                                    <h3>Project Name</h3>
                                    <p>hakjlghlaghalkfdhglkahg</p>

                                    <p class="percentage text-right">40%</p>

                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>

                                    <p><a href="#" class="btn btn-primary button-main" role="button">Button</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="{{ asset('img/main-carousel/xs/three.jpg') }}" alt="????">
                                <div class="caption">
                                    <h3>Project Name</h3>
                                    <p>hakjlghlaghalkfdhglkahg</p>

                                    <p class="percentage text-right">40%</p>

                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>

                                  <p><a href="#" class="btn btn-primary button-main" role="button">Button</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="{{ asset('img/main-carousel/xs/three.jpg') }}" alt="????">
                                <div class="caption">
                                    <h3>Project Name</h3>
                                    <p>hakjlghlaghalkfdhglkahg</p>

                                    <p class="percentage text-right">40%</p>

                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>

                                    <p><a href="#" class="btn btn-primary button-main" role="button">Button</a></p>
                                </div>
                            </div>
                        </div>

                    </div> <!-- row ends -->
                </div></div>

            </div> <!-- main content ends -->
@endsection

@section('additional_js')
    <script src="{{ asset('js/home-page/home.js') }}"></script>
@endsection