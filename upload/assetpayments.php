<?php

function get_var($name, $default = 'none') {
  return (isset($_GET[$name])) ? $_GET[$name] : ((isset($_POST[$name])) ? $_POST[$name] : $default);
}

require('includes/application_top.php');
require (DIR_WS_CLASSES.'order.php');
require_once (DIR_FS_INC.'vam_send_answer_template.inc.php');

	$json = json_decode(file_get_contents('php://input'), true);
	
	$order_id = $json['Order']['OrderId'];
	$order = new order($order_id);
	$key = MODULE_PAYMENT_ASSETPAYMENTS_ID;
	$secret = MODULE_PAYMENT_ASSETPAYMENTS_SECRET_KEY;
	$transactionId = $json['Payment']['TransactionId'];
	$signature = $json['Payment']['Signature'];
	$amount = $json['Order']['Amount'];
	$currency = $json['Order']['Currency'];
	$status = $json['Payment']['StatusCode'];
	$requestSign =$key.':'.$transactionId.':'.strtoupper($secret);
	$sign = hash_hmac('md5',$requestSign,$secret);
		
	if ($status == 1 && $sign == $signature) {
		
			$sql_data_array = array('orders_status' => MODULE_PAYMENT_ASSETPAYMENTS_ORDER_STATUS_ID);
			vam_db_perform('orders', $sql_data_array, 'update', "orders_id='".$order_id."'");

			$sql_data_arrax = array('orders_id' => $order_id,
							  'orders_status_id' => MODULE_PAYMENT_ASSETPAYMENTS_ORDER_STATUS_ID,
							  'date_added' => 'now()',
							  'customer_notified' => '0',
							  'comments' => 'AssetPayments transaction #'.' '.$transactionId);
			vam_db_perform('orders_status_history', $sql_data_arrax);
			echo 'OK'.$order_id;
	  
			//Send answer template
			vam_send_answer_template($order_id,MODULE_PAYMENT_ASSETPAYMENTS_ORDER_STATUS_ID,'on','on');
		
	} else {
		
			$sql_data_array = array('orders_status' => MODULE_PAYMENT_ASSETPAYMENTS_ORDER_STATUS_FAIL);
			vam_db_perform('orders', $sql_data_array, 'update', "orders_id='".$order_id."'");

			$sql_data_arrax = array('orders_id' => $order_id,
							  'orders_status_id' => MODULE_PAYMENT_ASSETPAYMENTS_ORDER_STATUS_FAIL,
							  'date_added' => 'now()',
							  'customer_notified' => '0',
							  'comments' => 'AssetPayments transaction #'.' '.$transactionId);
			vam_db_perform('orders_status_history', $sql_data_arrax);
			echo 'FAIL'.$order_id;
	  
			//Send answer template
			vam_send_answer_template($order_id,MODULE_PAYMENT_ASSETPAYMENTS_ORDER_STATUS_FAIL,'on','on');
		
	}

?>