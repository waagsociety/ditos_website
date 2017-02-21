<?php
return function($site, $pages, $page) {
  $alert = null;

  if(get('submit')) {
    $data = array(
      'name'  => get('name'),
      'email' => get('email'),
      'phone' => get('phone'),
      'organisation' => get('organisation'),
      'why' => get('why'),
      'activities' => get('activities'),
      'about' => get('about'),
      'amount' => get('amount')
    );
    $rules = array(
      'name'  => array('required'),
      'email' => array('required'),
      'phone' => array('required'),
      'organisation' => array('required'),
      'why' => array('required'),
      'activities' => array('required'),
      'about' => array('required'),
      'amount' => array('required')
    );
    $messages = array(
      'name'  => 'Please enter a valid name',
      'email' => 'Please enter a valid email address',
      'phone' => 'Please enter a valid phone',
      'organisation' => 'Please enter a valid organisation',
      'why' => 'Please let us know why you want to request the bus',
      'activities' => 'Please let us know what activities you want to do',
      'about' => 'Please tell a bit about yourself',
      'amount' => 'How much people do you expect'
    );
    // some of the data is invalid
    if($invalid = invalid($data, $rules, $messages)) {
      $alert = $invalid;
    // the data is fine, let's send the email
    } else {
      // create the body from a simple snippet
      $body  = snippet('bookmail', $data, true);
      // build the email
    

      $email = email(array(
        'to'      => 'ditosbus@waag.org',
        'from'    => 'martin@waag.org',
        'replyTo' => $data['email'],
        'subject' => 'Request the bus',
        'body'    => $body,
        'service' => 'mailgun',
        'options' => array(
          'key'    => 'key-5701b627c8057d332b047ddb56ba11e7',
          'domain' => 'sandboxb1b404ee42b84a098a7d4daaa60a78dc.mailgun.org'
        )
      ));
      
      // try to send it and redirect to the
      // thank you page if it worked
      if($email->send()) {
        go('/book-the-bus/thanks');
      // add the error to the alert list if it failed
      } else {
        $alert = array($email->error());
      }
    }
  }
  return compact('alert');
};
