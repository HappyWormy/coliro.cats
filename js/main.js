/*
$('#kittens').isotope({
  itemSelector: '.kitten',
  layoutMode: 'fitRows'
});
*/

// external js: isotope.pkgd.js


$(document).ready(function () {

window.addEventListener('load', function () {
	
// init Isotope
var $grid = $('#kittens').isotope({
  itemSelector: '.kitten',
  layoutMode: 'fitRows',
  getSortData: {
    kitten_name: '.kitten_name',
    kitten_birth: '.kitten_birth parseInt',
    // kitten_weight: '.kitten_weight',
    kitten_age: '.kitten_age parseInt',
    kitten_id: '.kitten_id parseInt',
    // number: '.number parseInt',
    //category: '[data-category]',
    kitten_weight: function( itemElem ) {
      var kitten_weight = $( itemElem ).find('.kitten_weight').text();
      return parseFloat( kitten_weight.replace( /[\(\)]/g, '') );
    }
  }
});

// bind sort button click
$('.sort-by-button-group').on( 'click', 'button', function() {
  var sortValue = $(this).attr('data-sort-value');

    /* Get the sorting direction: asc||desc */
    var direction = $(this).attr('data-sort-direction');

    /* convert it to a boolean */
    var isAscending = (direction == 'asc');
    var newDirection = (isAscending) ? 'desc' : 'asc';

    /* pass it to isotope */
    $grid.isotope({ sortBy: sortValue, sortAscending: isAscending });

    $(this).attr('data-sort-direction', newDirection);
  $grid.isotope({ sortBy: sortValue });
});

// change is-checked class on buttons
$('.button-group').each( function( i, buttonGroup ) {
  var $buttonGroup = $( buttonGroup );
  $buttonGroup.on( 'click', 'button', function() {
    $buttonGroup.find('.is-checked').removeClass('is-checked');
    $( this ).addClass('is-checked');
  });
});





});






});









$(function() {
	$.contextMenu({
		selector: '.kitten',
		className: 'data-title',
		callback: function(key, options) {
			var m = "clicked: " + key;
			// alert("Clicked on " + key + " on element " + options.$trigger.attr("id"));
			if (key == 'add') {
				$.featherlight('u.php?id=' + options.$trigger.attr("id"));
				// window.console && console.log(m) || alert(m);
			} else if (key == 'edit') {
				$.featherlight('edit.php?id=' + options.$trigger.attr("id"));
			} else if (key == 'delete') {
				$.featherlight('<h2>НЕТ!</h2><p>Котанов удалять низзя, они же хорошие!</p>');
				// alert("Котанов удалять низзя, они же хорошие!");
			}
		},
		items: {
			"edit": {name: "Редактировать", icon: "edit"},
			"add": {name: "Добавить котана", icon: "copy"},
			"delete": {name: "Удалить котана", icon: "delete"}
			/* "cut": {name: "Cut", icon: "cut"},
		   copy: {name: "Copy", icon: "copy"},
			"paste": {name: "Paste", icon: "paste"},
			"delete": {name: "Delete", icon: "delete"},
			"sep1": "---------", */
			/* "quit": {name: "Quit", icon: function(){
				return 'context-menu-icon context-menu-icon-quit';
			}} */
		}
	});
	
	$('.data-title').attr('data-menutitle', "Some JS Title");

	$('.kitten').on('click', function(e){
		console.log('clicked', this);
	})    
});