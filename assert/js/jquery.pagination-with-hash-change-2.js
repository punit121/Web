/*
*  by cpbaumann
*/

(function ( $, window, document, undefined ) {

    "use strict";

    var pluginName = 'Paginationwithhashchange2',
        defaults = {
            nextSelector: '.next',
            prevSelector: '.prev',
            counterSelector: '.counter',
            pagingSelector: '.paging-nav',
            itemsPerPage: 1,
            initialPage: 1
        };

    var Range = (function () {

        var i = 0,
            minValue = 0,
            maxValue = 5;

        return {
            get: function(){
                return i;
            },
            set: function (val) {
                i = val;
            },
            setborders: function (min, max) {
                minValue = min;
                maxValue = max;
            },
            plus: function () {
                
				return (i < maxValue) ? ++i : i = minValue;
				
            },
            minus: function () {
				
                return (i > minValue) ? --i : i = maxValue;
				
            }
        };
    })();


    var Hash = (function () {

        return {
            protocol: '//',
            host: window.location.host,
            pathname: window.location.pathname,
            search: window.location.search,
            set: function (hash) {
                window.location = this.protocol +
                    this.host +
                    this.pathname +
                    this.search +
                    '#' + hash;
            },
            get: function () {
                return window.location.hash.replace('#', '');
            }
        };
    })();


    function Paginationwithhashchange2( element, options ) {

        this.element = element;
        this.options = $.extend( {}, defaults, options) ;
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }

    Paginationwithhashchange2.prototype.init = function () {
        
        /*
        * Vars
        */
        var next = $(this.options.nextSelector),
            prev = $(this.options.prevSelector),
            counter = $(this.options.counterSelector),
            pagingSelector = this.options.pagingSelector,
            itemsPerPage = this.options.itemsPerPage,
            items = $(this.element),
            numItems = items.children().length,
            numPages = Math.ceil(numItems / itemsPerPage),
            maxValue = numPages,
            minValue = 1,
            initValue = this.options.initialPage,
            page;

        /*
        * Function
        */
        function plus() {
			
            page = Range.plus();
			if(page == maxValue){
				$('#pgnext').css('display', 'none');
				$('#pstnext').css('display', 'block');
				
				}
			else{
				$('#pstnext').css('display', 'none');
				$('#pgnext').css('display', 'block');

				}
			if(page == minValue){
				$('#pgprv').css('display', 'none');
				$('#pstprv').css('display', 'block');
				}
			else{
				$('#pstprv').css('display', 'none');
				$('#pgprv').css('display', 'block');
				}
            counter.html(page);
            Hash.set(page);
            showPage(page);
            setActiveState(page);
			
			
        }

        function minus() {

            page = Range.minus();
			if(page == maxValue){
				$('#pgnext').css('display', 'none');
				$('#pstnext').css('display', 'block');
				}
			else{
				$('#pstnext').css('display', 'none');
				$('#pgnext').css('display', 'block');

				}
			if(page == minValue){
				$('#pgprv').css('display', 'none');
				$('#pstprv').css('display', 'block');
				}
			else{
				$('#pstprv').css('display', 'none');
				$('#pgprv').css('display', 'block');
				}
            counter.html(page);
            Hash.set(page);
            showPage(page);
            setActiveState(page);
			
        }
		
        function pageNav() {
        
            var ListWrapper = '<ul></ul>',
                ListElements = '',
                i, w;
				
            for (i = 1; i <= maxValue; i += 1) {
                if(i < 10) w=0;
				else w='';
				ListElements += '<li><a href="#' +
                    i +
                    '">' +w+
                    i +
                    '</a></li>';
            }
			ListElements += '<i style="border-left: 1px solid #fff;">&nbsp;</i>';
            $(ListElements)
                .appendTo(
                    $(ListWrapper)
                        .appendTo(pagingSelector)
                    );
        }   
    
        function showPage (page) {
        
            items.children().hide();
            var i,
                s = (page - 1) * itemsPerPage,
                max = page * itemsPerPage;

            for (i = s; i < max; i += 1) {
               items.children().eq(i).show();
            }
        }

        function setInitalPage () {

            var h = Hash.get();
            return (h  === "") ? initValue : h;
        }

        function setActiveState (page) {

            var p = page;
            $(pagingSelector).each(function () {
                $(this).find('li')
                .removeClass('active')
                    .eq(p - 1 )
                    .addClass('active');
           });
       }

        function initital () {

            page = setInitalPage();
            Hash.set(page);
			
            Range.setborders(minValue, maxValue);
            Range.set(page);

            counter.html(page);
            pageNav();
            showPage(page);
            setActiveState(page);
			
			if(page == minValue){
				$('#pgprv').css('display', 'none');
				$('#pstprv').css('display', 'block');
				}
			else{
				$('#pstprv').css('display', 'none');
				$('#pgprv').css('display', 'block');
				}
			if(page == maxValue){
				$('#pgnext').css('display', 'none');
				$('#pstnext').css('display', 'block');
				}
			else{
				$('#pstnext').css('display', 'none');
				$('#pgnext').css('display', 'block');

				}
			
			
        }

        function pageevent (e) {

            e.preventDefault();
            page = this.hash.replace('#', '');
			if(page == maxValue){
				$('#pgnext').css('display', 'none');
				$('#pstnext').css('display', 'block');
				}
			else{
				$('#pstnext').css('display', 'none');
				$('#pgnext').css('display', 'block');

				}
			if(page == minValue){
				$('#pgprv').css('display', 'none');
				$('#pstprv').css('display', 'block');
				}
			else{
				$('#pstprv').css('display', 'none');
				$('#pgprv').css('display', 'block');
				}
            Hash.set(page);
            Range.set(page);
            counter.html(page);
            showPage(page);
            setActiveState(page);
        }

        /*
        * Events, init
        */
        initital();
        next.on('click', plus);
        prev.on('click', minus);
		$(pagingSelector).on( "click", "a", pageevent);
	
	
			$(document).keydown(function(e) {
				switch(e.which) {
					case 37: // left
					minus();
					
					break;
			
				  
			
					case 39: // right
					var pages = Range.plus();
					if(pages == minValue){
				nextpage();
				}
				else{
					Range.minus();
					plus();
				}
					break;
			
				  
					default: return; // exit this handler for other keys
				}
				e.preventDefault(); // prevent the default action (scroll / move caret)
			});
			
		function nextpage(){
		
			
				window.location.href = nextpst;
		}
	
	};

    $.fn[pluginName] = function ( options ) {
        return this.each(function () {
            if (!$.data(this, 'plugin_' + pluginName)) {
                $.data(this, 'plugin_' + pluginName, 
                new Paginationwithhashchange2( this, options ));
            }
        });
    };



})( jQuery, window, document );
