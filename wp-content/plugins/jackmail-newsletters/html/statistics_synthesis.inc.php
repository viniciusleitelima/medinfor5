<?php if ( defined( 'ABSPATH' ) ) { ?>
<div class="jackmail_statistics_numbers_container">
	<div>
		<div class="jackmail_overflow_hidden">
			<div class="jackmail_left">
				<span class="jackmail_statistics_numbers_title">
					<?php _e( 'Recipients', 'jackmail-newsletters' ) ?>
					<span class="jackmail_info dashicons dashicons-info"
					      jackmail-tooltip="<?php esc_attr_e( 'Total emails delivered.', 'jackmail-newsletters' ) ?>">
					</span>
				</span>
			</div>
			<div class="jackmail_left jackmail_statistics_recipients">
				<span class="jackmail_statistics_number_principal">
					<span>{{s1.numbers.period1.recipients | numberSeparator}}</span>
				</span>
			</div>
		</div>
		<div class="jackmail_overflow_hidden">
			<div class="jackmail_left jackmail_left_70">
				&nbsp;
			</div>
			<div class="jackmail_left jackmail_left_30">
				<span ng-class="s1.numbers.tendency.recipients < 0 ? 'jackmail_statistics_numbers_compare_inferior_nok' : 'jackmail_statistics_numbers_compare_superior_ok'">
					{{s1.numbers.tendency.recipients | numberSeparator}}
				</span>
			</div>
		</div>
		<canvas class="jackmail_statistics_synthesis_canvas" id="jackmail_statistics_synthesis_canvas_recipients" width="180" height="60"></canvas>
	</div>
	<div>
		<div class="jackmail_overflow_hidden">
			<div class="jackmail_left jackmail_statistics_synthesis_dropdown_container">
				<div jackmail-dropdown-button dropdown-left="true"
				     button-value="{{s1.numbers.display.clicks ? s1.click_clicker_select_titles[ 0 ] : s1.click_clicker_select_titles[ 1 ]}}"
				     titles-clicks-array="s1.click_clicker_select_titles"
				     titles-clicks-array-event="s1.select_click_clicker( key )">
				</div>
				<span ng-show="s1.numbers.display.clicks"
				      class="jackmail_info dashicons dashicons-info" jackmail-tooltip-width="270"
				      jackmail-tooltip="<?php esc_attr_e( 'Clicks are the sum of all clicks generated by the campaign.', 'jackmail-newsletters' ) ?>"
				      jackmail-tooltip-link="https://www.jackmail.com/docs/fr/statistiques/analyser-les-statistiques">
				</span>
				<span ng-hide="s1.numbers.display.clicks"
				      class="jackmail_info dashicons dashicons-info" jackmail-tooltip-width="270"
				      jackmail-tooltip="<?php esc_attr_e( 'Clickers are recipients who have clicked at least once on a link in the email.', 'jackmail-newsletters' ) ?>"
				      jackmail-tooltip-link="https://www.jackmail.com/docs/fr/statistiques/analyser-les-statistiques">
				</span>
			</div>
			<div class="jackmail_left jackmail_statistics_clicks">
				<span class="jackmail_statistics_number_principal">
					<span ng-show="s1.numbers.display.clicks">{{s1.numbers.period1.clicks_percent}} <span>%</span></span>
					<span ng-hide="s1.numbers.display.clicks">{{s1.numbers.period1.clickers_percent}} <span>%</span></span>
				</span>
			</div>
		</div>
		<div class="jackmail_overflow_hidden">
			<div class="jackmail_left jackmail_left_70">
				<span class="jackmail_grey">
					<span ng-show="s1.numbers.display.clicks">
						{{s1.numbers.period1.clicks | numberSeparator}}
						<span ng-hide="s1.numbers.period1.clicks > 1"><?php _e( 'click', 'jackmail-newsletters' ) ?></span>
						<span ng-show="s1.numbers.period1.clicks > 1"><?php _e( 'clicks', 'jackmail-newsletters' ) ?></span>
					</span>
					<span ng-hide="s1.numbers.display.clicks">
						{{s1.numbers.period1.clickers | numberSeparator}}
						<span ng-hide="s1.numbers.period1.clickers > 1"><?php _e( 'clicker', 'jackmail-newsletters' ) ?></span>
						<span ng-show="s1.numbers.period1.clickers > 1"><?php _e( 'clickers', 'jackmail-newsletters' ) ?></span>
					</span>
				</span>
			</div>
			<div class="jackmail_left jackmail_left_30">
				<span ng-show="s1.numbers.display.clicks"
				      ng-class="s1.numbers.tendency.clicks_percent < 0 ? 'jackmail_statistics_numbers_compare_inferior_nok' : 'jackmail_statistics_numbers_compare_superior_ok'">
					{{s1.numbers.tendency.clicks_percent | numberSeparator}} %
				</span>
				<span ng-hide="s1.numbers.display.clicks"
				      ng-class="s1.numbers.tendency.clickers_percent < 0 ? 'jackmail_statistics_numbers_compare_inferior_nok' : 'jackmail_statistics_numbers_compare_superior_ok'">
					{{s1.numbers.tendency.clickers_percent | numberSeparator}} %
				</span>
			</div>
		</div>
		<canvas class="jackmail_statistics_synthesis_canvas"
		        id="jackmail_statistics_synthesis_canvas_clicks"
		        width="180" height="60">
		</canvas>
	</div>
	<div>
		<div class="jackmail_overflow_hidden">
			<div class="jackmail_left jackmail_statistics_synthesis_dropdown_container">
				<div jackmail-dropdown-button dropdown-left="true"
				     button-value="{{s1.numbers.display.opens ? s1.open_opener_select_titles[ 0 ] : s1.open_opener_select_titles[ 1 ]}}"
				     titles-clicks-array="s1.open_opener_select_titles"
				     titles-clicks-array-event="s1.select_open_opener( key )">
				</div>
				<span ng-show="s1.numbers.display.opens"
				      class="jackmail_info dashicons dashicons-info" jackmail-tooltip-width="270"
				      jackmail-tooltip="<?php esc_attr_e( 'Openings are the sum of all openings including multiple openings of certain contacts.', 'jackmail-newsletters' ) ?>"
				      jackmail-tooltip-link="https://www.jackmail.com/docs/fr/statistiques/analyser-les-statistiques">
				</span>
				<span ng-hide="s1.numbers.display.opens"
				      class="jackmail_info dashicons dashicons-info" jackmail-tooltip-width="270"
				      jackmail-tooltip="<?php esc_attr_e( 'Openers are recipients who have opened the email at least once.', 'jackmail-newsletters' ) ?>"
				      jackmail-tooltip-link="https://www.jackmail.com/docs/fr/statistiques/analyser-les-statistiques">
				</span>
			</div>
			<div class="jackmail_left jackmail_statistics_opens">
				<span class="jackmail_statistics_number_principal">
					<span ng-show="s1.numbers.display.opens">{{s1.numbers.period1.opens_percent}} <span>%</span></span>
					<span ng-hide="s1.numbers.display.opens">{{s1.numbers.period1.openers_percent}} <span>%</span></span>
				</span>
			</div>
		</div>
		<div class="jackmail_overflow_hidden">
			<div class="jackmail_left jackmail_left_70">
				<span class="jackmail_grey">
					<span ng-show="s1.numbers.display.opens">
						{{s1.numbers.period1.opens | numberSeparator}}
						<span ng-hide="s1.numbers.period1.opens > 1"><?php _e( 'opening', 'jackmail-newsletters' ) ?></span>
						<span ng-show="s1.numbers.period1.opens > 1"><?php _e( 'openings', 'jackmail-newsletters' ) ?></span>
					</span>
					<span ng-hide="s1.numbers.display.opens">
						{{s1.numbers.period1.openers | numberSeparator}}
						<span ng-hide="s1.numbers.period1.openers > 1"><?php _e( 'opener', 'jackmail-newsletters' ) ?></span>
						<span ng-show="s1.numbers.period1.openers > 1"><?php _e( 'openers', 'jackmail-newsletters' ) ?></span>
					</span>
				</span>
			</div>
			<div class="jackmail_left jackmail_left_30">
				<span ng-show="s1.numbers.display.opens"
				      ng-class="s1.numbers.tendency.opens_percent < 0 ? 'jackmail_statistics_numbers_compare_inferior_nok' : 'jackmail_statistics_numbers_compare_superior_ok'">
					{{s1.numbers.tendency.opens_percent | numberSeparator}} %
				</span>
				<span ng-hide="s1.numbers.display.opens"
				      ng-class="s1.numbers.tendency.openers_percent < 0 ? 'jackmail_statistics_numbers_compare_inferior_nok' : 'jackmail_statistics_numbers_compare_superior_ok'">
					{{s1.numbers.tendency.openers_percent | numberSeparator}} %
				</span>
			</div>
		</div>
		<canvas class="jackmail_statistics_synthesis_canvas"
		        id="jackmail_statistics_synthesis_canvas_opens"
		        width="180" height="60">
		</canvas>
	</div>
	<div>
		<div class="jackmail_overflow_hidden">
			<div class="jackmail_left">
				<span class="jackmail_statistics_numbers_title">
					<?php _e( 'Reactivity rate', 'jackmail-newsletters' ) ?>
					<span class="jackmail_info dashicons dashicons-info" jackmail-tooltip-width="270"
					      jackmail-tooltip="<?php esc_attr_e( 'The response rate is the number of useful clicks (without the unsubscribe link clicks) of the number of openers.It measures the relevance of the content of your message and the interest of the recipients.', 'jackmail-newsletters' ) ?>"
					      jackmail-tooltip-link="https://www.jackmail.com/docs/fr/statistiques/analyser-les-statistiques">
					</span>
				</span>
			</div>
			<div class="jackmail_left jackmail_statistics_read">
				<span class="jackmail_statistics_number_principal">
					<span>{{s1.numbers.period1.reactivity_percent}} <span>%</span></span>
				</span>
			</div>
		</div>
		<div class="jackmail_overflow_hidden">
			<div class="jackmail_left jackmail_left_70">
				&nbsp;
			</div>
			<div class="jackmail_left jackmail_left_30">
				<span ng-class="s1.numbers.tendency.reactivity_percent < 0 ? 'jackmail_statistics_numbers_compare_inferior_nok' : 'jackmail_statistics_numbers_compare_superior_ok'">
					{{s1.numbers.tendency.reactivity_percent | numberSeparator}} %
				</span>
			</div>
		</div>
		<canvas class="jackmail_statistics_synthesis_canvas"
		        id="jackmail_statistics_synthesis_canvas_reactivity_percent"
		        width="180" height="60">
		</canvas>
	</div>
	<div>
		<div class="jackmail_overflow_hidden">
			<div class="jackmail_left">
				<span class="jackmail_statistics_numbers_title">
					<?php _e( 'Unsubscribers', 'jackmail-newsletters' ) ?>
					<span class="jackmail_info dashicons dashicons-info" jackmail-tooltip-width="270"
					      jackmail-tooltip="<?php esc_attr_e( 'Unsubscriptions correspond to the number and rate of recipients who clicked on the unsubscribe link. Unsubscribers are automatically added to the blacklists used during the campaign.', 'jackmail-newsletters' ) ?>"
					      jackmail-tooltip-link="https://www.jackmail.com/docs/fr/statistiques/analyser-les-statistiques">
					</span>
				</span>
			</div>
			<div class="jackmail_left jackmail_statistics_unsubscribes">
				<span class="jackmail_statistics_number_principal">
					<span>{{s1.numbers.period1.unsubscribes_percent}} <span>%</span></span>
				</span>
			</div>
		</div>
		<div class="jackmail_overflow_hidden">
			<div class="jackmail_left jackmail_left_70">
				<span class="jackmail_grey">
					<span>
						{{s1.numbers.period1.unsubscribes | numberSeparator}}
						<span ng-hide="s1.numbers.period1.unsubscribes > 1">
							<?php _e( 'Unsubscriber', 'jackmail-newsletters' ) ?>
						</span>
						<span ng-show="s1.numbers.period1.unsubscribes > 1">
							<?php _e( 'Unsubscribers', 'jackmail-newsletters' ) ?>
						</span>
					</span>
				</span>
			</div>
			<div class="jackmail_left jackmail_left_30">
				<span ng-class="s1.numbers.tendency.unsubscribes_percent <= 0 ? 'jackmail_statistics_numbers_compare_inferior_ok' : 'jackmail_statistics_numbers_compare_superior_nok'">
					{{s1.numbers.tendency.unsubscribes_percent | numberSeparator}} %
				</span>
			</div>
		</div>
		<canvas class="jackmail_statistics_synthesis_canvas"
		        id="jackmail_statistics_synthesis_canvas_unsubscribes"
		        width="180" height="60">
		</canvas>
	</div>
	<div>
		<div class="jackmail_overflow_hidden">
			<div class="jackmail_left jackmail_statistics_synthesis_repartition_legend">
				<span class="jackmail_statistics_numbers_title"><?php _e( 'Distribution', 'jackmail-newsletters' ) ?></span>
				<p>
					<span class="jackmail_statistics_synthesis_repartition_legend_open" ng-style="{ 'background': value.color }"></span>
					<?php _e( 'Openers', 'jackmail-newsletters' ) ?> ({{s1.numbers.period1.openers_percent}} %)
				</p>
				<p>
					<span class="jackmail_statistics_synthesis_repartition_legend_bounces" ng-style="{ 'background': value.color }"></span>
					<?php _e( 'Bounces', 'jackmail-newsletters' ) ?> ({{s1.numbers.period1.bounces_percent}} %)
				</p>
				<p>
					<span class="jackmail_statistics_synthesis_repartition_legend_no_open" ng-style="{ 'background': value.color }"></span>
					<?php _e( 'Non openers', 'jackmail-newsletters' ) ?> ({{s1.numbers.period1.no_openers_percent}} %)
				</p>
			</div>
			<div class="jackmail_left">
				<div ng-repeat="value in s1.synthesis_graphic track by $index">
					<canvas width="100" height="100" id="jackmail_chartjs_synthesis_repartition"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="jackmail_statistics_synthesis_numbers_separator"></div>
<div class="jackmail_statistics_synthesis_top_container">
	<p class="jackmail_statistics_numbers_title"><?php _e( 'Links', 'jackmail-newsletters' ) ?></p>
	<table class="jackmail_statistics_synthesis_top">
		<tr class="jackmail_grid_th">
			<th></th>
			<th><?php _e( 'URL', 'jackmail-newsletters' ) ?></th>
			<th><?php _e( 'Clicks', 'jackmail-newsletters' ) ?></th>
			<th class="jackmail_statistics_synthesis_top_links_clickers"><?php _e( 'Clickers', 'jackmail-newsletters' ) ?></th>
			<th class="jackmail_statistics_synthesis_top_links_details"></th>
		</tr>
		<tr ng-repeat="( key, link ) in s1.top_links track by $index" ng-show="s1.nb_top_links > 0"
		    class="jackmail_statistics_synthesis_top_details">
			<td>
				<span class="jackmail_statistics_synthesis_top_i dashicons dashicons-awards"
				      ng-class="'jackmail_statistics_synthesis_top_' + ( key + 1 )"></span>
				<span class="jackmail_statistics_synthesis_top_value">{{key + 1}}</span>
				<span class="jackmail_statistics_synthesis_top_email"></span>
			</td>
			<td>{{link.url}}</td>
			<td class="jackmail_statistics_synthesis_top_links_clicks">{{link.clicks}} ({{link.clicks_percent}} %)</td>
			<td class="jackmail_statistics_synthesis_top_links_clickers">{{link.clickers}} ({{link.clickers_percent}} %)</td>
			<td class="jackmail_statistics_synthesis_top_links_details">
				<span ng-click="s1.see_top_link_details( link.url )"><?php _e( 'See clickers', 'jackmail-newsletters' ) ?></span>
			</td>
		</tr>
	</table>
	<p ng-show="s1.nb_top_links > 0" ng-click="$root.show_hide_item( 'links' )"
	   class="jackmail_statistics_synthesis_top_details_link">
		<?php _e( 'Details', 'jackmail-newsletters' ) ?>
	</p>
	<p ng-show="s1.nb_top_links === 0" class="jackmail_statistics_no_data"><?php _e( 'No data', 'jackmail-newsletters' ) ?></p>
</div>
<div class="jackmail_statistics_synthesis_top_container">
	<p class="jackmail_statistics_numbers_title"><?php _e( 'Most reactive contacts', 'jackmail-newsletters' ) ?></p>
	<table class="jackmail_statistics_synthesis_top">
		<tr class="jackmail_grid_th">
			<th></th>
			<th><?php _e( 'Email', 'jackmail-newsletters' ) ?></th>
			<th><?php _e( 'Opening rate', 'jackmail-newsletters' ) ?></th>
			<th><?php _e( 'Click rate', 'jackmail-newsletters' ) ?></th>
		</tr>
		<tr ng-repeat="( key, contact ) in s1.more_actives_contacts track by $index" ng-show="s1.nb_more_actives_contacts > 0"
		    class="jackmail_statistics_synthesis_top_details">
			<td>
				<span class="jackmail_statistics_synthesis_top_i dashicons dashicons-awards"
				      ng-class="'jackmail_statistics_synthesis_top_' + ( key + 1 )"></span>
				<span class="jackmail_statistics_synthesis_top_value">{{key + 1}}</span>
				<span class="jackmail_statistics_synthesis_top_email"></span>
			</td>
			<td>{{contact.email}}</td>
			<td class="jackmail_statistics_synthesis_top_opens">{{contact.opens_percent}} %</td>
			<td class="jackmail_statistics_synthesis_top_clicks">{{contact.clicks_percent}} %</td>
		</tr>
	</table>
	<p ng-show="s1.nb_more_actives_contacts > 0 && !$root.settings.is_freemium"
	   ng-click="!$root.settings.is_freemium ? s1.show_more_actives_contacts() : ''"
	   class="jackmail_statistics_synthesis_top_details_link">
		<?php _e( 'Details', 'jackmail-newsletters' ) ?>
	</p>
	<p ng-show="s1.nb_more_actives_contacts > 0 && $root.settings.is_freemium"
	   class="jackmail_statistics_synthesis_top_details_link">
		<span jackmail-tooltip="<?php esc_attr_e( 'Please buy a premium offer to unlock this feature.<br/><a target="blank" href="https://www.jackmail.com/pricing/">View pricing</a>.', 'jackmail-newsletters' ) ?>"
		      jackmail-tooltip-middle>
			<?php _e( 'Details', 'jackmail-newsletters' ) ?>
		</span>
	</p>
	<p ng-show="s1.nb_more_actives_contacts === 0" class="jackmail_statistics_no_data">
		<?php _e( 'No data', 'jackmail-newsletters' ) ?>
	</p>
</div>
<div class="jackmail_statistics_graphic_timeline_choice">
	<input ng-click="s1.display_synthesis_graphic()"
	       ng-class="$root.show_synthesis_item === 'graphic' ? 'jackmail_statistics_graphic_timeline_choice_selected' : ''"
	       type="button" value="<?php esc_attr_e( 'Statistics', 'jackmail-newsletters' ) ?>"/>
	<input ng-click="s1.display_synthesis_timeline()"
	       ng-class="$root.show_synthesis_item === 'timeline' ? 'jackmail_statistics_graphic_timeline_choice_selected' : ''"
	       type="button" value="<?php esc_attr_e( 'Timeline', 'jackmail-newsletters' ) ?>"/>
</div>
<div ng-show="$root.show_synthesis_item === 'graphic'">
	<div ng-repeat="value in s1.synthesis_graphic track by $index"
	     ng-show="s1.nb_displays_graphic !== 0"
	     class="jackmail_statistics_graphic">
		<canvas id="jackmail_chartjs_synthesis" style="max-width:100%!important;"></canvas>
		<div id="jackmail_chartjs_synthesis_tooltip"></div>
	</div>
</div>
<div ng-show="$root.show_synthesis_item === 'timeline'">
	<div ng-show="s1.nb_synthesis_timeline > 0" class="jackmail_statistics_timeline">
		<div class="jackmail_statistics_timeline_line"></div>
		<div ng-repeat="timeline in s1.synthesis_timeline track by $index" ng-class="'jackmail_statistics_timeline_' + timeline.event"
		     ng-style="{ 'right': 'calc(' + timeline.position + '% - 7px)' }">
			<div ng-style="timeline.position > 50 ? { 'left': '0' } : { 'right': '0' }">
				<span class="jackmail_green">{{timeline.email}}</span>
				<br/>
				<span ng-show="timeline.event === 'open'"><?php _e( 'opened:', 'jackmail-newsletters' ) ?></span>
				<span ng-show="timeline.event === 'click'"><?php _e( 'clicked:', 'jackmail-newsletters' ) ?></span>
				<span ng-show="timeline.event === 'unsubscribe'"><?php _e( 'opted out:', 'jackmail-newsletters' ) ?></span>
				<br/>
				{{timeline.date | formatedDate : 'gmt_to_timezone' : 'hours'}}
			</div>
		</div>
	</div>
	<div ng-show="s1.nb_synthesis_timeline === 0" class="jackmail_statistics_no_data">
		<?php _e( 'No data', 'jackmail-newsletters' ) ?>
	</div>
</div>
<div ng-show="$root.show_synthesis_item === 'graphic' || $root.show_synthesis_item === 'timeline'" class="jackmail_statistics_graphic_legend">
	<span ng-show="$root.show_synthesis_item === 'graphic'"
	      jackmail-checkbox-simple="s1.graphic_displays.recipients"
	      ng-click="s1.show_hide_graphic_legend( 'recipients' )"
	      checkbox-class="jackmail_checked_recipients"
	      checkbox-title="<?php esc_attr_e( 'Recipients', 'jackmail-newsletters' ) ?>">
	</span>
	<span jackmail-checkbox-simple="s1.graphic_displays.opens"
	      ng-click="s1.show_hide_graphic_legend( 'opens' )"
	      checkbox-class="jackmail_checked_opens"
	      checkbox-title="<?php esc_attr_e( 'Opens', 'jackmail-newsletters' ) ?>">
	</span>
	<span jackmail-checkbox-simple="s1.graphic_displays.clicks"
	      ng-click="s1.show_hide_graphic_legend( 'clicks' )"
	      checkbox-class="jackmail_checked_clicks"
	      checkbox-title="<?php esc_attr_e( 'Clicks', 'jackmail-newsletters' ) ?>">
	</span>
	<span jackmail-checkbox-simple="s1.graphic_displays.unsubscribes"
	      ng-click="s1.show_hide_graphic_legend( 'unsubscribes' )"
	      checkbox-class="jackmail_checked_unsubscribes"
	      checkbox-title="<?php esc_attr_e( 'Unsubscribers', 'jackmail-newsletters' ) ?>">
	</span>
</div>
<?php } ?>