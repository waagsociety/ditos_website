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

  $pages = $page->parent()->children()->visible()->filterBy('template', 'event-item');

  $row = 1;
  $name = 0; $slug = 1; $width = 2; $callback = 3;
  $partners = $site->find('about')->find('partners');
  $activities = $site->find('activities');
  $columns = [
    'A' => ['Title', 'title', 32],
    'B' => ['Description', 'description', 48],
    'C' => ['Partner', 'partner', 16, getFromPage($partners, 'title')],
    'D' => ['Activity', 'activity', 16, getFromPage($activities, 'title')],
    'E' => ['Page Link', 'tinyUrl', 32],
    'F' => ['Tags', 'tags', 32],
    'G' => ['Date', 'date', 12],
    'H' => ['Time', 'time', 8],
    'I' => ['End Date', 'date_end', 12],
    'J' => ['End Time', 'time_end', 8],
    'K' => ['URL', 'link', 48, destructure(['url'])],
    'L' => ['Price', 'price', 8],
    'M' => ['Currency', 'currency', 8],
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

  // $sheet->getDefaultStyle()
  //   ->getAlignment()
  //   ->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_TOP);

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