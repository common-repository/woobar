(function($) {
    'use strict';

    jQuery(document).ready(function() {

	    // Adjust the margin/offset
	    $(document).on('batil_init', function(){
	    	var batilHeight = $('.batil-container').height();
	    	$('html').animate({ marginTop: batilHeight+'px' }, 200);
	    	console.log('batil bar initialized');
	    });

    	// batil Dismiss
	    $( '.batil-dissmiss-btn' ).on( 'click', function(){
	    	$( '.batil-container' ).fadeOut( 'slow', function(){
	    		$(this).remove();
	    		$('html').animate({ marginTop: '0px' }, 200);
	    	});
	    });

		// Set the date we're counting down to
		var getCountDate = $('.batil-countdown-wrapper').attr('data-date');
		var countDownDate = new Date( getCountDate ).getTime();

		// Get coundter style Id
		var dataStyleId = $('.batil-countdown-wrapper').attr('data-style-id');

		if( dataStyleId == '4' ){
			batilFlipClock();			
		}else{
			batilCounterInit();
		}

		// Normal Style Countdown
		function batilCounterInit(){
			// Update the count down every 1 second
			var x = setInterval( function() {

				/// Grab the current date
				var currentDate = new Date().getTime();

				// Find the distance between now an the count down date
				var distance = countDownDate - currentDate;
				
				// Time calculations for days, hours, minutes and seconds
				var days = Math.floor( distance / ( 1000 * 60 * 60 * 24 ) );
				var hours = Math.floor( ( distance % ( 1000 * 60 * 60 * 24 ) ) / ( 1000 * 60 * 60 ) );
				var minutes = Math.floor( ( distance % ( 1000 * 60 * 60 ) ) / ( 1000 * 60 ) );
				var seconds = Math.floor( ( distance % ( 1000 * 60 ) ) / 1000 );
				
							
				$("#second-item").html( seconds );
				$("#minutes-item").html( minutes );
				$("#hours-item").html( hours );
				$("#day-item").html( days );
				
				// If the count down is over, write some text 
				if (distance < 0) {
					clearInterval(x);
					//$("#second-item").html( 'EXPIRED' );
					$("#second-item").html( '0' );
					$("#minutes-item").html( '0' );
					$("#hours-item").html( '0' );
					$("#day-item").html( '0' );
				}
			}, 1000);
		}

		// FlipClock Countdown 
		function batilFlipClock(){

			//FlipClock Language Localization		 
			FlipClock.Lang.Batil = {				
				'years'   : batil_object.years,
				'months'  : batil_object.months,
				'days'    : batil_object.days,
				'hours'   : batil_object.hours,
				'minutes' : batil_object.minutes,
				'seconds' : batil_object.seconds
			};		

			FlipClock.Lang['custom'] = FlipClock.Lang.Batil;			
			
			// Grab the current date
			var currentDate = new Date().getTime();

			// Calculate the difference in seconds between the future and current date
			var diff = countDownDate / 1000 - currentDate / 1000;
			
			// If the count down is over, set 0
			if(diff < 0) {
				diff = 0;
			}

			// Instantiate a coutdown FlipClock
			$('.clock').FlipClock(diff, {
				clockFace: 'DailyCounter',
				countdown: true,
				language: 'custom',
			});	
		}
		

    });

})(jQuery);