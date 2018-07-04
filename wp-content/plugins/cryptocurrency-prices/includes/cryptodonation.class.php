<?php
class CPCryptoDonation {

  public static function cp_cryptodonation_shortcode( $atts ) {
    if (isset($atts['address']) and $atts['address']!=''){
      $default_currency = 'bitcoin';
      $donation_address = $atts['address'];
      $donation_currency = $default_currency; 
      
      $html = '
        <p>
          <strong>
            '.__('To donate', 'cryprocurrency-prices').' '.$donation_currency.__(', scan the QR code or copy and paste the', 'cryprocurrency-prices').' '.$donation_currency.__(' wallet address:', 'cryprocurrency-prices').'
          </strong> <br /><br />
          <span class="donation-address" style="font-size: larger;">'.$donation_address.'</span><br /><br />
          <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.$donation_currency.':'.urlencode($donation_address).'&choe=UTF-8" /><br /><br />
          <strong>'.__('Thank you!', 'cryprocurrency-prices').'</strong>
        </p>
      ';
    } else {
      $html = '<p>Error: Donation address missing!</p>';
    }
    
    $html .= CPCommon::cp_get_plugin_credit();
    
    return $html;
  }
}