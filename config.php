<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Cookie name.
 * 
 *  @since    1.0.0
 */
define( 'LENSCAPADES_COOKIE_CONSENT_COOKIE_NAME', 'CookieConsent' );

/**
 * Cookie domain.
 *
 *  @since    1.0.0
 */
define( 'LENSCAPADES_COOKIE_CONSENT_COOKIE_DOMAIN', preg_replace( '|https?://|i', '', home_url() ) );

/**
 * Cookie path.
 *
 *  @since    1.0.0
 */
define( 'LENSCAPADES_COOKIE_CONSENT_COOKIE_PATH', preg_replace( '|https?://[^/]+|i', '', get_option('home').'/') );

/**
 * Cookie expiration.
 * 
 *  @since    1.0.0
 */
define( 'LENSCAPADES_COOKIE_CONSENT_EXPIRATION', 365 * DAY_IN_SECONDS );

/**
 * Database table name.
 * 
 *  @since    1.0.0
 */
define( 'LENSCAPADES_COOKIE_CONSENT_DBTABLE_NAME', 'lcc_cookie_consent' );