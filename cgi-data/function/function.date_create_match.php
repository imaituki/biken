<?php

//----------------------------------------------------------------------------
// 関数名：date_create（ベータ版）
// 引  数：$date - 入力日付
//       : $pattern - 区切り文字（デフォルト - ハイフン）
// 戻り値：日付データ
// 内  容：入力日付を任意のフォーマットに合わせる。(年月日は未処理)
//----------------------------------------------------------------------------
function date_create_match( $date, $pattern = "-" ) {

	$date = str_replace( array( "/", "-", "ー", "／" ), $pattern, $date );

	foreach ( array( "年", "月", "日" ) as $key => $val ) {
		$date = ( $val == "日" ) ? str_replace( $val, "", $date ) : str_replace( $val, "-", $date );
	}

	// 一桁から二桁に変換処理
	$date = explode( "-", $date );

	// 月
	if( mb_strlen( $date[1] ) == 1 ){
		$date[1] = "0" . $date[1];
	}
	// 日
	if( mb_strlen( $date[2] ) == 1 ){
		$date[2] = "0" . $date[2];
	}
	$date = array( $date[0], $date[1], $date[2] );
	$date = implode( "-", $date );
	$date = str_replace( "--", "", $date );

	return $date;
}
?>
