<?php

if(!defined('CODELESS_BASE')) define('CODELESS_BASE', get_template_directory().'/');

if(!defined('CODELESS_BASE_URL' ) ) define( 'CODELESS_BASE_URL', get_template_directory_uri().'/'); 

if(function_exists('wp_get_theme'))
{
	$wp_theme_obj = wp_get_theme();
	$codeless_base_data['prefix'] = $codeless_base_data['Title'] = $wp_theme_obj->get('Name');
    if(!defined('THEMENAME')) define('THEMENAME', $codeless_base_data['Title']);
}

if(!defined('THEMETITLE')) define('THEMETITLE', $codeless_base_data['Title']);


if ( class_exists( 'ThemeCheckMain' ) ) {
	
	add_action( 'themecheck_checks_loaded',  'disable_checks' );

}	


function disable_checks() {
     
     global $themechecks;

        $checks_to_disable = array(
               	    'IncludeCheck',
                	'I18NCheck',
              	    'AdminMenu',
              	    'Bad_Checks',
                	'MalwareCheck',
                	'Theme_Support',
                	'CustomCheck',
                	'EditorStyleCheck',
               	    'IframeCheck',
                    'Plugin_Territory',
                    'TextDomainCheck',
                    'Title_Checks',
                    'TextDomainCheck',
                    'NonPrintableCheck',
                    'Check_Links',
                    'Time_Date'
                );
                
               foreach ( $themechecks as $keyindex => $check ) {
               	if ( $check instanceof themecheck ) {
               		$check_class = get_class( $check );
               		if ( in_array( $check_class, $checks_to_disable ) ) {
              			unset( $themechecks[$keyindex] );
               		}
                	}
               }
            }

if(is_admin()){
	add_action('admin_print_scripts','codeless_global_js');

	function codeless_global_js(){
	    echo "\n <script type='text/javascript'>\n /* <![CDATA[ */  \n";
	    echo "var codeless_global = {\n \tframeworkUrl: '".CODELESS_BASE_URL."', \n \tinstalledAt: '".CODELESS_BASE_URL."', \n \tajaxurl: '".admin_url( 'admin-ajax.php' )."'\n \t}; \n /* ]]> */ \n ";
	    echo "</script>\n \n ";
	}
}

?>