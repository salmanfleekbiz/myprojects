(function() {

	tinymce.PluginManager.add('easy_responsive_shortcodes_button', function(editor, url) {
		editor.addButton( 'easy_responsive_shortcodes_button', {
			title: 'Shortcodes',
			type:  'menubutton',
			icon:  'icon easy-responsive-shortcodes-icon',
			menu:  [

				/* Documentation Link */
				{
					text:    'View Documentation',
					onclick: function() {
						window.open('http://wordpress.org/plugins/easy-responsive-shortcodes/faq/');
					},
				},

				/* Divider */
				{
					text: '-',
				},

				/* Accordion */
				{
					text:    'Accordion',
					onclick: function() {
						editor.insertContent( '[accordion]<br>[accordion_item title="Accordion Item 1 Title"]<br>Accordion item 1 content goes here.<br>[/accordion_item]<br>[accordion_item title="Accordion Item 2 Title"]<br>Accordion item 2 content goes here.<br>[/accordion_item]<br>[accordion_item title="Accordion Item 3 Title"]<br>Accordion item 3 content goes here.<br>[/accordion_item]<br>[/accordion]' );
					},
				},

				/* Alert */
				{
					text:    'Alert',
					onclick: function() {
						editor.insertContent( '[alert color="" icon=""]Alert text goes here.[/alert]' );
					},
				},

				/* Box */
				{
					text:    'Box',
					onclick: function() {
						editor.insertContent( '[box title=""]Box text goes here.[/box]' );
					},
				},

				/* Button */
				{
					text:    'Button',
					onclick: function() {
						editor.insertContent( '[button color="" url="http://domain.com/"]Button Text[/button]' );
					},
				},

				/* Call to Action */
				{
					text:    'Call to Action',
					onclick: function() {
						editor.insertContent( '[call_to_action color="" button_text="Button Text" button_url="http://domain.com"]<br>Call-to-action text goes here.<br>[/call_to_action]' );
					},
				},

				/* Clear Floats */
				{
					text:    'Clear Floats',
					onclick: function() {
						editor.insertContent( '[clear_floats]' );
					},
				},

				/* Columns */
				{
					text:    'Columns',
					onclick: function() {
						editor.insertContent( '[columns]<br>[column width="one-third"]<br>Column 1 text goes here.<br>[/column]<br>[column width="one-third"]<br>Column 2 text goes here.<br>[/column]<br>[column width="one-third"]<br>Column 3 text goes here.<br>[/column]<br>[/columns]' );
					},
				},

				/* Highlight */
				{
					text:    'Highlight',
					onclick: function() {
						editor.insertContent( '[highlight]Highlighted text content goes here.[/highlight]' );
					},
				},

				/* Icon */
				{
					text:    'Icon',
					onclick: function() {
						editor.insertContent( '[icon id=""]' );
					},
				},

				/* Tabs */
				{
					text:    'Tabs',
					onclick: function() {
						editor.insertContent( '[tabs]<br>[tab title="Tab 1 Title"]<br>Tab 1 text goes here.<br>[/tab]<br>[tab title="Tab 2 Title"]<br>Tab 2 text goes here.<br>[/tab]<br>[tab title="Tab 3 Title"]<br>Tab 3 text goes here.<br>[/tab]<br>[/tabs]' );
					},
				},

				/* Toggle */
				{
					text:    'Toggle',
					onclick: function() {
						editor.insertContent( '[toggle title="Toggle Title"]<br>Toggle text goes here.<br>[/toggle]' );
					},
				},

			],
		});
	});
})();
