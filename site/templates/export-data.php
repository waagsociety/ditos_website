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
    'B' => ['Title', 'title', 32],
    'C' => ['Name of Event (as described in DoA)', 'event_name', 32],
    'D' => ['Page Link', 'tinyUrl', 32],
    'E' => ['Status', 'status', 12],
    'F' => ['Date', 'date', 12],
    'G' => ['Time', 'time', 12],
    'H' => ['End Date', 'date_end', 12],
    'I' => ['Event Type', 'activity', 16, getFromPage($activities, 'title')],
    'J' => ['Audience Numbers', 'audience_numbers', 12],
    'K' => ['% Female', 'female_percentile', 12],
    'L' => ['Work Package', 'work_package', 16],
    'M' => ['Partner org. name AND facilitator’s (person) name', 'facilitator', 24],
    'N' => ['Lower age bracket', 'lower_age_bracket', 12],
    'O' => ['Higher age bracket', 'higher_age_bracket', 12],
    'P' => ['Url’s', 'link', 48, destructure(['url'])],
    'Q' => ['Event ID', 'event_id', 24],
    'R' => ['Location', 'location', 32, getAddress($locations)],
    'S' => ['Reporting Period', 'reporting_period', 16],
    'T' => ['Phase (the event was planned)', 'planning_phase', 32],
    'U' => ['Notes', 'notes', 32],
    'V' => ['NGO', 'ngo', 32],
    'W' => ['DIY & local communities', 'communities', 32],
    'X' => ['Education, Academia & Research', 'academic', 32],
    'Y' => ['Local & national government', 'governance', 32],
    'Z' => ['Industry, Company & Startups', 'industry', 32],
    'AA' => ['Other (Collaboration)', 'other', 32],
    'AB' => ['Online Resources', 'resources', 32, destructure(['url'])],
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
