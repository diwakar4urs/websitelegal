<?php
class CPCryptoPayment {
  public static $table_name;

  public static function cp_cryptopayment_shortcode( $atts ) {
    global $wpdb;
    
    CPCryptoPayment::cp_init_db_table();
    
    if (isset($atts['amount']) and $atts['amount']!=''){
      $currency = 'btc';   
      
      if (is_numeric($atts['amount'])){
        //amount is a number in the default currency
        $amount = (float)$atts['amount'];
      } else {
        //amout is not a number - need to process the amount 
        $amount_parts = explode(' ', $atts['amount']);
        
        if (isset($amount_parts[1])){
          //amount format seems correct
          $source_currency = trim(mb_strtolower($amount_parts[1]));
          $source_amount = (float)$amount_parts[0];
          
          if ($source_currency == $currency){ 
            //amount is in the selected currency
            $amount = $source_amount;
          } else {
            //amount is not in the selected currency
            //we need to convert the currency            
            $amount = CPCryptoPayment::cp_convert_amount_to_currency($source_currency, $source_amount, $currency);

            if ($amount === false){
              //stop processing and throw an error
              $html = 'Error: API error!';
              return $html; 
            }
          }          
        } else {
          //payment amount error
          //stop processing and throw an error
          $html = 'Error: Payment amount error!';
          return $html;
        }
        
      }
      
      $item = htmlspecialchars($atts['item']);
      
      $html = '<div class="cp_payment">';
      
      if (isset($_POST['cp_name']) and $_POST['cp_name']!='' and isset($_POST['cp_item']) and $_POST['cp_item']==$item){
        //ready to accept payment
        
        $payment_address = htmlspecialchars($_POST['cp_payment_address']);
        
        CPCryptoPayment::cp_insert_payment_to_db($currency, $payment_address);
        
        CPCryptoPayment::cp_send_admin_payment_notification();
        
        $html .= CPCryptoPayment::cp_get_payment_address_form($payment_address, $amount, $currency);
        
      } else {
        $payment_address = CPCryptoPayment::cp_get_payment_address();

        $html .= CPCryptoPayment::cp_get_payment_form($payment_address, $item, $amount, $currency);
      }
      
      $html .= '</div><!--.cp_payment-->';
    }
    
    $html .= CPCommon::cp_get_plugin_credit();
       
    return $html;
  }

  public static function cp_get_oreders_list() {
    global $wpdb;
    CPCryptoPayment::cp_init_db_table();
    
    $orders_html = '';
    $orders = $wpdb->get_results('SELECT * FROM '.CPCryptoPayment::$table_name.' ORDER BY id DESC;'); 
    if ($orders){
      $orders_html .= '<table class="wp-list-table widefat fixed">';
      $orders_html .= '
        <tr>
          <th>Date</th>
          <th>Item</th>
          <th>Price</th>
          <th>Payment</th>
          <th>Edit order</th>
        </tr>
      ';
      foreach( $orders as $order_key => $order ) {
        if (defined('CP_PREMIUM')){
          $tracking_link = CPPremium::cp_get_payment_tracking_link($order->payment_address, $order->currency);
        } else {
          $tracking_link = CPCryptoPayment::cp_get_payment_tracking_link($order->payment_address, $order->currency);
        }
        
        $orders_html .= '
          <tr>
            <td>'.htmlspecialchars($order->time).'</td>
            <td>'.htmlspecialchars($order->item).'</td>
            <td>'.htmlspecialchars($order->price).'</td>
            <td>
              '.htmlspecialchars($order->payment_address).'
              '.$tracking_link.'
            </td>
            <td>
              <a href="admin.php?page=orders-list&delete='.$order->id.'" onclick="return confirm(\'Are you sure you want to delete this item?\');">Delete order</a>
            </td>
          <tr>
          <tr>
            <td colspan="4">
              Ordered by: '.htmlspecialchars($order->name).' 
              Telephone: '.htmlspecialchars($order->telephone).' 
              Email: '.htmlspecialchars($order->email).' 
              Address: '.htmlspecialchars($order->address).'
              '.$order->description.'
            </td>
          </tr>
        ';
      }
      $orders_html .= '</table>';
    } else {
      //no orders received yet
      $orders_html .= 'There are no payments yet!';
    }
    
    return $orders_html;
  }
  
  public static function cp_get_payment_tracking_link($address, $currency) {
    $tracking_link = '<a href="https://blockchain.info/address/'.htmlspecialchars($address).'" target="_blank">Track payment</a>';
    
    return $tracking_link;
  }
  
  public static function cp_init_db_table() {
    global $wpdb;
    
    //initialize table name value
    CPCryptoPayment::$table_name = $wpdb->prefix.'cp_orders';
  }
  
  public static function cp_convert_amount_to_currency($source_currency, $source_amount, $currency){
    $data_json = CPCurrencyInfo::cp_convert_currency($source_currency, array($currency));
    
    if (isset($data_json) and $data_json!=''){
      $data_all_currencies_raw = json_decode($data_json, true);
      $rate = $data_all_currencies_raw[mb_strtoupper($currency)];
      $amount = $source_amount * $rate;
    } else {
      return false; 
    }
    
    return $amount;
  }

  public static function cp_delete_order($order_id){
    global $wpdb;
    CPCryptoPayment::cp_init_db_table();

    //check nonce
    //check_admin_referer( self::NONCE );
    
    $delete_order_id_sanitized = (int)$order_id;
    $wpdb->get_results("DELETE FROM ".CPCryptoPayment::$table_name." WHERE id = '$delete_order_id_sanitized';");
    $admin_message_html = '<div class="notice notice-success"><p>The order has been deleted!</p></div>';
    
    return $admin_message_html;
  }
  
  public static function cp_get_payment_address(){
    global $wpdb;
    
    //get the list of payment addresses
    $payment_addresses = get_option('cryptocurrency-payment-addresses');
    $payment_addresses_arr = explode(" ", str_ireplace("\n"," ",$payment_addresses));

    //get the last used payment address
    $last_payment_information = $wpdb->get_row(
      'SELECT payment_address FROM '.CPCryptoPayment::$table_name.' ORDER BY id DESC LIMIT 1'
    );
    
    if ($last_payment_information){
      //last payment address found
      //use the next address, or go back to the first in the list
      
      $last_payment_address = $last_payment_information->payment_address;
      $last_payment_address_index = array_search($last_payment_address, $payment_addresses_arr);
      
      //use the next address from the list
      $new_payment_address_index = $last_payment_address_index + 1;
      if ($new_payment_address_index >= count($payment_addresses_arr)){
        //this is the last address - go back to the first one
        $new_payment_address_index = 0;
      }
      
      //$payment_address_randkey = array_rand($payment_addresses_arr);
      $payment_address = trim($payment_addresses_arr[$new_payment_address_index]);
    } else {
      //no information about the last payment address
      //use the first from the list
      $payment_address = trim($payment_addresses_arr[0]);
    }
    
    return $payment_address;
  }
  
  public static function cp_get_payment_form($payment_address, $item, $amount, $currency){
    //payment details form
    $html = '
      <h2>'.__('Please enter order details:', 'cryprocurrency-prices').'</h2>
      <form action="" method="post" class="cp-form cp-payment-form">
        <table border="0" class="cp-payment-form-table">
          <tr>
            <td><label>'.__('Item name:', 'cryprocurrency-prices').'</label></td>
            <td>
              <input type="hidden" name="cp_payment_address" value="'.$payment_address.'" />
              <input type="text" name="cp_item" value="'.$item.'" readonly />
            </td>
          </tr>
          <tr>
            <td><label>'.__('Order amount:', 'cryprocurrency-prices').'</label></td>
            <td>
              <input type="text" name="cp_amount" value="'.$amount.' '.mb_strtoupper($currency).'" readonly />
            </td>
          </tr>
          <tr>
            <td><label>'.__('Name:', 'cryprocurrency-prices').'</label></td>
            <td><input type="text" name="cp_name" required /></td>
          </tr>
          <tr>
            <td><label>'.__('Email:', 'cryprocurrency-prices').'</label></td>
            <td><input type="text" name="cp_email" required /></td>
          </tr>
          <tr>
            <td><label>'.__('Address:', 'cryprocurrency-prices').'</label></td>
            <td><input type="text" name="cp_address" /></td>
          </tr>
          <tr>
            <td><label>'.__('Telephone:', 'cryprocurrency-prices').'</label></td>
            <td><input type="text" name="cp_telephone" /></td>
          </tr>
          <tr>
            <td colspan="2"><input type="submit" value="'.__('Proceed to payment', 'cryprocurrency-prices').'" /></td>
          </tr>
        </table>
      </form>
    ';
    
    return $html;
  }

  public static function cp_get_payment_address_form($payment_address, $amount, $currency){
    //payment address
    $html = '
      <h2>'.__('Order submitted. Please make a payment:', 'cryprocurrency-prices').'</h2>
      <strong>
        '.__('To pay', 'cryprocurrency-prices').' '.$amount.' '.mb_strtoupper($currency).__(', scan the QR code or copy and paste the ', 'cryprocurrency-prices').mb_strtoupper($currency).__(' wallet address:', 'cryprocurrency-prices').'
      </strong> <br /><br />
      <span style="font-size: big;">'.$payment_address.'</span><br /><br />
      <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=bitcoin:'.urlencode($payment_address).'&choe=UTF-8" /><br /><br />
    ';
    
    return $html;
  }
  
  public static function cp_insert_payment_to_db($currency, $payment_address){
    global $wpdb;
    
    //record the payment in the database 
    $insert_result = $wpdb->insert(CPCryptoPayment::$table_name, array(
        'item' => $_POST['cp_item'],
        'price' => $_POST['cp_amount'],
        'currency' => $currency,
        'payment_address' => $payment_address,
        'name' => $_POST['cp_name'],
        'email' => $_POST['cp_email'],
        'address' => $_POST['cp_address'],
        'telephone' => $_POST['cp_telephone'],
        'description' => '',
    ));
    
    return $insert_result;
  }
  
  public static function cp_send_admin_payment_notification(){
    //send notification to the administrator
    $to = get_option('cryptocurrency-payment-notifications-email');
    $subject = 'Pending cryptocurrency payment';
    $body = 'A user has submitted an order on '.get_site_url().'. Visit the admin panel for more details about the order and the payment.';
    $headers = array('Content-Type: text/html; charset=UTF-8');
    wp_mail( $to, $subject, $body, $headers );
  }
}