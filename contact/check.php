<?php
//-------------------------------------------------------------------
// 作成日: 2020/04/09
// 作成者: fukushima
// 内  容: TOP
//-------------------------------------------------------------------

//----------------------------------------
//  共通設定
//----------------------------------------
require "./config.ini";

//----------------------------------------
// お問い合わせ確認
//----------------------------------------
$objContact = new FT_contact();

// 文字エンコード
$arr_post = $objContact->convert( $arr_post );

// チェック
$message = $objContact->check( $arr_post );

unset( $objContact );


//----------------------------------------
//  ヘッダー情報
//----------------------------------------
// タイトル
if( empty( $message["ng"] ) ) {
	$_HTML_HEADER["title"] = "カウンセリングご予約 確認";
}else{
	$_HTML_HEADER["title"] = "カウンセリングご予約";
}

// ディスクリプション
$_HTML_HEADER["description"] = "";

// キーワード
$_HTML_HEADER["keyword"] = "";



//----------------------------------------
//  smarty設定
//----------------------------------------
$smarty = new MySmarty("front");
$smarty->compile_dir .= "contact/";

// オプション設定
$smarty->assign( "OptionTime"      , $OptionTime     );

// テンプレートに設定
$smarty->assign( "message" , $message  );
$smarty->assign( "arr_post", $arr_post );

// エラーチェック
if( empty( $message["ng"] ) ) {
	// 表示
	$smarty->display("check.tpl");
} else {
	// 表示
	$smarty->display("index.tpl");
}

?>
