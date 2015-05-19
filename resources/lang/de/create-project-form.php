<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Create Project Form Translations GERMAN
    |--------------------------------------------------------------------------
    |
    | Language translation keys for the create-project application form.
    */

    /**
     * Section Tabs.
     */
    'start'                 => 'Start',
    'project-details'       => 'Projektdetails',
    'your-details'          => 'Deine Angaben',
    'supporting-evidence'   => 'Antragsunterlagen',
    'summary'               => 'Zusammenfassung',

    /**
     * Call to Actions.
     */
    'start-project'         => 'Projekt starten',
    'save-progress'         => 'Speichern Fortschritt',
    'back'                  => 'zurück',
    'next'                  => 'nächster',
    'submit'                => 'Zur Genehmigung einreichen',
    'continue'              => 'fortsetzen',
    'delete'                => 'löschen',
    'terms-cond-1'          => 'By submitting your project, you agree to our ',
    'terms-cond-2'          => 'Terms and Conditons',
    'terms-cond-3'          => 'Close',

    /**
     * Form Labels.
     */
    'project-title'         => 'Projekttitel:',
    'short-description'     => 'Kurzbeschreibung:',
    'main-image'            => 'Hauptaufnahme:',
    'secondary-images'      => 'Sekundär Bilder:',
    'full-description'      => 'Ausführliche Beschreibung:',
    'fundraise-amount'      => 'Fundraising Menge:',
    'child-name'            => 'Name des Kindes:',
    'first-name'            => 'Ihr Vorname:',
    'last-name'             => 'Ihr Nachname:',
    'email'                 => 'Ihre E-Mail Adresse:',
    'address'               => 'Wohnadresse:',
    'tel-number'            => 'Telefonnummer:',
    'main-documents'        => 'Dokumente Beweis:',
    'secondary-documents'   => 'zusätzliche Dokumente:',
    'images-and-documents'  => 'Bilder & Dokumente:',

    /**
     * Form Field Placeholders
     */
    'place-short-desc'      => 'Eine kurze Beschreibung von Ihrem Projekt. In 180 Zeichen oder weniger.',
    'place-full-desc'       => 'Die vollständige Beschreibung des Projekts. Hier können Sie Ihre Geschichte erzählen.',
    'place-fundraise-amt'   => 'Der Betrag, den Sie möchten, Fundraising. Minimum &#8364;500',

    /**
     * Explanations
     */
    'exp-project-title'     => 'Bitte nennen Sie Ihr Projekt , klicken Sie auf Starten Projekt zu beginnen.',
    'exp-recent-project'    => 'Project Sie vor kurzem begonnen haben.',
    'exp-no-recent-project-1' => 'Großartig! Es befinden sich keine unvollständigen Projekte mit weiter.',
    'exp-no-recent-project-2' => 'Jetzt ist eine gute Zeit, um eine neue zu starten !',
    'exp-main-image-1'      => 'Wählen Sie ein Bild von Ihrem Computer.',
    'exp-main-image-2'      => 'Das wird die Hauptanzeige Foto für Ihr Projekt, <br/> so machen es gut!',
    'exp-main-image-3'      => 'JPEG, PNG, BMP, TIFF. 20MB Dateigrenze. <br/> Mindestgröße 768 x 1024 Pixel',
    'exp-secondary-image'   => 'Klicken Sie, um ein Bild hochzuladen.',
    'exp-evidence-1'        => 'Wir benötigen Beweise für Ihr Kind die Krankheit.',
    'exp-evidence-2'        => 'Eine schriftliche Brief von Ihrem Arzt oder Krankenhaus, die besagt, den Zustand Ihres Kindes Krankheit.',
    'exp-evidence-3'        => 'Ein Dokument, Nachweise über Ihre finanzielle Situation, einschließlich Kinderbetreuungsgeld.',
    'exp-evidence-4'        => 'Je mehr Beweise, die Sie einreichen, desto wahrscheinlicher ist das erfolgreiche Ergebnis der Anwendung.',
    'exp-document-label'    => 'mindestens 2 Dokumente obligatorisch',
    'exp-document-input'    => 'Klicken Sie hier um ein Dokument hochladen',

    /**
     * Messages
     */
    'validation-error'      => ' Sorry, enthält die Form einige Fehler.',
    'project-complete'      => 'Anfrage kann nicht mehr bearbeitet werden.',
    'save-success'          => 'Anfrage erfolgreich gespeichert.',
    'delete-success'        => 'Anfrage erfolgreich entfernt.',
    'login'                 => ' Bitte <a href="'.url(LaravelLocalization::getCurrentLocale().'/'.trans('routes.account/login')).'">Einloggen</a> or <a href="'.url(LaravelLocalization::getCurrentLocale().'/'.trans('routes.account/register')).'">Registrieren</a> um eine Anfrage starten.',
    'incomplete'            => ' Sie haben derzeit einen unvollständigen Antrag gespeichert. Bitte fahren Sie mit der gespeicherten anfordern , oder zu löschen.',
    'live-project'          => ' Sie haben momentan ein Förderungsprojekt live auf unserer Webseite. Sie können erst nach Ablauf wieder einen Antrag stellen.',
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