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
    'start-project'         => 'Ansuchen beginnen',
    'save-progress'         => 'Fortschritt speichern',
    'back'                  => 'zurück',
    'next'                  => 'weiter',
    'submit'                => 'Antrag einreichen',
    'continue'              => 'fortsetzen',
    'delete'                => 'löschen',
    'terms-cond-1'          => 'Mit Einreichung dieses Formulars bestättigen Sie unsere ',
    'terms-cond-2'          => 'Allgemeinen Geschäftsbedingungen',
    'terms-cond-3'          => 'Schließen',

    /**
     * Form Labels.
     */
    'project-title'         => 'Projekttitel:',
    'short-description'     => 'Kurzbeschreibung:',
    'main-image'            => 'Hauptphoto:',
    'secondary-images'      => 'Mehr Bilder:',
    'full-description'      => 'Ausführliche Beschreibung:',
    'fundraise-amount'      => 'Gewünschter Förderungsbetrag:',
    'child-name'            => 'Name des Kindes:',
    'first-name'            => 'Ihr Vorname:',
    'last-name'             => 'Ihr Nachname:',
    'email'                 => 'Ihre E-Mail Adresse:',
    'street'                => 'Straße:',
    'postcode'              => 'PLZ:',
    'city'                  => 'Ort:',
    'country'               => 'Land:',
    'tel-number'            => 'Telefonnummer:',
    'main-documents'        => 'Antragsbeilagen:',
    'secondary-documents'   => 'Zusätzliche Beilagen:',
    'images-and-documents'  => 'Bilder & Beilagen:',

    /**
     * Form Field Placeholders
     */
    'place-short-desc'      => 'Eine kurze Beschreibung Ihrer Situation. In 180 Zeichen oder weniger.',
    'place-full-desc'       => 'Die detailierte Beschreibung. Hier können Sie Ihre Situation im Detail beschreiben.',
    'place-fundraise-amt'   => 'Den Förderungsbetrag den Sie benötigen. Minimum &#8364;500',
    'place-country'         => 'Österreich',

    /**
     * Explanations
     */
    'exp-project-title'     => 'Bitte benennen Sie Ihr Projekt , klicken Sie anschließend auf Ansuchen beginnen.',
    'exp-recent-project'    => 'Gespeicherte Anträge.',
    'exp-no-recent-project-1' => 'Großartig! Sie haben kein unvollständiges Ansuchen.',
    'exp-no-recent-project-2' => 'Sie können nun ein neues Ansuchen einreichen',
    'exp-main-image-1'      => 'Wählen Sie ein Bild von Ihrem Computer.',
    'exp-main-image-2'      => 'Das wird das Hauptphoto für Ihr Projekt, <br/> Bitte wählen Sie eines in guter Qualität',
    'exp-main-image-3'      => 'JPEG, PNG, BMP, TIFF. 20MB maximum. <br/> Mindestgröße 768 x 1024 Pixel',
    'exp-secondary-image'   => 'Klicken Sie, um ein Bild hochzuladen.',
    'exp-evidence-1'        => 'Wir benötigen Beweise für Ihr Kind die Krankheit.',
    'exp-evidence-2'        => 'Eine schriftliche Brief von Ihrem Arzt oder Krankenhaus, die besagt, den Zustand Ihres Kindes Krankheit.',
    'exp-evidence-3'        => 'Ein Dokument, Nachweise über Ihre finanzielle Situation, einschließlich Kinderbetreuungsgeld.',
    'exp-evidence-4'        => 'Je mehr Beweise, die Sie einreichen, desto wahrscheinlicher ist das erfolgreiche Ergebnis der Anwendung.',
    'exp-document-label'    => 'mindestens 2 Dokumente obligatorisch',
    'exp-document-input'    => 'Klicken Sie hier um ein Dokument hochzuladen',

    /**
     * Messages
     */
    'validation-error'      => ' Leider enthält Ihr Formular Fehler.',
    'project-complete'      => 'Antrag kann nicht mehr bearbeitet werden.',
    'save-success'          => 'Antrag erfolgreich gespeichert.',
    'delete-success'        => 'Antrag erfolgreich entfernt.',
    'login'                 => ' Bitte <a href="'.url(LaravelLocalization::getCurrentLocale().'/'.trans('routes.account/login')).'">Einloggen</a> oder <a href="'.url(LaravelLocalization::getCurrentLocale().'/'.trans('routes.account/register')).'">Registrieren</a> um einen Antrag zu beginnen.',
    'incomplete'            => ' Sie haben derzeit einen unvollständigen Antrag gespeichert. Bitte fahren Sie mit dem gespeicherten Antrag fort, oder löschen Sie diesen.',
    'live-project'          => ' Sie haben momentan ein Förderungsprojekt live auf unserer Webseite. Sie können erst nach Ablauf wieder einen Antrag stellen.',
    'duplicate-name'        => ' Leider können Sie das Förderungsprojekt nicht mit diesen Titel benennen das es schon vergeben ist',
    'pending-project'       => ' Sie haben bereits einen Antrag in Bearbeitung.',
    'not-owner'             => 'Sie haben keinen Zugriff auf dieses Förderungsprojekt',
    'not-authenticated'     => 'Bitte Einloggen um fortzufahren',

    /**
     * Tips for Successful Campaign
     */
    'tips-heading'          => 'Helpful tips for creating a successful campaign',

    'tip-1-title'           => 'Project Title',
    'tip-1-1'               => 'The title of your project, is what describes your cause. It should clearly identify what you are fundraising for.',

    'tip-2-title'           => 'Short Description',
    'tip-2-1'               => 'The short description of your project, is what our viewers see first. This is a perfect time to captivate an audience.',
    'tip-2-2'               => 'So be sure to describe your project well, and touch the hearts of our audiences!',

    'tip-3-title'           => 'Main Image',
    'tip-3-1'               => 'Selecting your main image, is a very important part of setting up your project.',
    'tip-3-2'               => 'Be sure to choose an image that relates well to your short description. Having an image that is not blurry, and high in definition will work in your favour.',
    'tip-3-3'               => 'Like words, an image also tells a story to our audiences.',

    'tip-4-title'           => 'Full Description',
    'tip-4-1'               => 'The full description of your project is the place where you can tell your story to our audiences.',
    'tip-4-2'               => 'This is the time to express your needs in detail, and to share with our audiences some information about your child and how the fundraised money will make a positive impact to your lives.',
    'tip-4-3'               => 'A well planned and thought out full description of your project, will ultimately help our audiences make the right decision to donate money to you and your child.',

    'tip-5-title'           => 'Supporting Evidence',
    'tip-5-1'               => 'Creating a successful campaign, means having it approved by our staff.',
    'tip-5-2'               => 'The best way to have this happen, is to provide us with documents of evidence that clearly express to us, your situation and the reasons for you requiring support.',
    'tip-5-3'               => 'We only ask for two documents, as a mandatory requirement. However the more evidence you can supply the better the likelyhood of us approving your request.'
];