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


  function getAddress($locations) {
    return function($slug) use ($locations) {
      $locationPage = $locations->find($slug);
      return join("\n", [$locationPage->title(), $locationPage->address(), $locationPage->country()]);
    };
  };

  function getFromPage($page, $field) {
    return function($slug) use ($page, $field) {
      return $page->find($slug)->content()->get($field);
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
    'B' => ['Name of Event (as described in DoA)', 'event_name', 32],
    'C' => ['Page Link', 'tinyUrl', 32],
    'D' => ['DoA Description (for events that are in the Grant Agreement DoA)', 'doa_description', 96],
    'E' => ['Brief Description (for events/details not in DoA)', 'alt_description', 96],
    'F' => ['Status', 'status', 12],
    'G' => ['Date', 'date', 12],
    'H' => ['Time', 'time', 12],
    'I' => ['End Date', 'date_end', 12],
    'J' => ['End Time', 'time_end', 12],
    'K' => ['Event Type', 'activity', 16, getFromPage($activities, 'title')],
    'L' => ['Audience Numbers', 'audience_numbers', 12],
    'M' => ['% Female', 'female_percentile', 12],
    'N' => ['Work Package', 'work_package', 16],
    'O' => ['Partner org. name AND facilitator’s (person) name', 'facilitator', 24],
    'P' => ['Lower age bracket', 'lower_age_bracket', 12],
    'Q' => ['Higher age bracket', 'higher_age_bracket', 12],
    'R' => ['Url’s', 'link', 48, destructure(['url'])],
    'S' => ['Total funding amount used (in EUR)', 'funds_eur', 12],
    'T' => ['Event ID', 'event_id', 24],
    'U' => ['Location', 'location', 32, getAddress($locations)],
    'V' => ['Event Duration', 'duration', 16],
    'W' => ['Price', 'price', 12],
    'X' => ['Currency', 'currency', 12],
    'Y' => ['Reporting Period', 'reporting_period', 16],
    'Z' => ['Phase (the event was planned)', 'planning_phase', 32],
    'AA' => ['Notes', 'notes', 32],
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
      $value = array_key_exists($field, $data) ? $data[$field] : $page->content()->get($field);
      if (array_key_exists($callback, $column) && strlen(trim($value)) > 0) {
        $value = $column[$callback]($value);
      }
      $sheet->setCellValue($key.$row, $value."\n");
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
