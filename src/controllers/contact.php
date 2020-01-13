<?php
// simple contact form from https://getkirby.com/docs/cookbook/forms/basic-contact-form
return function($kirby, $pages, $page) {

    $alert = null;

    if($kirby->request()->is('POST') && get('submit')) {

       // check the honeypot
       if(empty(get('website')) === false) {
           go($page->url());
           exit;
       }

       $data = [
           'firstname'  => get('firstname'),
           'lastname'  => get('lastname'),
           'email' => get('email'),
           'message'  => get('message')
       ];

       $rules = [
           'firstname'  => ['required', 'min' => 3],
           'lastname'  => ['required', 'min' => 3],
           'email' => ['required', 'email'],
           'message'  => ['required', 'min' => 3, 'max' => 3000],
       ];

       $messages = [
           'firstname'  => 'Please enter a valid name',
           'lastname'  => 'Please enter a valid name',
           'email' => 'Please enter a valid email address',
           'message'  => 'Please enter a message between 3 and 3000 characters'
       ];

       // some of the data is invalid
       if($invalid = invalid($data, $rules, $messages)) {
           $alert = $invalid;

           // the data is fine, let's send the email
       } else {
           try {
               $kirby->email([
                    'template' => 'email',
                    // 'template' => 'plugins/kirby-contact/src/templates',
                    'from'     => 'webform@centralsq.org',
                    'replyTo'  => $data['email'],
                    'to'       => [
                        // 'luke@visualdialogue.com'
                        'hello@centralsq.org'
                    ],
                    'bcc'       => 'luke@visualdialogue.com',
                    'subject'  => esc($data['firstname']) . ' ' . $data['lastname'] . ' sent you a message from your contact form',
                    'data'     => [
                        'message' => esc($data['message']),
                        'sender' => esc($data['firstname'])
                    ]
               ]);

           } catch (Exception $error) {
               $alert['error'] = $error . "<br>We're sorry, the form could not be sent. Please give us a call.";
           }

           // no exception occured, let's send a success message
           if (empty($alert) === true) {
               $success = 'Your message has been sent, thank you. We will get back to you soon!';
               $data = [];
           }
       }
   }

   return [
       'alert'   => $alert,
       'data'    => $data ?? false,
       'success' => $success ?? false
   ];
};