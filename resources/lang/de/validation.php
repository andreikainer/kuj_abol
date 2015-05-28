<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    "accepted"         => ":attribute muss akzeptiert werden.",
    "active_url"       => ":attribute ist keine gültige Internet-Adresse.",
    "after"            => ":attribute muss ein Datum nach dem :date sein.",
    "alpha"            => ":attribute darf nur aus Buchstaben bestehen.",
    "alpha_dash"       => ":attribute darf nur aus Buchstaben, Zahlen, Binde- und Unterstrichen bestehen. Umlaute (ä, ö, ü) und Eszett (ß) sind nicht erlaubt.",
    "alpha_num"        => ":attribute darf nur aus Buchstaben und Zahlen bestehen.",
    "array"            => ":attribute muss ein Array sein.",
    "before"           => ":attribute muss ein Datum vor dem :date sein.",
    "between"          => [
        "numeric" => ":attribute muss zwischen :min & :max liegen.",
        "file"    => ":attribute muss zwischen :min & :max Kilobytes groß sein.",
        "string"  => ":attribute muss zwischen :min & :max Zeichen lang sein.",
        "array"   => ":attribute muss zwischen :min & :max Elemente haben.",
    ],
    "boolean"          => ":attribute muss entweder 'true' oder 'false' sein.",
    "confirmed"        => ":attribute stimmt nicht mit der Bestätigung überein.",
    "date"             => ":attribute muss ein gültiges Datum sein.",
    "date_format"      => ":attribute entspricht nicht dem gültigen Format für :format.",
    "different"        => ":attribute und :other müssen sich unterscheiden.",
    "digits"           => ":attribute muss :digits Stellen haben.",
    "digits_between"   => ":attribute muss zwischen :min und :max Stellen haben.",
    "email"            => ":attribute Format ist ungültig.",
    "exists"           => "Der gewählte Wert für :attribute ist ungültig.",
    "filled"           => ":attribute muss ausgefüllt sein.",
    "image"            => ":attribute muss ein Bild sein.",
    "in"               => "Der gewählte Wert für :attribute ist ungültig.",
    "integer"          => ":attribute muss eine ganze Zahl sein.",
    "ip"               => ":attribute muss eine gültige IP-Adresse sein.",
    "max"              => [
        "numeric" => ":attribute darf maximal :max sein.",
        "file"    => ":attribute darf maximal :max Kilobytes groß sein.",
        "string"  => ":attribute darf maximal :max Zeichen haben.",
        "array"   => ":attribute darf nicht mehr als :max Elemente haben.",
    ],
    "mimes"            => ":attribute muss den Dateityp :values haben.",
    "min"              => [
        "numeric" => ":attribute muss mindestens :min sein.",
        "file"    => ":attribute muss mindestens :min Kilobytes groß sein.",
        "string"  => ":attribute muss mindestens :min Zeichen lang sein.",
        "array"   => ":attribute muss mindestens :min Elemente haben.",
    ],
    "not_in"           => "Der gewählte Wert für :attribute ist ungültig.",
    "numeric"          => ":attribute muss eine Zahl sein.",
    "regex"            => ":attribute Format ist ungültig.",
    "required"         => ":attribute muss ausgefüllt sein.",
    "required_if"      => ":attribute muss ausgefüllt sein wenn :other :value ist.",
    "required_with"    => ":attribute muss angegeben werden wenn :values ausgefüllt wurde.",
    "required_with_all" => ":attribute muss angegeben werden, wenn :values ausgefüllt wurde.",
    "required_without" => ":attribute muss angegeben werden wenn :values nicht ausgefüllt wurde.",
    "required_without_all" => ":attribute muss angegeben werden wenn keines der Felder :values ausgefüllt wurde.",
    "same"             => ":attribute und :other müssen übereinstimmen.",
    "size"             => [
        "numeric" => ":attribute muss gleich :size sein.",
        "file"    => ":attribute muss :size Kilobyte groß sein.",
        "string"  => ":attribute muss :size Zeichen lang sein.",
        "array"   => ":attribute muss genau :size Elemente haben.",
    ],
    "timezone"         => ":attribute muss eine gültige Zeitzone sein.",
    "unique"           => ":attribute ist schon vergeben.",
    "url"              => "Das Format von :attribute ist ungültig.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'project_name'  => [
            'required'  => 'Projekttitel darf nicht leer sein.',
            'regex'     => 'Der Projekttitel darf nur Buchstaben und Zahlen enthalten und nicht mit einem Leerzeichen beginnen.',
            'unique'    => 'Dieser Projekttitel ist bereits vergeben.',
            'max'       => 'Der Projekttitel darf :max Zeichen nicht überschreiten',
        ],

        'short_desc'    => [
            'required'  => 'Die Kurzbeschreibung darf nicht leer sein.',
            'max'       => 'Die Kurzbeschreibung darf :max Zeichen nicht überschreiten.'
        ],

        'full_desc'     => [
            'required'  => 'Die ausführliche Beschreibung darf nicht leer sein.',
        ],

        'target_amount' => [
            'required'  => 'Der gewünschte Förderungsbetrag darf nicht leer sein.',
            'integer'   => 'Der gewünschte Förderungsbetrag darf nur Zahlen enthalten und nicht mit einem Leerzeichen beginnen.',
            'min'       => 'Der gewünschte Förderungsbetrag muss höher als &euro; 500 sein'
        ],

        'child_name'    => [
            'required'  => 'Der Vorname des Kindes darf nicht leer sein.',
            'regex'     => 'Der Vorname des Kindes darf nur Buchstaben enthalten und nicht mit einem Leerzeichen beginnen.',
            'required_with' => 'Der Vorname des Kindes darf nicht leer sein.',
        ],

        'first_name'    => [
            'required'  => 'Ihr Vorname darf nicht leer sein.',
            'regex'     => 'Ihr Vorname darf nur Buchstaben enthalten und nicht mit einem Leerzeichen beginnen.'
        ],

        'last_name'     => [
            'required'  => 'Ihr Nachname darf nicht leer sein.',
            'regex'     => 'Ihr Nachname darf nur Buchstaben enthalten und nicht mit einem Leerzeichen beginnen.'
        ],

        'email'         => [
            'required'  => 'Ihr Email Adresse darf nicht leer sein.',
            'regex'     => 'Ihre Email Adresse muss in einem korrekten E-Mail Format sein und darf keine Leerzeichen enthalten.',
            'unique'    => 'Diese E-Mail Adresse ist bereits vergeben. Bitte kontaktieren Sie uns per Email falls weitere Probleme auftretten.'
        ],

        'street'        => [
            'required'  => 'Straße darf nicht leer sein.'
        ],

        'postcode'      => [
            'required'  => 'Das Postleitzahl Feld darf nicht leer sein',
            'integer'   => 'Das Postleitzahl Feld darf nur Zahlen enthalten und nicht mit einem Leerzeichen beginnen.',
            'digits'    => 'Das Postleitzahl Feld muss :digits Nummern enthalten',
        ],

        'city'          => [
            'required'  => 'Der Ort darf nicht leer sein.',
            'regex'     => 'Der Ort darf nur Buchstaben enthalten und nicht mit einen Leerzeichen beginnen.',
        ],

        'tel_number'    => [
            'required'  => 'Telefonnummer Feld ist erforderlich.',
            'regex'     => 'Muss in einem korrekten Telefonnummer -Format sein und nicht mit einem Leerzeichen beginnen.'
        ],

        'main_img'      => [
            'required_without'  => 'Das Hauptbilder ist verpflichtend.',
            'mimes'     => 'Bitte wählen Sie ein gültiges Bildformat.',
            'max'      => 'Darf nicht 20MB in Größe überschreiten.'
        ],

        'img_2'         => [
            'mimes'     => 'Bitte wählen Sie ein gültiges Bildformat.',
            'max'      => 'Darf nicht 20MB in Größe überschreiten.'
        ],

        'img_3'         => [
            'mimes'     => 'Bitte wählen Sie ein gültiges Bildformat.',
            'max'      => 'Darf nicht 20MB in Größe überschreiten.'
        ],

        'img_4'         => [
            'mimes'     => 'Bitte wählen Sie ein gültiges Bildformat.',
            'max'      => 'Darf nicht 20MB in Größe überschreiten.'
        ],

        'doc_1_mand'    => [
            'required_without'  => 'Mindestens zwei Beilagen sind verpflichtend.',
            'mimes'     => 'Wir akzeptieren JPG, JPEG , PNG, BMP, TIFF und PDF -Formate.',
            'max'      => 'Darf nicht 20MB in Größe überschreiten.'
        ],

        'doc_2_mand'    => [
            'required_without'  => 'Mindestens zwei Beilagen sind verpflichtend.',
            'mimes'     => 'Wir akzeptieren JPG, JPEG , PNG, BMP, TIFF und PDF -Formate.',
            'max'      => 'Darf nicht 20MB in Größe überschreiten.'
        ],

        'doc_3'    => [
            'mimes'     => 'Wir akzeptieren JPG, JPEG , PNG, BMP, TIFF und PDF -Formate.',
            'max'      => 'Darf nicht 20MB in Größe überschreiten.'
        ],

        'doc_4'    => [
            'mimes'     => 'Wir akzeptieren JPG, JPEG , PNG, BMP, TIFF und PDF -Formate.',
            'max'      => 'Darf nicht 20MB in Größe überschreiten.'
        ],

        'doc_5'    => [
            'mimes'     => 'Wir akzeptieren JPG, JPEG , PNG, BMP, TIFF und PDF -Formate.',
            'max'      => 'Darf nicht 20MB in Größe überschreiten.'
        ],

        'doc_6'    => [
            'mimes'     => 'Wir akzeptieren JPG, JPEG , PNG, BMP, TIFF und PDF -Formate.',
            'max'      => 'Darf nicht 20MB in Größe überschreiten.'
        ],

        'user_name' => [
            'required'  => 'Der Benutzername darf nicht leer sein.',
            'max'       => 'Dieses Feld darf :max Zeichen nicht überschreiten.',
            'unique'    => 'Dieser Benutzername ist bereits vergeben.'
        ],

        'password'      => [
            'required'  => 'Das Passwort Feld darf nicht leer seien.'
        ],

        'password_confirmation' => [
            'required'  => 'Bitte wiederholen Sie Ihr Passwort.'
        ],

        'business_name' => [
            'required_if'   => 'Firmenwortlaut ist erforderlich.'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
