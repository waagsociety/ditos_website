<?php 
class ICS {
  
  var $data;
  var $name;
  
  function ICS($start,$end,$name,$description,$location, $url) {
      $this->name = $name;
      $this->data = "BEGIN:VCALENDAR\nVERSION:2.0\nMETHOD:PUBLISH\nBEGIN:VEVENT\nDTSTART:".date("Ymd\THis\Z",strtotime($start))."\nDTEND:".date("Ymd\THis\Z",strtotime($end))."\nLOCATION:".$location."\nTRANSP: OPAQUE\nSEQUENCE:0\nUID:\nDTSTAMP:".date("Ymd\THis\Z")."\nSUMMARY:".$name."\nDESCRIPTION:".$description."\nURL:".$url."\nCLASS:PUBLIC\nBEGIN:VALARM\nTRIGGER:-PT10080M\nACTION:DISPLAY\nDESCRIPTION:Reminder\nEND:VALARM\nEND:VEVENT\nEND:VCALENDAR\n";
  }

  function save() {
    file_put_contents($this->name.".ics",$this->data);
  }

  function show() {
    header("Content-type:text/calendar");
    header('Content-Disposition: attachment; filename="'.$this->name.'.ics"');
    Header('Content-Length: '.strlen($this->data));
    Header('Connection: close');
    echo $this->data;
  }

} 

$start = trim($page->date('Y-m-d').' '.$page->time());
$end = trim($page->date_end().' '.$page->time_end());
$title = $page->title()->html();
$summary = $page->introsentence()->html();

$venue = strlen($page->venue()) > 0 ? $page->venue().', ' : '';
$location = $venue.$page->address().', '.$page->city().', '.$page->country();

$event = new ICS(
  $start,
  $end,
  $title,
  $summary,
  $location,
  $page->url()
);

$event->show();

?>

