function dispFaded(w)
{
    $(document).ready(function(){
        var closeimg='<img src="image/close.png" id="close"><br>';
        var cnt="";
        $("body").prepend("<div class='fadedtop' id='fadedtops'><div class='container1'>"+closeimg+"<div class='content1'></div></div></div>");

        $("#fadedtops #close").click(function(){
            $("#fadedtops").fadeOut("slow",function(){
                $(this).remove();
            });
        });
    });
    if(w!="")$("#fadedtops .container1").css("width",w);
}

function closeMe(node){
    alert($(node).parent("#fadedtops").attr('id'));
    $(node).parent("#fadedtops").remove();
}
function disptimetable()
{
	dispFaded("790px");
	$("#fadedtops .content1").load("diplaytimetable.php");
    $("#fadedtops").fadeIn("slow");
}
function dispAllocation()
{
	dispFaded("790px");
	$("#fadedtops .content1").load("FreeAllocation.php");
    $("#fadedtops").fadeIn("slow");
}
//start Themes
function setCookie(cname,cvalue)
{
document.cookie = cname + "=" + cvalue;
}

function getCookie(cname)
{
	var ca = document.cookie;
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++) 
  	{
  	var c = ca[i].trim();
  	if (c.indexOf(name)==0) return c.substring(name.length,c.length);
	}
return "";
}

function checkCookie()
{
	
var opt=getCookie("checked");
if (opt=="bw")
  {
  $('#bw').trigger('click');
  }
  else if (opt=="default")
  {
  $('#defaulttheme').trigger('click');
  }
  else if (opt=="bb")
  {
  $('#bb').trigger('click');
  }
else 
  {
  opt = "default";
  
    setCookie("checked","default");
    
  }
}
window.onpaint=checkCookie();
$(document).ready(function(e) {
		$("#bw").click(function(){	
	    document.getElementById('container').style.cssText='background:#990000;';
		setCookie("checked","bw");
										  });
		 $('#defaulttheme').click(function(){		
		document.getElementById('container').style.cssText='background-image:url(image/main-bg.jpg);';
		setCookie("checked","defaulttheme");
		  });
	$('#bb').click(function(){		
		document.getElementById('container').style.cssText='background:#007071;color:black;';
		setCookie("checked","bb");
	
	});
});
function setCookie(cname,cvalue)
{
document.cookie = cname + "=" + cvalue;
}
//end Themes
//font
(function($) {
	
	$.fn.defaultvalue = function() {
		
		// Scope
		var elements = this;
		var args = arguments;
		var c = 0;
		
		return(
			elements.each(function() {				
				
				// Default values within scope
				var el = $(this);
				var def = args[c++];

				el.val(def).focus(function() {
					if(el.val() == def) {
						el.val("");
					}
					el.blur(function() {
						if(el.val() == "") {
							el.val(def);
						}
					});
				});
				
			})
		);
	}
})(jQuery)
(function($) {
	var originalFontSize = $('html').css('font-size');
    $.fn.fontResize = function(options) {
        var settings = {
            increaseBtn: $('#increase-font'),
            decreaseBtn: $('#decrease-font'),
			resetBtn: $('#reset-font')
        };
        options = $.extend(settings, options);

        return this.each(function() {
            var element = $(this);


            options.increaseBtn.on('click', function(e) {
                e.preventDefault();
                var baseFontSize = parseInt(element.css('font-size'));
                element.css('font-size', (baseFontSize + 1) + 'px');

            });

            options.decreaseBtn.on('click', function(e) {
                e.preventDefault();
                var baseFontSize = parseInt(element.css('font-size'));
                element.css('font-size', (baseFontSize - 1) + 'px');

            });
			
			options.resetBtn.on('click', function(e) {
                e.preventDefault();
                var baseFontSize = parseInt(element.css('font-size'));
                element.css('font-size', (originalFontSize) + 'px');

            });

        });

    };


})(jQuery);

$(function() {
    $('#container').fontResize();

});

//end font