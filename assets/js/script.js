var dpaApp = function () {
    return {
        validateForm: function($form) {
            let _app = this,
            regexEmail =
              /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/,
            $focus = null,
            $valid = true;

            $form.find(".required").each(function () {
                let $field = $(this),
                  $input = $field.find("input, select, textarea");  
                if ($field.hasClass("required")) {
                  if ($input.val() == "") {
                    $field.addClass("h23_error");
                    $field.append(
                      '<span class="h23_message">' + $field.data("message") + "</span>"
                    );
                    $valid = false;
                    if ($focus == null) $focus = $input;
                  }
                }
                if (
                  $input.val() != "" &&
                  $field.hasClass("email") &&
                  !regexEmail.test($input.val())
                ) {
                  $field.addClass("h23_error");
                  $field.append(
                    '<span class="h23_message">Enter a valid email address (eg: yourname@domain.com)</span>'
                  );
                  $valid = false;
                  if ($focus == null) $focus = $input;
                }
            });
            if ($focus != null) {
                $focus.focus();
                // _app.scrollToOpenStep($focus);
            }
            return $valid; 
        },
        
        validatePopup: function() {
            let _app = this,
	            regexEmail = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	        
            
            $(document).on("focus", '.h23_error input', function () {
                let $me = $(this),
                  $fieldset = $me.closest("fieldset");
                $errorMsg = $fieldset.find(".h23_message");
                $fieldset.removeClass("h23_error");
                $errorMsg.remove();
            });

            $(document).on("change", '.h23_error select', function () {
                let $me = $(this),
                  $fieldset = $me.closest("fieldset");
                $errorMsg = $fieldset.find(".h23_message");
                $fieldset.removeClass("h23_error");
                $errorMsg.remove();
            });
            
	       // $(document).on('keyup', 'input[type="text"], textarea, input[type="email"]', function() {
	       //     let $me = $(this),
	       //         $field = $me.closest('.input-box');
	       //     $field.removeClass('error');
	       // });

        	$("body").on("keyup blur", ".num", function() {
                if (/\D/g.test(this.value)) 
        			this.value = this.value.replace(/\D/g, ''); 
            });

    // window.dataLayer = window.dataLayer || [];
    // function gtag() {
    //     dataLayer.push(arguments);
    // }

            
            $(document).on('click', '.btn_action', function() {
                let $me = $(this), $err = false, 
	                data = new FormData(),
	                $form = $me.closest('form'),
	                $act = $me.data('action'),
	                $container = $('#popupWin'),
	                $valid = true;
	           // console.log($me.data('id'));
	            $valid = _app.validateForm($form);
                // ga('send', 'pageview', window.location.pathname);
                // gtag('event', 'click', {
                //   'event_category': 'action_book_now',
                //   'event_label': window.location.pathname
                // });

                window.dataLayer.push(function() {
                  this.set('book_form_action', window.location.pathname);
                });

	            console.log($valid);
	            if ($valid) {
                    data.append("action", $act);
                    data.append("id", $me.data("id"));
                    $form.find("fieldset").each(function () {
                        let $field = $(this), $input = $field.find('.input');
                        // console.log($input.data('id') + '/' + $input.attr('id'));
                        if (typeof $input.data('id') != 'undefined') {
                            data.append($input.data('id'), $input.val());
                        }
                    });
                    // console.log(data);
                    $me.addClass("is-loading");
                    $.ajax({
                        url: web_url + "/assets/ajax/",
                		enctype: 'multipart/form-data', 
                        processData: false, 
                        contentType: false,
                        type: "post",
                        data: data,
                        async: true 
                    }).done(function (response, textStatus, jqXHR) {  
                        var jsonData = JSON.parse(response);
                        if (jsonData.result == "success") { 
                            $container.html(jsonData.html);
                            switch($act) {
                                case 'book_form': 
                                    $("#dpa_tour_date").datepicker({minDate : 0});
                                    break;
                            }
                             
                            $.magnificPopup.open({
                                items: {
                                    src: $container,
                                    type: 'inline',
                                    closeOnBgClick: false
                                }
                            }); 
                            if ($form.length > 0) $form[0].reset();
                        } else {
                            $container.find(".d5_message").html(jsonData.html);
                        }
                        $me.removeClass("is-loading");
                    }); 
	            }
	           // $.magnificPopup.open({ items: { src: '<div class="message">' + $me.data('id') + '</div>', type: 'inline' } }); 
            });

            $(document).on('click', '.btn_aaction', function() {
                let $me = $(this), $err = false, 
                    data = new FormData(),
                    $form = $me.closest('form'),
                    $act = $me.data('action'), $row = $me.closest('tr');
                data.append("action", $act);
                data.append("id", $me.data("id"));
                $.ajax({
                    url: web_url + "/assets/ajax/",
                    enctype: 'multipart/form-data', 
                    processData: false, 
                    contentType: false,
                    type: "post",
                    data: data,
                    async: true 
                }).done(function (response, textStatus, jqXHR) {  
                    var jsonData = JSON.parse(response); console.log(response);
                    if (jsonData.result == "success") { 
                        $row.remove();
                    }
                    alert(jsonData.html);
                });
            });
        },
        
        youtube: function(selector) {
            $(selector).on('click', '.mfp-youtube', function() {
                let $me = $(this);  
                $.magnificPopup.open({
                    items: {
                        src: $me.data('url'),
                        type: 'iframe',
                        closeOnBgClick: false
                    }
                }); 
            });
        },
        
        slider: function(selector) {
            if ($('.slick-slider').length > 0) {
                 $('.slick-slider').slick({
                     slidesToShow: 1,
                     slidesToScroll: 1,
                     autoplay: true,
                     
                 });
            }
        },
        
        init: function (selector) { 
      		let _app = this; 
      		_app.youtube(selector);
      		// _app.slider(selector);
      		_app.validatePopup();
      	}
    };
} ();

$(document).ready(function() {
	dpaApp.init('body'); 
});