<?php

namespace visualdialogue\Contact;

\Kirby::plugin('visualdialogue/contact', [

    'options' => [
        // 'featuredsizing' => 'xlarge',
    ],

    'controllers' => [
        'about' => require 'src/controllers/contact.php',
    ],

    'snippets' => [
        'contactform' => __DIR__ . '/src/snippets/contactform.php',
    ],

    'templates' => [
        // hijack the traditional path for emails, as outlined here https://getkirby.com/docs/guide/emails
        'emails/email.html' => __DIR__ . '/src/templates/email.html.php',
        'emails/email' => __DIR__ . '/src/templates/email.php',
    ]

]);