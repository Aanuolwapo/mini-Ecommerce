<div class="contentpanel">
         <div class="panel-heading">
          <p>Prouldly Coded by <a href="http://koderia.ng/" target="_blank">koderia</a></p>
        </div>
</div><!-- contentpanel -->
  
</section>

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script src="js/toggles.min.js"></script>
<script src="js/retina.min.js"></script>
<script src="js/jquery.cookies.js"></script>

<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/holder.js"></script>
<script src="js/wysihtml5-0.3.0.min.js"></script>
<script src="js/bootstrap-wysihtml5.js"></script>
<script src="js/ckeditor/ckeditor.js"></script>
<script src="js/ckeditor/adapters/jquery.js"></script>
<script src="js/flot/jquery.flot.min.js"></script>
<script src="js/flot/jquery.flot.resize.min.js"></script>
<script src="js/flot/jquery.flot.spline.min.js"></script>
<script src="js/morris.min.js"></script>
<script src="js/raphael-2.1.0.min.js"></script>
<script src="js/bootstrap-wizard.min.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/dropzone.min.js"></script>
<script src="js/colorpicker.js"></script>
<script src="js/jquery.autogrow-textarea.js"></script>
<script src="js/bootstrap-timepicker.min.js"></script>
<script src="js/jquery.maskedinput.min.js"></script>
<script src="js/jquery.tagsinput.min.js"></script>
<script src="js/jquery.mousewheel.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

<script src="js/custom.js"></script>
<script type="application/javascript">

$('#uploadType1').on('change', function(){
    var selection = $(this).val();
    switch(selection){
        case "upload":
        $("#upload1").show()
    break;
        default:
        $("#upload1").hide()
    }
});
$('#uploadType2').on('change', function(){
    var selection = $(this).val();
    switch(selection){
        case "upload":
        $("#upload2").show()
    break;
        default:
        $("#upload2").hide()
    }
});
$('#uploadType3').on('change', function(){
    var selection = $(this).val();
    switch(selection){
        case "upload":
        $("#upload3").show()
    break;
        default:
        $("#upload3").hide()
    }
});

$('#uploadType1').on('change', function(){
    var selection = $(this).val();
    switch(selection){
        case "url":
        $("#url1").show()
    break;
        default:
        $("#url1").hide()
    }
});
$('#uploadType2').on('change', function(){
    var selection = $(this).val();
    switch(selection){
        case "url":
        $("#url2").show()
    break;
        default:
        $("#url2").hide()
    }
});
$('#uploadType3').on('change', function(){
    var selection = $(this).val();
    switch(selection){
        case "url":
        $("#url3").show()
    break;
        default:
        $("#url3").hide()
    }
});
    
$('#uploadType1').on('change', function(){
    var selection = $(this).val();
    switch(selection){
        case "none":
        $("#none1").show()
    break;
        default:
        $("#none1").hide()
    }
});
$('#uploadType2').on('change', function(){
    var selection = $(this).val();
    switch(selection){
        case "none":
        $("#none2").show()
    break;
        default:
        $("#none2").hide()
    }
});
$('#uploadType3').on('change', function(){
    var selection = $(this).val();
    switch(selection){
        case "none":
        $("#none3").show()
    break;
        default:
        $("#none3").hide()
    }
});
$('#uploadfile').on('change', function(){
    var selection = $(this).val();
    switch(selection){
        case "upload":
        $("#file_upload").show()
    break;
        default:
        $("#file_upload").hide()
    }
});
$('#uploadfile').on('change', function(){
    var selection = $(this).val();
    switch(selection){
        case "url":
        $("#file_url").show()
    break;
        default:
        $("#file_url").hide()
    }
});
$('#ads').on('change', function(){
    var selection = $(this).val();
    switch(selection){
        case "upload":
        $("#file_upload").show()
    break;
        default:
        $("#file_upload").hide()
    }
});
$('#ads').on('change', function(){
    var selection = $(this).val();
    switch(selection){
        case "url":
        $("#file_url").show()
    break;
        default:
        $("#file_url").hide()
    }
}); 
</script>
<script>
jQuery(document).ready(function(){
    
    "use strict";
    jQuery("a[data-rel^='prettyPhoto']").prettyPhoto();

//Check
        jQuery('.ckbox input').click(function(){
            var t = jQuery(this);
            if(t.is(':checked')){
                t.closest('tr').addClass('selected');
            } else {
                t.closest('tr').removeClass('selected');
            }
        });
        
        // Star
        jQuery('.star').click(function(){
            if(!jQuery(this).hasClass('star-checked')) {
                jQuery(this).addClass('star-checked');
            }
            else
                jQuery(this).removeClass('star-checked');
            return false;
        });
    
// HTML5 WYSIWYG Editor
  jQuery('#wysiwyg').wysihtml5({color: true,html:true});
  
  // CKEditor
  jQuery('#ckeditor').ckeditor();
  
  jQuery('#inlineedit1, #inlineedit2').ckeditor();
  
  // Uncomment the following code to test the "Timeout Loading Method".
  // CKEDITOR.loadFullCoreTimeout = 5;

  window.onload = function() {
  // Listen to the double click event.
  if ( window.addEventListener )
	document.body.addEventListener( 'dblclick', onDoubleClick, false );
  else if ( window.attachEvent )
	document.body.attachEvent( 'ondblclick', onDoubleClick );
  };

  function onDoubleClick( ev ) {
	// Get the element which fired the event. This is not necessarily the
	// element to which the event has been attached.
	var element = ev.target || ev.srcElement;

	// Find out the div that holds this element.
	var name;

	do {
		element = element.parentNode;
	}
	while ( element && ( name = element.nodeName.toLowerCase() ) &&
		( name != 'div' || element.className.indexOf( 'editable' ) == -1 ) && name != 'body' );

	if ( name == 'div' && element.className.indexOf( 'editable' ) != -1 )
		replaceDiv( element );
	}

	var editor;

	function replaceDiv( div ) {
		if ( editor )
			editor.destroy();
		editor = CKEDITOR.replace( div );
	}
    
    // Tags Input
  jQuery('#tags').tagsInput({width:'auto'});
  
  // Select2
  jQuery(".select2").select2({
    width: '100%'
  });
   
  // Textarea Autogrow
  jQuery('#autoResizeTA').autogrow();
  
  // Color Picker
  if(jQuery('#colorpicker').length > 0) {
	 jQuery('#colorSelector').ColorPicker({
			onShow: function (colpkr) {
				jQuery(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				jQuery(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				jQuery('#colorSelector span').css('backgroundColor', '#' + hex);
				jQuery('#colorpicker').val('#'+hex);
			}
	 });
  }
  
  // Color Picker Flat Mode
	jQuery('#colorpickerholder').ColorPicker({
		flat: true,
		onChange: function (hsb, hex, rgb) {
			jQuery('#colorpicker3').val('#'+hex);
		}
	});
   
  // Date Picker
  jQuery('#datepicker').datepicker();
  
  jQuery('#datepicker-inline').datepicker();
  
  jQuery('#datepicker-multiple').datepicker({
    numberOfMonths: 3,
    showButtonPanel: true
  });
  
  // Spinner
  var spinner = jQuery('#spinner').spinner();
  spinner.spinner('value', 0);
  
  // Input Masks
  jQuery("#date").mask("99/99/9999");
  jQuery("#phone").mask("(999) 999-9999");
  jQuery("#ssn").mask("999-99-9999");
  
  // Time Picker
  jQuery('#timepicker').timepicker({defaultTIme: false});
  jQuery('#timepicker2').timepicker({showMeridian: false});
  jQuery('#timepicker3').timepicker({minuteStep: 15});


});
</script>
</body>
</html>
