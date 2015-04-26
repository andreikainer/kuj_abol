<!-- Project Title Form Input -->
<div class="row form-group mb-6em">
    <div class="col-md-8 col-sm-8">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="form-explanation">
                    Please name your project, then click "Start Project" to begin.
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                {!! Form::label('project_name', 'Project Title:', ['class' => 'form-label']) !!}
            </div>
            <div class="col-md-8 col-sm-8">
                {!! Form::text('project_name', null, ['class' => 'form-input']) !!}
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-button-main form-start-button text-center">Projekt starten</div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4">
        <div class="form-error cpp-error"></div>
    </div>
</div> <!-- end project title -->

<!-- Recently Created Projects -->
<div class="row">
    <div class="col-md-8 col-sm-8">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="form-explanation">
                    Project's you have recently started.
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="no-projects">
                    <p>Great! You currently have no incomplete projects to continue with.</p>
                    <p>Now is a great time to start a new one!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4">
        <div class="form-error cpp-error"></div>
    </div>
</div> <!-- end recently created projects -->



