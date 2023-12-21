<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    // we add custom validation
    public function boot(): void
    {
        //we check if the attribute (email) ends with the value(@student.ehb.be) with a closure(anonymous function)
        Validator::extend('student_email', function ($attribute, $value, $validator) { //$validator to access Validator class methods


            return str_ends_with($value, '@student.ehb.be'); //returns true or false 

        });

        //customize the error message when email is not right
        Validator::replacer('student_email', function ($message, $attribute, $rule) {

            //attribute refers to the to validate attribute (email)
            return str_replace(':attribute', $attribute, 'De :attribute moet een @student.ehb.be mail zijn');

        });

        //name is required

        Validator::extend('required_name', function ($attribute, $value, $validator) {

            return !empty($value);

        });

        Validator::replacer('required_name', function ($message, $attribute, $rule) {

            return str_replace(':attribute', $attribute, 'Gelieve een :attribute in te geven');
        });

        //surname

        Validator::extend('required_surname', function ($attribute, $value, $validator) {

            return !empty($value);

        });

        Validator::replacer('required_surname', function ($message, $attribute, $rule) {

            return str_replace(':attribute', $attribute, 'Gelieve een :attribute in te geven');
        });


        //required email

        Validator::extend('required_email', function ($attribute, $value, $validator) {

            return !empty($value);

        });

        Validator::replacer('required_email', function ($message, $attribute, $rule) {

            return str_replace(':attribute', $attribute, 'Gelieve een :attribute in te geven');
        });



        //right email format


        Validator::extend('email_format', function ($attribute, $value, $validator) {

            //php built in methods for filter validation

            //filter var return data if succesful or false if not
            return filter_var($value, FILTER_VALIDATE_EMAIL) !== false; //specifically checking for false

        });

        Validator::replacer('email_format', function ($message, $attribute, $rule) {

            return str_replace(':attribute', $attribute, 'Gelieve een juiste :attribute formaat in te geven');
        });
    }
}
