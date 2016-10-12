<?php $tmpDate = getdate(0) ?>
<?php $currentDate = getdate() ?>

<table class="calendar">
<?php if (!$calendar->getAllEvents()): ?>

	<tr>
		<td><?php echo l::get('calendar-no-entry'); ?></td>
	</tr>

<?php else: ?>

	<thead>
		<tr>
			<th><?php echo l::get('date'); ?></th>
			<?php foreach ($fields as $field): ?>
			<th><?php echo $field ?></th>
			<?php endforeach ?>
		</tr>
	</thead>

	<tbody>
	<?php foreach ($calendar->getAllEvents() as $event): ?>
	<?php	// beginDate
		$date = $event->getBeginDate();
		$timestamp = $date[0];
		$datetime = date('Y-m-d H:i:s', $timestamp);
		$monthDay = $date['mday'];
		$month = $date['mon'];
		$year = $date['year'];
	?>
	<?php // print_r($date) ?>

		<?php if ($tmpDate['mon'] < $month || $tmpDate['year'] < $year): ?>
		<?php $monthHasPast = ($month < $currentDate['mon'] || $year < $currentDate['year']) ?>
		<tr class="<?php e($monthHasPast, 'past ') ?>month">
			<td colspan="<?php echo count($fields)+1; ?>">
				Month/Year: <?php echo strftime(l::get('calendar-month-format'), $date[0]); ?>
			</td>
		</tr>
		<?php endif ?>

		<tr class="<?php e($event->isPast(), 'past '); ?>event">
			
			<td class="_calendar-month">
			 	
			 	<time datetime="<?php echo $datetime ?>"><?php echo $monthDay ?></time>

				<?php if ($event->hasEnd()) : ?>
				<?php $endDate = $event->getEndDate() ?>
				&ndash; 
				<time datetime="<?php echo date('Y-m-d H:i:s', $endDate[0]) ?>"><?php echo $endDate['mday']; ?></time>
				<?php endif ?>

			</td>

			<?php foreach ($fields as $key => $value): ?>
			<td><?php echo $event->getField($key) ?></td>
			<?php endforeach ?>

		</tr>

	<?php $tmpDate = $date; ?>
	<?php endforeach ?>
	</tbody>

<?php endif ?>
</table>