<?php 


$db = c::get('db');
$table = $db->table('sound');
$results = $table->all();

foreach($results as $row) {
echo $row->name();
echo "<BR>";
}


?>
config/config.php
<?php 

$db = new Database(array(
'type' => 'sqlite',
'database' => '/Users/lodewijk/Projects/skl_website/scores.db'
));

c::set('db',$db);


?>
