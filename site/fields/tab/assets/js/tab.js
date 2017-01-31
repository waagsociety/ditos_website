if(typeof activeTab === 'undefined') {
  activeTab = 1;
}

$.fn.tabfield = function() {
  set_tabs();
};

function set_tabs() {

  if($('.field-with-tab-title').length && !$('ul.tab-nav').length) {
  $tabnav = $('<ul>').addClass('tab-nav');

    $('.field-with-tab-title').each(function(i) {
      var icon = $(this).find('.tab-title').data('tab-icon');
      var id = $(this).find('.tab-title').data('tab-id');
      var title = $(this).find('.tab-title').text();
      var $navitem = $('<li>').addClass('tab-link').attr('tabindex',i+1).data('tab-id',id).html('<i class="fa fa-'+icon+'"></i> '+title);

      $navitem.appendTo($tabnav);

      $(this).nextUntil('.field-with-tab-title').wrapAll($('<div>').addClass('tab').attr('id',id).data('tab-id',id));

      $(this).remove();
    });

  $('.mainbar .section form fieldset.field-grid').prepend($tabnav);

  $('header.topbar a').bind('click focus', function() {
    activeTab = 1;
    console.log('[tab] active cleared');
  });

  $('.tab-link').bind('click focus', function() {
    $('.tab-link').removeClass('active');
    $(this).addClass('active');
    $('.tab').removeClass('active');
    $('#' + $(this).data('tab-id')).addClass('active');

    activeTab = $(this).attr('tabindex');
    console.log('[tab] click - active #'+activeTab);
  });

    setTimeout(function() {

      $('div.tab').each(function(i) {
        $(this).addClass('fired');
      });

      console.log('[tab] fired');

      $('.tab-link:eq('+(activeTab-1)+')').trigger('focus');
      console.log('[tab] load - active #'+activeTab);

    }, 50);

  }
}