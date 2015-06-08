/*
 +---------------------------------------------------------------------------------------
 |
 | Form Validation Object
 |
 | Created by: Brad Milburn | v1.0.1 | 03.04.2015 | github.com/bradmilburn/Form_Validation_Object
 |
 +---------------------------------------------------------------------------------------
 |
 | A Javascript Object for validating form field input.
 |
 | Each method expects the form field's input value and, simply returns a boolean value.
 |
 */


var FormValidation = {

    checkNotEmpty: function(value)
    {
        return (value.length > 0);
    },

    checkMinLength : function(value, min)
    {
        return (value.length >= min);
    },

    checkMaxLength : function(value, max)
    {
        return (value.length <= max);
    },

    // Allow letters only, must not begin with a space.
    checkAlphaOnly: function(value)
    {
        var regex = /^[a-zA-ZÀ-ž-]+([\sa-zA-ZÀ-ž-]+)*$/;
        return regex.test(value);
    },

    // Allow numbers only, must not begin with a space.
    checkNumOnly: function(value)
    {
        var regex = /^[0-9]+([\s0-9]+)*$/;
        return regex.test(value);
    },

    // Allow letters and numbers, must not begin with a space.
    checkAlphaNumeric : function(value)
    {
        var regex = /^[a-zA-ZÀ-ž0-9]+([\sa-zA-ZÀ-ž0-9]+)*$/;
        return regex.test(value);
    },

    // Allow + sign, round brackets, and /. Must not begin with a space.
    checkValidPhone : function(value)
    {
        var regex = /^[+()\/0-9]+([\s+()\/0-9]+)*$/;
        return regex.test(value);
    },

    // Must not begin with a space.
    checkValidEmail : function(value)
    {
        var regex = /[a-zA-ZÀ-ž0-9_\.\+-]+@[a-zA-ZÀ-ž0-9-]+\.[a-zA-ZÀ-ž0-9-\.]/;
        return regex.test(value);
    },

    // Must not begin with a space. Must begin with http:/
    checkValidURL : function(value)
    {
        var regex = /^http\:\/\/[a-zA-ZÀ-ž0-9\-\.]+\.[a-zA-ZÀ-ž]{2,}(\/\S*)?$/;
        return regex.test(value);
    },

    // Letters, spaces and punctuation signs only
    checkValidTextarea : function(value)
    {
        var regex = /^[a-zA-Z0-9?$@#()'!,+\-=_:.&€£*%\s]+$/;
        return regex.test(value);
    },

    // Letters and spaces only
    checkLetters : function(value)
    {
        var regex = /^([a-zA-Z ])+$/;
        return regex.test(value);
    },

    // Allow , . and numbers only. Must not begin with a space.
    checkValidCurrency : function(value)
    {
        var regex = /^[0-9]+([\s0-9,.]+)*$/;
        return regex.test(value);
    }

};