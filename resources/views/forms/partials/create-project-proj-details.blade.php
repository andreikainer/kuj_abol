<!-- Short Description Form Input -->
        <div class="row form-group">
            <div class="col-md-8 col-sm-8">
                {!! Form::label('short_desc', 'Short Description:', ['class' => 'form-label']) !!}
                {!! Form::textarea('short_desc', null, ['class' => 'form-input', 'placeholder' => 'A short description about your project. In 180 characters or less.']) !!}
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-error cpp-error"></div>
            </div>
        </div> <!-- end short description -->

        <!-- Main Image Form Input -->
        <div class="row form-group">
            <div class="col-md-8 col-sm-8">
                <div class="form-label">Main Image:</div>
                <div class="image-upload-wrapper">
                    <label for="main_img" class="image-upload-label text-center">
                        <p class="image-upload-label-heading">Choose an image from your computer.</p>
                        <p>
                            This will be the main display photo for your project, <br/>
                            So make it a good one!
                        </p>
                        <p>
                            JPEG, PNG, BMP, TIFF. 50MB file limit. <br/>
                            Minimum size 768 x 1024 pixels.
                        </p>
                    </label>
                    {!! Form::file('main_img', ['id' => 'main_img', 'class' => 'image-upload-input', 'accept' => 'image/*']) !!}
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-error cpp-error"></div>
            </div>
        </div> <!-- end main image -->

        <!-- Secondary Image Form Inputs -->
        <div class="row form-group">
            <div class="col-md-8 col-sm-8">
                <div class="row">
                    <div class="col-md-12 col-sm-12 form-label">Secondary Images:</div>
                    <div class="col-md-4 col-sm-4 image-upload-wrapper">
                        <label for="img_2" class="image-upload-label text-center">
                            <p class="image-upload-label-heading">Click to upload an image.</p>
                        </label>
                        {!! Form::file('img_2', ['id' => 'img_2', 'class' => 'image-upload-input', 'accept' => 'image/*']) !!}
                    </div>
                    <div class="col-md-4 col-sm-4 image-upload-wrapper">
                        <label for="img_3" class="image-upload-label text-center">
                            <p class="image-upload-label-heading">Click to upload an image.</p>
                        </label>
                        {!! Form::file('img_3', ['id' => 'img_3', 'class' => 'image-upload-input', 'accept' => 'image/*']) !!}
                    </div>
                    <div class="col-md-4 col-sm-4 image-upload-wrapper">
                        <label for="img_4" class="image-upload-label text-center">
                            <p class="image-upload-label-heading">Click to upload an image.</p>
                        </label>
                        {!! Form::file('img_4', ['id' => 'img_4', 'class' => 'image-upload-input', 'accept' => 'image/*']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-error cpp-error"></div>
            </div>
        </div> <!-- end secondary images -->

        <!-- Full Description Form Input -->
        <div class="row form-group">
            <div class="col-md-8 col-sm-8">
                {!! Form::label('full_desc', 'Full Description:', ['class' => 'form-label']) !!}
                {!! Form::textarea('full_desc', null, ['class' => 'form-input', 'placeholder' => 'The full description of your project. This is where you tell your story.']) !!}
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-error cpp-error"></div>
            </div>
        </div> <!-- end full description -->

        <!-- Fundraise Amount Form Input -->
        <div class="row form-group">
            <div class="col-md-8 col-sm-8">
                {!! Form::label('target_amount', 'Fundraise Amount:', ['class' => 'form-label']) !!}
                {!! Form::text('target_amount', null, ['class' => 'form-input', 'placeholder' => 'The amount you wish to fundraise. Minimum &#8364;500 ']) !!}
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-error cpp-error"></div>
            </div>
        </div> <!-- end fundraise amount -->