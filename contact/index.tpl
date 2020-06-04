<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
{include file=$template_meta}
<link rel="stylesheet" href="/common2/css/import.css">
 <link rel="stylesheet" href="/common2/css/style.css">
 <link rel="stylesheet" href="/common2/css/layout.css">
 <link rel="stylesheet" href="/common2/css/base.css">
 <link rel="stylesheet" href="/common2/css/bootstrap-3-grid.css">
{include file=$template_javascript}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
</head>
<body id="contact">
<div id="base">
{include file=$template_header}
<main>
<div id="body">
	<section>
		<div class="wrapper center entry">
			<h2 class="hl_3"><span>カウンセリングご予約</span></h2>
			<div class="box">
					<form action="./check.php#form" method="post">
						<table class="tbl_form">
							<tbody>
								<tr>
									<th scope="row">お名前<span class="need">必須</span></th>
									<td>
										{if !empty($message.ng.name)}<span class="error">※{$message.ng.name}</span>{/if}
										<input type="text" name="name" value="{$arr_post.name}">
									</td>
								</tr>
								<tr>
									<th scope="row">フリガナ<span class="need">必須</span></th>
									<td>
										{if !empty($message.ng.ruby)}<span class="error">※{$message.ng.ruby}</span>{/if}
										<input type="text" name="ruby" value="{$arr_post.ruby}">
									</td>
								</tr>
								<tr>
									<th scope="row">メールアドレス<span class="need">必須</span></th>
									<td>
										{if !empty($message.ng.mail)}<span class="error">※{$message.ng.mail}</span>{/if}
										<input type="text" name="mail" value="{$arr_post.mail}" maxlength="255" >
									</td>
								</tr>
								<tr>
									<th scope="row">電話番号<span class="need">必須</span></th>
									<td>
										{if !empty($message.ng.tel)}<span class="error">※{$message.ng.tel}</span>{/if}
										<input type="text" name="tel" value="{$arr_post.tel}" maxlength="13" class="w150" placeholder="090-000-000">
									</td>
								</tr>
								<tr>
									<th scope="row">生年月日<span class="need">必須</span></th>
									<td>
										{if !empty($message.ng.birthday)}<span class="error">※{$message.ng.birthday}</span>{/if}
										{html_select_date2 field_array=birthday field_order=ymd order_format="%Y年 %M月 %D日" prefix="" year_empty="--" month_empty="--" day_empty="--" end_year="-100" month_format="%m" time=$arr_post.birthday|default:"0000-00-00" reverse_years=true}
									</td>
								</tr>
								<tr class="border_none">
									<th scope="row">ご希望日時（第1希望）<span class="need">必須</span></th>
									<td>
										{if !empty($message.ng.date1)}<span class="error">※{$message.ng.date1}</span>{/if}
										<input name="date1" class="datepicker" readonly="readonly" placeholder="年/月/日" value="{$arr_post.date1}">
										{if !empty($message.ng.time1)}<span class="error">※{$message.ng.time1}</span>{/if}
										<select name="time1" id="time1" class="mb10">
											<option value="">選択してください</option>
											{html_options options=$OptionTime selected=$arr_post.time1}
										</select>
									</td>
								</tr>
								<tr class="border_none">
									<th scope="row">ご希望日時（第2希望）<span class="need">必須</span></th>
									<td>
										{if !empty($message.ng.date2)}<span class="error">※{$message.ng.date2}</span>{/if}
										<input name="date2" class="datepicker" readonly="readonly" placeholder="年/月/日" value="{$arr_post.date2}">
										{if !empty($message.ng.time2)}<span class="error">※{$message.ng.time2}</span>{/if}
										<select name="time2" id="time2" class="mb10">
											<option value="">選択してください</option>
											{html_options options=$OptionTime selected=$arr_post.time2}
										</select>
									</td>
								</tr>
								<tr>
									<th scope="row">ご希望日時（第3希望）<span class="need">必須</span></th>
									<td>
										{if !empty($message.ng.date3)}<span class="error">※{$message.ng.date3}</span>{/if}
										<input name="date3" class="datepicker" readonly="readonly" placeholder="年/月/日" value="{$arr_post.date3}">
										{if !empty($message.ng.time3)}<span class="error">※{$message.ng.time3}</span>{/if}
										<select name="time3" id="time3" class="mb10">
											<option value="">選択してください</option>
											{html_options options=$OptionTime selected=$arr_post.time3}
										</select>
									</td>
								</tr>
								<tr class="last">
									<th scope="row">備考内容</th>
									<td>
										{if !empty($message.ng.comment)}<span class="error">※{$message.ng.comment}</span>{/if}
										<textarea rows="5" name="comment">{$arr_post.comment}</textarea>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="pos_ac form_button mb20">
							<button class="button" type="submit">入力内容を確認する<i class="fas fa-chevron-circle-right"></i></button>
						</div>
					</form>
				</div>
		</div>
	</section>
</div>
</main>
{include file=$template_footer}
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
<script>
{literal}
$(function(){
	$(".datepicker").datepicker({
		dateFormat: 'yy/mm/dd',
		minDate: "+1d",
		showButtonPanel: true,
		closeText: '選択解除',
		onClose: function (){
			var event = arguments.callee.caller.caller.arguments[0];
			if ($(event.delegateTarget).hasClass('ui-datepicker-close')) { $(this).val(''); }
		},
		beforeShowDay: function (date) {
			var ymd = date.getFullYear() + ('0' + (date.getMonth() + 1)).slice(-2) + ('0' +  date.getDate()).slice(-2);
			if (date.getDay() == 3) {
				// 水曜日
				return [false, 'ui-state-disabled'];
			} else {
				 // 平日
				return [true, ''];
			}
		}
	});
});
{/literal}
</script>
</body>
</html>
