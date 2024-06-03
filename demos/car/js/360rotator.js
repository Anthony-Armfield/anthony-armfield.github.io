/*! threesixty-slider 2015-05-28 verison 2.0.5 */
/* http://github.com/vml-webdev/threesixty-slider.git */
!function(a){"use strict";a.ThreeSixty=function(b,c){var d,e=this,f=[];e.$el=a(b),e.el=b,e.$el.data("ThreeSixty",e),e.init=function(){d=a.extend({},a.ThreeSixty.defaultOptions,c),d.disableSpin&&(d.currentFrame=1,d.endFrame=1),e.initProgress(),e.loadImages()},e.resize=function(){},e.initProgress=function(){e.$el.css({width:d.width+"px",height:d.height+"px","background-image":"none !important"}),d.styles&&e.$el.css(d.styles),e.responsive(),e.$el.find(d.progress).css({marginTop:d.height/2-15+"px"}),e.$el.find(d.progress).fadeIn("slow"),e.$el.find(d.imgList).hide()},e.loadImages=function(){var b,c,g,h;b=document.createElement("li"),h=d.zeroBased?0:1,c=d.imgArray?d.imgArray[d.loadedImages]:d.domain+d.imagePath+d.filePrefix+e.zeroPad(d.loadedImages+h)+d.ext+(e.browser.isIE()?"?"+(new Date).getTime():""),g=a("<img>").attr("src",c).addClass("previous-image").appendTo(b),f.push(g),e.$el.find(d.imgList).append(b),a(g).load(function(){e.imageLoaded()})},e.imageLoaded=function(){d.loadedImages+=1,a(d.progress+" span").text(Math.floor(d.loadedImages/d.totalFrames*100)+"%"),d.loadedImages>=d.totalFrames?(d.disableSpin&&f[0].removeClass("previous-image").addClass("current-image"),a(d.progress).fadeOut("slow",function(){a(this).hide(),e.showImages(),e.showNavigation()})):e.loadImages()},e.showImages=function(){e.$el.find(".txtC").fadeIn(),e.$el.find(d.imgList).fadeIn(),e.ready=!0,d.ready=!0,d.drag&&e.initEvents(),e.refresh(),e.initPlugins(),d.onReady(),setTimeout(function(){e.responsive()},50)},e.initPlugins=function(){a.each(d.plugins,function(b,c){if("function"!=typeof a[c])throw new Error(c+" not available.");a[c].call(e,e.$el,d)})},e.showNavigation=function(){if(d.navigation&&!d.navigation_init){var b,c,f,g;b=a("<div/>").attr("class","nav_bar"),c=a("<a/>").attr({href:"#","class":"nav_bar_next"}).html("next"),f=a("<a/>").attr({href:"#","class":"nav_bar_previous"}).html("previous"),g=a("<a/>").attr({href:"#","class":"nav_bar_play"}).html("play"),b.append(f),b.append(g),b.append(c),e.$el.prepend(b),c.bind("mousedown touchstart",e.next),f.bind("mousedown touchstart",e.previous),g.bind("mousedown touchstart",e.play_stop),d.navigation_init=!0}},e.play_stop=function(b){b.preventDefault(),d.autoplay?(d.autoplay=!1,a(b.currentTarget).removeClass("nav_bar_stop").addClass("nav_bar_play"),clearInterval(d.play),d.play=null):(d.autoplay=!0,d.play=setInterval(e.moveToNextFrame,d.playSpeed),a(b.currentTarget).removeClass("nav_bar_play").addClass("nav_bar_stop"))},e.next=function(a){a&&a.preventDefault(),d.endFrame-=5,e.refresh()},e.previous=function(a){a&&a.preventDefault(),d.endFrame+=5,e.refresh()},e.play=function(a,b){var c=a||d.playSpeed,f=b||d.autoplayDirection;d.autoplayDirection=f,d.autoplay||(d.autoplay=!0,d.play=setInterval(e.moveToNextFrame,c))},e.stop=function(){d.autoplay&&(d.autoplay=!1,clearInterval(d.play),d.play=null)},e.moveToNextFrame=function(){1===d.autoplayDirection?d.endFrame-=1:d.endFrame+=1,e.refresh()},e.gotoAndPlay=function(a){if(d.disableWrap)d.endFrame=a,e.refresh();else{var b=Math.ceil(d.endFrame/d.totalFrames);0===b&&(b=1);var c=b>1?d.endFrame-(b-1)*d.totalFrames:d.endFrame,f=d.totalFrames-c,g=0;g=a-c>0?a-c<c+(d.totalFrames-a)?d.endFrame+(a-c):d.endFrame-(c+(d.totalFrames-a)):f+a>c-a?d.endFrame-(c-a):d.endFrame+(f+a),c!==a&&(d.endFrame=g,e.refresh())}},e.initEvents=function(){e.$el.bind("mousedown touchstart touchmove touchend mousemove click",function(a){a.preventDefault(),"mousedown"===a.type&&1===a.which||"touchstart"===a.type?(d.pointerStartPosX=e.getPointerEvent(a).pageX,d.dragging=!0,d.onDragStart(d.currentFrame)):"touchmove"===a.type?e.trackPointer(a):"touchend"===a.type&&(d.dragging=!1,d.onDragStop(d.endFrame))}),a(document).bind("mouseup",function(b){d.dragging=!1,d.onDragStop(d.endFrame),a(this).css("cursor","none")}),a(window).bind("resize",function(a){e.responsive()}),a(document).bind("mousemove",function(a){d.dragging?(a.preventDefault(),!e.browser.isIE&&d.showCursor&&e.$el.css("cursor","url(assets/images/hand_closed.png), auto")):!e.browser.isIE&&d.showCursor&&e.$el.css("cursor","url(assets/images/hand_open.png), auto"),e.trackPointer(a)}),a(window).resize(function(){e.resize()})},e.getPointerEvent=function(a){return a.originalEvent.targetTouches?a.originalEvent.targetTouches[0]:a},e.trackPointer=function(a){d.ready&&d.dragging&&(d.pointerEndPosX=e.getPointerEvent(a).pageX,d.monitorStartTime<(new Date).getTime()-d.monitorInt&&(d.pointerDistance=d.pointerEndPosX-d.pointerStartPosX,d.pointerDistance>0?d.endFrame=d.currentFrame+Math.ceil((d.totalFrames-1)*d.speedMultiplier*(d.pointerDistance/e.$el.width())):d.endFrame=d.currentFrame+Math.floor((d.totalFrames-1)*d.speedMultiplier*(d.pointerDistance/e.$el.width())),d.disableWrap&&(d.endFrame=Math.min(d.totalFrames-(d.zeroBased?1:0),d.endFrame),d.endFrame=Math.max(d.zeroBased?0:1,d.endFrame)),e.refresh(),d.monitorStartTime=(new Date).getTime(),d.pointerStartPosX=e.getPointerEvent(a).pageX))},e.refresh=function(){0===d.ticker&&(d.ticker=setInterval(e.render,Math.round(1e3/d.framerate)))},e.render=function(){var a;d.currentFrame!==d.endFrame?(a=d.endFrame<d.currentFrame?Math.floor(.1*(d.endFrame-d.currentFrame)):Math.ceil(.1*(d.endFrame-d.currentFrame)),e.hidePreviousFrame(),d.currentFrame+=a,e.showCurrentFrame(),e.$el.trigger("frameIndexChanged",[e.getNormalizedCurrentFrame(),d.totalFrames])):(window.clearInterval(d.ticker),d.ticker=0)},e.hidePreviousFrame=function(){f[e.getNormalizedCurrentFrame()].removeClass("current-image").addClass("previous-image")},e.showCurrentFrame=function(){f[e.getNormalizedCurrentFrame()].removeClass("previous-image").addClass("current-image")},e.getNormalizedCurrentFrame=function(){var a,b;return d.disableWrap?(a=Math.min(d.currentFrame,d.totalFrames-(d.zeroBased?1:0)),b=Math.min(d.endFrame,d.totalFrames-(d.zeroBased?1:0)),a=Math.max(a,d.zeroBased?0:1),b=Math.max(b,d.zeroBased?0:1),d.currentFrame=a,d.endFrame=b):(a=Math.ceil(d.currentFrame%d.totalFrames),0>a&&(a+=d.totalFrames-(d.zeroBased?1:0))),a},e.getCurrentFrame=function(){return d.currentFrame},e.responsive=function(){d.responsive&&e.$el.css({height:e.$el.find(".current-image").first().css("height"),width:"100%"})},e.zeroPad=function(a){function b(a,b){var c=a.toString();if(d.zeroPadding)for(;c.length<b;)c="0"+c;return c}var c=Math.log(d.totalFrames)/Math.LN10,e=1e3,f=Math.round(c*e)/e,g=Math.floor(f)+1;return b(a,g)},e.browser={},e.browser.isIE=function(){var a=-1;if("Microsoft Internet Explorer"===navigator.appName){var b=navigator.userAgent,c=new RegExp("MSIE ([0-9]{1,}[\\.0-9]{0,})");null!==c.exec(b)&&(a=parseFloat(RegExp.$1))}return-1!==a},e.getConfig=function(){return d},a.ThreeSixty.defaultOptions={dragging:!1,ready:!1,pointerStartPosX:0,pointerEndPosX:0,pointerDistance:0,monitorStartTime:0,monitorInt:10,ticker:0,speedMultiplier:7,totalFrames:180,currentFrame:0,endFrame:0,loadedImages:0,framerate:60,domains:null,domain:"",parallel:!1,queueAmount:8,idle:0,filePrefix:"",ext:"png",height:300,width:300,styles:{},navigation:!1,autoplay:!1,autoplayDirection:1,disableSpin:!1,disableWrap:!1,responsive:!1,zeroPadding:!1,zeroBased:!1,plugins:[],showCursor:!1,drag:!0,onReady:function(){},onDragStart:function(){},onDragStop:function(){},imgList:".threesixty_images",imgArray:null,playSpeed:100},e.init()},a.fn.ThreeSixty=function(b){return Object.create(new a.ThreeSixty(this,b))}}(jQuery),"function"!=typeof Object.create&&(Object.create=function(a){"use strict";function b(){}return b.prototype=a,new b});


/*global $, window, CanvasLoader, jQuery, alert, requestAnimationFrame, cancelAnimationFrame */
/*jslint browser:true, devel:true */

/*!
 * 360 degree Image Slider Fullscreen plugin v1.0.0
 * http://gaurav.jassal.me/lab
 *
 * Copyright 2013, gaurav@jassal.me
 * Dual licensed under the MIT or GPL Version 3 licenses.
 *
 */


(function($) {
  'use strict';
  $.ThreeSixtyFullscreen = function(el, options) {
    var plugin = this,
      $el = el,
      opts = options,
      $button = $('<a href=\'#\'>Fullscreen</a>'),
      isFullscreen = false,
      pfx = ['webkit', 'moz', 'ms', 'o', ''];

    // Attach event to the plugin
    $button.bind('click', function(event) {
      plugin.onClickHandler.apply(this, event);
    });

    /**
     * Set styles for the plugin interface.
     * @return {Object} this
     */
    plugin.setStyles = function() {
      $button.css({
        'z-index': 12,
        'display': 'block',
        'position': 'absolute',
        'background': 'url(img/fs.png) no-repeat',
        'width': '20px',
        'height': '20px',
        'text-indent': '-99999px',
        'right': '5px',
        'bottom': '5px',
        'background-position': '0px -20px'
      });
      return this;
    };

    plugin.RunPrefixMethod = function(obj, method) {
      var p = 0,
        m, t;
      while (p < pfx.length && !obj[m]) {
        m = method;
        if (pfx[p] === '') {
          m = m.substr(0, 1).toLowerCase() + m.substr(1);
        }
        m = pfx[p] + m;
        t = typeof obj[m];
        if (t !== 'undefined') {
          pfx = [pfx[p]];
          return (t === 'function' ? obj[m]() : obj[m]);
        }
        p++;
      }
    };
    /**
     * Initilize the fullscreen plugin
     * @param  {Object} opt override options
     */
    plugin.init = function() {
      plugin.setStyles();
      $el.prepend($button);
    };

    plugin.onClickHandler = function(e) {
      var elem;
      if (typeof $el.attr('id') !== 'undefined') {
        elem = document.getElementById($el.attr('id'));
      } else if (typeof $el.parent().attr('id') !== 'undefined') {
        elem = document.getElementById($el.parent().attr('id'));
      } else {
        return false;
      }

      plugin.toggleFullscreen(elem);
    };

    plugin.toggleButton = function() {
      if (isFullscreen) {
        $button.css({
          'background-position': '0px 0px'
        });
      } else {
        $button.css({
          'background-position': '0px -20px'
        });
      }
    };

    plugin.toggleFullscreen = function(elem) {
      if (plugin.RunPrefixMethod(document, 'FullScreen') || plugin.RunPrefixMethod(document, 'IsFullScreen')) {
        plugin.RunPrefixMethod(document, 'CancelFullScreen');
      }
      else {
        plugin.RunPrefixMethod(elem, 'RequestFullScreen');
      }
      plugin.toggleButton();
    };
    plugin.init();
  };
}(jQuery));