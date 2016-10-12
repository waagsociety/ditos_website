<?php if(!defined('KIRBY')) exit ?>

title: Calendar
pages: false
fields:
	title:
		label: Title
		type:  text
	calendar:
		label: Calendar
		type: structure
		entry: >
			<strong>{{summary}}</strong><br>
			{{description}}<br>
			Beginning: {{_begin_date}} {{_begin_time}}<br>
			End: {{_end_date}} {{_end_time}}
		fields:
			summary:
				label: Title
				type: text
			description:
				label: Description
				type: textarea
				size: small
			_begin_date:
				label: Start date
				type: date
				format: MM/DD/YYYY
				width: 1/2
			_begin_time:
				label: Start time
				type: time
				interval: 15
				width: 1/2
			_end_date:
				label: End date
				type: date
				format: MM/DD/YYYY
				width: 1/2
			_end_time:
				label: End time
				type: time
				interval: 15
				width: 1/2
			location:
    		label: Event location (you can drag the marker)
    		type: geolocation