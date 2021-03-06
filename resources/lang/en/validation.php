<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "The :attribute must be accepted.",
	"active_url"           => "The :attribute is not a valid URL.",
	"after"                => "The :attribute must be a date after :date.",
	"alpha"                => "The :attribute may only contain letters.",
	"alpha_dash"           => "The :attribute may only contain letters, numbers, and dashes.",
	"alpha_num"            => "The :attribute may only contain letters and numbers.",
	"array"                => "The :attribute must be an array.",
	"before"               => "The :attribute must be a date before :date.",
	"between"              => [
		"numeric" => "The :attribute must be between :min and :max.",
		"file"    => "The :attribute must be between :min and :max kilobytes.",
		"string"  => "The :attribute must be between :min and :max characters.",
		"array"   => "The :attribute must have between :min and :max items.",
	],
	"boolean"              => "The :attribute field must be true or false.",
	"confirmed"            => "The :attribute confirmation does not match.",
	"date"                 => "The :attribute is not a valid date.",
	"date_format"          => "The :attribute does not match the format :format.",
	"different"            => "The :attribute and :other must be different.",
	"digits"               => "The :attribute must be :digits digits.",
	"digits_between"       => "The :attribute must be between :min and :max digits.",
	"email"                => "The :attribute must be a valid email address.",
	"filled"               => "The :attribute field is required.",
	"exists"               => "The selected :attribute is invalid.",
	"image"                => "The :attribute must be an image.",
	"in"                   => "The selected :attribute is invalid.",
	"integer"              => "The :attribute must be an integer.",
	"ip"                   => "The :attribute must be a valid IP address.",
	"max"                  => [
		"numeric" => "The :attribute may not be greater than :max.",
		"file"    => "The :attribute may not be greater than :max kilobytes.",
		"string"  => "The :attribute may not be greater than :max characters.",
		"array"   => "The :attribute may not have more than :max items.",
	],
	"mimes"                => "The :attribute must be a file of type: :values.",
	"min"                  => [
		"numeric" => "The :attribute must be at least :min.",
		"file"    => "The :attribute must be at least :min kilobytes.",
		"string"  => "The :attribute must be at least :min characters.",
		"array"   => "The :attribute must have at least :min items.",
	],
	"not_in"               => "The selected :attribute is invalid.",
	"numeric"              => "The :attribute must be a number.",
	"regex"                => "The :attribute format is invalid.",
	"required"             => "The :attribute field is required.",
	"required_if"          => "The :attribute field is required when :other is :value.",
	"required_with"        => "The :attribute field is required when :values is present.",
	"required_with_all"    => "The :attribute field is required when :values is present.",
	"required_without"     => "The :attribute field is required when :values is not present.",
	"required_without_all" => "The :attribute field is required when none of :values are present.",
	"same"                 => "The :attribute and :other must match.",
	"size"                 => [
		"numeric" => "The :attribute must be :size.",
		"file"    => "The :attribute must be :size kilobytes.",
		"string"  => "The :attribute must be :size characters.",
		"array"   => "The :attribute must contain :size items.",
	],
	"unique"               => "The :attribute has already been taken.",
	"url"                  => "The :attribute format is invalid.",
	"timezone"             => "The :attribute must be a valid zone.",

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
			'required'  => 'This field is required.',
            'regex'     => 'Must contain letters and numbers only. And not begin with a space.',
            'unique'    => 'This title has already been taken.',
            'max'       => 'This field must not exceed :max characters',
		],

        'short_desc'    => [
            'required'  => 'This field is required.',
            'max'       => 'This field must not exceed :max characters.'
        ],

        'full_desc'     => [
            'required'  => 'This field is required.'
        ],

        'target_amount' => [
            'required'  => 'This field is required.',
            'integer'   => 'Must contain numbers only. And not begin with a space.',
            'min'       => 'The amount to fundraise, must be at least &euro;500'
        ],

        'child_name'    => [
            'required'  => 'This field is required.',
            'regex'     => 'Must contain letters only. And not begin with a space.',
            'required_with' => 'This field is required.'
        ],

        'first_name'    => [
            'required'  => 'This field is required.',
            'regex'     => 'Must contain letters only. And not begin with a space.'
        ],

        'last_name'     => [
            'required'  => 'This field is required.',
            'regex'     => 'Must contain letters only. And not begin with a space.'
        ],

        'email'         => [
            'required'  => 'This field is required.',
            'regex'     => 'Must be of a correct email format. And not begin with a space.',
            'unique'    => 'This email address already has an account registered.'
        ],

        'street'        => [
            'required'  => 'This field is required.'
        ],

        'postcode'      => [
            'required'  => 'This field is required',
            'integer'   => 'This field must contain numbers only',
            'digits'    => 'Postcode must be :digits characters',
        ],

        'city'          => [
            'required'  => 'This field is required',
            'regex'     => 'Must contain letters only. And not begin with a space.',
        ],

        'tel_number'    => [
            'required'  => 'This field is required.',
            'regex'     => 'Must be of a correct telephone number format. And not begin with a space.'
        ],

        'main_img'      => [
            'required_without'  => 'A main image is required.',
            'mimes'     => 'Please choose a valid image format.',
            'max'      => 'Must not exceed 20MB in size.'
        ],

        'img_2'         => [
            'mimes'     => 'Please choose a valid image format.',
            'max'      => 'Must not exceed 20MB in size.'
        ],

        'img_3'         => [
            'mimes'     => 'Please choose a valid image format.',
            'max'      => 'Must not exceed 20MB in size.'
        ],

        'img_4'         => [
            'mimes'     => 'Please choose a valid image format.',
            'max'      => 'Must not exceed 20MB in size.'
        ],

        'doc_1_mand'    => [
            'required_without'  => 'At least two documents of evidence are required.',
            'mimes'     => 'We accept JPG, JPEG, PNG, BMP, TIFF, and PDF formats.',
            'max'      => 'Must not exceed 20MB in size.'
        ],

        'doc_2_mand'    => [
            'required_without'  => 'At least two documents of evidence are required.',
            'mimes'     => 'We accept JPG, JPEG, PNG, BMP, TIFF, and PDF formats.',
            'max'      => 'Must not exceed 20MB in size.'
        ],

        'doc_3'    => [
            'mimes'     => 'We accept JPG, JPEG, PNG, BMP, TIFF, and PDF formats.',
            'max'      => 'Must not exceed 20MB in size.'
        ],

        'doc_4'    => [
            'mimes'     => 'We accept JPG, JPEG, PNG, BMP, TIFF, and PDF formats.',
            'max'      => 'Must not exceed 20MB in size.'
        ],

        'doc_5'    => [
            'mimes'     => 'We accept JPG, JPEG, PNG, BMP, TIFF, and PDF formats.',
            'max'      => 'Must not exceed 20MB in size.'
        ],

        'doc_6'    => [
            'mimes'     => 'We accept JPG, JPEG, PNG, BMP, TIFF, and PDF formats.',
            'max'      => 'Must not exceed 20MB in size.'
        ],

        'user_name' => [
            'required'  => 'This field is required.',
            'max'       => 'This field must not exceed :max characters.',
            'unique'    => 'This username has already been taken.'
        ],

        'password'      => [
            'required'  => 'This field is required.'
        ],

        'password_confirmation' => [
            'required'  => 'This field is required.'
        ],

        'business_name' => [
            'required_if'   => 'This field is required.'
        ],

        'sender_name'   => [
            'required'  => 'This field is required.',
            'regex'     => 'Must contain letters only, and not begin with a space.'
        ],

        'friend_name'   => [
            'required'  => 'This field is required.',
            'regex'     => 'Must contain letters only, and not begin with a space.'
        ],

        'sender_email'  => [
            'required'  => 'This field is required.',
            'regex'     => 'Must be of a correct email format. And not begin with a space.'
        ],

        'friend_email'  => [
            'required'  => 'This field is required.',
            'regex'     => 'Must be of a correct email format. And not begin with a space.'
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
