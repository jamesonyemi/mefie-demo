<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    */

    'name'                      => env('APP_NAME', 'Mefie'),
    'admin'                     => env('ADMIN_ROLE_ID', 2),
    'finance'                   => env('FINANCE_ROLE_ID', 6),
    'individual_Client_RoleId'  => env('INDIVIDUAL_CLIENT_ROLE_ID', 3),
    'corporate_Client_RoleId'   => env('CORPORATE_CLIENT_ROLE_ID', 5),
    
    'name_suffix' => env('NAME_SUFFIX', '.app'),
    'contact_number' => env('CONTACT_NUMBER', '+233501282006'),
    'contact_email' => env('CONTACT_EMAIL', 'info@eatechnologies.tech'),
    
    'set_default_currency' => env('DEFAULT_CURRENCY_IS_GH', 'GH₵'
),

    'stage_image'      => env('STAGE_OF_COMPLETION_IMG_REL_PATH', '/rock-homes/public/stage_of_completion_img/'),
    'project_image'    => env('PROJECT_DOCS_IMG_REL_PATH', '/rock-homes/public/project-documents/'),
    'project_docs'     => env('PROJECT_DOCS_REL_PATH', '/rock-homes/public/docs/'),
    'rock_rel_path'    => env('APP_REL_PATH', '/rock-homes/public/'),

    'surplus_budget'   => env('SURPLUS_BUDGET', 'surplus'),
    'deficit_budget'   => env('DEFICIT_BUDGET', 'deficit'),
    'balanced_budget'  => env('BALANCED_BUDGET', 'balanced-budget'),

    'completed_status' => env('COMPLETED_STATUS_ID', 1),
    'completed_status_text' => env('COMPLETED_STATUS_TEXT', "completed"),

    'ongoing_status'   => env('ONGOING_STATUS_ID', 2),
    'ongoing_status_text' => env('ONGOING_STATUS_TEXT', "ongoing"),

    'cancelled_status' => env('CANCELLED_STATUS_ID', 3),
    'cancelled_status_text' => env('CANCELLED_STATUS_TEXT', 'cancelled'),

    'stalled_status'   => env('STALLED_STATUS_ID', 4),
    'stalled_status_text'   => env('STALLED_STATUS_TEXT', "stalled"),

    'app_logo'         => env('APP_LOGO', 'assets/img/logo.png'),
    'company_name'     => env('COMPANY_NAME', 'EA TECHNOLOGIES Ltd'),
    'company_url'      => env('COMPANY_URL', 'https://www.eatechnologies.tech'),
    'company_address'  => env('COMPANY_ADDRESS', 'Milli Plaza, Adenta SSNIT Flats,'),
    'company_state'    => env('COMPANY_STATE', 'Accra'),
    'company_region'   => env('COMPANY_REGION', 'Ghana, West Africa'),
    'btn_activate'     => env('ACTIVATION_BUTTON', 'ACTIVATE ACCOUNT'),
    'btn_msg'          => env('ACTIVATION_MESSAGE', 'Please validate your registration by clicking on the'),
    'appreciate_msg'   => env('APPRECIATION', 'Thank you!'),
    

    /*
    |--------------------------------------------------------------------------
    | GOOGLE RECAPTCHA SETTINGS
    |--------------------------------------------------------------------------
    |
    | This value determines the "GOOGLE RECAPTCHA KEYS" your application is currently
    | running in. Set this in your ".env" file.
    |
    */
    
    'g_recaptcha_js_api_url'        =>  env('G_RECAPTCHA_JS_API_URL', 'https://www.google.com/recaptcha/api.js'),
    'g_recaptcha_verify_site_url'   =>  env('G_RECAPTCHA_VERIFY_SITE_URL', 'https://www.google.com/recaptcha/api/siteverify'),

    'g_recaptcha_site_key' => env('G_RECAPTCHA_SITEKEY', '6LdxMUEaAAAAAAV8rMl0DuEQGW_IcEPE4e3Leg3t'),
    'g_recaptcha_secret'   => env('G_RECAPTCHA_SECRET', '6LdxMUEaAAAAAM7KLHdxQeonvYq2T8nfCjWjVSHw'),
    
    
    'g_recaptcha_v2_site_key' => env('G_RECAPTCHA_V2_SITEKEY', '6LeJgEUaAAAAAOFR80oFKoX44nNKwlff9lwzwCeS'),
    'g_recaptcha_v2_secret'   => env('G_RECAPTCHA_V2_SECRET', '6LeJgEUaAAAAACi40qjRkFZH3z5kNYwdJvampBCn'),

    /**
     * Public Key From Paystack Dashboard
     *
     */
    'publicKey' => env('PAYSTACK_PUBLIC_KEY', 'pk_test_533be615e5d56345c27566509442bf7d5bf5edbf'),

    /**
     * Secret Key From Paystack Dashboard
     *
     */
    'secretKey' => env('PAYSTACK_SECRET_KEY', 'sk_test_eca51ee241c31576bea756cd6c777a52a112b9d1'),

    /**
     * Paystack Payment URL
     *
     */
    'paymentUrl' => env('PAYSTACK_PAYMENT_URL', 'https://api.paystack.co'),

    /**
     * Optional email address of the merchant
     *
     */
    'merchantEmail' => env('MERCHANT_EMAIL'),





    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services your application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => env('APP_DEBUG', true),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Logging Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log settings for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Settings: "single", "daily", "syslog", "errorlog"
    |
    */

    'log' => env('APP_LOG', 'single'),

    'log_level' => env('APP_LOG_LEVEL', 'debug'),
    'debug_hide' => [
        '_ENV' => [
            'APP_KEY',
            'DB_PASSWORD',
            'DB_DATABASE',
            'DB_USERNAME',
            'DB_CONNECTION',
            'DB_HOST',
            'DB_PORT',

        ],

        '_SERVER' => [
            'APP_KEY',
            'DB_PASSWORD',
            'DB_DATABASE',
            'DB_USERNAME',
            'DB_CONNECTION',
            'DB_HOST',
            'DB_PORT',
        ],

        '_POST' => [
            'password',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,
        Maatwebsite\Excel\ExcelServiceProvider::class,
        Waavi\Sanitizer\Laravel\SanitizerServiceProvider::class,
        Unicodeveloper\Paystack\PaystackServiceProvider::class,
       


        /*
         * Package Service Providers...
         */
        Laravel\Tinker\TinkerServiceProvider::class,

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,
        'Excel' => Maatwebsite\Excel\Facades\Excel::class,
        'Sanitizer' => Waavi\Sanitizer\Laravel\Facade::class,
        'Paystack' => Unicodeveloper\Paystack\Facades\Paystack::class,
    ],

];
