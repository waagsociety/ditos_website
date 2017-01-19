<?php 
  $user = $site->user();
  $filename = "Doing it Together Science - events - ".date('Y.m.d').".xls";
?>
<?php if ($user && params('download')) {

  $pages = $page->parent()->children()->visible()->filterBy('template', 'event-item');

  $row = 0;
  $columns = [
    'A' => 'title',
    'B' => 'description',
    'C' => 'tinyUrl',
  ];

  header("Content-Type: application/vnd.ms-excel");
  header("Content-disposition: attachment; filename=".$filename);
  header("Cache-control: max-age=0");

  $phpExcel = new PHPExcel();
  $phpExcel->setActiveSheetIndex(0);
  $sheet = $phpExcel->getActiveSheet();

  foreach ($pages as $page) {
    $data = $page->toArray();
    foreach ($columns as $column => $key) {
      $value = array_key_exists($key, $data) ? $data[$key] : "NULL";
      $sheet->setCellValue($column.$row, $value);
    }
    $row++;
  }

  $writeExcel = new PHPExcel_Writer_Excel5($phpExcel);
  $writeExcel->save('php://output');

}
else if ($user) {
  echo '<p><code>'.$filename.'</code><a href="./data/download:xls/"></p><button type="button">Download</button></a>';
}
else {
  echo '<a href="/panel/pages/'.$page->uri().'/edit" class="login">Login</a>';
}