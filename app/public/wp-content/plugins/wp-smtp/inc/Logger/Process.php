<?php

namespace WPSMTP\Logger;

use SolidWP\Mail\Admin\SettingsScreen;
use SolidWP\Mail\Connectors\ConnectorSMTP;
use SolidWP\Mail\SolidMailer;
use WP_Error;

class Process {

	public function __construct() {

		$solidMailOptions = get_option( SettingsScreen::SETTINGS_SLUG );

		if ( ! isset( $solidMailOptions['disable_logs'] ) || 'yes' !== $solidMailOptions['disable_logs'] ) {
			add_action( 'wp_mail_succeeded', [ $this, 'log_mail_success' ], PHP_INT_MAX );
			add_action( 'wp_mail_failed', [ $this, 'log_mail_failure' ], PHP_INT_MAX );
		}
	}

	public function log_mail_success( $mail_data ) {
		if ( ! SolidMailer::is_solid_mail_configured() ) {
			return;
		}

		unset( $mail_data['attachments'] );

		Db::get_instance()->insert(
			$this->add_solid_mail_data( $mail_data )
		);
	}

	/**
	 * @param WP_Error $wp_error
	 */
	public function log_mail_failure( $wp_error ) {
		if ( ! SolidMailer::is_solid_mail_configured() ) {
			return;
		}

		$data = $wp_error->get_error_data( 'wp_mail_failed' );
		unset( $data['phpmailer_exception_code'], $data['attachments'] );
		$data['error'] = $wp_error->get_error_message();

		Db::get_instance()->insert(
			$this->add_solid_mail_data( $data )
		);
	}

	private function add_solid_mail_data( array $data ): array {
		/** @var SolidMailer $phpmailer */
		global $phpmailer;

		/** @var ConnectorSMTP $connection */
		$connection            = $phpmailer->get_connection();
		$data['connection_id'] = $connection->get_id();
		$data['from_email']    = $phpmailer->From;
		$data['from_name']     = $phpmailer->FromName;
		$data['content_type']  = $phpmailer->ContentType;
		return $data;
	}
}
