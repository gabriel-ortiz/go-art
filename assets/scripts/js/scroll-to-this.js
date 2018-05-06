/**
 * Every piece of UI that requires javascript should have its own
 * javascript file. Use this file as a template for structuring
 * all JS source files.
 *
 * {Title}
 * 
 * {Description}
 */

( function( window, $ ) {
	'use strict';

    var scrollToThis = function(element){
        
        //cach variables
        this.body       = $('body');
        this.element    = $(element);
        this.href       = $(element).attr('href');
        this.init();
    };

    scrollToThis.prototype.init = function(){
        
        var _this = this;
            

        //check to make sure element has href
        if( typeof this.href !== undefined && this.href !== false ){                
            _this.element.on('focus', function(event){
                
    
                _this.destination = _this.body.find( _this.href ).position().top;                        
                
                $('html, body').stop().animate({
                    scrollTop: _this.destination 
                }, 300);                
               
                event.preventDefault();                
                
            });                
        
        }else{
            return;
        }            

            

    };

    $(document).ready(function(){
        $('.scrollLink').each( function(){
            new scrollToThis(this);            
        });

    });

} )( this, jQuery );
