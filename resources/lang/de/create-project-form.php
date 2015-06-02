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
    'terms-cond-1'          => 'Mit Einreichung dieses Formulars bestätigen Sie unsere ',
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
    'child-name'            => 'Vorname des Kindes:',
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
    'exp-secondary-image'   => 'Klicken Sie hier, um weitere Photos hochzuladen.',
    'exp-evidence-1'        => 'Mit Ihren Ansuchen benötigen Beilagen die den gesundheitlichen Zustand Ihres Kindes, sowie Ihre finanzielle Situation belegen.',
    'exp-evidence-2'        => 'Es handlt sich hierbei um Befunde oder Arztschreiben vom zuständigen Facharzt oder der medizinischen Anstalt.',
    'exp-evidence-3'        => 'Schriflicher Bescheid für erhöhtes Kinderbetreuungsgeld oder Zusagen / Absagen von öffentlichen Stellen',
    'exp-evidence-4'        => 'Bitte fügen Sie alle nötigen Beilagen diesen Antrag bei um eine Bewilligung zu erziehlen.',
    'exp-document-label'    => 'Mindestens 2 Beilagen sind verpflichtend',
    'exp-document-input'    => 'Bitte klicken Sie hier um eine Beilage hochzuladen',

    /**
     * Messages
     */
    'validation-error'      => ' Leider enthält Ihr Formular Fehler.',
    'project-complete'      => 'Dieser Antrag kann nicht mehr bearbeitet werden.',
    'save-success'          => 'Antrag erfolgreich gespeichert.',
    'delete-success'        => 'Antrag erfolgreich entfernt.',
    'login'                 => ' Bitte <a href="'.url(LaravelLocalization::getCurrentLocale().'/'.trans('routes.account/login')).'">Einloggen</a> oder <a href="'.url(LaravelLocalization::getCurrentLocale().'/'.trans('routes.account/register')).'">Registrieren</a> um das Antragsformular zu aktivieren.',
    'incomplete'            => ' Sie haben derzeit einen unvollständigen Antrag gespeichert. Bitte fahren Sie mit dem gespeicherten Antrag fort, oder löschen Sie diesen.',
    'live-project'          => ' Sie haben momentan ein Förderungsprojekt live auf unserer Webseite. Sie können erst nach Ablauf einen weieren Antrag stellen.',
    'duplicate-name'        => ' Leider können Sie das Förderungsprojekt nicht mit diesen Titel benennen da dieser schon vergeben ist',
    'pending-project'       => ' Sie haben bereits einen Antrag in Bearbeitung.',
    'not-owner'             => 'Sie haben keinen Zugriff auf dieses Förderungsprojekt',
    'not-authenticated'     => 'Bitte Einloggen um fortzufahren',
    'pending-approval'      => 'Pending Approval',
    'currently-live'        => 'Currently Live',

    /**
     * Tips for Successful Campaign
     */
    'tips-heading'          => 'Hilfreiche Tipps zur Antragsstellung',

    'tip-1-title'           => 'Projekttitel',
    'tip-1-1'               => 'Um Ihre Förderung zu beantragen braucht Ihr Projekt zunächst einen aussagekräftigen Titel. Dieser Projekttitel sollte Ihr Förderungsprojekt in einem kurzen, präzisen Satz eindeutig zusammenfassen und darf eine Maximallänge von 60 Zeichen haben.',

    'tip-2-title'           => 'Kurzbeschreibung',
    'tip-2-1'               => 'Die Kurzbeschreibung dient dazu, Ihre Situation bzw. Ihr Projekt in wenigen Sätzen zu beschreiben.',
    'tip-2-2'               => 'Schildern Sie uns die Beeinträchtigung, unter der Ihr Kind leidet, und geben Sie genau an, für welches Vorhaben Sie finanzielle Unterstützung benötigen. Bitte halten Sie sich an die Maximallänge von 180 Zeichen.',

    'tip-3-title'           => 'Hauptfoto',
    'tip-3-1'               => 'Das Hauptfoto ist das Hauptanzeigebild für Ihr Förderungsprojekt und zeigt üblicherweise ein aussagekräftiges Foto Ihres Kindes.',
    'tip-3-2'               => 'Bitte verwenden Sie hier ein hochauflösendes und qualitativ hochwertiges Bild im Format 768x1024 Pixel.',
    'tip-3-3'               => '',

    'tip-4-title'           => 'Ausführliche Beschreibung',
    'tip-4-1'               => 'Hier haben Sie die Möglichkeit, Ihr Förderungsprojekt im Detail vorzustellen. ',
    'tip-4-2'               => 'Beschreiben Sie Ihre Situation, weshalb Sie eine Förderung benötigen und für welchen Zweck Sie die Förderungssumme verwenden werden.',
    'tip-4-3'               => 'Wir empfehlen Ihnen insbesondere zu verdeutlichen, wie eine Förderung Ihrer ganzen Familie zu Gute kommen wird. ',

    'tip-5-title'           => 'Beilagen und Belege',
    'tip-5-1'               => 'Um Ihr Ansuchen bei uns einzureichen sind Sie verpflichtet, uns mindestens 2 Beilagen zu übermitteln, welche die gesundheitliche und finanzielle Situation Ihrer Familie belegen.',
    'tip-5-2'               => 'Als Beilage gelten zum Beispiel medizinische Befunde, Einkommensnachweise oder diverse Bestätigungen von öffentlichen Stellen.',
    'tip-5-3'               => 'Sie haben die Möglichkeit, hier bis zu 6 Beilagen anzuhängen.'
];