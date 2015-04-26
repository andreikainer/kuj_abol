<div class="row">
            <div class="col-md-3 col-sm-3 col-md-offset-9 col-sm-offset-9">
                <div class="form-button form-button-secondary text-center" data-button="save">Speichern Fortschritt</div>
            </div>
        </div>

        <div class="form-explanation mt-3em">
            <p>
                We require supporting evidence of your child's ailment.
            </p>
            <p>
                A written letter from your medical practitioner or hospital, stating the condition of your child's ailment. <br/>
                A document supporting evidence of your financial situation, including child care allowance.
            </p>
            <p>
                The more evidence you submit, the more likely the successful outcome of your application.
            </p>
        </div> <!-- end evidence explanation -->

        <!-- Documents of Evidence Form Input -->
        <div class="row form-group mb-3em">
            <div class="col-md-8 col-sm-8">
                <div class="row">
                    <div class="col-md-12 col-sm-12 form-label">Documents of Evidence: <span class="label-desc">minimum of 2 documents mandatory</span></div>
                    <div class="col-md-6 col-sm-6 image-upload-wrapper">
                        <label for="doc_1_mand" class="image-upload-label form-input-disabled text-center">
                            <p class="image-upload-label-heading">Click to upload a document.</p>
                        </label>
                        {!! Form::file('doc_1_mand', ['id' => 'doc_1_mand', 'class' => 'image-upload-input', 'disabled' => 'disabled', 'accept' => '.jpg,.jpeg,.png,.bmp,.tiff,.pdf,.doc']) !!}
                    </div>
                    <div class="col-md-6 col-sm-6 image-upload-wrapper">
                        <label for="doc_2_mand" class="image-upload-label form-input-disabled text-center">
                            <p class="image-upload-label-heading">Click to upload a document.</p>
                        </label>
                        {!! Form::file('doc_2_mand', ['id' => 'doc_2_mand', 'class' => 'image-upload-input', 'disabled' => 'disabled', 'accept' => '.jpg,.jpeg,.png,.bmp,.tiff,.pdf,.doc']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-error cpp-error" data-error="doc_1_mand doc_2_mand"></div>
            </div>
        </div> <!-- end mandatory documents -->

        <!-- Documents of Evidence Form Input -->
        <div class="row form-group mb-3em">
            <div class="col-md-8 col-sm-8">
                <div class="row">
                    <div class="col-md-12 col-sm-12 form-label">Additional Documents:</div>
                    <div class="col-md-6 col-sm-6 image-upload-wrapper">
                        <label for="doc_3" class="image-upload-label form-input-disabled text-center">
                            <p class="image-upload-label-heading">Click to upload a document.</p>
                        </label>
                        {!! Form::file('doc_3', ['id' => 'doc_3', 'class' => 'image-upload-input', 'disabled' => 'disabled', 'accept' => '.jpg,.jpeg,.png,.bmp,.tiff,.pdf,.doc']) !!}
                    </div>
                    <div class="col-md-6 col-sm-6 image-upload-wrapper">
                        <label for="doc_4" class="image-upload-label form-input-disabled text-center">
                            <p class="image-upload-label-heading">Click to upload a document.</p>
                        </label>
                        {!! Form::file('doc_4', ['id' => 'doc_4', 'class' => 'image-upload-input', 'disabled' => 'disabled', 'accept' => '.jpg,.jpeg,.png,.bmp,.tiff,.pdf,.doc']) !!}
                    </div>
                    <div class="col-md-6 col-sm-6 image-upload-wrapper">
                        <label for="doc_5" class="image-upload-label form-input-disabled text-center">
                            <p class="image-upload-label-heading">Click to upload a document.</p>
                        </label>
                        {!! Form::file('doc_5', ['id' => 'doc_5', 'class' => 'image-upload-input', 'disabled' => 'disabled', 'accept' => '.jpg,.jpeg,.png,.bmp,.tiff,.pdf,.doc']) !!}
                    </div>
                    <div class="col-md-6 col-sm-6 image-upload-wrapper">
                        <label for="doc_4" class="image-upload-label form-input-disabled text-center">
                            <p class="image-upload-label-heading">Click to upload a document.</p>
                        </label>
                        {!! Form::file('doc_6', ['id' => 'doc_6', 'class' => 'image-upload-input', 'disabled' => 'disabled', 'accept' => '.jpg,.jpeg,.png,.bmp,.tiff,.pdf,.doc']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-error cpp-error" data-error="doc_3 doc_4 doc_5 doc_6"></div>
            </div>
        </div> <!-- end additional documents -->

        <div class="row">
            <div class="col-md-2 col-sm-2">
                <div class="form-button form-button-nav text-center" data-button="back">zurück</div>
            </div>
            <div class="col-md-2 col-sm-2 col-md-offset-8 col-sm-offset-8">
                <div class="form-button form-button-nav text-center" data-button="next">nächster</div>
            </div>
        </div>