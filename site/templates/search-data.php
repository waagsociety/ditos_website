<?php 
$user = $site->user();
$data = null;

if(r::is('POST')) $data = get();

if($user)
{
    $events = $site->children()->get('events')->children()->filterBy('template', 'event-item');
    $partners = $site->children()->get('about')->children()->get('about/partners')->children();//->get('parners')->filterBy('template','partner-item');
?>

<br><br>
<form id="filters" method="post">

<!-- filters -->
Partner: <select name="partner">
    <option selected value="">All Partners</option>


<?php foreach($partners as $item): ?>
      <?php if(!$item) continue ?>
      <option<?php e(isset($data['partner']) && $data['partner'] == $item->title(), ' selected') ?> value="<?= $item->title() ?>"><?= $item->title() ?></option>
    <?php endforeach ?>


</select>
<br><br>
Date:&nbsp;&nbsp;&nbsp;<input name="date" value="<?php e(isset($data), $data['date']) ?>"> (YYYY-MM-DD) e.g. for everying in may 2018 use 2018-05.
</input>
<br><br>
Title:&nbsp;&nbsp;&nbsp;<input name="title" value="<?php e(isset($data), $data['title']) ?>">
</input>
<br><br>
Name:&nbsp;<input name="name" value="<?php e(isset($data), $data['name']) ?>"> (Name of event as described in DoA)
</input>
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

        $nr_of_results = count($events);
        echo 'count: ' . $nr_of_results;;

        echo '<table cellspacing="10"><tr><th>name</th><th>date</th><th>partner</th><th>title</th><th>Actions</th></tr>';
        foreach($events as $event)
        {
?>
    <tr>
        <td><?php echo $event->event_name() ?></td>
        <td><?php echo $event->date("Y-m-d") ?></td>
        <td><?php echo $event->partner() ?></td>
        <td><?php echo $event->title() ?></td>
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
