<?php
/**
 * PSR-4 Autoloader
 * @see http://phpenthusiast.com/blog/how-to-autoload-with-composer
 *
 * @package   	WPHelpers
 * @version   	1.0.0
 * @since 		1.0.0
 */

	// vendor/autoload.php
	// composer autoload file used by all vendors
	require_once dirname( dirname(__DIR__) ) . "/autoload.php";
	//require __DIR__.'/../vendor/autoload.php';

	use DoTheRightThing\WPHelpers\Helpers;

?>
