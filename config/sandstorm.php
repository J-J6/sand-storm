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

    /*
    |--------------------------------------------------------------------------
    | Custom Bag Request Questions
    |--------------------------------------------------------------------------
    |
    | The ready-made questions on the contact page's custom bag form. Edit the
    | wording or the options here: the form, its validation and the summary
    | saved for the admin inbox all read from this list.
    |
    | multiple: true lets the client tick several options (and makes the
    | question optional); otherwise the client must pick exactly one.
    |
    */

    'custom_bag_questions' => [
        'bagType' => [
            'label' => 'Bag type',
            'question' => 'Which type of bag do you need?',
            'options' => [
                'pp-woven' => 'PP woven bag',
                'pp-laminated' => 'Laminated PP bag',
                'paper-cement' => 'Paper cement sack',
                'unsure' => 'Not sure, advise me',
            ],
        ],
        'contents' => [
            'label' => 'Contents',
            'question' => 'What will the bag carry?',
            'options' => [
                'cement' => 'Cement',
                'building-materials' => 'Lime, gypsum or other building materials',
                'food' => 'Grain, flour or sugar',
                'agri' => 'Fertiliser or animal feed',
                'other' => 'Something else',
            ],
        ],
        'capacity' => [
            'label' => 'Bag size',
            'question' => 'What size of bag?',
            'options' => [
                '25kg' => '25 kg',
                '50kg' => '50 kg',
                '90kg' => '90 kg',
                'other' => 'Another size',
            ],
        ],
        'bagColour' => [
            'label' => 'Bag colour',
            'question' => 'What colour should the bag be?',
            'options' => [
                'white' => 'White',
                'natural' => 'Natural / brown',
                'custom' => 'A custom colour',
            ],
        ],
        'printing' => [
            'label' => 'Printing',
            'question' => 'How should it be printed?',
            'options' => [
                'plain' => 'Plain, no printing',
                'one-colour' => '1 colour',
                'two-colours' => '2 colours',
                'multi-colour' => '3 or more colours',
            ],
        ],
        'printSides' => [
            'label' => 'Printed sides',
            'question' => 'Which sides should be printed?',
            'options' => [
                'none' => 'No printing',
                'one-side' => 'One side',
                'both-sides' => 'Both sides',
            ],
        ],
        'artwork' => [
            'label' => 'Artwork',
            'question' => 'Do you have your logo or artwork ready?',
            'options' => [
                'ready' => 'Yes, it is ready',
                'need-help' => 'No, I need design help',
                'not-needed' => 'Not needed',
            ],
        ],
        'extras' => [
            'label' => 'Extras',
            'question' => 'Any extras? Tick all that apply.',
            'multiple' => true,
            'options' => [
                'liner' => 'Inner liner (moisture barrier)',
                'valve' => 'Valve top (self-closing)',
                'uv' => 'UV protection',
                'anti-slip' => 'Anti-slip finish',
            ],
        ],
        'quantity' => [
            'label' => 'Quantity',
            'question' => 'How many bags do you need?',
            'options' => [
                'under-10k' => 'Under 10,000',
                '10k-50k' => '10,000 to 50,000',
                '50k-200k' => '50,000 to 200,000',
                'over-200k' => 'Over 200,000',
            ],
        ],
    ],

];
