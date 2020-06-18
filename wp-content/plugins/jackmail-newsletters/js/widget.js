'use strict';

function jackmail_widget_set_data( id, default_fields, id_list, lists, double_optin, double_optin_confirmation_type, gdpr ) {
	var content = document.getElementById( 'jackmail_widget_content_' + id ).innerHTML;
	var random = new Date().getTime() + '' + Math.floor( ( Math.random() * 9999999 ) + 1000000 );
	content = content.replace( new RegExp( id, 'g' ), random );
	content = content.replace( 'var jackmail_lists_details', '// var jackmail_lists_details' );
	document.getElementById( 'jackmail_widget_content_' + id ).innerHTML = content;
	document.getElementById( 'jackmail_widget_content_' + id ).setAttribute( 'id', 'jackmail_widget_content_' + random );
	id = random;
	document.getElementById( 'jackmail_widget_list_' + id ).value = id_list;
	jackmail_widget_select_list( id, default_fields, id_list, lists );
	if ( double_optin === '1' ) {
		document.getElementById( 'jackmail_double_optin_' + id ).checked = true;
		document.getElementById( 'jackmail_widget_confirmation_type_' + id ).value = double_optin_confirmation_type;
	} else {
		document.getElementById( 'jackmail_double_optin_configuration_block_' + id ).style.display = 'none';
	}
	jackmail_widget_select_confirmation_type( id );
	if ( gdpr === '1' ) {
		document.getElementById( 'jackmail_gdpr_' + id ).checked = true;
	} else {
		document.getElementById( 'jackmail_gdpr_configuration_block_' + id ).style.display = 'none';
	}
}

function jackmail_widget_select_list( id, default_fields, id_list, lists ) {
	var i;
	var nb_lists = lists.length;
	var default_fields_array = JSON.parse( default_fields );
	var selected_id = document.getElementById( 'jackmail_widget_list_' + id ).value;
	var current_fields = document.getElementById( 'jackmail_widget_fields_' + id ).value;
	var fields = [];
	for ( i = 0; i < nb_lists; i++ ) {
		var list_id = lists[ i ].id;
		var all_fields = lists[ i ].all_fields;
		document.getElementById( 'jackmail_widget_field_' + list_id + '_' + id + '_container' ).style.display = 'none';
		var j;
		var nb_fields = all_fields.length;
		for ( j = 0; j < nb_fields; j++ ) {
			var html_id = list_id + '_' + ( j + 1 ) + '_' + id;
			var checked = false;
			if ( ( list_id !== id_list ) || ( list_id === id_list && default_fields_array.indexOf( j + 1 ) !== -1 ) ) {
				checked = true;
				if ( list_id === selected_id ) {
					fields.push( j + 1 );
				}
			}
			document.getElementById( 'jackmail_widget_field_' + html_id + '_checkbox' ).checked = checked;
		}
	}
	fields = JSON.stringify( fields );
	if ( fields !== current_fields ) {
		document.getElementById( 'jackmail_widget_fields_' + id ).value = fields;
	}
	if ( selected_id > 0 ) {
		var value = document.getElementById( 'jackmail_widget_field_' + selected_id + '_' + id + '_container' ).innerHTML;
		var display = 'block';
		if ( value.replace( /^\s+/g, '' ).replace( /\s+$/g, '' ) === '' ) {
			display = 'none';
		}
		document.getElementById( 'jackmail_widget_field_' + selected_id + '_' + id + '_container' ).style.display = display;
		document.getElementById( 'jackmail_widget_fields_' + id + '_container' ).style.display = display;
	}
	else {
		document.getElementById( 'jackmail_widget_fields_' + id + '_container' ).style.display = 'none';
	}
}

function jackmail_widget_select_list_field( id, field_id ) {
	var selected_fields = document.getElementById( 'jackmail_widget_fields_' + id ).value;
	if ( selected_fields !== '' ) {
		selected_fields = JSON.parse( selected_fields );
	}
	else {
		selected_fields = [];
	}
	var i;
	var nb_selected_fields = selected_fields.length;
	var new_selected_fields = [];
	var add_field = true;
	for ( i = 0; i < nb_selected_fields; i++ ) {
		if ( selected_fields[ i ] < field_id || selected_fields[ i ] > field_id ) {
			new_selected_fields.push( selected_fields[ i ] );
		}
		else {
			add_field = false;
		}
	}
	if ( add_field ) {
		new_selected_fields.push( field_id );
		new_selected_fields.sort();
	}
	document.getElementById( 'jackmail_widget_fields_' + id ).value = JSON.stringify( new_selected_fields );
}

function jackmail_widget_select_confirmation_type( id ) {
	var style_display = 'none';
	if ( document.getElementById( 'jackmail_widget_confirmation_type_' + id ).value === 'url' ) {
		style_display = 'block';
	}
	document.getElementById( 'jackmail_double_optin_confirmation_url_' + id ).style.display = style_display;
}

function jackmail_widget_select_double_optin( id ) {
	var style_display = 'none';
	if ( document.getElementById( 'jackmail_double_optin_configuration_block_' + id ).style.display === 'none' ) {
		style_display = 'block';
	}
	document.getElementById( 'jackmail_double_optin_configuration_block_' + id ).style.display = style_display;
}

function jackmail_widget_select_gdpr( id ) {
	var style_display = 'none';
	if ( document.getElementById( 'jackmail_gdpr_configuration_block_' + id ).style.display === 'none' ) {
		style_display = 'block';
	}
	document.getElementById( 'jackmail_gdpr_configuration_block_' + id ).style.display = style_display;
}