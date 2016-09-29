<?php
return function($site, $pages, $page) {

  $query   = get('q');
  $results = $site->index()->visible()->search($query, 'title|text');
  $results = $results->paginate(20);

  return array(
    'query'      => $query,
    'results'    => $results,
    'pagination' => $results->pagination()
  );
};
?>
