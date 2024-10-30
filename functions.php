<?php

function ICP_css() {wp_enqueue_style( 'prefix-style', plugins_url('CSS/style.css', __FILE__) );}
function ICP_home(){include 'Pages/activation.php';}
function ICP_support() {include 'Pages/support.php';}
function ICP_pro() {include 'Pages/pro.php';}
function ICP_get(){
$response = wp_remote_get('https://wppluginbox.com/API/InlineCryptoPrice');
return $body     = wp_remote_retrieve_body( $response );
}


function ICP_ActivateStatus(){
$wp_plugin_active = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
file_get_contents('https://wppluginbox.com/API/ActiveInstalls/VS/index.php?status=active&web='.$wp_plugin_active);

}

function ICP_DeactivateStatus(){
$wp_plugin_active = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
file_get_contents('https://wppluginbox.com/API/ActiveInstalls/VS/index.php?status=deactive&web='.$wp_plugin_active);

}



function ICP_scripts() {
      

      //=========
      global $post;
    if( has_shortcode( $post->post_content, 'ICP-BTCUSD') ) {
        
global $plugin_icp;
$plugin_icp =  ICP_get();


    }

      //=========
 }

 function ICP_initiate(){
  global $plugin_icp;

if ($plugin_icp == ''){return '{{Error}}';}

    return $plugin_icp; 
}


function ICP_menu() {
  

  add_menu_page ( 'Menu', 'Inline Crypto Price', 'manage_options', 'MAINMENUICP', 'ICP_home', 'dashicons-money-alt' );
  add_submenu_page ( 'MAINMENUICP', 'proICP', 'pro', 'manage_options','proICP' ,'ICP_pro', '');
  add_submenu_page ( 'MAINMENUICP', 'SupportICP', 'Support', 'manage_options','SupportICP' ,'ICP_support', '');
  

}









?>