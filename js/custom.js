$( document ).ready(function() {
    

    $(window).scroll(function () {
        if (($(this).scrollTop() > $('#fiveScreen').offset().top)&&($('.circles').hasClass("animate-scroll"))) {
        $('.circles').removeClass("animate-scroll");

       var bar = new ProgressBar.Circle(circleOne, {
          color: '#aaa',
          strokeWidth: 11,
          trailWidth: 11,
          easing: 'easeInOut',
          duration: 2000,
          text: {
            autoStyleContainer: false
          },
          from: { color: '#aaa', width: 11 },
          to: { color: '#9e0b0f', width: 11 },
          step: function(state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);
            var value = Math.round(circle.value() * 1500);
            if (value === 0) {
              circle.setText('');
            } else {
              circle.setText(value);
            }
          }
        });
        bar.text.style.fontFamily = '"Open Sans", Helvetica, sans-serif';
        bar.text.style.fontSize = '2rem';
        bar.text.style.fontWeight = '700';
        bar.animate(0.8253, 0); 

        var bar2 = new ProgressBar.Circle(circleTwo, {
          color: '#aaa',
          strokeWidth: 11,
          trailWidth: 11,
          easing: 'easeInOut',
          duration: 1000,
          text: {
            autoStyleContainer: false
          },
          from: { color: '#aaa', width: 11 },
          to: { color: '#9e0b0f', width: 11 },
          step: function(state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = Math.round(circle.value() * 15);
            if (value === 0) {
              circle.setText('');
            } else {
              circle.setText(value);
            }
          }
        });
        bar2.text.style.fontFamily = '"Open Sans", Helvetica, sans-serif';
        bar2.text.style.fontSize = '2rem';
        bar2.text.style.fontWeight = '700';
        bar2.animate(0.6667, 0);
    
        var bar3 = new ProgressBar.Circle(circleThree, {
          color: '#aaa',
          strokeWidth: 11,
          trailWidth: 11,
          easing: 'easeInOut',
          duration: 1600,
          text: {
            autoStyleContainer: false
          },
          from: { color: '#aaa', width: 11 },
          to: { color: '#9e0b0f', width: 11 },
          step: function(state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);
            var value = Math.round(circle.value() * 900);
            if (value === 0) {
              circle.setText('');
            } else {
              circle.setText(value);
            }
          }
        });
        bar3.text.style.fontFamily = '"Open Sans", Helvetica, sans-serif';
        bar3.text.style.fontSize = '2rem';
        bar3.text.style.fontWeight = '700';
        bar3.animate(0.8756, 0);  // Number from 0.0 to 1.0
    
    }
    });

    
        $("#menu").mmenu({
            "pageScroll": true,
            extensions:['theme-black', 'effect-menu-slide', 'pagedim-black'],
            navbar: {
                title: '<img style="width:35px; height:30px" src="img/logo.svg" alt="Logo">'
              },
            offCanvas: { 
                position: 'right' 
            }
        });

    function call(ev) {
 	  var msg   = $(ev).closest('form').serialize();
        $.ajax({
          type: 'POST',
          url: '../php/send.php',
          data: msg,
          success: function(data) {
            $(ev).closest('.result').html(data);
            $(ev).slideUp('fast');
          },
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
    }
        
    $("#modal-button").on("click", function(event){
        event.preventDefault();
         
         if(($('[name="phone"]').val()!='')&&($('[name="phone"]').val()!='+7(___)___-__-__')){
            call(this);
         }else{
             $('[name="phone"]').focus();
         }
    });
    $("#sendIndex").on("click", function(event){
        event.preventDefault();
         if(($('[name="phoneIndex"]').val()!='')&&($('[name="phoneIndex"]').val()!='+7(___)___-__-__')){
            call(this);
         }else{
             $('[name="phoneIndex"]').focus();
         }
    });
    $('.popup-with-form').magnificPopup({
		type: 'inline',
		preloader: false,
		focus: '#name',
		callbacks: {
			beforeOpen: function() {
				if($(window).width() < 700) {
					this.st.focus = false;
				} else {
					this.st.focus = '#name';
				}
			}
		}
	});

    $(function(){
      $('[name="phoneIndex"]').mask("+7(999) 999-99-99");
    });
    $(function(){
      $("#phone").mask("+7(999) 999-99-99");
    });
    
    var objTime = 0;
    $.ajax({
          url: '../php/time.php',
          success: function(data) {
            objTime = Number(data);
              if((objTime > 6) && (objTime < 10)){
                  objTime = 10;
              }else if(objTime == 10){
                  objTime = 9;     
              }else if(objTime == 11){
                  objTime = 8;     
              }else if(objTime == 12){
                  objTime = 7;     
              }else if(objTime == 13){
                  objTime = 6;     
              }else if(objTime == 14){
                  objTime = 5;     
              }else if(objTime == 15){
                  objTime = 4;     
              }else if(objTime == 16){
                  objTime = 3;     
              }else if(objTime == 17){
                  objTime = 2;     
              }else if(objTime == 18){
                  objTime = 1;     
              }else{
                  objTime = 0; 
              }
            $("#numerator").text(objTime);
          },
          error:  function(xhr, str){
	           alert('Возникла ошибка: ' + xhr.responseCode);
          }
    });
    
    $("a.ancLinks").click(function () { 
		var elementClick = $(this).attr("href");
		var destination = $(elementClick).offset().top;
		$('html,body').animate( { scrollTop: destination }, 400 );
		return false;
	});
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup, .callme').fadeIn();
        }else{
            $('.scrollup, .callme').fadeOut();
        }
    });
    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
    
    
    $('.zoom-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
			titleSrc: function(item) {
				return item.el.attr('title');
			}
		},
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.find('img');
			}
		}
		
	});
    
    
  $('.slider-rev').slick({
    dots: true,
    arrows: true,
    prevArrow: '.prev-rev',
    nextArrow: '.next-rev',
    infinite: true,
    speed: 700,
    slidesToScroll: 1,
    responsive: [
            {
                breakpoint: 993,
                settings: {
                    arrows: false
                }
            },
            {
                breakpoint: 700,
                settings: {
                    arrows: false
                }
            },
            {
                breakpoint: 480,
                settings: {
                    dots: false,
                    arrows: false
                }
            },
            {
                breakpoint: 350,
                settings: {
                    arrows: false
                }
            }
        ]
  });
    
})


