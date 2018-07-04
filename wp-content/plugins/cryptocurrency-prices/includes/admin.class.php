<?php
class CPAdmin {
  const NONCE = 'cp-admin-settings';
  
  private static $initiated = false;
  private static $premium;
  private static $premium_feature_notice = '';
  private static $premium_feature_disable = '';
	
  public static function init() {
    if ( ! self::$initiated ) {
			self::init_hooks();
		}
    
    if (defined('CP_PREMIUM')){
      self::$premium = 1;
      self::$premium_feature_notice = '';
      self::$premium_feature_disable = '';
    } else {
      self::$premium = 0;
      self::$premium_feature_notice = '(This is a premium version feature! <a href="https://creditstocks.com/cryptocurrency-one-wordpress-plugin/">Get premium now.</a>)';
      self::$premium_feature_disable = 'disabled="disabled"';
    }
  }
  
	public static function init_hooks() {
    self::$initiated = true;
    
    //add admin menu
    add_action('admin_menu', array( 'CPAdmin', 'register_menu_page' ));
	}
  
  public static function register_menu_page() {
    add_menu_page(
      __( 'Cyptocurrency All-in-One', 'cryptocurrency' ),
      __( 'Cyptocurrency', 'cryptocurrency' ),
      'manage_options',
      'cryptocurrency-prices',
      array('CPAdmin', 'cryptocurrency_prices_admin'),
      CP_URL.'images/btc.png',
      81
    );
    
    add_submenu_page( 
      'cryptocurrency-prices', 
      __( 'Help', 'cryptocurrency' ), 
      __( 'Help', 'cryptocurrency' ), 
      'manage_options', 
      'cryptocurrency-prices', 
      array('CPAdmin', 'cryptocurrency_prices_admin_help')
    );
    
    add_submenu_page( 
      'cryptocurrency-prices', 
      __( 'Settings', 'cryptocurrency' ), 
      __( 'Settings', 'cryptocurrency' ), 
      'manage_options', 
      'settings', 
      array('CPAdmin', 'cryptocurrency_prices_admin_settings')
    );
  
    add_submenu_page( 
      'cryptocurrency-prices', 
      __( 'Orders List', 'cryptocurrency' ), 
      __( 'Orders List', 'cryptocurrency' ), 
      'manage_options', 
      'orders-list', 
      array('CPAdmin', 'cryptocurrency_prices_admin_orders_list')
    );
    
    add_submenu_page( 
      'cryptocurrency-prices', 
      __( 'Payment Settings', 'cryptocurrency' ), 
      __( 'Payment Settings', 'cryptocurrency' ), 
      'manage_options', 
      'payment-settings',
      array('CPAdmin', 'cryptocurrency_prices_admin_payment_settings') 
    );
    
    add_submenu_page( 
      'cryptocurrency-prices', 
      __( 'Premium and Support', 'cryptocurrency' ), 
      __( 'Premium and Support', 'cryptocurrency' ), 
      'manage_options', 
      'support',
      array('CPAdmin', 'cryptocurrency_prices_admin_support') 
    );
  }
  
  public static function cryptocurrency_prices_admin(){
    //self::cryptocurrency_prices_admin_help();
  }
  
  public static function cryptocurrency_prices_admin_settings(){
    //check if user has admin capability
    if (current_user_can( 'manage_options' )){ 
      $admin_message_html = '';
      
      if (isset($_POST['cryptocurrency-prices-hide-credit']) and $_POST['cryptocurrency-prices-hide-credit']!=''){
        //check nonce
        check_admin_referer( self::NONCE );
      
        $sanitized_cryptocurrency_prices_hide_credit = (int)$_POST['cryptocurrency-prices-hide-credit'];
        update_option('cryptocurrency-prices-hide-credit', $sanitized_cryptocurrency_prices_hide_credit);
        $admin_message_html = '<div class="notice notice-success"><p>Plugin settings have been updated!</p></div>';
      }

      if (isset($_POST['cryptocurrency-prices-hide-credit-provider']) and $_POST['cryptocurrency-prices-hide-credit-provider']!=''){
        //check nonce
        check_admin_referer( self::NONCE );
      
        $sanitized_cryptocurrency_prices_hide_credit_provider = (int)$_POST['cryptocurrency-prices-hide-credit-provider'];
        update_option('cryptocurrency-prices-hide-credit-provider', $sanitized_cryptocurrency_prices_hide_credit_provider);
        $admin_message_html = '<div class="notice notice-success"><p>Plugin settings have been updated!</p></div>';
      }

      if (isset($_POST['cryptocurrency-prices-default-css']) and $_POST['cryptocurrency-prices-default-css']!=''){
        //check nonce
        check_admin_referer( self::NONCE );
              
        $sanitized_cryptocurrency_prices_default_css = sanitize_text_field($_POST['cryptocurrency-prices-default-css']);
        update_option('cryptocurrency-prices-default-css', $sanitized_cryptocurrency_prices_default_css);
        $admin_message_html = '<div class="notice notice-success"><p>Plugin settings have been updated!</p></div>';
      }      
      
      
      if (isset($_POST['cryptocurrency-prices-file-get-contents']) and $_POST['cryptocurrency-prices-file-get-contents']!=''){
        //check nonce
        check_admin_referer( self::NONCE );
        
        $sanitized_cryptocurrency_prices_file_get_contents = (int)$_POST['cryptocurrency-prices-file-get-contents'];
        update_option('cryptocurrency-prices-file-get-contents', $sanitized_cryptocurrency_prices_file_get_contents);
        $admin_message_html = '<div class="notice notice-success"><p>Plugin settings have been updated!</p></div>';
      }

      if (isset($_POST['ethereum-api'])){
        //check nonce
        check_admin_referer( self::NONCE );
        
        $sanitized_ethereum_api = sanitize_text_field($_POST['ethereum-api']);
        update_option('ethereum-api', $sanitized_ethereum_api);
        $admin_message_html = '<div class="notice notice-success"><p>Plugin settings have been updated!</p></div>';
      }
      
      if (isset($_POST['cryptocurrency-prices-css'])){
        //check nonce
        check_admin_referer( self::NONCE );
        
        $sanitized_cryptocurrency_prices_css = sanitize_text_field($_POST['cryptocurrency-prices-css']);
        update_option('cryptocurrency-prices-css', $sanitized_cryptocurrency_prices_css);
        $admin_message_html = '<div class="notice notice-success"><p>Plugin settings have been updated!</p></div>';
      }
    
      if (get_option('cryptocurrency-prices-hide-credit') == 1){
        $credit_selected = 'selected="selected"';
      } else {
        $credit_selected = '';
      }
      
      if (get_option('cryptocurrency-prices-hide-credit-provider') == 1){
        $credit_provider_selected = 'selected="selected"';
      } else {
        $credit_provider_selected = '';
      }
      
      //delete_option( 'cryptocurrency-prices-default-css' ); //remove setting
      $default_css_selected_light = '';
      $default_css_selected_dark = '';
      if (get_option('cryptocurrency-prices-default-css') == 'light'){
        $default_css_selected_light = 'selected="selected"';
      } elseif (get_option('cryptocurrency-prices-default-css') == 'dark'){
        $default_css_selected_dark = 'selected="selected"';
      }
      
      if (get_option('cryptocurrency-prices-file-get-contents') == 1){
        $file_get_contents_selected = 'selected="selected"';
      } else {
        $file_get_contents_selected = '';
      }
      
      echo '
      <div class="wrap cryptocurrency-admin">
        '.$admin_message_html.'
        <h1>Cyptocurrency All-in-One Settings:</h1>
        
        
        <form action="" method="post">
  
          <h2>Design:</h2>
          <label>Use default design (insludes default CSS): </label>
          <select name="cryptocurrency-prices-default-css" '.self::$premium_feature_disable.'>
            <option value="0">no</option>
            <option value="light" '.$default_css_selected_light.'>light</option>
            <option value="dark" '.$default_css_selected_dark.'>dark</option>
          </select>
          '.self::$premium_feature_notice.'

          <p>Write your custom CSS code here to style the plugin. Check the <a href="https://wordpress.org/support/plugin/cryptocurrency-prices/" target="_blank">support forum</a> for examples.</p>
          <textarea name="cryptocurrency-prices-css" rows="5" cols="50">'.get_option('cryptocurrency-prices-css').'</textarea>
  
          <h2>Compatibility:</h2>
          <p>Activate if the plugin can not load data because of a problem with CURL library.</p>
          <label>Use file_get_contents instead of CURL:</label>
          <select name="cryptocurrency-prices-file-get-contents">
            <option value="0">no</option>
            <option value="1" '.$file_get_contents_selected.'>yes</option>
          </select>

          <h2>Ethereum blockchain node API URL:</h2>
          <p>You need to set it up, if you will use the ethereum blockchain features. Example URLs http://localhost:8545 for your own node or register for a public node https://mainnet.infura.io/[your key].</p>
          <input type="text" name="ethereum-api" value="'.get_option('ethereum-api').'" />
  
          <h2>Provide credit to plugin:</h2>
          <p>By providing credit to the plugin you help more people install this plugin and make cryptocurrencies more popular.</p>
          <label>Hide credit on plugin pages: </label>
          <select name="cryptocurrency-prices-hide-credit">
            <option value="0">no</option>
            <option value="1" '.$credit_selected.'>yes</option>
          </select>
          <br />
          <label>Hide data provide links on plugin pages (the links are required by the data providers): </label>
          <select name="cryptocurrency-prices-hide-credit-provider" '.self::$premium_feature_disable.'>
            <option value="0">no</option>
            <option value="1" '.$credit_provider_selected.'>yes</option>
          </select>
          '.self::$premium_feature_notice.'
          
          <br /><br />
          '.wp_nonce_field( self::NONCE ).'        
          <input type="submit" value="Save options" />
        </form>
      </div>
      ';
    
    }
  }
  
  public static function cryptocurrency_prices_admin_orders_list(){
    //check if user has admin capability
    if (current_user_can( 'manage_options' )){ 

      $admin_message_html = '';
      if (isset($_GET['delete']) and $_GET['delete']){
        //delete orders
      
        $admin_message_html = CPCryptoPayment::cp_delete_order($_GET['delete']);
      }      
      
      $orders_html = CPCryptoPayment::cp_get_oreders_list();
            
      echo '
        <div class="wrap cryptocurrency-admin">
          '.$admin_message_html.'
          <h1>Cyptocurrency All-in-One List of Orders Received:</h1>
          '.$orders_html.'     
        </div>
      ';  
    }
  }
  
  public static function cryptocurrency_prices_admin_payment_settings(){
    //check if user has admin capability
    if (current_user_can( 'manage_options' )){ 
      $admin_message_html = '';
                
      if (isset($_POST['cryptocurrency-payment-addresses'])){
        //check nonce
        check_admin_referer( self::NONCE );
        
        $sanitized_cryptocurrency_payment_addresses = sanitize_textarea_field($_POST['cryptocurrency-payment-addresses']);
        update_option('cryptocurrency-payment-addresses', $sanitized_cryptocurrency_payment_addresses);
        $admin_message_html = '<div class="notice notice-success"><p>Plugin settings have been updated!</p></div>';
      }
      
      if (isset($_POST['cryptocurrency-payment-addresses-eth'])){
        //check nonce
        check_admin_referer( self::NONCE );
        
        $sanitized_cryptocurrency_payment_addresses_eth = sanitize_textarea_field($_POST['cryptocurrency-payment-addresses-eth']);
        update_option('cryptocurrency-payment-addresses-eth', $sanitized_cryptocurrency_payment_addresses_eth);
        $admin_message_html = '<div class="notice notice-success"><p>Plugin settings have been updated!</p></div>';
      }

      if (isset($_POST['cryptocurrency-payment-addresses-ltc'])){
        //check nonce
        check_admin_referer( self::NONCE );
        
        $sanitized_cryptocurrency_payment_addresses_ltc = sanitize_textarea_field($_POST['cryptocurrency-payment-addresses-ltc']);
        update_option('cryptocurrency-payment-addresses-ltc', $sanitized_cryptocurrency_payment_addresses_ltc);
        $admin_message_html = '<div class="notice notice-success"><p>Plugin settings have been updated!</p></div>';
      }

      if (isset($_POST['cryptocurrency-payment-addresses-zec'])){
        //check nonce
        check_admin_referer( self::NONCE );
        
        $sanitized_cryptocurrency_payment_addresses_zec = sanitize_textarea_field($_POST['cryptocurrency-payment-addresses-zec']);
        update_option('cryptocurrency-payment-addresses-zec', $sanitized_cryptocurrency_payment_addresses_zec);
        $admin_message_html = '<div class="notice notice-success"><p>Plugin settings have been updated!</p></div>';
      }
      
      if (isset($_POST['cryptocurrency-payment-notifications-email'])){
        //check nonce
        check_admin_referer( self::NONCE );
        
        $sanitized_cryptocurrency_payment_notifications_email = sanitize_text_field($_POST['cryptocurrency-payment-notifications-email']);
        update_option('cryptocurrency-payment-notifications-email', $sanitized_cryptocurrency_payment_notifications_email);
        $admin_message_html = '<div class="notice notice-success"><p>Plugin settings have been updated!</p></div>';
      }    
      
      echo '
      <div class="wrap cryptocurrency-admin">
        '.$admin_message_html.'
        <h1>Cyptocurrency All-in-One Payment Settings:</h1>
        <h2>Set these if you want to receive payments!</h2>
        
        <form action="" method="post">
          <h2>BTC payment addresses:</h2>
          <p>Write 1 BTC address per line (create the addresses in your wallet). The more addresses - the better. Each transaction uses 1 random address from the list.</p>
          <textarea name="cryptocurrency-payment-addresses" rows="10" cols="50">'.get_option('cryptocurrency-payment-addresses').'</textarea>

          <h2>ETH payment addresses: '.self::$premium_feature_notice.'</h2> 
          <p>Write 1 ETH address per line (create the addresses in your wallet). The more addresses - the better. Each transaction uses 1 random address from the list.</p>
          <textarea name="cryptocurrency-payment-addresses-eth" rows="10" cols="50" '.self::$premium_feature_disable.'>'.get_option('cryptocurrency-payment-addresses-eth').'</textarea>
          
          <h2>LTC payment addresses: '.self::$premium_feature_notice.'</h2>
          <p>Write 1 LTC address per line (create the addresses in your wallet). The more addresses - the better. Each transaction uses 1 random address from the list.</p>
          <textarea name="cryptocurrency-payment-addresses-ltc" rows="10" cols="50" '.self::$premium_feature_disable.'>'.get_option('cryptocurrency-payment-addresses-ltc').'</textarea>

          <h2>ZEC payment addresses: '.self::$premium_feature_notice.'</h2>
          <p>Write 1 ZEC address per line (create the addresses in your wallet). The more addresses - the better. Each transaction uses 1 random address from the list.</p>
          <textarea name="cryptocurrency-payment-addresses-zec" rows="10" cols="50" '.self::$premium_feature_disable.'>'.get_option('cryptocurrency-payment-addresses-zec').'</textarea>
          
          <h2>Payment notification email:</h2>
          <p>You will receive payment notifications on this email. Leave blank if you do not want enail notifications.</p>
          <input type="text" name="cryptocurrency-payment-notifications-email" value="'.get_option('cryptocurrency-payment-notifications-email').'" />
              
          <br /><br />
          '.wp_nonce_field( self::NONCE ).'        
          <input type="submit" value="Save options" />
        </form>
      </div>
      ';
    
    }
  }
  
  public static function cryptocurrency_prices_admin_support(){
    echo '
    <div class="wrap cryptocurrency-admin">
    <h1>Cyptocurrency All-in-One Premium Version and Support:</h1>
    '; 
    
    echo '
    <h2>Get free support:</h2>
    <p>If have troubles running the plugin, please use the support forum: <a href="https://wordpress.org/support/plugin/cryptocurrency-prices">https://wordpress.org/support/plugin/cryptocurrency-prices</a>.</p>
    ';
    
    echo '
    <h2>Donate and get Premium</h2>
    <p>The free WordPress plugin Cryptocurrency All-in-One and this web site require constant work and covering web hosting costs to operate. The price to purchase a similar plugin is 10 to 60 USD but this project is open source and is supported by your kind donations. Thank you!</p>
    <p><span style="color: red;">Everybody who donates 10+ USD will receive the Cryptocurrency All-in-One Premium plugin on their email.</span> <a href="https://creditstocks.com/cryptocurrency-one-wordpress-plugin/">Read more here.</a></p>
    <p>Please use the following donation page to make a donation: <a href="https://creditstocks.com/donate/">https://creditstocks.com/donate/</a></p>
    ';
    
    echo ' 
    </div>
    ';
  }
  
  public static function cryptocurrency_prices_admin_help(){
    //set the active tab
    $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'calculator_exchange';
    
    echo '
    <div class="wrap cryptocurrency-admin">
      <h1>Cyptocurrency All-in-One Help:</h1>
    ';

    echo '
      <h2 class="nav-tab-wrapper">
          <a href="?page=cryptocurrency-prices&tab=calculator_exchange" class="nav-tab">Calculator, exchange rates</a>
          <a href="?page=cryptocurrency-prices&tab=candlestick_chart" class="nav-tab">Price chart</a>
          <a href="?page=cryptocurrency-prices&tab=list_cryptocurrencies" class="nav-tab">List all cryptocurrencies</a>
          <a href="?page=cryptocurrency-prices&tab=orders_payments" class="nav-tab">Orders, payments</a>
          <a href="?page=cryptocurrency-prices&tab=donations" class="nav-tab">Donations</a>
          <a href="?page=cryptocurrency-prices&tab=ethereum" class="nav-tab">Ethereum Node</a>
          <a href="?page=cryptocurrency-prices&tab=others" class="nav-tab">Other features</a>
      </h2>
    ';
     
    if ($active_tab == 'calculator_exchange'){
      echo '
        <h2>To display cryptocurrency calculator and exchange rates:</h2>
        <p>To show cryptocurrency prices, add a shortcode to the text of the pages or posts where you want the cryptocurrency prices to apperar. Exapmle shortcodes:</p>
        <pre>
        [currencyprice currency1="btc" currency2="usd,eur,ltc,eth,jpy,gbp,chf,aud,cad,bgn"]
        [currencyprice currency1="ltc" currency2="usd,eur,btc" feature="all"]
        [currencyprice currency1="eth" currency2="usd,btc" feature="prices"]
        [currencyprice currency1="eth" currency2="usd,btc" feature="calculator"]
        </pre>
        <p>You can also call the prices from the theme like this:</p>
        <pre>
        '.htmlspecialchars('<?php echo do_shortcode(\'[currencyprice currency1="btc" currency2="usd,eur"]\'); ?>').'
        </pre>
        <p>Major cryptocurrencies are fully supported with icons: Bitcoin BTC, Ethereum ETH, XRP, DASH, LTC, ETC, XMR, XEM, REP, MAID, PIVX, GNT, DCR, ZEC, STRAT, BCCOIN, FCT, STEEM, WAVES, GAME, DOGE, ROUND, DGD, LISK, SNGLS, ICN, BCN, XLM, BTS, ARDR, 1ST, PPC, NAV, XCP, NXT, LANA. Partial suport for over 1000 cryptocurrencies. Fiat currencies conversion supported: AUD, USD, CAD, GBP, EUR, CHF, JPY, CNY.</p>
        <p><a href="https://creditstocks.com/cryptocurrency-prices/current-litecoin-price/" target="_blank">Live demo</a></p>
      ';
    }
    
    if ($active_tab == 'candlestick_chart'){
      echo '
        <h2>To display cryptocurrency candlestick price chart:</h2>
        <p>To show cryptocurrency candlestick chart graphic, add a shortcode to the text of the pages or posts where you want the chart to apperar. Exapmle shortcodes:</p>
        <pre>
        [currencygraph currency1="btc" currency2="usd"]
        [currencygraph currency1="dash" currency2="btc"]
        </pre>
        <p>You can also call the chart from the theme like this:</p>
        <pre>
        '.htmlspecialchars('<?php echo do_shortcode(\'[currencygraph currency1="btc" currency2="usd"]\'); ?>').' 
        </pre>
        <p><a href="https://creditstocks.com/cryptocurrency-prices/current-bitcoin-price/" target="_blank">Live demo</a></p>
      ';
    }
    
    if ($active_tab == 'list_cryptocurrencies'){
      echo '
        <h2>To display a list of all cryptocurrencies</h2>
        <p>The shortcode supports adjustments with parameters. Exapmle shortcodes:</p>
        <pre>
        [allcurrencies]
        [allcurrencies algorithm="no" supply="no" url="yes"]
        </pre>
        <p>You can also call the list from the theme like this:</p>
        <pre> 
        '.htmlspecialchars('<?php echo do_shortcode(\'[allcurrencies]\'); ?>').'
        </pre>
        <p><a href="https://creditstocks.com/cryptocurrency-prices/list-of-all-cryptocurrencies/" target="_blank">Live demo</a></p>
      ';
    }
    
    if ($active_tab == 'orders_payments'){
      echo '
        <h2>To accept cryptocurrency orders and payments:</h2>
        <p>
          Supported currencies for payments are: Bitcoin (BTC) (default), Ethereum (ETH) (premium version), Litecon (LTC) (premium version).<br /> 
          Open the plugin settings and under "Payment settings" fill in your BTC (or other cryptocurrency) wallet addresses to receive payments and an email for receiving payment notifications.<br />  
          The plugin does not store your wallet\'s private keys. It uses one of the addresses from the provided list for every payment, by rotating all addresses and starting over from the first one. The different addresses are used to idenfiry if a specific payment has been made. You must provide enough addresses - more than the number of payments you will receive a day. <br /> 
          Add a shortcode to the text of the pages or posts where you want to accept payments (typically these pages would contain a product or service that you are offering). The amount may be in BTC (default), Ethereum (ETH) (premium version), Litecon (LTC) (premium version) or in fiat currency (USD, EUR, etc), which will be converted it to the selected cryptocurrency.<br /> 
          Exapmle shortcodes:
        </p>
        <pre>
        [cryptopayment item="Advertising services" amount="0.003" currency="BTC"]
        [cryptopayment item="Publish a PR article" amount="50 USD" currency="BTC"]
        [cryptopayment item="Publish a PR article" amount="10 EUR" currency="ETH"]
        </pre>
        <p><a href="https://creditstocks.com/payment-demo/" target="_blank">Live demo</a></p>
      ';
    }
    
    if ($active_tab == 'donations'){
      echo '
        <h2>To accept cryptocurrency donations:</h2>
        <p>Add a shortcode to the text of the pages or posts where you want to accept donations. Supported currencies are:</p>
        <ul>
          <li>Bitcoin (BTC) (default),</li> 
          <li>Ethereum (ETH) '.self::$premium_feature_notice.',</li> 
          <li>Litecon (LTC) '.self::$premium_feature_notice.',</li> 
          <li>Monero (XMR) '.self::$premium_feature_notice.',</li> 
          <li>Zcash (ZEC) '.self::$premium_feature_notice.'.</li> 
        </ul>
        <p>Exapmle shortcodes (do not forget to put your wallet address):</p>
        <pre>
        [cryptodonation address="1ABwGVwbna6DnHgPefSiakyzm99VXVwQz9"]
        [cryptodonation address="0xc85c5bef5a9fd730a429b0e04c69b60d9ef4c64b" currency="eth"]
        [cryptodonation address="463tWEBn5XZJSxLU6uLQnQ2iY9xuNcDbjLSjkn3XAXHCbLrTTErJrBWYgHJQyrCwkNgYvyV3z8zctJLPCZy24jvb3NiTcTJ" paymentid="a1be1fb24f1e493eaebce2d8c92dc68552c165532ef544b79d9d36d1992cff07" currency="xmr"]
        </pre>
        <p>You can also call the donations from the theme like this:</p>
        <pre>
        '.htmlspecialchars('<?php echo do_shortcode(\'[cryptodonation address="1ABwGVwbna6DnHgPefSiakyzm99VXVwQz9"]\'); ?>').'
        </pre>
        <p><a href="https://creditstocks.com/donate/" target="_blank">Live demo</a></p>
      ';
    }

    if ($active_tab == 'ethereum'){
      echo '
        <h2>Ethereum node integration:</h2>
        <p>Currently supported features are: check Ethereum address balance, view ethereum block. Before using the shortcodes you need to fill in your Ethereum node API URL in the plugin settings (http://localhost:8545 or a public node at infura.io). Exapmle shortcodes:</p>
        <pre>
        [cryptoethereum feature="balance"]
        [cryptoethereum feature="block"]
        </pre>
        <p><a href="https://creditstocks.com/ethereum/" target="_blank">Live demo</a></p>
      ';
    }
    
    if ($active_tab == 'others'){
      echo '
        <h2>Instructions to use the plugin in a widget:</h2>
        <p>To use the plugin in a widget, use the provided "CP Shortcode Widget" and put the shortcode in the "Content" section, for example:</p>
        <pre>
        [currencyprice currency1="btc" currency2="usd,eur"]
        </pre>
      ';
    }
    
    echo '    
    </div>
    ';
  }
}