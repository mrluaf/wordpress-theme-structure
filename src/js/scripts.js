jQuery(function($) {

  // set main navigation <li> width based on <a> width, after css applies <li> max width, so that <li> is only as wide as the text yet does not exceed max width
  $('nav').find('li').each(function() {
    var navItem = $(this),
    anchor = $(navItem).find('a'),
    navItemH = $(navItem).height(),
    anchorW = $(anchor).width(),
    anchorH = $(anchor).height();

    $(navItem).css({ 'width': anchorW + 2 });
    $(anchor).css({ 'top': (navItemH - anchorH) / 2 });
  });

});
