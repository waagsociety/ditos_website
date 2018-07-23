<?php
  $user = $site->user();
  $filename = "Doing it Together Science - events - ".date('Y-m-d H:i').".xls";

  function destructure($fields) {
    
    return function($value) use ($fields) {
      $labelFields = count($fields) > 1;
      $result = "";
      foreach ($value->toStructure() as $item) {
        $item = $item->toArray();
        
        foreach ($fields as $field) {
          $result.= '• '.($labelFields ? $field.': ' : '').$item[$field]."\n";
        }
        
      }
      return $result;
    };

  };

  function getEventName()
  {
      return function($value) {
          
          $options = array("Bio Citizen Science","Bio Friday Academy","bio Hack The City","Bio Playshop","BioArt","BioBlitz / Bioblitz hub meeting","Biodesign Cafe","Biodesign NightScience","BioDesignWorkshops","BioNights","BioTalks","Capacity Building workshops","Citizen Science prototypes exhibition","Citizen Science prototyping workshops","Citizen Science Seminars","Citizen Science Summit","CityHack","Classific' Action Exhibition","Classifica' Action Taxonomy workshops","CRI Journal","CwB BioCafe","CwB Cafe (environmental)","Debates Science Assoc.","Digital Story Telling","Discovery Trip","DIY Science Postcards","Do-It-Together Bio","Env. Citizen Science","Env. DIY Lab","Env. Friday Academy","Env. Hack the City","Env. Science Cafe","EoW Playshop","Europe’s Interactive Citizen Science Map","European Stakeholder Roundtable BioDesign","European Stakeholder Roundtable Env Sust","European Stakeholder Roundtable RRI","Gameliers","Grand Challenge Cafes","If I were Prime Minister","Igame4er","Ik Heb een Vraag website","Labo ID","Leadership programme","Local Meetups","Local Stakeholder Roundtable DITOs Good Practices","new exhibition (RBINS)","Open Science Schools","OpenBio workshop","OpenLabEvening","Pan-European Policy Forum","Persepctives on DIY Bio","Perspectives on Citizen Science conference","Poison Exhibition","Public Lab Workshops","Reddit / MOOC","Science Cafe","Science Express tour","Science Film Night - Bio","Science Film Night - Environmental","Stakeholder Roundtable RRI","Student Env. Monitoring","Taxonomy of Bioindicators","Teacher Training Workshop","Touch|Play|Learn","Travelling exhibition & database (RBINS)","Unforeseen conference / seminar","Unforeseen Discovery Trip","Unforeseen Exhibition","Unforeseen online activity","Unforeseen science cafe or screening","Unforeseen Workshop","Videos, blogs, tweets, photos","Water & Biodiversity exhibition","Workshop Lab Books Bio","Workshop Lab Books Environmental","Xperilab");

          //todo cast value to int to get the key, and return the value from the options array.
          //but first all values need to be coerced into the new system!

          return $value;
      };
  };

  function getAddress($locations) {
    return function($slug) use ($locations) {
      $locationPage = $locations->find($slug);
      return join("\n", [$locationPage->title(), $locationPage->address(), $locationPage->country()]);
    };
  };

  function getGeolocation($locations) {
    return function($slug) use ($locations) {
      $locationPage = $locations->find($slug);
      return $locationPage->location();
    };
  };
  
  function getLat($locations) {
    return function($slug) use ($locations) {
      $locationPage = $locations->find($slug);
      $location = $locationPage->location();
      if($location != ""){
          $location = $location->split(',')[0];
      }
      return $location;
    };
  };

  function getLong($locations) {
    return function($slug) use ($locations) {
      $locationPage = $locations->find($slug);
      $location = $locationPage->location();
      if($location != ""){
          $location = $location->split(',')[1];
      }
      return $location;
    };
  }

  function getFromPage($page, $field) {
    return function($slug) use ($page, $field) {
      return $page->find($slug)->content()->get($field);
    };
  }

//get the reporting period based on the start date of the event
function getReportingPeriod()
{
    return function($value)
    {
        $period1_start = strtotime('06/01/2016');
        $period1_end = strtotime('08/31/2017');
        $period1_title = "Reporting period 1 M1 - M15";

        $period2_start = strtotime('09/01/2017');
        $period2_end = strtotime('05/31/2019');
        $period2_title = "Reporting period 2 M16 - M36";

        $date = strtotime($value);

        if($date >= $period1_start && $date <= $period1_end)
        {
            return $period1_title;
        }
        else if($date >= $period2_start && $date <= $period2_end)
        {
            return $period2_title;
        }
        else
        {
            return $value;//should return the unmodified date for clarity, if not in valid range
        }
    };
}

//get the phase based on the start date of the event
function getPhase()
{
    return function($value)
    {
        $scoping_start = strtotime('06/01/2016');
        $scoping_end = strtotime('11/30/2016');
        $scoping_title = 'Scoping M1- M6';

        $engagement_start = strtotime('12/01/2016');
        $engagement_end = strtotime('05/31/2018');
        $engagement_title = 'Engagement M7 - M24';

        $scaling_start = strtotime('06/01/2018');
        $scaling_end = strtotime('05/31/2019');
        $scaling_title = 'Scaling up M25 - M36';

        $date = strtotime($value);

        if($date >= $scoping_start && $date <= $scoping_end)
        {
            return $scoping_title;
        }
        else if($date >= $engagement_start && $date <= $engagement_end)
        {
            return $engagement_title;
        }
        else if($date >= $scaling_start && $date <= $scaling_end)
        {
            return $scaling_title;
        }
        else
        {
            return $value;//should return the unmodified date
        }
    };
}

?>
<?php if ($user && params('download')) {

  $pages = $page->parent()->children()->filterBy('template', 'event-item');

  $row = 1;
  $name = 0; $slug = 1; $width = 2; $callback = 3;
  $partners = $site->find('about')->find('partners');
  $activities = $site->find('activities');
  $locations = $site->find('locations');

  $columns = [
    'A' => ['Partner', 'partner', 32, getFromPage($partners, 'title')],
    'B' => ['Title', 'title', 32],
    'C' => ['Name of Event (as described in DoA)', 'event_name', 32, getEventName()],
    'D' => ['Page Link', 'tinyUrl', 32],
    'E' => ['Status', 'status', 12],
    'F' => ['Date', 'date', 12],
    'G' => ['Time', 'time', 12],
    'H' => ['End Date', 'date_end', 12],
    'I' => ['Event Type', 'activity', 16],
    'J' => ['Audience Numbers', 'audience_numbers', 12],
    'K' => ['% Female', 'female_percentile', 12],
    'L' => ['Work Package', 'work_package', 16],
    'M' => ['Partner org. name AND facilitator’s (person) name', 'facilitator', 24],
    'N' => ['Lower age bracket', 'lower_age_bracket', 12],
    'O' => ['Higher age bracket', 'higher_age_bracket', 12],
    'P' => ['Url’s', 'link', 48, destructure(['url'])],
    'Q' => ['Event ID', 'event_id', 24],
    'R' => ['Location', 'location', 32, getAddress($locations)],
    'S' => ['Reporting Period', 'date', 16, getReportingPeriod()],
    'T' => ['Phase (the event was planned)', 'date', 32, getPhase()],
    'U' => ['Notes', 'notes', 32],
    'V' => ['NGO', 'ngo', 32],
    'W' => ['DIY & local communities', 'communities', 32],
    'X' => ['Education, Academia & Research', 'academic', 32],
    'Y' => ['Local & national government', 'governance', 32],
    'Z' => ['Industry, Company & Startups', 'industry', 32],
    'AA' => ['Other (Collaboration)', 'other', 32],
    'AB' => ['Online Resources', 'resources', 32, destructure(['url'])],
    'AC' => ['Geolocation','location', 32, getGeolocation($locations)],
    'AD' => ['Latitude','location', 32, getLat($locations)],
    'AE' => ['Longitude','location', 32, getLong($locations)] 
  ];

  $phpExcel = new PHPExcel();
  $writeExcel = new PHPExcel_Writer_Excel5($phpExcel);
  
  $phpExcel->setActiveSheetIndex(0);
  $sheet = $phpExcel->getActiveSheet();

  foreach ($columns as $column => $meta) {
    $sheet->setCellValue($column.$row, $meta[$name]);
  }
  $row++;

  foreach ($pages as $page) {
    $data = $page->toArray();
    foreach ($columns as $key => $column) {
      $field = $column[$slug];
        
      try{
        $value = array_key_exists($field, $data) ? $data[$field] : $page->content()->get($field);//waarde als er geen callback (closure) is
        if (array_key_exists($callback, $column) && strlen(trim($value)) > 0) {
            $value = $column[$callback]($value);//waarde als er wel een closure is
        }
        $sheet->setCellValue($key.$row, $value."\n");
      } 
      catch (Error $e) 
      {
        //show the error in the event sheet itself, so it can be fixed by someone.
        $sheet->setCellValue($key.$row, 'DATA ERROR!'."\n");
      }
    }
    $row++;
  }

  foreach ($columns as $key => $column) {
    $span = $key.'1:'.$key;
    $sheet->getStyle($span.$sheet->getHighestRow())->getAlignment()->setWrapText(true);
    $sheet->getColumnDimension($key)->setWidth($column[$width]);
  }

  header("Content-Type: application/vnd.ms-excel");
  header("Content-disposition: attachment; filename=".$filename);
  header("Cache-control: max-age=0");
  $writeExcel->save('php://output');

}
else if ($user) {
  echo '<p><code>'.$filename.'</code><a href="./data/download:xls/"></p><button type="button">Download</button></a>';
}
else {
  echo '<a href="/panel/pages/'.$page->uri().'/edit" class="login">Login</a>';
}
