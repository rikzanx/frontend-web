$('a[data-toggle="tab"]').on('hide.bs.tab', function (e) {
	var $old_tab = $($(e.target).attr("href"));
	var $new_tab = $($(e.relatedTarget).attr("href"));

	$old_tab.css('position', 'relative').css("left", "0").show();
	$old_tab.animate({"left":"-100%"}, 300, function () {
		$old_tab.css("left", 0).removeAttr("style");
	});
});

$('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
	var $new_tab = $($(e.target).attr("href"));
	var $old_tab = $($(e.relatedTarget).attr("href"));

	$new_tab.css('position', 'relative').css("right", "-2500px");
	$new_tab.animate({"right":"0"}, 500);
});

// $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
// 	// your code on active tab shown
// });

$('#playButton').on('click', function(e) {
	e.preventDefault();
	$("#player")[0].src += "?autoplay=1";
	$('#player').show();
	$('#videoCover').hide();
	$('#playButton').hide();
});

// animasi kata mereka
var jumlahImgWrapper = $('.img-wrapper').length;
$('#btnNext').on('click', function(e) {
	var activeItem = $('.img-wrapper.active');
	var index = $('.img-wrapper').index(activeItem);
	if(index == 0){
		var nextIndex = index + 1;
		var nextIndex2 = index + 2;
	} else if(index == (jumlahImgWrapper - 1)){
		var nextIndex = 0;
		var nextIndex2 = 1;
	} else {
		var nextIndex = index + 1;
		if(nextIndex == (jumlahImgWrapper - 1)){
			var nextIndex2 = 0;
		} else {
			var nextIndex2 = index + 2;
		}
	}
	$('.img-wrapper').eq(index).addClass('fadeOutUp');
	$('.img-wrapper').eq(index).find('img').addClass('fadeOutRight');
	$('.text-content').children().eq(index).addClass('fadeOutRight');
	$('.nama-wrapper').children().eq(index).addClass('fadeOut');
	$('.nama-wrapper-mobile').children('p').eq(index).addClass('fadeOut');
	$('.dot-container').children().eq(index).removeClass('active');
	$('.dot-container').children().eq(nextIndex).addClass('active');
	setTimeout(() => {
		$('.img-wrapper').eq(index).removeClass('active fadeOutUp');
		$('.img-wrapper').eq(nextIndex).removeClass('pre-active').addClass('active');
		$('.img-wrapper').eq(index).find('img').removeClass('fadeOutRight');
		$('.img-wrapper').eq(nextIndex2).addClass('pre-active');

		$('.text-content').children().eq(index).removeClass('active fadeOutRight');
		$('.text-content').children().eq(nextIndex).addClass('active fadeInLeft');
		$('.nama-wrapper').children().eq(index).removeClass('active fadeOut');
		$('.nama-wrapper').children().eq(nextIndex).addClass('active fadeIn');
		$('.nama-wrapper-mobile').children('p').eq(index).removeClass('active fadeOut');
		$('.nama-wrapper-mobile').children('p').eq(nextIndex).addClass('active fadeIn');
	}, 300);
});

$('#btnPrev').on('click', function(e) {
	var activeItem = $('.img-wrapper.active');
	var index = $('.img-wrapper').index(activeItem);
	if(index == 0){
		var nextIndex = index + 1;
		var prevIndex = jumlahImgWrapper - 1;
	} else if(index == (jumlahImgWrapper - 1)){
		var nextIndex = 0;
		var prevIndex = index - 1;
	} else {
		var nextIndex = index + 1;
		var prevIndex = index - 1;
	}
	$('.img-wrapper').eq(index).addClass('fadeOutDown');
	$('.img-wrapper').eq(index).find('img').addClass('fadeOutLeft');
	$('.text-content').children().eq(index).addClass('fadeOutLeft');
	$('.nama-wrapper').children().eq(index).addClass('fadeOut');
	$('.dot-container').children().eq(index).removeClass('active');
	$('.dot-container').children().eq(prevIndex).addClass('active');
	setTimeout(() => {
		$('.img-wrapper').eq(index).removeClass('active fadeOutDown');
		$('.img-wrapper').eq(nextIndex).removeClass('pre-active');
		$('.img-wrapper').eq(prevIndex).addClass('active');
		$('.img-wrapper').eq(index).find('img').removeClass('fadeOutLeft');
		$('.img-wrapper').eq(index).addClass('pre-active');

		$('.text-content').children().eq(index).removeClass('active fadeOutLeft');
		$('.text-content').children().eq(prevIndex).addClass('active fadeInRight');
		$('.nama-wrapper').children().eq(index).removeClass('active fadeOut');
		$('.nama-wrapper').children().eq(prevIndex).addClass('active fadeIn');
		$('.nama-wrapper-mobile').children('p').eq(index).removeClass('active fadeOut');
		$('.nama-wrapper-mobile').children('p').eq(prevIndex).addClass('active fadeIn');
	}, 300);
});

// end animasi kata mereka

$(window).resize(function() {
	$('.link-wrapper').height($('.link-wrapper').children().eq(0).height())
	$('.link-wrapper').width($('.link-wrapper').children().eq(0).width())
});

jQuery(document).ready(function($){
	//set animation timing
	var animationDelay = 4000;

	initHeadline();


	function initHeadline() {
		//initialise headline animation
		animateHeadline($('#bannerContent'));
	}

	function animateHeadline($headlines) {
		var duration = animationDelay;
		$headlines.each(function(){
			var headline = $(this);
			$('.link-wrapper').height($('.link-wrapper').children().eq(0).height())
			$('.link-wrapper').width($('.link-wrapper').children().eq(0).width())

			//trigger animation
			setTimeout(function(){ hideWord( headline.find('.is-visible').eq(0) ) }, duration);
		});
	}

	function hideWord($word) {
		var nextWord = takeNext($word);

		switchWord($word, nextWord);
		setTimeout(function(){ hideWord(nextWord) }, animationDelay);
	}

	function takeNext($word) {
		return (!$word.is(':last-child')) ? $word.next() : $word.parent().children().eq(0);
	}

	function switchWord($oldWord, $newWord) {
		$oldWord.removeClass('is-visible').addClass('is-hidden');
		$newWord.removeClass('is-hidden').addClass('is-visible');
		$('.link-wrapper').width($newWord.width())
	}
});
