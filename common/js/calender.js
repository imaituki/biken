// jquery.calender
$(function(){
	// 初期非表示
	$('.item_popup').hide();
	
	// 予定クリック
	$('.item .trigger').on('click',function(){
		$('.item_popup').hide();
		$(this).next('.item_popup').show();
		return false;
	});
	
	// 閉じるボタンクリック
	$('.item_popup .close').on('click',function(){
		$('.item_popup').hide();
		return false;
	});
	
	// スクロール;
	var cals_flug = true;
	var cals_e = '';
	$('#playroom .calender_wrap').scroll(function(){
		if( cals_flug == true ){
			cals_flug = false;
			cals_e = $(this);
			
			setTimeout(function(){
				var top = $(cals_e).scrollTop();
				var left = $(cals_e).scrollLeft();
				$('.tbl_head_wrap').css('top',top);
				$('.tbl_side_wrap').css('left',left);
				$('.tbl_head_empty').css({'top':top, 'left':left});
				cals_flug = true;
				return cals_flug;
			}, 5);
		}
	});
});
