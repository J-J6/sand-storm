<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Inquiry Notification Recipient
    |--------------------------------------------------------------------------
    |
    | Where new website inquiries are emailed. Set INQUIRY_MAIL_TO in .env to
    | change it without touching code.
    |
    */

    'inquiry_recipient' => env('INQUIRY_MAIL_TO', 'compliance@sandstormindustries.co.ke'),

];
