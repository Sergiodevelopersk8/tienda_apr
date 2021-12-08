
 $('li.dropdown').click(function() { $(this).find('ul').slideToggle('slow'); }); 

 
  $('li.dropdown').click(function() { $(this).nextUntil('li.dropdown').slideToggle('slow'); });