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
  $columns = [
    'V' => ['Title', 'title', 32],
    'W' => ['Description', 'description', 48],
    'A' => ['Partner', 'partner', 32, getFromPage($partners, 'title')],
    'K' => ['Activity', 'activity', 16, getFromPage($activities, 'title')],
    'C' => ['Page Link', 'tinyUrl', 32],
    'X' => ['Tags', 'tags', 32],
    'G' => ['Date', 'date', 12],
    'H' => ['Time', 'time', 8],
    'I' => ['End Date', 'date_end', 12],
    'J' => ['End Time', 'time_end', 8],
    'Q' => ['URL', 'link', 48, destructure(['url'])],
    'Y' => ['Price', 'price', 8],
    'Z' => ['Currency', 'currency', 8],
    'B' => ['Name of event', 'event_name', 32],
    'S' => ['Event ID', 'event_id', 24],
    'D' => ['DoA Description', 'doa_description', 96],
    'E' => ['Brief description', 'alt_description', 96],
    'F' => ['Status', 'status', 12],
    'T' => ['Work Package', 'work_package', 16],
    'P' => ['Facilitators', 'facilitator', 24],
    'L' => ['Audience Numbers', 'audience_numbers', 8],
    'M' => ['% Female', 'female_percentile', 12],
    'N' => ['Lower age bracket', 'lower_age_bracket', 12],
    'O' => ['Higher age bracket', 'higher_age_bracket', 12],
    'R' => ['Used funds (EUR)', 'funds_eur', 12],
    'U' => ['Reporting Period', 'reporting_period', 16],
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
        // echo $value.' - '.$data['url'].'<br>';
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