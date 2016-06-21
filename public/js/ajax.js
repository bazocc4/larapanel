var instance = '';
var delayCloseWindow = 2000; // delay for closing window popup (in ms) !!
var windowObjectReference = [];

function string_unslug(str)
{
	var temp = str.split('_');
	for(key in temp)
	{
		temp[key] = temp[key].substr(0,1).toUpperCase() + temp[key].substr(1);
	}
	return temp.join(" ");
}

function lang_unslug(str)
{
	var temp = str.split('_');
	var result = temp[0].toUpperCase()+' - '+temp[1].substr(0,1).toUpperCase()+temp[1].substr(1);
	return result;
}
function show_confirm(message , url)
{
	var r=confirm(message);
	if (r==true)
	{
		window.location = site+url;
	}
}
function changeLocation(url)
{
	window.location = site+url;
}

function deleteChildPic(myobj)
{	
	$(myobj).parents("div.photo").animate({opacity : 0 , width : 0, marginRight : 0},1000,function(){
		var pictureWrapper = $(this).closest('.inner-content.pictures');
		$(this).detach();

		// update total pictures...
		pictureWrapper.prevAll('.galleryCount:first').find('span').html( pictureWrapper.find('div.photo').length );
	});
}

function openRequestedSinglePopup(strUrl , targetName) 
{
    if(window.name.length > 0)  targetName = window.name;
    else if(targetName == null) targetName = "SingleSecondaryWindowName";
    
    var i = 1;
    while($.inArray(targetName+i, windowObjectReference) >= 0)  ++i;
    
    targetName += i;
    windowObjectReference.push(targetName);
    window.open(strUrl,targetName, "toolbar=yes,resizable=yes,scrollbars=yes,status=yes").focus();
}

(function($) {
    // Get URL parameters using jQuery ...
    // http://www.sitepoint.com/url-parameters-jquery/
    /*
        // example.com?param1=name&param2=&id=6
        $.urlParam('param1'); // name
        $.urlParam('id');        // 6
        $.urlParam('param2');   // null
    */
    $.fn.urlParam = function(name , url){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(url);
        if (results==null){
           return null;
        }
        else{
           return results[1] || 0;
        }
    }
    
	$.fn.checkNumeric = function(e){
		// Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return true;
        }

        // Ensure that it is a number and stop the keypress
        return !((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105));
	}
	
	$.fn.isOnScreen = function(){
	    var win = $(window);
	    
	    var viewport = {
	        top : win.scrollTop(),
	        left : win.scrollLeft()
	    };
	    viewport.right = viewport.left + win.width();
	    viewport.bottom = viewport.top + win.height();
	    
	    var bounds = this.offset();
	    bounds.right = bounds.left + this.outerWidth();
	    bounds.bottom = bounds.top + this.outerHeight();
	    
	    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
	};
    
    /*
    Top down scrollbar in html table
    ================================
    You could create a new dummy element above the real one, with the same amount of content width to get an extra scrollbar, then tie the scrollbars together with onscroll events.
    */    
    $.fn.doubleScroll = function(targetClass){        
        var scrollClass = 'double-scroll-top';
        var element = document.getElementsByClassName(targetClass)[0];        
        if(element.scrollWidth > element.offsetWidth )
        {
            // drop old scrollbars first if exist ...
            if($('div.'+targetClass).prev('div.'+scrollClass).length > 0)
            {
                $('div.'+targetClass).prev('div.'+scrollClass).detach();
            }
            
            var scrollbar= document.createElement('div');
            scrollbar.appendChild(document.createElement('div'));
            scrollbar.className = scrollClass;
            scrollbar.style.overflow= 'auto';
            scrollbar.style.overflowY= 'hidden';
            scrollbar.firstChild.style.width= element.scrollWidth+'px';
            scrollbar.firstChild.style.height= '1px';
            scrollbar.firstChild.appendChild(document.createTextNode('\xA0'));
            scrollbar.onscroll= function() {
                element.scrollLeft= scrollbar.scrollLeft;
            };
            element.onscroll= function() {
                scrollbar.scrollLeft= element.scrollLeft;
            };
            element.parentNode.insertBefore(scrollbar, element);
        }
    }
    
    /* ENABLE / DISABLE ATTACH BUTTON ON POPUP */
    $.fn.updateAttachButton = function(){
        $('input#check-all').attr('checked', ($('input.check-record:not(:checked)').length?false:true) );
		if($('#attach-checked-data').length > 0)
		{
            var checked_data = $('#checked-data').val();
            var total_checked = checked_data.split(',').length - 2;
            
			if(total_checked > 0)    $('#attach-checked-data').removeClass('disabled');
			else                     $('#attach-checked-data').addClass('disabled');	
		}
	}
	
	$.fn.fixedHeaderTable = function(header_class){
		if ( $('table.fixed_body_scroll').length ) {
            var fixed_header_table=$( '<table aria-hidden="true" class="fixed_header_table table list" style="border-left: 1px solid #DDDDDD;border-right: 1px solid #DDDDDD;border-top: 1px solid #DDDDDD;margin-bottom:0px;overflow-x:hidden;"><thead><tr><th></th></tr></thead></table>' );
            var scroll_div='<div class="fixed_body_scroll '+header_class+'"></div>';
                
            //inject table that will hold stationary row header; inject the div that will get scrolled
            $('table.fixed_body_scroll').before( fixed_header_table ).before( scroll_div );
            
            $('table.fixed_body_scroll').each(function (index) {
                //to minimize FUOC, I like to set the relevant variables before manipulating the DOM
                var columnWidths = [];
                var $targetDataTable=$(this);
                var $targetHeaderTable=$("table.fixed_header_table").eq(index);
                var $targetDataTableFooter=$targetDataTable.find('tfoot');
                
                // Get column widths
                $($targetDataTable).find('thead tr th').each(function (index) {
                    columnWidths[index] = $(this).width();
                });
                
                //place target table inside of relevant scrollable div (using jQuery eq() and index)
                $('div.fixed_body_scroll').eq(index).prepend( $targetDataTable );
                
                // hide original caption, header, and footer from sighted users
                $($targetDataTable).children('caption, thead, tfoot').hide();
                
                // insert header data into static table
                $($targetHeaderTable).find('thead').replaceWith( $( $targetDataTable ).children('caption, thead').clone().show() );
                
                // modify column width for header
                $($targetHeaderTable).find('thead tr th').each(function (index) {
                    $(this).css('width', columnWidths[index]);
                });
                
                // make sure table data still lines up correctly
                $($targetDataTable).find('tbody tr:first td').each(function (index) {
                    $(this).css('width', columnWidths[index]);
                });
                
                //if our target table has a footer, create a visual copy of it after the scrollable div
                if ( $targetDataTableFooter.length ) {
                     $('div.fixed_body_scroll').eq(index).after('<div class="table_footer">'+ $targetDataTableFooter.text() +'</div>');
                }
            });
        }
	}
	
	$.fn.parseTime = function(s){
		var c = s.split(':');
   		return parseInt(c[0],10) * 60 + parseInt(c[1],10);
	}
    
    $.fn.customParseDate = function(dateObj){
        var d = new Date(dateObj);
        var day = d.getDate();
        var month = d.getMonth() + 1;
        var year = d.getFullYear();

        if (month < 10) {
            month = "0" + month;
        }
        if (day < 10) {
            day = "0" + day;
        }
        return month + "/" + day + "/" + year;
    }
	
	$.fn.convertDate = function(phpDate){
        var t = phpDate.split(/[\/ :]/);
        var result = new Date(t[2] , t[0] , t[1] , t[3] , t[4]);
        return result;
    }

    $.fn.refresh_ckeditor = function(){
    	if($('textarea.ckeditor').length > 0)
    	{
    		// delete old instance first !!
			var instances = CKEDITOR.instances;
			for (var z in instances) 
			{
				if(CKEDITOR.instances[z])
				{				
					delete CKEDITOR.instances[z];
				}
			}
			
			// transform textarea to be ckeditor again !!
			$('textarea.ckeditor').ckeditor();
    	}
	}
	
	$.fn.slug = function(src){
		var result = src.replace(/\s/g,'-').replace(/[^a-zA-Z0-9\-]/g,'-').toLowerCase();
		return result;
	}
	
	$.fn.editSlug = function(id){		
		if($('a#edit_slug').html() == 'Edit Slug')
		{
			var tempText = $('p#slug_source').html();
			$('a#edit_slug').html('Save Slug');						
			$('input[type=text]#slug_value').val(tempText.substring(tempText.lastIndexOf('/')+1));
			$('input[type=text]#slug_value').show();
			$('p#slug_source').html(tempText.substring(0 , tempText.lastIndexOf('/') + 1));
		}
		else
		{			
			$.ajaxSetup({cache: false});
			$.post(site+'entries/update_slug',{
				id: id,
				slug: $('input[type=text]#slug_value').val()
			},function(slug){
				$('a#edit_slug').html('Edit Slug');
				$('input[type=text]#slug_value').hide();
				$('p#slug_source').html($('p#slug_source').html() + slug);
			});
		}
	}

	$.fn.removePicture = function(myImageId , crop)
	{	
		// for remove cover image embedded in title area...
		if(myImageId == null)
		{
			$('img#mySelectCoverAlbum').attr('src' , site+'img/upload/thumb/0.jpg');
			$('input[type=hidden]'+($('input[type=hidden]#mySelectCoverId').length > 0?'#':'.')+'mySelectCoverId').attr('value','0');
			$('.select').html('Select Cover').show();
			$('.remove').hide();
		}
		else // for remove cover book image...
		{
			if(crop == 2)
			{
				jcrop_api[myImageId].setImage(site+'img/upload/0.jpg');
				$("div#imageinfo_"+myImageId).hide();
			}
			else
			{
				$('img#myEditCoverImage_'+myImageId).attr('src' , site+'img/upload/thumb/0.jpg');
			}
			$('input[type=hidden]#myEditCoverId_'+myImageId).attr('value' , '0');
		}
	}

	$.fn.updateChildPic = function(imgId , imgType , imgName , crop){
		// for cover book image...		
		if($('input#mycaller').val().indexOf('myEditCoverImage') == 0)
		{	
			var temp = $('input#mycaller').val().split('_');
			var myImageId = temp[temp.length-1];
			
			if(crop == 2)
			{
				jcrop_api[myImageId].setImage(site+'img/upload/'+imgId+'.'+imgType);
				$("div#imageinfo_"+myImageId).show();
			}
			else
			{
				$('img#myEditCoverImage_'+myImageId).attr('src',site+'img/upload/thumb/'+imgId+'.'+imgType);
			}
			$('input#myEditCoverId_'+myImageId).attr('value',imgId);
		}
		// for cover image embedded in title area...
		else if($('input#mycaller').val() == 'mySelectCoverAlbum')
		{
			$('img#mySelectCoverAlbum').attr('src',site+'img/upload/thumb/'+imgId+'.'+imgType);
			$('input[type=hidden]'+($('input[type=hidden]#mySelectCoverId').length > 0?'#':'.')+'mySelectCoverId').attr('value',imgId);
			
			var tes = $('.select').html();
			if (tes == 'Select Cover')
			{
				$('.select').html('Change Cover');
				$('.remove').show();
			}
		}
		// for album picture details
		else if($('input#mycaller').val() == 'myPictureWrapper' || $('input#mycaller').val() == 'myInputWrapper' )
		{
			var fullkey; // picture wrapper identifier ...
			if($('input#mycaller').val() == 'myPictureWrapper')
			{
				fullkey = $('input#mycaller').val();
				$('div#'+fullkey).prepend('<div class="photo"><div class="image"><img style="width:150px" title="'+imgName+'" alt="'+imgName+'" src="'+site+'img/upload/thumb/'+imgId+'.'+imgType+'" /></div><div class="description"><p>'+imgName+'</p><a href="javascript:void(0)" onclick="deleteChildPic(this);" class="icon-remove icon-white"></a></div><input type="hidden" value="'+imgId+'" name="data[Entry][image][]" /></div>');
			}
			else // input type gallery...
			{
				fullkey = $('input#mediaTypeSlug').val();
				$('div#'+fullkey).prepend('<div class="photo"><div class="image"><img style="width:150px" title="'+imgName+'" alt="'+imgName+'" src="'+site+'img/upload/thumb/'+imgId+'.'+imgType+'" /></div><div class="description"><p>'+imgName+'</p><a href="javascript:void(0)" onclick="deleteChildPic(this);" class="icon-remove icon-white"></a></div><input type="hidden" value="'+imgId+'" name="data[Entry][fieldimage]['+fullkey+'][]" /></div>');
			}

			// update total pictures...
			$('div#'+fullkey).prevAll('.galleryCount:first').find('span').html( $('div#'+fullkey).find('div.photo').length );
		}
		// for CK Editor
		else if($('input#mycaller').val() == 'ckeditor')
		{
			var imgsrc = linkpath+'img/upload/'+imgId+'.'+imgType;			
			window.opener.CKEDITOR.tools.callFunction( $('input#CKEditorFuncNum').val() , imgsrc , function(){
			  // Get the reference to a dialog window.
			  var element, dialog = this.getDialog();
			  // Check if this is the Image dialog window.
			  if (dialog.getName() == 'image') {
			    // Get the reference to a text field that holds the "alt" attribute.
			    element = dialog.getContentElement( 'info', 'txtAlt' );
			    // Assign the new value.
			    if ( element )
			      element.setValue( imgName );
			  }
			});
			window.close();
		}

		$.colorbox.close();
		$("a#upload").removeClass("active");
				
		if($('input#mycaller').val() == 'refresh')
		{
			$.ajaxSetup({cache: false});
			$.post(site+$('input[type=hidden]#targetAjax').val(),{
				imgId: imgId,
				imgName: imgName,
				parentId: $('input[type=hidden]#parentId').val()
			},function(){
				window.location = site + $('input[type=hidden]#targetLocation').val() + '/' + $('input[type=hidden]#parentId').val();
			});
		}
	}
	
	$.fn.my_ckeditor = function (){
		// inject media URL to ckeditor config >>
		var mediaURL = site+'entries/media_popup_single/1/ckeditor/'+$('input#myTypeSlug').val();
		CKEDITOR.config.filebrowserBrowseUrl = mediaURL;
		CKEDITOR.config.filebrowserUploadUrl = mediaURL;
		CKEDITOR.config.filebrowserImageBrowseUrl = mediaURL;
		CKEDITOR.config.filebrowserImageUploadUrl = mediaURL;

		CKEDITOR.on('instanceReady', function (event) {		
			// update sidebar line css, if ckeditor existed ...
			var content_height = $('.content').height();
			var sidebar_height = $('.sidebar').height();
			if(sidebar_height < content_height){
				$('.sidebar').css('height', content_height-180);
			}

			// give warning from leaving page accidentally
			var instances = CKEDITOR.instances;
			for (var z in instances) {
				CKEDITOR.instances[z].on('saveSnapshot', function(){
					window.onbeforeunload=function()
					{
			             return 'You have unsaved changes. Are you sure you want to leave this page?';
			        };
				});
			}
		});
	}
	
	$.fn.del_param_lang = function(src){
		var temp = src.indexOf('lang=');
		if(temp == -1)
		{
			return src;
		}
		else
		{
			var temp2 = src.substr(temp);			
			var temp3 = temp2.indexOf('&');			
			if(temp3 == -1)
			{
				return src.substring(0,temp-1); 
			}
			else
			{
				return src.substring(0,temp) + temp2.substr(temp3+1);
			}
		}
	}
    
    $.fn.ajax_mylink = function(container){
        var $ajax_con = $(container);
        var spinner = '<div class="loading" style="height:'+$ajax_con.height()+'px"></div>';
        var url = $(this).attr('href');

        $.ajaxSetup({cache: false});
        $ajax_con.html(spinner).load(url, function( response, status, xhr ){

            if(status == "error")
            {
                $ajax_con.html("<h2 style='height:200px;' class='alert alert-danger'>Sorry, but there was an error: " + xhr.status + " " + xhr.statusText + ".<br><br>Please refresh this page and try again.</h2>");
                return false;
            }

            history.pushState(null, '', url);
        });
    }
    
	$(document).ready(function(){
	    
        // call CK editor script...
		if($('textarea.ckeditor').length)
		{			
			$.fn.my_ckeditor();
		}
        
        $(document).on('click', '.dataTables_paginate.paging_simple_numbers ul.pagination li a, table.list th > a', function(e){                
            e.preventDefault();
            
            if($(this).data('toggle') == 'tooltip')
            {
                $(this).tooltip('destroy');
            }
            
            $(this).ajax_mylink('div.panel-body.panel-body-table');
        });
        
	});
})(jQuery);