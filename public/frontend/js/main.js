

var searchOpen = function () {

	return {
		//main function to initiate the module
		init: function () {

			$('.search-box').on('click', function (e) {
				e.stopPropagation();
			});

			$(document).on('click', '.typed-search-box-shown', function (e) {
                $(this).removeClass("typed-search-box-shown");
                $('.typed-search-box').addClass('d-none');
			});
		}
	};
}();
$(function () {
	 $('#login').on('click', function() {
	   $('.regmodel').show();
	 });
	 $('.exitmodel').on('click', function() {
	   $('.regmodel').hide();
	   $('.regmodelreg').hide();
	 });
	 $('#registration').on('click', function() {
	   $('.regmodel').hide();
	   $('.regmodelreg').hide();
	   $('.regmodelreg').show();
	 });
	 $('#loginback').on('click', function() {
	   $('.regmodel').hide();
	   $('.regmodelreg').hide();
	   $('.regmodel').show();
	 });
	 
								
	 $("#profile_type").change(function() {
		if($('#language').val() == 'ge'){ 
			if($(this).val() == '1') {	  
			$("#regname").attr("placeholder", "სახელი გვარი");
			$("#regtypeid").attr("placeholder", "პირადი ნომერი");
			}	
			
			if($(this).val() == '2') {	  
			$("#regname").attr("placeholder", "კომპანიის სახელი");
			$("#regtypeid").attr("placeholder", "საიდ.კოდი");
			}	
		}else{
			if($(this).val() == '1') {	  
			$("#regname").attr("placeholder", "Name Surname");
			$("#regtypeid").attr("placeholder", "Personal Id");
			}	
			
			if($(this).val() == '2') {	  
			$("#regname").attr("placeholder", "Company name");
			$("#regtypeid").attr("placeholder", "Company Id");
			}
		}
	 }); 	 
	 
	 $("#profile_type2").change(function() {
		 
		if($('#language').val() == 'ge'){ 
			if($(this).val() == '1') {	  
			$("#regname2").attr("placeholder", "სახელი გვარი");
			$("#regtypeid2").attr("placeholder", "პირადი ნომერი");
			}	
			
			if($(this).val() == '2') {	  
			$("#regname2").attr("placeholder", "კომპანიის სახელი");
			$("#regtypeid2").attr("placeholder", "საიდ.კოდი");
			}	
		}else{
			if($(this).val() == '1') {	  
			$("#regname2").attr("placeholder", "Name Surname");
			$("#regtypeid2").attr("placeholder", "Personal Id");
			}	
			
			if($(this).val() == '2') {	  
			$("#regname2").attr("placeholder", "Company Name");
			$("#regtypeid2").attr("placeholder", "Company Id");
			}				
		}
	 }); 
	 
	 $("#filter_region").change(function() {
      
	  if($('#language').val() == 'ge'){  
		  if($(this).val() == '') {	  
			$('#filter_city').empty().append('<option selected="selected" value="">ქალაქი</option>');
		  }	  
		  if($(this).val() == 'adjara') {	  
			$('#filter_city').empty();
			$('#filter_city').append('<option selected="selected" value="">ქალაქი</option>');
			$('#filter_city').append('<option value="ბათუმი">ბათუმი</option>');
			$('#filter_city').append('<option value="ქობულეთი">ქობულეთი</option>');
			$('#filter_city').append('<option value="ხელვაჩაური">ხელვაჩაური</option>');
		  }
		  if($(this).val() == 'guria') {	  
			$('#filter_city').empty();
			$('#filter_city').append('<option selected="selected" value="">ქალაქი</option>');
			$('#filter_city').append('<option value="ლანჩხუთი">ლანჩხუთი</option>');
			$('#filter_city').append('<option value="ოზურგეთი">ოზურგეთი</option>');
			$('#filter_city').append('<option value="ჩოხატაური">ჩოხატაური</option>');
		  }
		  if($(this).val() == 'tbilisi') {	  
			$('#filter_city').empty();
			$('#filter_city').append('<option selected="selected" value="">ქალაქი</option>');
			$('#filter_city').append('<option value="საბურთალო">საბურთალო</option>');
			$('#filter_city').append('<option value="მთაწმინდა">მთაწმინდა</option>');
			$('#filter_city').append('<option value="კრწანისი">კრწანისი</option>');
			$('#filter_city').append('<option value="ვაკე">ვაკე</option>');
			$('#filter_city').append('<option value="დიდუბე">დიდუბე</option>');
			$('#filter_city').append('<option value="ჩუღურეთი">ჩუღურეთი</option>');
			$('#filter_city').append('<option value="გლდანი">გლდანი</option>');
			$('#filter_city').append('<option value="ნაძალადევი">ნაძალადევი</option>');
			$('#filter_city').append('<option value="ისანი">ისანი</option>');
			$('#filter_city').append('<option value="სამგორი">სამგორი</option>');
		  }
		  if($(this).val() == 'imereti') {	  
			$('#filter_city').empty();
			$('#filter_city').append('<option selected="selected" value="">ქალაქი</option>');
			$('#filter_city').append('<option value="ქუთაისი">ქუთაისი</option>');
			$('#filter_city').append('<option value="ბაღდათი">ბაღდათი</option>');
			$('#filter_city').append('<option value="ვანი">ვანი</option>');
			$('#filter_city').append('<option value="სამტრედია">სამტრედია</option>');
			$('#filter_city').append('<option value="ზესტაფონი">ზესტაფონი</option>');
			$('#filter_city').append('<option value="თერჯოლა">თერჯოლა</option>');
			$('#filter_city').append('<option value="საჩხერე">საჩხერე</option>');
			$('#filter_city').append('<option value="ტყიბული">ტყიბული</option>');
			$('#filter_city').append('<option value="წყალტუბო">წყალტუბო</option>');
			$('#filter_city').append('<option value="ჭიათურა">ჭიათურა</option>');
			$('#filter_city').append('<option value="ხარაგაული">ხარაგაული</option>');
			$('#filter_city').append('<option value="ხონი">ხონი</option>');
		  }
		  if($(this).val() == 'samegrelo') {	  
			$('#filter_city').empty();
			$('#filter_city').append('<option selected="selected" value="">ქალაქი</option>');
			$('#filter_city').append('<option value="ფოთი">ფოთი</option>');
			$('#filter_city').append('<option value="მარტვილი">მარტვილი</option>');
			$('#filter_city').append('<option value="ზუგდიდი">ზუგდიდი</option>');
			$('#filter_city').append('<option value="აბაშა">აბაშა</option>');
			$('#filter_city').append('<option value="სენაკი">სენაკი</option>');
			$('#filter_city').append('<option value="ხობი">ხობი</option>');
			$('#filter_city').append('<option value="ჩხოროწყუ">ჩხოროწყუ</option>');
			$('#filter_city').append('<option value="წალენჯიხა">წალენჯიხა</option>');
		  }
		  if($(this).val() == 'qvemokartli') {	
			$('#filter_city').append('<option selected="selected" value="">ქალაქი</option>');  
			$('#filter_city').empty().append('<option value="რუსთავი">რუსთავი</option>');
		  }
	  }else{
		  if($(this).val() == '') {	  
			$('#filter_city').empty().append('<option selected="selected" value="">City</option>');
		  }	  
		  if($(this).val() == 'adjara') {	  
			$('#filter_city').empty();
			$('#filter_city').append('<option selected="selected" value="">City</option>');
			$('#filter_city').append('<option value="Batumi">Batumi</option>');
			$('#filter_city').append('<option value="Qobuleti">Qobuleti</option>');
			$('#filter_city').append('<option value="Khelvachauri">Khelvachauri</option>');
		  }
		  if($(this).val() == 'guria') {	  
			$('#filter_city').empty();
			$('#filter_city').append('<option selected="selected" value="">City</option>');
			$('#filter_city').append('<option value="Lanchkhuti">Lanchkhuti</option>');
			$('#filter_city').append('<option value="Ozurgeti">Ozurgeti</option>');
			$('#filter_city').append('<option value="Chokhatauri">Chokhatauri</option>');
		  }
		  if($(this).val() == 'tbilisi') {	  
			$('#filter_city').empty();
			$('#filter_city').append('<option selected="selected" value="">City</option>');
			$('#filter_city').append('<option value="Saburtalo">Saburtalo</option>');
			$('#filter_city').append('<option value="Mtatsminda">Mtatsminda</option>');
			$('#filter_city').append('<option value="Krtsanisi">Krtsanisi</option>');
			$('#filter_city').append('<option value="Vake">Vake</option>');
			$('#filter_city').append('<option value="Didube">Didube</option>');
			$('#filter_city').append('<option value="Chugureti">Chugureti</option>');
			$('#filter_city').append('<option value="Gldani">Gldani</option>');
			$('#filter_city').append('<option value="Nadzaladevi">Nadzaladevi</option>');
			$('#filter_city').append('<option value="Isani">Isani</option>');
			$('#filter_city').append('<option value="Samgori">Samgori</option>');
		  }
		  if($(this).val() == 'imereti') {	  
			$('#filter_city').empty();
			$('#filter_city').append('<option selected="selected" value="">City</option>');
			$('#filter_city').append('<option value="Qutaisi">Qutaisi</option>');
			$('#filter_city').append('<option value="Bagdati">Bagdati</option>');
			$('#filter_city').append('<option value="Vani">Vani</option>');
			$('#filter_city').append('<option value="Samtredia">Samtredia</option>');
			$('#filter_city').append('<option value="Zestafoni">Zestafoni</option>');
			$('#filter_city').append('<option value="Terjola">Terjola</option>');
			$('#filter_city').append('<option value="Sachkhere">Sachkhere</option>');
			$('#filter_city').append('<option value="Tkibuli">Tkibuli</option>');
			$('#filter_city').append('<option value="Tskaltubo">Tskaltubo</option>');
			$('#filter_city').append('<option value="Tchiatura">Tchiatura</option>');
			$('#filter_city').append('<option value="Kharagauli">Kharagauli</option>');
			$('#filter_city').append('<option value="Khoni">Khoni</option>');
		  }
		  if($(this).val() == 'samegrelo') {	  
			$('#filter_city').empty();
			$('#filter_city').append('<option selected="selected" value="">City</option>');
			$('#filter_city').append('<option value="Foti">Foti</option>');
			$('#filter_city').append('<option value="Martvili">Martvili</option>');
			$('#filter_city').append('<option value="Zugdidi">Zugdidi</option>');
			$('#filter_city').append('<option value="Abasha">Abasha</option>');
			$('#filter_city').append('<option value="Senaki">Senaki</option>');
			$('#filter_city').append('<option value="Khobi">Khobi</option>');
			$('#filter_city').append('<option value="Chkhorotsku">Chkhorotsku</option>');
			$('#filter_city').append('<option value="Tsalenjikha">Tsalenjikha</option>');
		  }
		  if($(this).val() == 'qvemokartli') {	
			$('#filter_city').append('<option selected="selected" value="">City</option>');  
			$('#filter_city').empty().append('<option value="Rustavi">Rustavi</option>');
		  }		  
	  }
	});
	
	$("#filter_region2").change(function() {
		 
	  if($(this).val() == '') {	  
		$('#filter_city2').empty().append('<option selected="selected" value="">ქალაქი</option>');
	  }	  
	  if($(this).val() == 'adjara') {	  
		$('#filter_city2').empty();
		$('#filter_city2').append('<option selected="selected" value="">ქალაქი</option>');
		$('#filter_city2').append('<option value="ბათუმი">ბათუმი</option>');
		$('#filter_city2').append('<option value="ქობულეთი">ქობულეთი</option>');
		$('#filter_city2').append('<option value="ხელვაჩაური">ხელვაჩაური</option>');
	  }
	  if($(this).val() == 'guria') {	  
		$('#filter_city2').empty();
		$('#filter_city2').append('<option selected="selected" value="">ქალაქი</option>');
		$('#filter_city2').append('<option value="ლანჩხუთი">ლანჩხუთი</option>');
		$('#filter_city2').append('<option value="ოზურგეთი">ოზურგეთი</option>');
		$('#filter_city2').append('<option value="ჩოხატაური">ჩოხატაური</option>');
	  }
	  if($(this).val() == 'tbilisi') {	  
		$('#filter_city2').empty();
		$('#filter_city2').append('<option selected="selected" value="">ქალაქი</option>');
		$('#filter_city2').append('<option value="საბურთალო">საბურთალო</option>');
		$('#filter_city2').append('<option value="მთაწმინდა">მთაწმინდა</option>');
		$('#filter_city2').append('<option value="კრწანისი">კრწანისი</option>');
		$('#filter_city2').append('<option value="ვაკე">ვაკე</option>');
		$('#filter_city2').append('<option value="დიდუბე">დიდუბე</option>');
		$('#filter_city2').append('<option value="ჩუღურეთი">ჩუღურეთი</option>');
		$('#filter_city2').append('<option value="გლდანი">გლდანი</option>');
		$('#filter_city2').append('<option value="ნაძალადევი">ნაძალადევი</option>');
		$('#filter_city2').append('<option value="ისანი">ისანი</option>');
		$('#filter_city2').append('<option value="სამგორი">სამგორი</option>');
	  }
	  if($(this).val() == 'imereti') {	  
		$('#filter_city2').empty();
		$('#filter_city2').append('<option selected="selected" value="">ქალაქი</option>');
		$('#filter_city2').append('<option value="ქუთაისი">ქუთაისი</option>');
		$('#filter_city2').append('<option value="ბაღდათი">ბაღდათი</option>');
		$('#filter_city2').append('<option value="ვანი">ვანი</option>');
		$('#filter_city2').append('<option value="სამტრედია">სამტრედია</option>');
		$('#filter_city2').append('<option value="ზესტაფონი">ზესტაფონი</option>');
		$('#filter_city2').append('<option value="თერჯოლა">თერჯოლა</option>');
		$('#filter_city2').append('<option value="საჩხერე">საჩხერე</option>');
		$('#filter_city2').append('<option value="ტყიბული">ტყიბული</option>');
		$('#filter_city2').append('<option value="წყალტუბო">წყალტუბო</option>');
		$('#filter_city2').append('<option value="ჭიათურა">ჭიათურა</option>');
		$('#filter_city2').append('<option value="ხარაგაული">ხარაგაული</option>');
		$('#filter_city2').append('<option value="ხონი">ხონი</option>');
	  }
	  if($(this).val() == 'samegrelo') {	  
		$('#filter_city2').empty();
		$('#filter_city2').append('<option selected="selected" value="">ქალაქი</option>');
		$('#filter_city2').append('<option value="ფოთი">ფოთი</option>');
		$('#filter_city2').append('<option value="მარტვილი">მარტვილი</option>');
		$('#filter_city2').append('<option value="ზუგდიდი">ზუგდიდი</option>');
		$('#filter_city2').append('<option value="აბაშა">აბაშა</option>');
		$('#filter_city2').append('<option value="სენაკი">სენაკი</option>');
		$('#filter_city2').append('<option value="ხობი">ხობი</option>');
		$('#filter_city2').append('<option value="ჩხოროწყუ">ჩხოროწყუ</option>');
		$('#filter_city2').append('<option value="წალენჯიხა">წალენჯიხა</option>');
	  }
	  if($(this).val() == 'qvemokartli') {	
		$('#filter_city2').append('<option selected="selected" value="">ქალაქი</option>');  
		$('#filter_city2').empty().append('<option value="რუსთავი">რუსთავი</option>');
	  }
	  
	});
	 
});

$(function () {
    $('#category-menu-icon, #category-sidebar').on('mouseover', function (event) {
        $('#hover-category-menu').show();
        $('#category-menu-icon').addClass('active');
    }).on('mouseout', function (event) {
        $('#hover-category-menu').hide();
        $('#category-menu-icon').removeClass('active');
    });

    $('.nav-search-box a').on('click', function(e){
        e.preventDefault();
        $('.search-box').addClass('show');
        $('.search-box input[type="text"]').focus();
    });
    $('.search-box-back button').on('click', function(){
        $('.search-box').removeClass('show');
    });

    // if ($('.slick-slider').length > 0) {
    //     $('.slick-slider').each(function() {
    //         var $this = $(this);
    //         $this.slick({
    //             slidesToShow: 1,
    //             dots: true,
    //             prevArrow: '<button type="button" class="slick-prev"><span class="prev-icon"></span></button>',
    //             nextArrow: '<button type="button" class="slick-next"><span class="next-icon"></span></button>',
    //         });
    //     });
    // }


    /*
        Smooth scroll functionality for anchor links (animates the scroll
        rather than a sudden jump in the page)
    */
    $('.all-category-menu a').bind('click', function(e) {
        e.preventDefault(); // prevent hard jump, the default behavior

        var target = $(this).attr("href"); // Set the target as variable

        $('html, body').stop().animate({
                scrollTop: $(target).offset().top - 120
        }, 600, function() {
                // location.hash = target; //attach the hash (#jumptarget) to the pageurl
        });

        return false;
    });

	// language flag select2
	$('.pickup-select').select2({
        templateResult: pickupInfo,
        escapeMarkup: function(m) { return m; }
    });
    function pickupInfo(state) {
        var address = $(state.element).data('address');
        var phone = $(state.element).data('phone');
		if (!address && !phone) return state.text;
        return '<div class="pickup-name strong-600 heading-6 mb-2">' + state.text + '</div><div class="alpha-7 d-flex line-height-1_2 mb-2 pickup-address"><i class="la la-map-marker mr-1"></i>' + address + '</div><div class="alpha-7 d-flex line-height-1_2 pickup-number"><i class="la la-phone mr-1"></i>' + phone + '</div>';
    }



});


// Bootstrap selected
$('.sortSelect').each(function(index, element) {
    $('.sortSelect').select2({
        theme: "default sortSelectCustom"
    });
});
function morebrands(em){
    if($(em).hasClass('on')){
        $(em).removeClass('on');
        $('#brands-collapse-box').removeClass('full');
        $(em).children('i').addClass('fa-plus').removeClass('fa-minus');
        $(em).children('span').html('More');
    }else {
        $(em).addClass('on');
        $('#brands-collapse-box').addClass('full');
        $(em).children('i').removeClass('fa-plus').addClass('fa-minus');
        $(em).children('span').html('Less');
    }
}
function sideMenuOpen(e){
    event.preventDefault();
    $(e).find('.hamburger-icon').toggleClass('open');
    if ($(e).find('.hamburger-icon').hasClass('open')) {
        $('.side-menu-wrap,.side-menu-overlay').removeClass('opacity-0').addClass('opacity-1');
        $('.side-menu').removeClass('closed').addClass('open');
        $('body').addClass('side-menu-open');
    }else {
        $('.side-menu-wrap,.side-menu-overlay').removeClass('opacity-1').addClass('opacity-0');
        $('.side-menu').removeClass('open').addClass('closed');
        $('body').removeClass('side-menu-open');
    }
}
function sideMenuClose(){
    $('.side-menu-wrap,.side-menu-overlay').removeClass('opacity-1').addClass('opacity-0');
    $('.side-menu').removeClass('open').addClass('closed');
    if ($('.hamburger-icon').hasClass('open')) {
        $('.hamburger-icon').removeClass('open');
        $('body').removeClass('side-menu-open');
    }
}

$(document).ready(function() {
    searchOpen.init();
    var zoomXoffset = 20;
    var zoomposition = 'right';
    if ($('html').attr('dir') === 'rtl') {
        zoomXoffset = -20
        zoomposition = 'left';
    }
    $('.xzoom, .xzoom-gallery').xzoom({
        Xoffset: zoomXoffset,
        bg: true,
        tint: '#000',
        defaultScale: -1,
        position: zoomposition
    });


    $('.tagsInput').tagsinput('items');

	// $('.summernote').summernote({
    //     height: 500,
    //     popover: {
    //         image: [],
    //         link: [],
    //         air: []
    //     }
    // });

	$('.editor').each(function(el){

        var $this = $(this);
        var buttons = $this.data('buttons');
        buttons = !buttons ? "bold,underline,italic,hr,|,ul,ol,|,align,paragraph,|,image,table,link,undo,redo" : buttons;

		var editor = new Jodit(this, {
            "uploader": {
                "insertImageAsBase64URI": true
            },
            "toolbarAdaptive": false,
            "defaultMode": "1",
            "toolbarSticky": false,
            "showXPathInStatusbar": false,
            "buttons": buttons,
        });
    });

    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
    if ($('.slick-carousel').length > 0) {
        $('.slick-carousel').each(function() {
            var $this = $(this);

            var slidesRtl = false;

            var slidesPerViewXs = $this.data('slick-xs-items');
            var slidesPerViewSm = $this.data('slick-sm-items');
            var slidesPerViewMd = $this.data('slick-md-items');
            var slidesPerViewLg = $this.data('slick-lg-items');
            var slidesPerViewXl = $this.data('slick-xl-items');
            var slidesPerView = $this.data('slick-items');

            var slidesCenterMode = $this.data('slick-center');
            var slidesArrows = $this.data('slick-arrows');
            var slidesDots = $this.data('slick-dots');
            var slidesRows = $this.data('slick-rows');
            var slidesAutoplay = $this.data('slick-autoplay');

            slidesPerViewXs = !slidesPerViewXs ? slidesPerView : slidesPerViewXs;
            slidesPerViewSm = !slidesPerViewSm ? slidesPerView : slidesPerViewSm;
            slidesPerViewMd = !slidesPerViewMd ? slidesPerView : slidesPerViewMd;
            slidesPerViewLg = !slidesPerViewLg ? slidesPerView : slidesPerViewLg;
            slidesPerViewXl = !slidesPerViewXl ? slidesPerView : slidesPerViewXl;
            slidesPerView = !slidesPerView ? 1 : slidesPerView;
            slidesCenterMode = !slidesCenterMode ? false : slidesCenterMode;
            slidesArrows = !slidesArrows ? true : slidesArrows;
            slidesDots = !slidesDots ? false : slidesDots;
            slidesRows = !slidesRows ? 1 : slidesRows;
            slidesAutoplay = !slidesAutoplay ? false : slidesAutoplay;

            if ($('html').attr('dir') === 'rtl') {
                slidesRtl = true
            }

            $this.slick({
                slidesToShow: slidesPerView,
                autoplay: slidesAutoplay,
                dots: slidesDots,
                arrows: slidesArrows,
                infinite: true,
                rtl: slidesRtl,
                rows: slidesRows,
                centerPadding: '0px',
                centerMode: slidesCenterMode,
                speed: 300,
                prevArrow: '<button type="button" class="slick-prev"><span class="prev-icon"></span></button>',
                nextArrow: '<button type="button" class="slick-next"><span class="next-icon"></span></button>',
                responsive: [
                    {
                        breakpoint: 1500,
                        settings: {
                            slidesToShow: slidesPerViewXl,
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: slidesPerViewLg,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: slidesPerViewMd,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: slidesPerViewSm,
                            dots: true,
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: slidesPerViewXs,
                            dots: true,
                            arrows: false,
                        }
                    }
                ]
            });
        });
    }


    // color select select2
	$('.color-var-select').select2({
        templateResult: colorCodeSelect,
        templateSelection: colorCodeSelect,
        escapeMarkup: function(m) { return m; }
    });
    function colorCodeSelect(state) {
        var colorCode = $(state.element).val();
        if (!colorCode) return state.text;
        return  "<span class='color-preview' style='background-color:"+colorCode+";'></span>" + state.text;
    }

});
$(window).on('load', function() {

});

$(window).scroll(function() {
    var scrollDistance = $(window).scrollTop();
    $('.sub-category-menu.active').each(function(i) {
            if (($(this).position().top + 120) <= scrollDistance) {
                $('.all-category-menu li.active').removeClass('active');
                $('.all-category-menu li').eq(i).addClass('active');
            }
    });

    var b = $(window).scrollTop();
	/*
    if( b > 120 ){
        $(".logo-bar-area").addClass("sm-fixed-top");
    } else {
        $(".logo-bar-area").removeClass("sm-fixed-top");
    }*/

}).scroll();

$(document).ajaxComplete(function(){
    $('.selectpicker').each(function(index, element) {
        $('.selectpicker').select2({

        });
    });
});
