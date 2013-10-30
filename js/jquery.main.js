$(function(){
    initNiceScroll();
    initPopup();
    initBackgroundResize();
    initFirstPageHeight();
    initScrollTo();
    initSameHeight();
    initCustomFileInput();
    initForm();
});

$(window).load(function(){
    initTechnologyWidth();
    // initCaseFixed();
    initWaypoints();
});

function initForm() {
    $('.send-cv').ajaxForm({
        dataType: 'json',
        iframe: true,
        success: function(result) {
            if (result.errors !== undefined) {
                $('.send-cv input[type=text]').css('outline', 'medium none');
                $('.add-resume .button > span').css('color', '#FFFFFF');
                if (result.errors.name !== undefined) {
                    $('form input[name=name]').css('outline', '2px solid red');
                }
                if (result.errors.email !== undefined) {
                    $('form input[name=email]').css('outline', '2px solid red');
                }
                if (result.errors.cv !== undefined) {
                    $('.add-resume .button > span').css('color', 'red');
                }
            } else {
                if (result.result !== undefined) {
                    $('.send-cv .success').html('<p>Your CV was sent. Thanks for reply </p>');
                    $('.send-cv .success').show();
                    setTimeout(function() {location.reload();}, 2000);
                }
            }
        }
    });
}
function initCustomFileInput() {
    $('.form-row').on('change', '.custom-file', function() {
        $('.add-resume').find('.remove').remove();
        var name = this.value;
        reWin = /.*\\(.*)/;
        var fileTitle = name.replace(reWin, "$1");
        reUnix = /.*\/(.*)/;
        fileTitle = fileTitle.replace(reUnix, "$1");
        $(this).closest('.add-resume').addClass('uploaded').find('.name').html(fileTitle).after('<span class="remove"></span>');
    });

    $('.add-resume').on('click', '.remove', function () {
        $(this).closest('.add-resume').removeClass('uploaded').find('.name').html('&nbsp;');
        if ( navigator.userAgent.match(/msie/i) ) {
            $(this).closest('.add-resume').find('.custom-file').replaceWith($(this).closest('.add-resume').find('.custom-file').clone());
        }
        else {
            $(this).closest('.add-resume').find('.custom-file').val("");
        }
        $(this).remove();
    });
}

// background stretching
function initBackgroundResize() {
        var holder = document.getElementById('bg');
        if(holder) {
                var images = holder.getElementsByTagName('img');
                for(var i = 0; i < images.length; i++) {
                        BackgroundStretcher.stretchImage(images[i]);
                }
                BackgroundStretcher.setBgHolder(holder);
                
                // handle font resize
                jQuery(window).bind('fontresize', function(e){
                        BackgroundStretcher.resizeAll();
                });
        }
}

function initFirstPageHeight() {
    var newHeight = $(window).height() - $('#header').outerHeight();
    var firstPageHeight = $('.first-page').height();
    if ( newHeight < firstPageHeight) {
        newHeight = firstPageHeight + 50;
    }
    $('.first-page').height(newHeight);
}

function initNiceScroll() {
    $('body').niceScroll({
        cursoropacitymax: 0.5,
        mousescrollstep: 20
    });

    $('.technology-section').niceScroll({
        cursorcolor: '#ffffff',
        cursorborder: 'none',
        cursoropacitymin: 0.76,
        cursoropacitymax: 0.76,
        autohidemode: false,
        touchbehavior: true,
        railvalign: 'top',
        enablemousewheel: false,
        preservenativescrolling: false,
        cursordragspeed:0.1
    });
}

function initScrollTo() {
    $('#nav').on('click', 'a', function(){
        var path = $(this).attr('href');
        var destination = $(path).offset().top - 50;
        $('html, body').animate({scrollTop: destination + "px"}, 1000);
        return false;
    });
}

function initTechnologyWidth() {
    var section = $('.technology-section');
    if (section.length == 0) {
        return false;
    }
    var items = section.find('.item');
    var newWidth = 0;
    var selector = section.find('.frame');
    var frameOffsetTop = section.offset().top + 100;
    var frameOffsetLeft = section.offset().left;
    $.each(items, function() {
        newWidth+= $(this).outerWidth();
    });
    
    selector.width(newWidth + 120);
    selector.height(selector.height());

    $.each(items, function() {
        if ($(this).position().left > 970) {
            $(this).find('.info').hide();
        }
    });

    section.scrollLeft(0);
    items.find('.technology-header').css({'opacity': 0});
    $('#wrapper').append('<div class="heading-box"></div>');
    var headingBox = $('.heading-box');
    items.clone().appendTo($('.heading-box'));
    headingBox.find('.info').remove();
    headingBox.find('.btn').remove();
    headingBox.find('.technology-header').css({'opacity': 1});
    headingBox.css({'position':'absolute', 'top':frameOffsetTop, 'left':frameOffsetLeft}).width(9999);
    
    section.on('scroll', function(){
        var leftScroll = $(this).scrollLeft();
        var bgp = ((leftScroll * 100)/newWidth).toFixed(3);
        headingBox.css({'margin-left': -leftScroll})
        $('.technology-page').find('.m2').css({'background-position' :  bgp + '% 148px'});

        $.each(items, function() {
            if(leftScroll-200 > $(this).position().left){
                $(this).find('.info').fadeOut(300);
            }
            else if (leftScroll+800 > $(this).position().left) {
                $(this).find('.info').fadeIn(400);
            }
            else if (leftScroll+800 < $(this).position().left){
                $(this).find('.info').fadeOut(300);
            }
        });

    });

}

function initWaypoints() {
    var navigationItems = $('#nav').find('li.nav');
    var pageIndex = $('.page' + $('.page').index());
    function clearNav() {
        navigationItems.removeClass('active');
    }
    function reduceHeader() {
        $('#header').animate({opacity:0}, 0, function(){
            $(this).animate({opacity:1}, 300);
            $('#wrapper').addClass('header-small');
            $('#bg').fadeOut(200);
        });
    }
    function enlargeHeader() {
        $('#header').animate({opacity:0}, 300, function(){
            $('#wrapper').removeClass('header-small');
            $(this).animate({opacity:1}, 0);
            $('#bg').fadeIn(200);
        });
    }
    $('.page').waypoint( function(direction) {
            clearNav();
            var currentIndex = $(this).index();
            if (currentIndex == 0 && direction == 'up'){
                clearNav();
            }
            else if (direction == 'down') {
                navigationItems.eq(currentIndex).addClass('active');
            }
            else if (direction == 'up') {
                navigationItems.eq(currentIndex - 1).addClass('active');
            }
        }, {
            offset: 70,
        }
    );
//    $.each($('.page'), function(){
//        $(this).attr('id', function(){
//            return "pageId" + ($(this).index() + 1);
//        });
//    });
    $('#company').waypoint( function(direction) {
            if (direction == 'down') {
                reduceHeader();
            }
            else {
                enlargeHeader();
            }
           
        }, {
            offset: 70
        }
    );
}

function initCaseFixed() {
//    var offsetOriginal = $('.case-info').offset();
    var selector = $('.case-info');
    var parentSelector = selector.parent();
    var offsetOriginal = selector.offset();
    var offsetReset = selector.removeAttr("style").offset();
    var deltaHeight = parentSelector.height() - selector.height();
    var deltaOffset = parentSelector.offset().top + deltaHeight - 80;
    // $(window).on('resize', function(){
    //     offsetReset = selector.removeAttr("style").offset();
    //     selector.css({
    //         'position': 'fixed',
    //             'top' : '80px',
    //             'left' : offsetReset.left
    //     });
    //     if(selector.height() > $(window).height()){
    //         selector.removeAttr("style");
    //     }
    // });

    $(document).scroll(function () {
        var y = $(this).scrollTop();
        if (offsetOriginal.top < y && y < deltaOffset) {
            selector.css({
                'position': 'fixed',
                'left' : offsetReset.left,
                'top' : 80
            });
        }
        else if (selector.offset().top <= offsetOriginal.top ) {
            selector.offset({ top : offsetOriginal.top, left: offsetReset.left }).css({'position': 'static'});
        }
        else if (y > deltaOffset) {
            selector.css({
                'position':'absolute',
                'top':'auto',
                'left':'auto',
                'right':0,
                'bottom':40
            });
        }
        
       if(selector.height() > $(window).height()){
           selector.removeAttr("style");
       }
    });
}

// align blocks height
function initSameHeight() {
    jQuery('.four-columns').sameHeight({
        elements: '.col-heading',
        flexible: true,
        multiLine: true,
        useMinHeight: true
    });

    jQuery('.three-columns').sameHeight({
        elements: '.col-heading',
        flexible: true,
        multiLine: true,
        useMinHeight: true
    });
}

function initPopup() {
    var open = ($('input[name=open]').val() == 1) ? true : false;
    var name = '';
    var email = '';
    var message = '';
    if (open) {
        var postedJobTitle = $('input[name=job-title]').val();
        name = $('input[type=hidden][name=name]').val();
        email = $('input[type=hidden][name=email]').val();
        message = $('input[name=message]').val();
    }

    $('.inline').colorbox({
        open: open,
        inline: true,
        // transition: 'none',
        initialWidth: 433,
        initialHeight: 300,
        speed: 400,
        onOpen: function() {
             $('.send-cv').resetForm();
             var jobId = $(this).attr('id');
             $('#inline-content input[name=jobid]').val(jobId);
        }
    });

}

// background stretch module
(function(){
        var isTouchDevice = (/MSIE 10.*Touch/.test(navigator.userAgent)) || ('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch;
        BackgroundStretcher = {
                images: [],
                holders: [],
                viewWidth: 0,
                viewHeight: 0,
                ieFastMode: true,
                stretchBy: isTouchDevice ? 'page' : 'window',
                init: function(){
                        this.addHandlers();
                        this.resizeAll();
                        return this;
                },
                stretchImage: function(origImg) {
                        // wrap image and apply smoothing
                        var obj = this.prepareImage(origImg);
                        
                        // handle onload
                        var img = new Image();
                        img.onload = this.bind(function(){
                                obj.iRatio = img.width / img.height;
                                this.resizeImage(obj);
                        });
                        img.src = origImg.src;
                        this.images.push(obj);
                },
                prepareImage: function(img) {
                        var wrapper = document.createElement('span');
                        img.parentNode.insertBefore(wrapper, img);
                        wrapper.appendChild(img);
                
                        if(/MSIE (6|7|8)/.test(navigator.userAgent) && img.tagName.toLowerCase() === 'img') {
                                wrapper.style.position = 'absolute';
                                wrapper.style.display = 'block';
                                wrapper.style.zoom = 1;
                                if(this.ieFastMode) {
                                        img.style.display = 'none';
                                        wrapper.style.filter = 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src="'+img.src+'", sizingMethod="scale")'; // enable smoothing in IE6
                                        return wrapper;
                                } else {
                                        img.style.msInterpolationMode = 'bicubic'; // IE7 smooth fix
                                        return img;
                                }
                        } else {
                                return img;
                        }
                },
                setBgHolder: function(obj) {
                        if(this.stretchBy === 'window' || this.stretchBy === 'page') {
                                this.holders.push(obj);
                                this.resizeAll();
                        }
                },
                resizeImage: function(obj) {
                        if(obj.iRatio) {
                                // calculate dimensions
                                var dimensions = this.getProportion({
                                        ratio: obj.iRatio,
                                        maskWidth: this.viewWidth,
                                        maskHeight: this.viewHeight
                                });
                                // apply new styles
                                obj.style.width = dimensions.width + 'px';
                                obj.style.height = dimensions.height + 'px';
                                obj.style.top = dimensions.top + 'px';
                                obj.style.left = dimensions.left +'px';
                        }
                },
                resizeHolder: function(obj) {
                        obj.style.width = this.viewWidth+'px';
                        obj.style.height = this.viewHeight+'px';
                },
                getProportion: function(data) {
                        // calculate element coords to fit in mask
                        var ratio = data.ratio || (data.elementWidth / data.elementHeight);
                        var slideWidth = data.maskWidth, slideHeight = slideWidth / ratio;
                        if(slideHeight < data.maskHeight) {
                                slideHeight = data.maskHeight;
                                slideWidth = slideHeight * ratio;
                        }
                        return {
                                width: slideWidth,
                                height: slideHeight,
                                top: (data.maskHeight - slideHeight) / 2,
                                left: (data.maskWidth - slideWidth) / 2
                        }
                },
                resizeAll: function() {
                        // crop holder width by window size
                        for(var i = 0; i < this.holders.length; i++) {
                                this.holders[i].style.width = '100%'; 
                        }
                        
                        // delay required for IE to handle resize
                        clearTimeout(this.resizeTimer);
                        this.resizeTimer = setTimeout(this.bind(function(){
                                // hide background holders
                                for(var i = 0; i < this.holders.length; i++) {
                                        this.holders[i].style.display = 'none';
                                }
                                
                                // calculate real page dimensions with hidden background blocks
                                if(typeof this.stretchBy === 'string') {
                                        // resize by window or page dimensions
                                        if(this.stretchBy === 'window' || this.stretchBy === 'page') {
                                                this.viewWidth = this.stretchFunctions[this.stretchBy].width();
                                                this.viewHeight = this.stretchFunctions[this.stretchBy].height();
                                        }
                                        // resize by element dimensions (by id)
                                        else {
                                                var maskObject = document.getElementById(this.stretchBy);
                                                this.viewWidth = maskObject ? maskObject.offsetWidth : 0;
                                                this.viewHeight = maskObject ? maskObject.offsetHeight : 0;
                                        }
                                } else {
                                        this.viewWidth = this.stretchBy.offsetWidth;
                                        this.viewHeight = this.stretchBy.offsetHeight;
                                }
                                
                                // show and resize all background holders
                                for(i = 0; i < this.holders.length; i++) {
                                        this.holders[i].style.display = 'block';
                                        this.resizeHolder(this.holders[i]);
                                }
                                for(i = 0; i < this.images.length; i++) {
                                        this.resizeImage(this.images[i]);
                                }
                        }),10);
                },
                addHandlers: function() {
                        var handler = this.bind(this.resizeAll);
                        if (window.addEventListener) {
                                window.addEventListener('load', handler, false);
                                window.addEventListener('resize', handler, false);
                                window.addEventListener('orientationchange', handler, false);
                        } else if (window.attachEvent) {
                                window.attachEvent('onload', handler);
                                window.attachEvent('onresize', handler);
                        }
                },
                stretchFunctions: {
                        window: {
                                width: function() {
                                        return typeof window.innerWidth === 'number' ? window.innerWidth : document.documentElement.clientWidth;
                                },
                                height: function() {
                                        return typeof window.innerHeight === 'number' ? window.innerHeight : document.documentElement.clientHeight;
                                }
                        },
                        page: {
                                width: function() {
                                        return !document.body ? 0 : Math.max(
                                                Math.max(document.body.clientWidth, document.documentElement.clientWidth),
                                                Math.max(document.body.offsetWidth, document.body.scrollWidth)
                                        );
                                },
                                height: function() {
                                        return !document.body ? 0 : Math.max(
                                                Math.max(document.body.clientHeight, document.documentElement.clientHeight),
                                                Math.max(document.body.offsetHeight, document.body.scrollHeight)
                                        );
                                }
                        }
                },
                bind: function(fn, scope, args) {
                        var newScope = scope || this;
                        return function() {
                                return fn.apply(newScope, args || arguments);
                        }
                }
        }.init();
}());

/*
 * jQuery SameHeight plugin
 */
;(function($){
    $.fn.sameHeight = function(opt) {
        var options = $.extend({
            skipClass: 'same-height-ignore',
            leftEdgeClass: 'same-height-left',
            rightEdgeClass: 'same-height-right',
            elements: '>*',
            flexible: false,
            multiLine: false,
            useMinHeight: false,
            biggestHeight: false
        },opt);
        return this.each(function(){
            var holder = $(this), postResizeTimer, ignoreResize;
            var elements = holder.find(options.elements).not('.' + options.skipClass);
            if(!elements.length) return;

            // resize handler
            function doResize() {
                elements.css(options.useMinHeight && supportMinHeight ? 'minHeight' : 'height', '');
                if(options.multiLine) {
                    // resize elements row by row
                    resizeElementsByRows(elements, options);
                } else {
                    // resize elements by holder
                    resizeElements(elements, holder, options);
                }
            }
            doResize();

            // handle flexible layout / font resize
            var delayedResizeHandler = function() {
                if(!ignoreResize) {
                    ignoreResize = true;
                    doResize();
                    clearTimeout(postResizeTimer);
                    postResizeTimer = setTimeout(function() {
                        doResize();
                        setTimeout(function(){
                            ignoreResize = false;
                        }, 10);
                    }, 100);
                }
            };

            // handle flexible/responsive layout
            if(options.flexible) {
                $(window).bind('resize orientationchange fontresize', delayedResizeHandler);
            }

            // handle complete page load including images and fonts
            $(window).bind('load', delayedResizeHandler);
        });
    };

    // detect css min-height support
    var supportMinHeight = typeof document.documentElement.style.maxHeight !== 'undefined';

    // get elements by rows
    function resizeElementsByRows(boxes, options) {
        var currentRow = $(), maxHeight, maxCalcHeight = 0, firstOffset = boxes.eq(0).offset().top;
        boxes.each(function(ind){
            var curItem = $(this);
            if(curItem.offset().top === firstOffset) {
                currentRow = currentRow.add(this);
            } else {
                maxHeight = getMaxHeight(currentRow);
                maxCalcHeight = Math.max(maxCalcHeight, resizeElements(currentRow, maxHeight, options));
                currentRow = curItem;
                firstOffset = curItem.offset().top;
            }
        });
        if(currentRow.length) {
            maxHeight = getMaxHeight(currentRow);
            maxCalcHeight = Math.max(maxCalcHeight, resizeElements(currentRow, maxHeight, options));
        }
        if(options.biggestHeight) {
            boxes.css(options.useMinHeight && supportMinHeight ? 'minHeight' : 'height', maxCalcHeight);
        }
    }

    // calculate max element height
    function getMaxHeight(boxes) {
        var maxHeight = 0;
        boxes.each(function(){
            maxHeight = Math.max(maxHeight, $(this).outerHeight());
        });
        return maxHeight;
    }

    // resize helper function
    function resizeElements(boxes, parent, options) {
        var calcHeight;
        var parentHeight = typeof parent === 'number' ? parent : parent.height();
        boxes.removeClass(options.leftEdgeClass).removeClass(options.rightEdgeClass).each(function(i){
            var element = $(this);
            var depthDiffHeight = 0;
            var isBorderBox = element.css('boxSizing') === 'border-box';

            if(typeof parent !== 'number') {
                element.parents().each(function(){
                    var tmpParent = $(this);
                    if(parent.is(this)) {
                        return false;
                    } else {
                        depthDiffHeight += tmpParent.outerHeight() - tmpParent.height();
                    }
                });
            }
            calcHeight = parentHeight - depthDiffHeight;
            calcHeight -= isBorderBox ? 0 : element.outerHeight() - element.height();

            if(calcHeight > 0) {
                element.css(options.useMinHeight && supportMinHeight ? 'minHeight' : 'height', calcHeight);
            }
        });
        boxes.filter(':first').addClass(options.leftEdgeClass);
        boxes.filter(':last').addClass(options.rightEdgeClass);
        return calcHeight;
    }
}(jQuery));

/*
 * jQuery FontResize Event
 */
jQuery.onFontResize = (function($) {
    $(function() {
        var randomID = 'font-resize-frame-' + Math.floor(Math.random() * 1000);
        var resizeFrame = $('<iframe>').attr('id', randomID).addClass('font-resize-helper');

        // required styles
        resizeFrame.css({
            width: '100em',
            height: '10px',
            position: 'absolute',
            borderWidth: 0,
            top: '-9999px',
            left: '-9999px'
        }).appendTo('body');

        // use native IE resize event if possible
        if (window.attachEvent && !window.addEventListener) {
            resizeFrame.bind('resize', function () {
                $.onFontResize.trigger(resizeFrame[0].offsetWidth / 100);
            });
        }
        // use script inside the iframe to detect resize for other browsers
        else {
            var doc = resizeFrame[0].contentWindow.document;
            doc.open();
            doc.write('<scri' + 'pt>window.onload = function(){var em = parent.jQuery("#' + randomID + '")[0];window.onresize = function(){if(parent.jQuery.onFontResize){parent.jQuery.onFontResize.trigger(em.offsetWidth / 100);}}};</scri' + 'pt>');
            doc.close();
        }
        jQuery.onFontResize.initialSize = resizeFrame[0].offsetWidth / 100;
    });
    return {
        // public method, so it can be called from within the iframe
        trigger: function (em) {
            $(window).trigger("fontresize", [em]);
        }
    };
}(jQuery));