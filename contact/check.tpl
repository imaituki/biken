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
				<p class="mb10 c_red">まだフォームの送信は完了していません。</p>
				<p class="mb30">下記内容をご確認の上、「送信する」ボタンを押してください。</p>
				<form action="./#form" method="post">
					<table class="tbl_form mb50 check">
						<tbody>
							<tr>
								<th scope="row">お名前</th>
								<td>{$arr_post.name}<input type="hidden" name="name" value="{$arr_post.name}"></td>
							</tr>
							<tr>
								<th scope="row">フリガナ</th>
								<td>{$arr_post.ruby}<input type="hidden" name="ruby" value="{$arr_post.ruby}"></td>
							</tr>
							<tr>
								<th scope="row">メールアドレス</th>
								<td>
									{$arr_post.mail}
									<input type="hidden" name="mail" value="{$arr_post.mail}">
								</td>
							</tr>
							<tr>
								<th scope="row">電話番号</th>
								<td>
									{$arr_post.tel}
									<input type="hidden" name="tel" value="{$arr_post.tel}">
								</td>
							</tr>
							<tr>
								<th scope="row">生年月日</th>
								<td>
									{$arr_post.birthday|implode:"/"|date_format:"%Y年%m月%d日"}
									<input type="hidden" name="birthday[Year]" value="{$arr_post.birthday.Year|default:''}">
									<input type="hidden" name="birthday[Month]" value="{$arr_post.birthday.Month|default:''}">
									<input type="hidden" name="birthday[Day]" value="{$arr_post.birthday.Day|default:''}">
								</td>
							</tr>
							<tr>
								<th scope="row">ご希望日時（第1希望）</th>
								<td>
									{$arr_post.date1} {$OptionTime[$arr_post.time1]}
									<input type="hidden" name="date1" value="{$arr_post.date1}">
									<input type="hidden" name="time1" value="{$arr_post.time1}">
								</td>
							</tr>
							<tr>
								<th scope="row">ご希望日時（第2希望）</th>
								<td>
									{$arr_post.date2} {$OptionTime[$arr_post.time2]}
									<input type="hidden" name="date2" value="{$arr_post.date2}">
									<input type="hidden" name="time2" value="{$arr_post.time2}">
								</td>
							</tr>
							<tr>
								<th scope="row">ご希望日時（第3希望）</th>
								<td>
									{$arr_post.date3} {$OptionTime[$arr_post.time3]}
									<input type="hidden" name="date3" value="{$arr_post.date3}">
									<input type="hidden" name="time3" value="{$arr_post.time3}">
								</td>
							</tr>
							<tr>
								<th scope="row">備考</th>
								<td>
									{$arr_post.comment|nl2br}
									<input type="hidden" name="comment" value="{$arr_post.comment}">
								</td>
							</tr>
						</tbody>
					</table>
					<div class="row form_button _check">
						<div class="col-sm-6 mb20 left">
							<button class="button _back" type="submit"><i class="fas fa-chevron-circle-left"></i>修正する</button>
						</div>
						<div class="col-sm-6 right">
							<button id="send_button" class="button" type="submit">送信する<i class="fas fa-chevron-circle-right"></i></button>
						</div>
					</div>
				</form>
			</div>
        </div>
	</section>
</div>
</main>
{include file=$template_footer}
</div>
</body>
</html>
