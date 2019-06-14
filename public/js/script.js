// SideNav Button Initialization
$(".button-collapse").sideNav();
// SideNav Scrollbar Initialization
var sideNavScrollbar = document.querySelector('.custom-scrollbar');
Ps.initialize(sideNavScrollbar);

$(function () {
	$('.material-tooltip-main').tooltip({
		template: '<div class="tooltip md-tooltip-main"><div class="tooltip-arrow md-arrow"></div><div class="tooltip-inner md-inner-main"></div></div>'
	});
})

// video modal
$('#modal1').on('hidden.bs.modal', function (e) {
	// do something...
	$('#modal1 iframe').attr("src", $("#modal1 iframe").attr("src"));
});

// MDB Lightbox Init
$(function () {
	$("#mdb-lightbox-ui").load("../mdb-addons/mdb-lightbox-ui.html");
});

// popovers Initialization
$(function () {
	$('[data-toggle="popover"]').popover()
})