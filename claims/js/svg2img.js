/**
 * jQuery plugin svg2img - v1.0.1 - 2017-04-14
 * https://github.com/ogobrecht/jquery-plugin-svg2img
 * Copyright (c) 2017 Ottmar Gobrecht - MIT license
 */

/*! @file src/svg2img.js */
function downloadPNGFromAnyImageSrc(src)
{
  //recreate the image with src recieved
  var img = new Image;
  //when image loaded (to know width and height)
  img.onload = function(){
    //drow image inside a canvas
    var canvas = convertImageToCanvas(img);
    //get image/png from convas
    var pngImage =  convertCanvasToImage(canvas);
    //download
    var anchor = document.createElement('a');
    anchor.setAttribute('href', pngImage.src);
    anchor.setAttribute('download', 'image.png');
    anchor.click();
  };
  
  img.src = src;


	// Converts image to canvas; returns new canvas element
  function convertImageToCanvas(image) {
        var canvas = document.createElement("canvas");
        canvas.width = image.width;
        canvas.height = image.height;
        canvas.getContext("2d").drawImage(image, 0, 0);
        return canvas;
    }
    
    
    // Converts canvas to an image
    function convertCanvasToImage(canvas) {
        var image = new Image();
        image.src = canvas.toDataURL("image/png");
        return image;
    }
}
var base64='';


    $.fn.svg2img = function(options) {

        // define settings and some vars
        var settings = $.extend({}, $.fn.svg2img.defaults, options);
        var timing = {};

        timing.start = new Date().getTime();

        // helper functions for console log and warn
        var log = function(message) {
            if (settings.debug) {
            }
        };
        var warn = function(message) {
        };

        // helper function to get all used styles for a DOM element
        // http://stackoverflow.com/questions/13204785/is-it-possible-to-read-the-styles-of-css-classes-not-being-used-in-the-dom-using
        var getUsedStyles = function(element) {
            var elem = $(element);
            var usedStyles = [],
                styleSheets = (element.ownerDocument || document).styleSheets;
            $(styleSheets).each(function(i, sheet) {
                $(sheet.cssRules).each(function(i, rule) {
                    var cssSelectorUsed = false;
                    try {
                        cssSelectorUsed = (elem.find(rule.selectorText).length > 0);
                    } catch (error) {
                        warn("Unable to check if CSS selector is used: " + rule.selectorText, error);
                    }
                    if (cssSelectorUsed) {
                        usedStyles.push(rule.cssText);
                    }
                });
            });
            return usedStyles;
        };
        // helper function to create formatted date string
        // http://stackoverflow.com/questions/17415579/how-to-iso-8601-format-a-date-with-timezone-offset-in-javascript
        var formatLocalDate = function() {
            var now = new Date();
            var pad = function(num) {
                var norm = Math.abs(Math.floor(num));
                return (norm < 10 ? '0' : '') + norm;
            };
            return now.getFullYear() + pad(now.getMonth() + 1) + pad(now.getDate()) + '-' + pad(now.getHours()) +
                pad(now.getMinutes()) + pad(now.getSeconds());
        };


        // helper function to export one svg
        var svg2image = function(element) {
            var elem, fileName, svgText, blob;

            if (settings.debug) {
                timing.startExport = new Date().getTime();
                log('1 - start SVG export');
            }

            elem = $(element);
            fileName = (elem.attr('id') || elem.parent().attr('id') || 'export') + '-' + formatLocalDate() + '.svg';
            svgText = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink">' +
                '<style type="text/css">.line {fill: none;stroke-width: 2px;stroke-linejoin: round;stroke-linecap: round;}</style>' +
                elem.clone().wrap('<p/>').parent().html() + '</svg>';
                var svgText = svgText.replace("class=\"line\"", "style='fill: none;stroke-width: 2px;stroke-linejoin: round;stroke-linecap: round;'");

            if (settings.debug) {
                timing.endClone = new Date().getTime();
                log('2 - clone of original SVG and collect styles done (' + (timing.endClone - timing.startExport) + 'ms)');
            }

            blob = new Blob([svgText], {
                type: "image/svg+xml;charset=utf-8"
            });
            
            var s = new XMLSerializer().serializeToString(document.getElementById("canvas"))
            s.replace("class=\"line\"", "style='fill: none;stroke-width: 2px;stroke-linejoin: round;stroke-linecap: round;'");

            var encodedData = window.btoa(svgText);
            

            
            
            var canvas11 = document.createElement( "canvas" );
            canvas11.height = 200;
            canvas11.width = $("#canvas").width();
var ctx = canvas11.getContext( "2d" );

var img = document.createElement( "img" );
img.setAttribute( "src", "data:image/svg+xml;base64," + encodedData );

img.onload = function() {
    ctx.drawImage( img, 0, 0 );
    base64=canvas11.toDataURL( "image/png" );
        $("#hidden_elem").val(base64);
    canvas11.remove();
    // Now is done
	if($("#canvas").children("g").html()!='')
	{
		$('#send_mail').click();
	}
	else
	{
		$("#image-loader").hide();
		alert('Please sign to submit form');
	}
};

            
            

   
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            

            if (settings.debug) {
                timing.endSvgExport = new Date().getTime();
                log('3 - save to blob done (' + (timing.endSvgExport - timing.endClone) + 'ms)');
                log('4 - runtime for file ' + fileName + ': ' + (timing.endSvgExport - timing.startExport) + 'ms');
            }

        };

        // MAIN
        this.each(function(i, node) {
            if (node.tagName === 'svg') {
                svg2image(node);
            } else {
                $(node).find('svg').each(function(i, svg) {
                    svg2image(svg);
                });
            }
        });

        return this;

    };

    // plugin defaults
    $.fn.svg2img.defaults = {
        debug: false
    };


	window.mobileAndTabletCheck = function() {
	  let check = false;
	  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
	  return check;
	};
	
	if(window.mobileAndTabletCheck())
	{
		$("#sign_now_a").css("display","block");
	}
	else
	{
		$("#sign_now_a").css("display","none");
	}
	
	$("#sign_now_a").click(function(){
		if(window.mobileAndTabletCheck())
		{
			let overflow=$('body').css("overflow");
			if(overflow!='hidden')
			{
				toggleFullScreen();
				$('body').css("overflow","hidden");
				$("#sign_now_a").html("Release Fix Screen");
			}
			else
			{
				toggleFullScreen();
				$('body').css("overflow","auto");
				$("#sign_now_a").html("Fix Screen");
			}	
		}
	})
	function toggleFullScreen() {
		if(window.mobileAndTabletCheck())
		{
		  if (!document.fullscreenElement) {
			  document.documentElement.requestFullscreen();
		  } else {
			if (document.exitFullscreen) {
			  document.exitFullscreen();
			}
		  }
		}
	}