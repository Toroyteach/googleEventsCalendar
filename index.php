<?php
require __DIR__ . '/vendor/autoload.php';



define('CALENDAR_ID', 'tonny35toro@gmail.com');
define('CREDENTIALS_PATH', __DIR__.'/credentials.json');
define('SCOPES', Google_Service_Calendar::CALENDAR);



    $client = new Google_Client();
    $client->setApplicationName('Google Calendar API PHP Quickstart');
    $client->setScopes(SCOPES);
    $client->setAuthConfig(CREDENTIALS_PATH);
    $calender_service = new Google_Service_Calendar($client);


    // Load previously authorized token from a file, if it exists.
    // The file token.json stores the user's access and refresh tokens, and is
    // created automatically when the authorization flow completes for the first
    // time.
    $event = new Google_Service_Calendar_Event(array(
        'summary' => 'Google I/O 2015',
        'location' => '800 Howard St., San Francisco, CA 94103',
        'description' => 'A chance to hear more about Google\'s developer products.',
        'start' => array(
          'dateTime' => '2021-06-28T09:00:00+03:00',
          'timeZone' => 'Africa/Nairobi',
        ),
        'end' => array(
          'dateTime' => '2021-06-28T17:00:00+03:00',
          'timeZone' => 'Africa/Nairobi',
        ),
        'recurrence' => array(
          'RRULE:FREQ=DAILY;COUNT=2'
        ),
        'attendees' => array(
          array('email' => 'chirchir7370@gmail.com'),
        ),
        'reminders' => array(
          'useDefault' => FALSE,
          'overrides' => array(
            array('method' => 'email', 'minutes' => 24 * 60),
            array('method' => 'popup', 'minutes' => 10),
          ),
        ),
      ));
      
      $calendarId = 'primary';
      $event = $calender_service->events->insert('tonny35toro@gmail.com', $event);
      printf('Event created: %s\n', $event->htmlLink);
      