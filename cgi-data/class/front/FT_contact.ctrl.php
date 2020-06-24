<?php
//----------------------------------------------------------------------------
// 作成日: 2016/11/01
// 作成者: yamada
// 内  容: お問い合わせ操作クラス
//----------------------------------------------------------------------------

//-------------------------------------------------------
//  クラス
//-------------------------------------------------------
class FT_contact {

	//-------------------------------------------------------
	//  変数宣言
	//-------------------------------------------------------

	// XML操作クラス
	var $_FN_xml = null;


	//-------------------------------------------------------
	// 関数名：__construct
	// 引  数：$dbconn  ： DB接続オブジェクト
	// 戻り値：なし
	// 内  容：コンストラクタ
	//-------------------------------------------------------
	function __construct( $xmlPath = NULL ) {

		// XML操作
		if( $xmlPath != null ){
			$this->_FN_xml = new FN_xml( $xmlPath );
		}
	}


	//-------------------------------------------------------
	// 関数名: __destruct
	// 引  数: なし
	// 戻り値: なし
	// 内  容: デストラクタ
	//-------------------------------------------------------
	function __destruct() {

	}


	//-------------------------------------------------------
	// 関数名: convert
	// 引  数: $arrVal
	// 戻り値: データ変換
	// 内  容: データ変換を行う
	//-------------------------------------------------------
	function convert( $arrVal ) {

		// データ変換クラス宣言
		$objInputConvert = new FN_input_convert( $arrVal, "UTF-8" );

		// 変換エントリー
		$objInputConvert->entryConvert( "mail", array("ENC_KANA"), "a" );
		$objInputConvert->entryConvert( "zip", array( "ENC_KANA" ),  "n" );


		// 変換実行
		$objInputConvert->execConvertAll();

		// 戻り値
		return $objInputConvert->GetData();
	}


	//-------------------------------------------------------
	// 関数名: check
	// 引  数: $arrVal
	// 戻り値: エラーメッセージ
	// 内  容: データチェック
	//-------------------------------------------------------
	function check( &$arrVal ) {

		// チェッククラス宣言
		$objInputCheck = new FN_input_check( "UTF-8" );

		// チェックエントリー
		$objInputCheck->entryData( "お名前", "name", $arrVal["name"], array( "CHECK_EMPTY", "CHECK_MIN_MAX_LEN" ), 0, 255 );
		$objInputCheck->entryData( "フリガナ", "ruby", $arrVal["ruby"], array( "CHECK_EMPTY", "CHECK_KANA", "CHECK_MIN_MAX_LEN" ), 0, 255 );
		$objInputCheck->entryData( "メールアドレス" , "mail", $arrVal["mail"], array( "CHECK_EMPTY", "CHECK_MAIL" ), null, null );
		$objInputCheck->entryData( "電話番号", "tel", $arrVal["tel"], array( "CHECK_EMPTY", "CHECK_TEL" ), null, null );
		$objInputCheck->entryData( "生年月日", "birthday", implode( "/", $arrVal["birthday"] ), array( "CHECK_EMPTY", "CHECK_DATE" ), null, null );
		$objInputCheck->entryData( "ご希望日（第1希望）", "date1", $arrVal["date1"], array( "CHECK_EMPTY", "CHECK_DATE" ), null, null );
		$objInputCheck->entryData( "ご希望日（第2希望）", "date2", $arrVal["date2"], array( "CHECK_EMPTY", "CHECK_DATE" ), null, null );
		$objInputCheck->entryData( "ご希望日（第3希望）", "date3", $arrVal["date3"], array( "CHECK_EMPTY", "CHECK_DATE" ), null, null );
		$objInputCheck->entryData( "ご希望時間（第1希望）", "time1", $arrVal["time1"], array( "CHECK_EMPTY", "CHECK_NUM" ), null, null );
		$objInputCheck->entryData( "ご希望時間（第2希望）", "time2", $arrVal["time2"], array( "CHECK_EMPTY", "CHECK_NUM" ), null, null );
		$objInputCheck->entryData( "ご希望時間（第3希望）", "time3", $arrVal["time3"], array( "CHECK_EMPTY", "CHECK_NUM" ), null, null );
		// $objInputCheck->entryData( "備考内容", "comment", $arrVal["comment"], array( "CHECK_EMPTY" ), null, null );


		// チェック実行
		$res["ng"] = $objInputCheck->execCheckAll();

		// 重複チェック
		if( $arrVal["content"] == 0 && empty( $res["ng"]["date1"] ) && empty( $res["ng"]["time1"] ) && empty( $res["ng"]["date2"] )  && empty( $res["ng"]["time2"] ) && empty( $res["ng"]["date3"] ) && empty( $res["ng"]["time3"] ) ){
			$date_time = array( $arrVal["date1"].$arrVal["time1"], $arrVal["date2"].$arrVal["time2"], $arrVal["date3"].$arrVal["time3"] );
			$date_time = array_filter( $date_time );
			if( $date_time != array_unique( $date_time ) ){
				$res["ng"]["date1"] .= "ご希望日時が重複しています。";
			}
		}

		// 生年月日が空のとき
		if( $arrVal["content"] == 0 && empty( $res["ng"]["birthday"] ) && empty( $arrVal["birthday"]["Year"] ) && empty( $arrVal["birthday"]["Month"] ) && empty( $arrVal["birthday"]["Day"] ) ){
			$res["ng"]["birthday"] = " 生年月日は必ず入力してください。";
		}

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名: GetArrayXml
	// 引  数: なし
	// 戻り値: XML配列データ
	// 内  容: XML配列データを取得
	//-------------------------------------------------------
	function GetArrayXml() {
		return $this->_FN_xml->GetArrayXml( null, true, null );
	}


	//-------------------------------------------------------
	// 関数名: GetAttrXml
	// 引  数: $xml - xml配列データ
	// 戻り値: XML属性データ
	// 内  容: XML属性データを取得
	//-------------------------------------------------------
	function GetAttrXml( $xml ) {
		return $this->_FN_xml->GetAttrXml( $xml );
	}


	//-------------------------------------------------------
	// 関数名: GetDataXml
	// 引  数: $xml - xml配列データ
	// 戻り値: XMLデータ
	// 内  容: XMLデータを取得
	//-------------------------------------------------------
	function GetDataXml( $xml ) {
		return $this->_FN_xml->GetDataXml( $xml );
	}

}
?>
