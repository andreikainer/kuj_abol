@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row" role="main"> <!--Body content-->
		<div class="col-md-6 col-md-offset-3 col-sm-12 text-center"> <!-- project title beginn-->
            <h2 class="heading">Rollstuhlrampe für Hansi</h2>
        </div> <!-- project title end-->

        <div class="col-sm-12 col-md-8"> <!-- project images beginn-->
            <img class="img-responsive center-block" src="{{ asset('/img/hansi.png') }}">
        </div> <!-- project images end-->

        <div id="project_statistics" class="col-sm-12 col-md-4 text-center boarder">  <!-- statistics beginn-->
            <h3>Total funds raised:</h3>
            <h2><strong>&euro; 2359,53</strong></h2>
            <h4>of &euro; 2000,-- minimum goal</h4>
            <div id="progress_bar" style="width:100%; color:white; font-size:30pt;">126%</div>
            <h3>Project ends in:</h3>
            <div id="countdown" data-date="27-05-2015" data-time="19:36" data-timezone="2" data-final="Abgeschloßen">
                <div class="countdown-value"><span id="countdown-days">0</span></div>:
                <div class="countdown-value"><span id="countdown-hours">0</span></div>:
                <div class="countdown-value"><span id="countdown-minutes">0</span></div>:
                <div class="countdown-value"><span id="countdown-seconds">0</span></div>
                <div id="time"><strong>Tage</strong><strong>Stunden</strong><strong>Minuten</strong><strong>Sekunden</strong></div>
            </div>
            <div class="btn button-main contribute">Fund this project</div>
            <div class="heading"></div>
            <div id="facebook-share" class="btn pull-left">
                <img src="{{ asset('/img/facebook_teilen.svg') }}" alt="facebookShare" width="100%">
            </div>
            <div id="favorite" class="btn pull-left">
                <img src="{{ asset('/img/merken.svg') }}" alt="addtofavorite" width="100%">
            </div>
        </div> <!-- statistics end-->

        <div class="col-sm-12 col-md-8 text-center"> <!-- project description beginn-->
            <h2>Project Title</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aspernatur at deleniti distinctio, hic ipsum itaque iure minus neque non nostrum perspiciatis quisquam quo reiciendis rem reprehenderit similique suscipit vel.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti eveniet ipsam labore perferendis placeat quas, quasi sunt ullam? Ad corporis eligendi ipsam modi odio omnis, perferendis repellendus sunt tempora voluptatibus?</p>
            <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda commodi consequuntur corporis dignissimos ducimus earum explicabo illo, nostrum obcaecati odit quasi sequi soluta sunt voluptatum. Deserunt ea facere totam!</span><span>Consectetur dolorem molestiae mollitia porro quasi? Doloribus harum provident quod reprehenderit unde. A distinctio fugit quas! Alias consequatur dolorum ducimus eaque esse iusto, necessitatibus optio quo, reiciendis, rem suscipit voluptates.</span><span>Adipisci assumenda delectus dignissimos eaque, facere itaque perspiciatis qui quidem totam? Blanditiis delectus deserunt dignissimos doloremque enim esse ex incidunt iure, laborum necessitatibus nisi, nostrum officia soluta suscipit, veniam voluptas!</span><span>Ab amet consequuntur debitis error ex expedita fuga fugiat magni nemo nostrum, officiis perspiciatis placeat praesentium repellendus, suscipit ut vero? Assumenda doloremque minus rem saepe? Deserunt excepturi ipsa maiores quasi.</span><span>Aliquid architecto at atque consequuntur culpa delectus dignissimos dolore ea eius esse et fuga, harum hic ipsum, itaque minima minus nemo nisi nobis rem repudiandae tenetur vitae voluptas. Qui, quod?</span></p>
        </div> <!-- project description end-->

        <div class="col-sm-12 col-md-4 text-center"> <!-- contribution packages beginn-->
            <div class="pack1 padding-none"> <!-- contribution package 1-->
                <h3>Business-Building-Block <br>
                    &euro; 150,00 + Tax each</h3>
                <h4>This is our special offer for businesses. Fund this project with one or more "Blocks" and receive this in return:</h4>
                    <ul class="list-item">
                        <li class="list-item">Logo-Display on our website for 3 months</li>
                        <li class="list-item">Linked to your own website for 3 months</li>
                        <li class="list-item">On request: Transfer of Official Sponsor of KuJ Button</li>
                        <li class="list-item">One time business listing in our Newsletter (2000 recipients)</li>
                        <li class="list-item">Your contribution is 100% tax deductible</li>
                        <li class="list-item">Official KuJ Sponsor Certificate</li>
                    </ul>
            </div>
            <div class="packs2-4 padding-none"> <!-- contribution package 2-->
                <h3>Small-Building-Block  | &euro; 15,00</h3>
                <p class="text-justify">Fund this project with a fixed amount of &euro; 15,00 and receive a personal Thank-you letter from the family. Your contribution will be allocated to this project only!</p>
            </div>
            <div class="packs2-4 padding-none"> <!-- contribution package 3-->
                <h3>Medium-Building-Block | &euro; 25,00</h3>
                <p class="text-justify">Fund this project with a fixed amount of &euro; 25,00 and receive a personal Thank-you letter from the family. Your contribution will be allocated to this project only!</p>
            </div>
            <div class="packs2-4 padding-none"> <!-- contribution package 4-->
                <h3>Large-Building-Block  | &euro; 50,00 or more</h3>
                <p class="text-justify">Fund this project with &euro; 50,00 or more and receive a personal Thank-you letter from the family. Your contribution will be allocated to this project only!</p>
            </div>
        </div> <!-- contribution packages end-->

        <div class="col-sm-12" style="background:red"> <!-- sponsors row beginn-->
            Olga's Sponsors row
        </div> <!-- sponsors row end-->
        </div> <!-- main content ends -->
@endsection
