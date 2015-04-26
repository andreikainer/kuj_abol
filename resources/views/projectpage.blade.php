@extends('app')

@section('content')
    <!--Body content-->
		<div class="col-md-6 col-md-offset-3 col-sm-12 text-center"> <!-- project title beginn-->
            <h2 class="heading">Rollstuhlrampe für Hansi</h2>
        </div> <!-- project title end-->

        <div class="col-sm-12 col-md-8"> <!-- project images beginn-->
            <img class="img-responsive" src="{{ asset('/img/hansi.png') }}">
        </div> <!-- project images end-->

        <div id="project_statistics" class="col-sm-12 col-md-4 text-center boarder"> <!-- statistics beginn-->
            <h3>Amount raised:</h3>
            <h2>&euro; 1659.00</h2>
            <h5>of &euro; 2000,-- target</h5>
            <div id="progress bar" style="width:80%; background:green; color:white; font-size:30pt;">80%</div>
            <h3>Project ends in:</h3>
            <div id="countdown" data-date="31-05-2015" data-time="12:00" data-timezone="2" data-final="Ausfinanziert">
                <div class="countdown-value"><span id="countdown-days">0</span><strong>Tage</strong></div>:
                <div class="countdown-value"><span id="countdown-hours">0</span><strong>Stunden</strong></div>:
                <div class="countdown-value"><span id="countdown-minutes">0</span><strong>Minuten</strong></div>:
                <div class="countdown-value"><span id="countdown-seconds">0</span><strong>Sekunden</strong></div>
            </div>
            <div class="button-main contribute">Contribute</div>
        </div> <!-- statistics end-->

        <div class="col-sm-12 col-md-8 text-center"> <!-- project description beginn-->
            <h3>Project Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aspernatur at deleniti distinctio, hic ipsum itaque iure minus neque non nostrum perspiciatis quisquam quo reiciendis rem reprehenderit similique suscipit vel.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti eveniet ipsam labore perferendis placeat quas, quasi sunt ullam? Ad corporis eligendi ipsam modi odio omnis, perferendis repellendus sunt tempora voluptatibus?</p>
            <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda commodi consequuntur corporis dignissimos ducimus earum explicabo illo, nostrum obcaecati odit quasi sequi soluta sunt voluptatum. Deserunt ea facere totam!</span><span>Consectetur dolorem molestiae mollitia porro quasi? Doloribus harum provident quod reprehenderit unde. A distinctio fugit quas! Alias consequatur dolorum ducimus eaque esse iusto, necessitatibus optio quo, reiciendis, rem suscipit voluptates.</span><span>Adipisci assumenda delectus dignissimos eaque, facere itaque perspiciatis qui quidem totam? Blanditiis delectus deserunt dignissimos doloremque enim esse ex incidunt iure, laborum necessitatibus nisi, nostrum officia soluta suscipit, veniam voluptas!</span><span>Ab amet consequuntur debitis error ex expedita fuga fugiat magni nemo nostrum, officiis perspiciatis placeat praesentium repellendus, suscipit ut vero? Assumenda doloremque minus rem saepe? Deserunt excepturi ipsa maiores quasi.</span><span>Aliquid architecto at atque consequuntur culpa delectus dignissimos dolore ea eius esse et fuga, harum hic ipsum, itaque minima minus nemo nisi nobis rem repudiandae tenetur vitae voluptas. Qui, quod?</span></p>
        </div> <!-- project description end-->

        <div class="col-sm-12 col-md-4"> <!-- contribution packages beginn-->
            <div class="dgrey"> <!-- contribution package 1-->
                <h3>Business-Building-Block | &euro; 150,00 + Tax each</h3>
                <div>
                    <ul>
                        <li>Logo-Display on our website for 3 months</li>
                        <li>Linked to your own website for 3 months</li>
                        <li>On request: Transfer of Official Sponsor of KuJ Button</li>
                        <li>One time business listing in our Newsletter (2000 recipients)</li>
                        <li>Your contribution is 100% tax deductible</li>
                        <li>Official KuJ Sponsor Certificate</li>
                    </ul>
                </div>
            </div>
            <div class="dgrey"> <!-- contribution package 2-->
                <h3>Small-Building-Block  | &euro; 15,00</h3>
                <p>Contribute to this project with a fixed amount of &euro; 15,00 and receive a personal Thank-you letter from the family.</p>
            </div>
            <div class="dgrey"> <!-- contribution package 3-->
                <h3>Medium-Building-Block | &euro; 25,00</h3>
                <p>Contribute to this project with a fixed amount of &euro; 25,00 and receive a personal Thank-you letter from the family.</p>
            </div>
            <div class="dgrey"> <!-- contribution package 4-->
                <h3>Large-Building-Block  | &euro; 50,00 or more</h3>
                <p>Contribute to this project with &euro; 50,00 or more and receive a personal Thank-you letter from the family.</p>
            </div>
        </div> <!-- contribution packages end-->

        <div class="col-sm-12" style="background:red"> <!-- sponsors row beginn-->
            Olga's Sponsors row
        </div> <!-- sponsors row end-->
@endsection
