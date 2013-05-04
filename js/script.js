var menuModifier = function(currentMenu) {
if (currentMenu===null)
	currentMenu = 1;

var activeMenu = $('#menu'+currentMenu);

activeMenu.removeAttr('href').addClass('navUlDown');

};

//LOCATION: q/home/