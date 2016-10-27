# Frontend usage

You need to call a function in your template / snippet / pattern to make it work.

**In my `header.php` I do like this:**

When using this example it will output the HTML as well.

```html
<?php seo('title'); ?>
<?php seo('description'); ?>
```

Output:

```html
<title>Some title</title>
<meta name="description" content="Some description">
```

When using this example it will return the value.

Because you return it and therefor want to control it, it does not wrap it in HTML. If you want HTML, warp it yourself or create a snippet / pattern for it.

```html
<?php echo seo('title', array(), true); ?>
<?php echo seo('description', array(), true); ?>
```

Output:

```html
Some title Some description
```