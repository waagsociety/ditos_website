<?php 
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire');// to fix annoying repost data error 

$user = $site->user();
$data = null;

if(r::is('POST')) $data = get();

if($user)
{
    $events = $site->children()->get('events')->children()->filterBy('template', 'event-item');
    $partners = $site->children()->get('about')->children()->get('about/partners')->children();
    $activities= $site->children()->get('activities')->children();
?>
    <script language="javascript">
    
    //submit the form, with sorting
    function submitForm(field_to_sortby)
    {
        document.getElementById("filters").elements["sortby"].value = field_to_sortby ;
        document.getElementById("filters").submit();
    }
    </script>

<br><br>
<form id="filters" method="post">
<input type="hidden" name="sortby" value="event_name" />
<!-- filters -->
Partner: <select name="partner">
    <option selected value="">All Partners</option>


<?php foreach($partners as $item): ?>
      <?php if(!$item) continue ?>
      <option<?php e(isset($data['partner']) && $data['partner'] == $item->slug(), ' selected') ?> value="<?= $item->slug() ?>"><?= $item->title() ?></option>
    <?php endforeach ?>


</select>
<br><br>
Date:&nbsp;&nbsp;&nbsp;<input name="date" value="<?php e(isset($data), $data['date']) ?>"> (YYYY-MM-DD) e.g. for everything in may 2018 use 2018-05.
</input>
<br><br>
Title:&nbsp;&nbsp;&nbsp;<input name="title" value="<?php e(isset($data), $data['title']) ?>">
</input>
<br><br>
DOA Name:&nbsp;<input name="name" value="<?php e(isset($data), $data['name']) ?>"></input>
<br><br>

<?php
    $status_options = array("Planned", "Completed", "Cancelled", "Empty")
?>
Status: <select name="status">
    <option selected value="">All</option>
<?php foreach($status_options as $item): ?>
      <option<?php e(isset($data['status']) && $data['status'] == $item, ' selected') ?> value="<?= $item ?>"><?= $item ?></option>
    <?php endforeach ?>
</select>

<br><br>

Event type: <select name="activity"><!-- activities -->
    <option selected value="">All</option>

<?php foreach($activities as $item): ?>
      <?php if(!$item) continue ?>
      <option<?php e(isset($data['activity']) && $data['activity'] == $item->slug(), ' selected') ?> value="<?= $item->slug() ?>"><?= $item->title() ?></option>
    <?php endforeach ?>
</select>

<br><br>
<br><br>
<button type="submit" form="filters" value="Submit">Search</button>
</form>
<hr>

<?php 
    if ($user && $data)
    {
        //first get all the events

        if($data['partner'])
        {
            $events = $events->search($data['partner'],'partner');
        }

        if($data['date'])
        {
            $events = $events->search($data['date'],'date');
        }

        if($data['title'])
        {
            $events = $events->search($data['title'],'title');
        }

        if($data['name'])
        {
            $events = $events->search($data['name'],'event_name');
        }

        if($data['status'])
        {
            $value = $data['status'];
            if($value == 'Empty'){
                $events = $events->filterBy('status','not in',['Planned','Completed','Cancelled']);
            }
            else {
                $events = $events->search($value,'status');
            }
        }

        if($data['activity'])
        {
            $events = $events->search($data['activity'],'activity');
        }

        if($data['sortby'])
        {
            $events = $events->sortBy($data['sortby'], 'asc');
        }

        $nr_of_results = count($events);
        echo 'count: ' . $nr_of_results;;

        echo '<table cellspacing="10"><tr><th><a href="javascript:submitForm(\'event_name\')">name</a></th><th><a href="javascript:submitForm(\'date\')">date</a></th><th>partner</th><th>title</th><th>WP</th><th>Actions</th></tr>';
        foreach($events as $event)
        {
?>
    <tr>
        <td><?php echo $event->event_name() ?></td>
        <td><?php echo $event->date("Y-m-d") ?></td>
        <td><?php echo $event->partner() ?></td>
        <td><?php echo $event->title() ?></td>
        <td><?php echo $event->work_package() ?></td>
        <td><a href="<?php echo "/panel/pages/events/" . $event->slug(). "/edit" ?>">Edit</a>&nbsp;|&nbsp;<a href="<?php echo $event->url()?>">View</a></td>
    </tr>
<?php
        }
        echo '</table>';
    } 
}
else {//redirect
    echo '<a href="/panel/pages/'.$page->uri().'/edit" class="login">Login</a>';
} ?>
