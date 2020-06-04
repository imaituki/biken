<?php
//----------------------------------------------------------------------------
// 作成日： 2020/02/20
// 作成者： 福嶋
// 内  容： 予約カレンダーカレンダー情報操作クラス
//----------------------------------------------------------------------------

//-------------------------------------------------------
//  クラス
//-------------------------------------------------------
class AD_calendar {

	//-------------------------------------------------------
	//  変数宣言
	//-------------------------------------------------------
	// DB接続
	var $_DBconn = null;

	// 主テーブル
	var $_CtrTable   = "t_calendar";
	var $_CtrTablePk = "id_calendar";

	// コントロール機能（ログ用）
	var $_CtrLogName = "予約カレンダー";

	//-------------------------------------------------------
	// 関数名：__construct
	// 引  数：$dbconn  ： DB接続オブジェクト
	// 戻り値：なし
	// 内  容：コンストラクタ
	//-------------------------------------------------------
	function __construct( $dbconn ) {

		// クラス宣言
		if( !empty( $dbconn ) ) {
			$this->_DBconn  = $dbconn;
		} else {
			$this->_DBconn  = new DB_manage( _DNS );
		}
		
	}


	//-------------------------------------------------------
	// 関数名：__destruct
	// 引  数：なし
	// 戻り値：なし
	// 内  容：デストラクタ
	//-------------------------------------------------------
	function __destruct() {

	}

	//-------------------------------------------------------
	// 関数名：convert
	// 引  数：$arrVal
	// 戻り値：データ変換
	// 内  容：データ変換を行う
	//-------------------------------------------------------
	function convert( $arrVal ) {

		// データ変換クラス宣言
		$objInputConvert = new FN_input_convert( $arrVal, "UTF-8" );

		// 変換エントリー
		//$objInputConvert->entryConvert( "url", array( "ENC_KANA" ), "a" );

		// 変換実行
		$objInputConvert->execConvertAll();

		// 戻り値
		return $objInputConvert->GetData();

	}

	//-------------------------------------------------------
	// 関数名：check2
	// 引  数：$arrVal
	// 戻り値：エラーメッセージ
	// 内  容：データチェック
	//-------------------------------------------------------
	function check( &$arrVal, $mode ) {

		// チェッククラス宣言
		$objInputCheck = new FN_input_check( "UTF-8" );

		// チェックエントリー
		if( ( strcmp( $mode, "insert" ) == 0 ) ) {
			$objInputCheck->entryData( "予約日時", "date"  , $arrVal["date"]  , array( "CHECK_EMPTY", "CHECK_DATE" ), null, null );
			$objInputCheck->entryData( "予約日時", "time"  , $arrVal["time"]  , array( "CHECK_EMPTY" ), null, null );
		}elseif( ( strcmp( $mode, "update" ) == 0 ) ) {
			$objInputCheck->entryData( "予約日時", "date"  , $arrVal["date"]  , array( "CHECK_DATE" ), null, null );
		}
		$objInputCheck->entryData( "お名前"    , "name"  , $arrVal["name"] , array( "CHECK_EMPTY", "CHECK_MAX_LEN" ), null, 255 );
		$objInputCheck->entryData( "ふりがな"    , "ruby"  , $arrVal["ruby"] , array( "CHECK_MAX_LEN" ), null, 255 );
		$objInputCheck->entryData( "年齢"    , "age"  , $arrVal["age"] , array( "CHECK_MAX_LEN" ), null, 255 );
		$objInputCheck->entryData( "性別"    , "sex"  , $arrVal["sex"] , array( "CHECK_MAX_LEN" ), null, 255 );
		$objInputCheck->entryData( "電話番号"   , "tel"  , $arrVal["tel"] , array( "CHECK_TEL", "CHECK_MAX_LEN" ), null, 255 );
		$objInputCheck->entryData( "メールアドレス", "mail"  , $arrVal["mail"] , array( "CHECK_MAIL", "CHECK_MAX_LEN" ), null, 255 );
		$objInputCheck->entryData( "生年月日", "birthday"  , $arrVal["birthday"]  , array( "CHECK_DATE" ), null, null );

		// チェックエントリー（UPDATE時）
		if( ( strcmp( $mode, "update" ) == 0 ) ) {
			$objInputCheck->entryData( "ID", "all", $arrVal["id_calendar"], array( "CHECK_EMPTY", "CHECK_NUM" ), null, null );
		}

		// チェック実行
		$res["ng"] = $objInputCheck->execCheckAll();

		// 予約日時
		if( empty( $arrVal["date"] ) ){
			$arrVal["date"] = NULL;
		}
		if( empty( $arrVal["time"] ) ){
			$arrVal["time"] = NULL;
		}

		// 戻り値
		return $res;

	}
	//-------------------------------------------------------
	// 関数名：insert
	// 引  数：$arrVal - 登録データ（ 'カラム名' => '値' ）
	//       ：$arrSql - 登録データ（ 'カラム名' => 'SQL' ）
	// 戻り値：なし
	// 内  容：データ登録
	//-------------------------------------------------------
	function insert( $arrVal, $arrSql = null ) {

		// 登録データの作成
		$arrVal = $this->_DBconn->arrayKeyMatchFecth( $arrVal, "/^[^\_]/" );
		$arrVal["confirm_flg"] = 1;
		$arrVal["entry_date"]  = date( "Y-m-d H:i:s" );
		$arrVal["update_date"] = date( "Y-m-d H:i:s" );

		// 登録
		$res = $this->_DBconn->insert( $this->_CtrTable, $arrVal, $arrSql );

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名：update
	// 引  数：$arrVal - 登録データ（ 'カラム名' => '値' ）
	//       ：$arrSql - 登録データ（ 'カラム名' => 'SQL' ）
	// 戻り値：なし
	// 内  容：データ更新
	//-------------------------------------------------------
	function update( $arrVal, $arrSql = null ) {

		// 登録データの作成
		$arrVal = $this->_DBconn->arrayKeyMatchFecth( $arrVal, "/^[^\_]/" );
		$arrVal["update_date"] = date( "Y-m-d H:i:s" );
		if( !empty( $arrVal["date"] ) && !empty( $arrVal["time"] ) ){
			$arrVal["confirm_flg"] = 1;
		}
		if( !empty( $arrVal["cancel_flg"] ) && is_array( $arrVal["cancel_flg"] ) ) {
			$arrVal["cancel_flg"] = implode( ",", $arrVal["cancel_flg"] );
		}else{
			$arrVal["cancel_flg"] = 0;
		}
		// 更新条件
		$where = $this->_CtrTablePk . " = " . $arrVal["id_calendar"];

		// 更新
		$res = $this->_DBconn->update( $this->_CtrTable, $arrVal, $arrSql, $where );

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名：delete
	// 引  数：$id - 削除するID
	// 戻り値：true - 正常, false - 異常
	// 内  容：データ削除
	//-------------------------------------------------------
	function delete( $id ) {

		// 初期化
		$res = false;

		// 更新
		$res = $this->_DBconn->update( $this->_CtrTable, array( "delete_flg" => 1 ), null, $this->_CtrTablePk . " = " . $id );

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名：changeDisplay
	// 引  数：$id  - ID
	//       ：$flg - フラグ
	// 戻り値：true - 正常, false - 異常
	// 内  容：表示切り替え
	//-------------------------------------------------------
	function changeDisplay( $id, $flg ) {

		// 初期化
		$res = false;

		// 切り替え処理
		$res = $this->_DBconn->update( $this->_CtrTable, array( "display_flg" => $flg ), null, $this->_CtrTablePk . " = " . $id );

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名：GetSearchList
	// 引  数：$search - 検索条件
	//       ：$option - 取得条件
	// 戻り値：リスト
	// 内  容：検索を行いデータを取得
	//-------------------------------------------------------
	function GetSearchList( $search, $option = null ) {

		// SQL配列
		$creation_kit = array(  "select" => "*",
								"from"   => $this->_CtrTable,
								"where"  => "delete_flg = 0 ",
								"order"  => "date ASC"
							);

		// 検索条件
		if( !empty( $search["search_keyword"] ) ) {
			$creation_kit["where"] .= "AND ( " . $this->_DBconn->createWhereSql( $search["search_keyword"], "title", "LIKE", "OR", "%string%" ) . " ) ";
		}

		if( !empty( $search["search_date_start"] ) ) {
			$creation_kit["where"] .= "AND " . $this->_DBconn->createWhereSql( "'" . $search["search_date_start"] . "'", $this->_CtrTable . ".date", " >= ", null, null ) . " ";
		}
		if( !empty( $search["search_date_end"] ) ) {
			$creation_kit["where"] .= "AND " . $this->_DBconn->createWhereSql( "'" . $search["search_date_end"] . "'", $this->_CtrTable . ".date", " <= ", null, null ) . " ";
		}

		if( !empty( $search["category"] ) ) {
			$creation_kit["where"] .= "AND ( " . $this->_DBconn->createWhereSql( $search["category"], "category", "LIKE", null, "%string%" ) . " ) ";
		}

		// 取得条件
		if( empty( $option ) ) {

			// ページ切り替え配列
			$_PAGE_INFO = array( "PageNumber"      => ( !empty( $search["page"] ) ) ? $search["page"] : 1,
								 "PageShowLimit"   => _PAGESHOWLIMIT,
								 "PageNaviLimit"   => _PAGENAVILIMIT,
								 "LinkSeparator"   => " | ",
								 "PageUrlFreeMode" => 1,
								 "PageFileName"    => "javascript:changePage(%d);" );

			// オプション
			$option = array( "fetch" => _DB_FETCH_ALL,
							 "page"  => $_PAGE_INFO );

		}

		// データ取得
		$res = $this->_DBconn->selectCtrl( $creation_kit, $option );

		// 戻り値
		return $res;

	}

	//-------------------------------------------------------
	// 関数名：GetSearchCalendarList
	// 引  数：検索条件
	// 戻り値：予約リスト
	// 内  容：予約検索を行いデータを取得
	//-------------------------------------------------------
	function GetSearchCalendarList( $search ) {
		
		// SQL配列
		$creation_kit = array(  "select" => "*",
								"from"   => $this->_CtrTable,
								"where"  => "delete_flg = 0 ",
								"order"  => "date ASC, time ASC"
							);

		// 検索条件
		if( !empty( $search["search_date_start"] ) ) {
			$creation_kit["where"] .= "AND ( ( confirm_flg = 1 AND ( " . $this->_DBconn->createWhereSql( "'" . $search["search_date_start"] . "'", "date", " >= ", null, null ) . " ) )
			 OR ( confirm_flg = 0 AND ( " . $this->_DBconn->createWhereSql( "'" . $search["search_date_start"] . "'", "date1", " >= ", null, null ) . " ) )
			 OR ( confirm_flg = 0 AND ( " . $this->_DBconn->createWhereSql( "'" . $search["search_date_start"] . "'", "date2", " >= ", null, null ) . " ) )
			 OR ( confirm_flg = 0 AND ( " . $this->_DBconn->createWhereSql( "'" . $search["search_date_start"] . "'", "date3", " >= ", null, null ) . " ) ) ) ";
		}
		if( !empty( $search["search_date_end"] ) ) {
			$creation_kit["where"] .= "AND ( ( confirm_flg = 1 AND ( " . $this->_DBconn->createWhereSql( "'" . $search["search_date_end"] . "'", "date", " <= ", null, null ) . " ) )
			 OR ( confirm_flg = 0 AND ( " . $this->_DBconn->createWhereSql( "'" . $search["search_date_end"] . "'", "date1", " <= ", null, null ) . " ) )
			 OR ( confirm_flg = 0 AND ( " . $this->_DBconn->createWhereSql( "'" . $search["search_date_end"] . "'", "date2", " <= ", null, null ) . " ) )
			 OR ( confirm_flg = 0 AND ( " . $this->_DBconn->createWhereSql( "'" . $search["search_date_end"] . "'", "date3", " <= ", null, null ) . " ) ) ) ";
		}

		// データ取得
		$res = $this->_DBconn->selectCtrl( $creation_kit, array( "fetch" => _DB_FETCH_ALL ) );

		// 戻り値
		return $res;
		
	}
	
	//-------------------------------------------------------
	// 関数名：GetIdRow
	// 引  数：$id - ID
	// 戻り値：1件分のデータ
	// 内  容：1件取得する
	//-------------------------------------------------------
	function GetIdRow( $id ) {

		// データチェック
		if( !is_numeric( $id ) ) {
			return null;
		}

		// SQL配列
		$creation_kit = array( "select" => "*",
							   "from"   => $this->_CtrTable,
							   "where"  => $this->_CtrTablePk . " = " . $id );

		// データ取得
		$res = $this->_DBconn->selectCtrl( $creation_kit, array( "fetch" => _DB_FETCH ) );

		// 戻り値
		return $res;

	}


	//-------------------------------------------------------
	// 関数名：GetDateTime
	// 引  数：$datetime - 検索条件
	// 戻り値：リスト
	// 内  容：日時で検索を行い予約日時決定済みのデータを取得
	//-------------------------------------------------------
	function GetDateTime( $date, $time, $id ) {

		// SQL配列
		$creation_kit = array(  "select" => "name",
								"from"   => $this->_CtrTable,
								"where"  => "delete_flg = 0 AND confirm_flg = 1 AND date = '". $date ."' AND  time = '". $time ."' ",
								"order"  => "date ASC"
							);

		if( !empty( $id ) ){
			$creation_kit["where"] .= "AND " . $this->_CtrTablePk . " != " . $id;
		}

		// オプション
		$option = array( "fetch" => _DB_FETCH_ALL );

		// データ取得
		$res = $this->_DBconn->selectCtrl( $creation_kit, $option );

		// 戻り値
		return $res;

	}
}

?>
