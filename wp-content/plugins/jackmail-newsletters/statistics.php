<?php


class Jackmail_Statistics extends Jackmail_Statistics_Core {

	public function __construct( Jackmail_Core $core ) {

		$this->core = $core;

		if ( $this->core->is_admin() ) {

			add_action( 'wp_ajax_jackmail_statistics_page', array( $this, 'statistics_page_callback' ) );

			add_action( 'wp_ajax_jackmail_get_sent_campaigns', array( $this, 'get_sent_campaigns_callback' ) );

			add_action( 'wp_ajax_jackmail_get_synthesis', array( $this, 'get_synthesis_callback' ) );

			add_action( 'wp_ajax_jackmail_get_synthesis_top_links', array( $this, 'get_synthesis_top_links_callback' ) );

			add_action( 'wp_ajax_jackmail_get_synthesis_more_actives_contacts', array( $this, 'get_synthesis_more_actives_contacts_callback' ) );

			add_action( 'wp_ajax_jackmail_get_synthesis_timeline', array( $this, 'get_synthesis_timeline_callback' ) );

			add_action( 'wp_ajax_jackmail_get_recipients', array( $this, 'get_recipients_callback' ) );

			add_action( 'wp_ajax_jackmail_get_recipients_export', array( $this, 'get_recipients_export_callback' ) );

			add_action( 'wp_ajax_jackmail_add_campaign_contacts_unopened', array( $this, 'add_campaign_contacts_unopened_callback' ) );

			add_action( 'wp_ajax_jackmail_get_technologies', array( $this, 'get_technologies_callback' ) );

			add_action( 'wp_ajax_jackmail_get_links', array( $this, 'get_links_callback' ) );

			add_action( 'wp_ajax_jackmail_get_link_details', array( $this, 'get_link_details_callback' ) );

		}

	}

	public function statistics_page_callback() {
		$this->core->check_auth();
		$this->core->include_html_file( 'statistics' );
		die;
	}

	public function get_sent_campaigns_callback() {
		$this->core->check_auth();
		if ( isset( $_POST['selected_date1'], $_POST['selected_date2'] ) ) {
			$selected_date1 = $this->core->request_text_data( $_POST['selected_date1'] );
			$selected_date2 = $this->core->request_text_data( $_POST['selected_date2'] );
			$campaigns      = $this->get_campaigns( $selected_date1, $selected_date2 );
			wp_send_json( $campaigns );
		}
		die;
	}

	public function get_synthesis_callback() {
		$this->core->check_auth();
		$json = array(
			'period'          => array(),
			'period_openers'  => 0,
			'period_clickers' => 0
		);
		if ( isset( $_POST['id_campaigns'], $_POST['selected_date1'], $_POST['selected_date2'], $_POST['period'], $_POST['segments'] ) ) {
			$id_campaigns   = $this->core->request_text_data( $_POST['id_campaigns'] );
			$period         = $this->core->request_text_data( $_POST['period'] );
			$selected_date1 = $this->core->request_text_data( $_POST['selected_date1'] );
			$selected_date2 = $this->core->request_text_data( $_POST['selected_date2'] );
			$segments       = $this->core->request_text_data( $_POST['segments'] );
			$json           = $this->get_synthesis( $id_campaigns, $period, $selected_date1, $selected_date2, $segments );
		}
		wp_send_json( $json );
		die;
	}

	public function get_synthesis_top_links_callback() {
		$this->core->check_auth();
		$json = array();
		if ( isset( $_POST['id_campaigns'], $_POST['selected_date1'], $_POST['selected_date2'], $_POST['segments'] ) ) {
			$id_campaigns   = $this->core->request_text_data( $_POST['id_campaigns'] );
			$selected_date1 = $this->core->request_text_data( $_POST['selected_date1'] );
			$selected_date2 = $this->core->request_text_data( $_POST['selected_date2'] );
			$segments       = $this->core->request_text_data( $_POST['segments'] );
			$json           = $this->get_synthesis_top_links_data( $id_campaigns, $selected_date1, $selected_date2, $segments );
		}
		wp_send_json( $json );
		die;
	}

	public function get_synthesis_more_actives_contacts_callback() {
		$this->core->check_auth();
		$json = array();
		if ( isset( $_POST['id_campaigns'], $_POST['selected_date1'], $_POST['selected_date2'], $_POST['segments'] ) ) {
			$id_campaigns   = $this->core->request_text_data( $_POST['id_campaigns'] );
			$selected_date1 = $this->core->request_text_data( $_POST['selected_date1'] );
			$selected_date2 = $this->core->request_text_data( $_POST['selected_date2'] );
			$segments       = $this->core->request_text_data( $_POST['segments'] );
			$json           = $this->get_synthesis_more_actives_contacts( $id_campaigns, $selected_date1, $selected_date2, $segments );
		}
		wp_send_json( $json );
		die;
	}

	public function get_synthesis_timeline_callback() {
		$this->core->check_auth();
		$json = array();
		if ( isset( $_POST['id_campaigns'], $_POST['selected_date1'], $_POST['selected_date2'], $_POST['segments'] ) ) {
			$id_campaigns   = $this->core->request_text_data( $_POST['id_campaigns'] );
			$selected_date1 = $this->core->request_text_data( $_POST['selected_date1'] );
			$selected_date2 = $this->core->request_text_data( $_POST['selected_date2'] );
			$segments       = $this->core->request_text_data( $_POST['segments'] );
			$json           = $this->get_synthesis_timeline( $id_campaigns, $selected_date1, $selected_date2, $segments );
		}
		wp_send_json( $json );
		die;
	}

	public function add_campaign_contacts_unopened_callback() {
		$this->core->check_auth();
		ini_set( 'max_execution_time', 200 );
		if ( isset( $_POST['new_id_campaign'], $_POST['id_campaign'], $_POST['selected_date1'], $_POST['selected_date2'] ) ) {
			$new_id_campaign = $this->core->request_text_data( $_POST['new_id_campaign'] );
			$id_campaign     = $this->core->request_text_data( $_POST['id_campaign'] );
			$selected_date1  = $this->core->request_text_data( $_POST['selected_date1'] );
			$selected_date2  = $this->core->request_text_data( $_POST['selected_date2'] );
			$this->add_campaign_contacts_unopened( $new_id_campaign, $id_campaign, $selected_date1, $selected_date2 );
			wp_send_json_success();
		}
		wp_send_json_error();
		die;
	}

	public function get_recipients_callback() {
		$this->core->check_auth();
		$data = array(
			'recipients' => array(),
			'total_rows' => 0
		);
		if ( isset( $_POST['id_campaigns'], $_POST['selected_date1'], $_POST['selected_date2'], $_POST['search'],
			$_POST['begin'], $_POST['column'], $_POST['order'], $_POST['segments'] ) ) {
			$id_campaigns   = $this->core->request_text_data( $_POST['id_campaigns'] );
			$selected_date1 = $this->core->request_text_data( $_POST['selected_date1'] );
			$selected_date2 = $this->core->request_text_data( $_POST['selected_date2'] );
			$begin          = $this->core->request_text_data( $_POST['begin'] );
			$column         = $this->core->request_text_data( $_POST['column'] );
			$order          = $this->core->request_text_data( $_POST['order'] );
			$search         = $this->core->request_text_data( $_POST['search'] );
			$segments       = $this->core->request_text_data( $_POST['segments'] );
			$limit          = (string) $this->core->grid_limit();
			$data           = $this->get_recipients( $id_campaigns, $selected_date1, $selected_date2, $segments, $begin, $limit, $column, $order, $search );
		}
		wp_send_json( $data );
		die;
	}

	public function get_recipients_export_callback() {
		$this->core->check_auth();
		$data = array(
			'recipients' => array(),
			'total_rows' => 0
		);
		if ( isset( $_POST['id_campaigns'], $_POST['selected_date1'], $_POST['selected_date2'], $_POST['search'],
			$_POST['begin'], $_POST['column'], $_POST['order'], $_POST['segments'] ) ) {
			$id_campaigns   = $this->core->request_text_data( $_POST['id_campaigns'] );
			$selected_date1 = $this->core->request_text_data( $_POST['selected_date1'] );
			$selected_date2 = $this->core->request_text_data( $_POST['selected_date2'] );
			$begin          = $this->core->request_text_data( $_POST['begin'] );
			$column         = $this->core->request_text_data( $_POST['column'] );
			$order          = $this->core->request_text_data( $_POST['order'] );
			$search         = $this->core->request_text_data( $_POST['search'] );
			$segments       = $this->core->request_text_data( $_POST['segments'] );
			$limit          = (string) $this->core->export_send_limit();
			$data           = $this->get_recipients( $id_campaigns, $selected_date1, $selected_date2, $segments, $begin, $limit, $column, $order, $search );
		}
		wp_send_json( $data );
		die;
	}

	public function get_technologies_callback() {
		$this->core->check_auth();
		$json = array(
			'browserGroup_browserCategory'            => array(),
			'operatingSystem_operatingSystemCategory' => array(),
			'browserCategory_operatingSystemCategory' => array(),
			'browserGroup_operatingSystem'            => array(),
			'browserGroup_operatingSystemCategory'    => array(),
			'operatingSystem_browserCategory'         => array()
		);
		if ( isset( $_POST['id_campaigns'], $_POST['selected_date1'], $_POST['selected_date2'], $_POST['segments'] ) ) {
			$id_campaigns   = $this->core->request_text_data( $_POST['id_campaigns'] );
			$selected_date1 = $this->core->request_text_data( $_POST['selected_date1'] );
			$selected_date2 = $this->core->request_text_data( $_POST['selected_date2'] );
			$segments       = $this->core->request_text_data( $_POST['segments'] );
			$json           = $this->get_technologies( $id_campaigns, $selected_date1, $selected_date2, $segments );
		}
		wp_send_json( $json );
		die;
	}

	public function get_links_callback() {
		$this->core->check_auth();
		$json = array();
		if ( isset( $_POST['id_campaigns'], $_POST['selected_date1'], $_POST['selected_date2'],
			$_POST['search'], $_POST['begin'], $_POST['column'], $_POST['order'], $_POST['segments'] ) ) {
			$id_campaigns   = $this->core->request_text_data( $_POST['id_campaigns'] );
			$selected_date1 = $this->core->request_text_data( $_POST['selected_date1'] );
			$selected_date2 = $this->core->request_text_data( $_POST['selected_date2'] );
			$search         = $this->core->request_text_data( $_POST['search'] );
			$begin          = $this->core->request_text_data( $_POST['begin'] );
			$column         = $this->core->request_text_data( $_POST['column'] );
			$order          = $this->core->request_text_data( $_POST['order'] );
			$segments       = $this->core->request_text_data( $_POST['segments'] );
			$limit          = (string) $this->core->grid_limit();
			$json           = $this->get_links_data(
				$id_campaigns, $selected_date1, $selected_date2, $segments,
				$begin, $limit, $column, $order, $search
			);
		}
		wp_send_json( $json );
		die;
	}

	public function get_link_details_callback() {
		$this->core->check_auth();
		$data = array(
			'recipients' => array(),
			'total_rows' => 0
		);
		if ( isset( $_POST['id_campaigns'], $_POST['selected_date1'], $_POST['selected_date2'], $_POST['link'],
			$_POST['search'], $_POST['begin'], $_POST['column'], $_POST['order'], $_POST['segments'] ) ) {
			$id_campaigns   = $this->core->request_text_data( $_POST['id_campaigns'] );
			$selected_date1 = $this->core->request_text_data( $_POST['selected_date1'] );
			$selected_date2 = $this->core->request_text_data( $_POST['selected_date2'] );
			$link           = $this->core->request_text_data( $_POST['link'] );
			$search         = $this->core->request_text_data( $_POST['search'] );
			$begin          = $this->core->request_text_data( $_POST['begin'] );
			$column         = $this->core->request_text_data( $_POST['column'] );
			$order          = $this->core->request_text_data( $_POST['order'] );
			$segments       = $this->core->request_text_data( $_POST['segments'] );
			$limit          = (string) $this->core->grid_limit();
			$data           = $this->get_link_details(
				$id_campaigns, $selected_date1, $selected_date2, $segments,
				$link, $begin, $limit, $column, $order, $search
			);
		}
		wp_send_json( $data );
		die;
	}

}