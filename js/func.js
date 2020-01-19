
$(document).ready(function() {

  // FULL IMG
  var h = $(window).height();
  $(".parallax").css('height', parseInt(h+20) + 'px');
  $("html").css('visibility', 'visible');
  
  // NAV-STICK
  $(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    if (scroll >= 190) {
      $(".nav-stick").addClass('slideInUp');
      $(".nav-stick").removeClass('slideOutDown');
    } else {
      $(".nav-stick").addClass('slideOutDown');
      $(".nav-stick").removeClass('slideInUp');
    }
  });

  // Tooltips Initialization
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });
    
  // SideNav Button Initialization
  $('.button-collapse').sideNav({
    edge: 'left', // Choose the horizontal origin
    closeOnClick: false, // Closes side-nav on &lt;a&gt; clicks, useful for Angular/Meteor
    breakpoint: 1440, // Breakpoint for button collapse
    menuWidth: '400px', // Width for sidenav
    timeDurationOpen: 300, // Time duration open menu
    timeDurationClose: 200, // Time duration open menu
    timeDurationOverlayOpen: 50, // Time duration open overlay
    timeDurationOverlayClose: 200, // Time duration close overlay
    easingOpen: 'easeOutQuad', // Open animation
    easingClose: 'easeOutCubic', // Close animation
    showOverlay: true, // Display overflay
    showCloseButton: false // Append close button into siednav
  });
  new WOW().init();

  // TinyMCE Initialization
  tinymce.init({ selector:'#tinyedit', menubar: false, height : "294" });

  $(".btn_excluir").click(function () {
    var url_ajax = $(this).attr('ajax-url');
    var id = $(this).attr('idusuario');
    $.ajax({
      url: url_ajax,
      type: "POST",
      data: { idusuario : id}, 
      success: function (e) {
        var res = JSON.parse(e);
        $("#titulo_modal").text(res.titulo);
        $("#msg_modal").html(res.msg);
        $("#modal_sucesso").modal("show");
      },
			error : function(e) {
        b.removeAttr('disabled');
        alert(e);
			}
    });
  });

  // AJAX FORM
  var f = $('form');
	var b = $('.btn_submit');
	b.click(function() {
		// implement with ajaxForm Plugin
		f.ajaxForm({
			beforeSend : function() {
				b.attr('disabled', 'disabled');
      },
			success : function(e) {
        b.removeAttr('disabled');
        var res = JSON.parse(e);
        $("#titulo_modal").text(res.titulo);
        $("#msg_modal").html(res.msg);
        $("#modal_sucesso").modal("show");
			},
			error : function(e) {
        b.removeAttr('disabled');
        alert(e);
			}
		});
  });

  $('#modal_sucesso').on('hidden.bs.modal', function (e) {
    window.history.back();
  })

  $("#close_form").click(function () {
    window.history.back();
  });
});