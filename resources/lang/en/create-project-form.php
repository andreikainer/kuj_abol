<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

return [

    /*
    |--------------------------------------------------------------------------
    | Create Project Form Translations ENGLISH
    |--------------------------------------------------------------------------
    |
    | Language translation keys for the create-project application form.
    */

    /**
     * Section Tabs.
     */
    'start'                 => 'Start',
    'project-details'       => 'Project Details',
    'your-details'          => 'Your Details',
    'supporting-evidence'   => 'Supporting Evidence',
    'summary'               => 'Summary',

    /**
     * Call to Actions.
     */
    'start-project'         => 'Start Project',
    'save-progress'         => 'Save Progress',
    'back'                  => 'Back',
    'next'                  => 'Next',
    'submit'                => 'Submit for Approval',
    'continue'              => 'Continue',
    'delete'                => 'Delete',
    'terms-cond-1'          => 'By submitting your project, you agree to our ',
    'terms-cond-2'          => 'Terms and Conditons',
    'terms-cond-3'          => 'Close',

    /**
     * Form Labels
     */
    'project-title'         => 'Project Title:',
    'short-description'     => 'Short Description:',
    'main-image'            => 'Main Image:',
    'secondary-images'      => 'Secondary Images:',
    'full-description'      => 'Full Description:',
    'fundraise-amount'      => 'Fundraise Amount:',
    'child-name'            => 'Name of Child:',
    'first-name'            => 'Your First Name:',
    'last-name'             => 'Your Last Name:',
    'email'                 => 'Your Email Address:',
    'address'               => 'Residential Address:',
    'tel-number'            => 'Telephone Number:',
    'main-documents'        => 'Documents of Evidence:',
    'secondary-documents'   => 'Additional Documents:',
    'images-and-documents'  => 'Images & Documents:',

    /**
     * Form Field Placeholders
     */
    'place-short-desc'      => 'A short description about your project. In 180 characters or less.',
    'place-full-desc'       => 'The full description of your project. This is where you tell your story.',
    'place-fundraise-amt'   => 'The amount you wish to fundraise. Minimum &#8364;500',

    /**
     * Explanations
     */
    'exp-project-title'     => 'Please name your project, then click "Start Project" to begin.',
    'exp-recent-project'    => 'Project\'s you have recently started',
    'exp-no-recent-project-1' => 'Great! You currently have no incomplete projects to continue with.',
    'exp-no-recent-project-2' => 'Now is a great time to start a new one!',
    'exp-main-image-1'      => 'Choose an image from your computer.',
    'exp-main-image-2'      => 'This will be the main display photo for your project, <br/> So make it a good one!',
    'exp-main-image-3'      => 'JPEG, PNG, BMP, TIFF. 20MB file limit. <br/> Minimum size 768 x 1024 pixels',
    'exp-secondary-image'   => 'Click to upload an image',
    'exp-evidence-1'        => 'We require supporting evidence of your child\'s ailment.',
    'exp-evidence-2'        => 'A written letter from your medical practitioner or hospital, stating the condition of your child\'s ailment. <br/> A document supporting evidence of your financial situation, including child care allowance.',
    'exp-evidence-3'        => 'The more evidence you submit, the more likely the successful outcome of your application.',
    'exp-document-label'    => 'minimum of 2 documents mandatory',
    'exp-document-input'    => 'Click to upload a document',

    /**
     * Messages
     */
    'validation-error'      => ' Sorry, there are some errors in the form.',
    'project-complete'      => 'Project can no longer be edited.',
    'save-success'          => 'Project successfully saved.',
    'delete-success'        => 'Project successfully removed.',
    'login'                 => ' Please <a href="'.url(LaravelLocalization::getCurrentLocale().'/'.trans('routes.account/login')).'">Login</a> or <a href="'.url(LaravelLocalization::getCurrentLocale().'/'.trans('routes.account/register')).'">Register</a> to Start a Project.',
    'incomplete'            => ' You currently have an incomplete project saved. Please continue with the saved project, or delete it.',
    'live-project'          => ' You currently have a live project on our website. We will welcome another submission once it has successfully ended.',
    'duplicate-name'        => ' Sorry, you cannot rename your project to that title. As another user has taken it for use.',
    'pending-project'       => ' You currently have a project submitted for approval. We will welcome another submission once it has successfully ended.',
    'not-owner'             => 'Sorry, you are not the owner of this project.',
    'not-authenticated'     => 'Please login to continue to page.',

    /**
     * Tips for Successful Campaign
     */
    'tips-heading'          => 'Helpful tips for creating a successful campaign',

    'tip-1-title'           => 'Bold Title',
    'tip-1-1'               => 'The title of your project, is what describes your cause. It should clearly identify what you are fundraising for.',

    'tip-2-title'           => 'Captivating Short Description',
    'tip-2-1'               => 'The short description of your project, is what our viewers see first. This is a perfect time to captivate an audience.',
    'tip-2-2'               => 'So be sure to describe your project well, and touch the hearts of our audiences!',

    'tip-3-title'           => 'Main Image',
    'tip-3-1'               => 'Selecting your main image, is a very important part of setting up your project.',
    'tip-3-2'               => 'Be sure to choose an image that relates well to your short description. Having an image that is not blurry, and high in definition will work in your favour.',
    'tip-3-3'               => 'Like words, an image also tells a story to our audiences.',

    'tip-4-title'           => 'Tell Your Story',
    'tip-4-1'               => 'The full description of your project is the place where you can tell your story to our audiences.',
    'tip-4-2'               => 'This is the time to express your needs in detail, and to share with our audiences some information about your child and how the fundraised money will make a positive impact to your lives.',
    'tip-4-3'               => 'A well planned and thought out full description of your project, will ultimately help our audiences make the right decision to donate money to you and your child.',

    'tip-5-title'           => 'Supporting Evidence',
    'tip-5-1'               => 'Creating a successful campaign, means having it approved by our staff.',
    'tip-5-2'               => 'The best way to have this happen, is to provide us with documents of evidence that clearly express to us, your situation and the reasons for you requiring support.',
    'tip-5-3'               => 'We only ask for two documents, as a mandatory requirement. However the more evidence you can supply the better the likelyhood of us approving your request.'
];