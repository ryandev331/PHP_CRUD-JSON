<?php
/**
 {
	"STATUS": 200,
	"DATA": [{
		"ERROR": 0,
		"ORDERS": [{
			"BOOKID_TYPE": 1,
			"APP_NUMBER_OF_PERIODS": 1,
			"APP_BEGIN_YEAR_MONTH": "201901",
			"ORDER_TIME": "2019-01-01 00:00:00",
			"CANCEL_ORDER_FLAG": 0,
			"CANCEL_ORDER_DATETIME": null,
			"APP_OID": "10001"
		}, {
			"BOOKID_TYPE": 1,
			"APP_NUMBER_OF_PERIODS": 1,
			"APP_BEGIN_YEAR_MONTH": "201902",
			"ORDER_TIME": "2019-02-01 00:00:00",
			"CANCEL_ORDER_FLAG": 0,
			"CANCEL_ORDER_DATETIME": null,
			"APP_OID": "10002"
		}]
	}]
 }
 * 
 * 題目2：請使用PHP程式, 秀印出上方範例JSON格式
 * 
 */
$jsonData = [
	"STATUS" => 200,
	"DATA"  => array(
		"ERROR" => 0,
		"ORDERS"=> array(
			array(
			"BOOKID_TYPE"=> 1,
			"APP_NUMBER_OF_PERIODS"=> 1,
			"APP_BEGIN_YEAR_MONTH"=>"201901",
			"ORDER_TIME"=> "2019-01-01 00:00:00",
			"CANCEL_ORDER_FLAG"=> 0,
			"CANCEL_ORDER_DATETIME"=> null,
			"APP_OID"=> "10001"
			), 
			array(
			"BOOKID_TYPE"=> 1,
			"APP_NUMBER_OF_PERIODS"=> 1,
			"APP_BEGIN_YEAR_MONTH"=>"201902",
			"ORDER_TIME"=> "2019-02-01 00:00:00",
			"CANCEL_ORDER_FLAG"=>0,
			"CANCEL_ORDER_DATETIME"=> null,
			"APP_OID"=>"10002"
			)
		)
	)];
 
$result = json_encode( $jsonData );

echo $result;

?>