<?php
/**
 * Helpers class.
 *
 * @package   WPHelpers
 * @version   1.0.0
 * @since     1.0.0
 */

namespace DoTheRightThing\WPHelpers;

if ( !class_exists( 'Helpers' ) ) {

  /**
   * Plugin helpers class.
   *
   * @example
   *  $helpers = new DoTheRightThing\WPHelpers\Helpers;
   *  $helpers->log('hello world');
   *
   *  function destroy() {
   *    global $helpers;
   *    $helpers->log('goodbye cruel world');
   *  }
   *
   * @uses        wpdtrt/debug.php
   *
   * @since       1.0.0
   * @version     1.0.0
   */
  class Helpers {

    /**
     * This constructor automatically initialises the object's properties
     * when it is instantiated,
     * using new PluginName
     *
     * @param     array $settings Plugin options
     *
     * @version   1.0.0
     * @since     1.0.0
     */
    //function __construct() {}

    //// START RENDERERS \\\\

    /**
     * Output errors to debug.log
     *
     * It is strongly recommended that plugin and theme developers use WP_DEBUG
     * in their development environments.
     *
     * @param mixed $message String or Array
     * @param boolean $first (true) Flag to output a delimiter if this is the first string in a set
     * @param string $context What the log refers to
     *
     * @example
     *    // Enable debugging in wp-config.php:
     *    define('WP_DEBUG', true);
     *    if ( WP_DEBUG ) {
     *      define('WP_DEBUG_LOG', true);
     *      define('WP_DEBUG_DISPLAY', false);
     *      @ini_set('display_errors', 0);
     *    }
     *
     * @return string in wp-content/debug.log
     *
     * @link http://www.stumiller.me/sending-output-to-the-wordpress-debug-log/
     * @see https://codex.wordpress.org/Debugging_in_WordPress
     * @see https://kb.pressable.com/troubleshooting/debug-500-error/
     */
    public function log( $message, $first = true, $context = '' )  {

      if ( true === WP_DEBUG ) {

        if ( $first ) {
          $context_padded = ($context !== '') ? (' ' . $context . ' ') : '';
          error_log( '=====' . $context_padded . '=====' );
        }

        if ( is_array( $message ) || is_object( $message ) ) {
          error_log( print_r( $message, true ) );
        }
        else {
          error_log( $message );
        }
      }
    }

    /**
     * Output a stack trace to debug.log
     *
     * @return string in wp-content/debug.log
     *
     * @uses log()
     *
     * @see http://php.net/manual/en/exception.gettraceasstring.php
     */
    public function trace()  {

      if ( true === WP_DEBUG ) {

          $e = new \Exception;
          $this->log( $e->getTraceAsString() );
        }
    }

    /**
     * Output the calling function in debug.log
     *
     * @param string $function_name An identifier for the function or class being debugged
     * @return string in wp-content/debug.log
     *
     * @uses log()
     *
     * @see http://php.net/manual/en/function.debug-backtrace.php
     * @see https://stackoverflow.com/questions/2960805/php-determine-where-function-was-called-from#2960845
     */
    public function backtrace( $function_name ) {

      if ( true === WP_DEBUG ) {

        $backtrace = debug_backtrace();

        $backtrace_info = array(
          'class' => $backtrace[1]['class'],
          'file' => basename( $backtrace[1]['file'] ),
          'line' => $backtrace[1]['line'],
          'function' => $backtrace[2]['function'],
          //'object' => $backtrace[1]['object'],
          //'type' => $backtrace[1]['type'],
          //'args' => $backtrace[1]['args'],
        );

        $this->log( 'Backtrace: ' . $function_name );

        foreach ( $backtrace_info as $key => $value ) {
          $this->log( ' ' . $key . ': ' . $value, false);
        }
      }
    }

    //// END RENDERERS \\\\
  }
}

?>
