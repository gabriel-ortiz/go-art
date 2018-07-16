/**
 * Every piece of UI that requires javascript should have its own
 * javascript file. Use this file as a template for structuring
 * all JS source files.
 *
 * {Scrollspy}
 * 
 * {This enables scrollspy functionality for artwork from the preview sections}
 * 
 * https://jsfiddle.net/mekwall/up4nu/
 * 
 */

( function( window, $ ) {
	'use strict';

    var artScroll = function(element){
        //cache selectors
        this.lastId;
        this.topMenu        = $(element);
        this.topMenuHeight  = this.topMenu.outerHeight()+15;
        this.menuItems      = this.topMenu.find('a');
        this.header        = $(document).find( '#go-c-header' );
        this.scrollItems    = this.menuItems.map(function(){
                var item = $( $(this).attr('href') );
                if(item.length){return item;}
            });
        
        //console.log( this.header.outerHeight() );
        
        this.init();
    };

    artScroll.prototype.init = function(){
        
        var   _this = this;
        
        // bind click ahndler to menu items
        //so we can get a fancy scroll animation
        this.menuItems.on('focus', function(evt){
            var href       = $(this).attr('href');
            //offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;            
            var offsetTop  = href === "#" ? 0 : $( href ).position().top - _this.header.outerHeight();
            
            $('html, body').stop().animate({
                scrollTop: offsetTop
            }, 300);        
        
            evt.preventDefault();
        });
        
        
    };
    

    $(document).ready(function(){
        $('.js-go-scroll').each(function(){
            new artScroll(this);            
        });

    });

} )( this, jQuery );