var menuModifier = function(currentMenu) {
if (currentMenu===null)
	currentMenu = 1;

var activeMenu = $('#menu'+currentMenu);

activeMenu.removeAttr('href');
activeMenu.css('color', '#C16600');

var activeMenuFooter = $('#menu'+currentMenu+'f');
activeMenuFooter.removeAttr('href').css('color', '#C16600');

};

//LOCATION: q/home/