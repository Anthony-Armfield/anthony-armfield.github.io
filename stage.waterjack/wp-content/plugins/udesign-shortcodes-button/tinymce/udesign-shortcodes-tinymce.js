(function() {
        
	tinymce.PluginManager.add( 'udesign_shortcodes_mce_button', function( editor, url ) {
		editor.addButton( 'udesign_shortcodes_mce_button', {
			title: editor.getLang( "udesign_sb_strings.buttonTitle" ),
			type: 'menubutton',
			icon: 'icon udesign-shortcodes-icon',
			menu: [

				/** Layout Start **/
				{
					text: editor.getLang( "udesign_sb_strings.layoutText" ),
                                        icon: 'icon dashicons-layout',
					menu: [

						/* Columns Start */
						{
							text: editor.getLang( "udesign_sb_strings.columnsText" ),
							onclick: function() {
								editor.windowManager.open( {
									title: editor.getLang( "udesign_sb_strings.columnsTitle" ),
									body: [

									// Column Size
									{
										type: 'listbox',
										name: 'columnArrangement',
										label: editor.getLang( "udesign_sb_strings.columnArrangementLabel" ),
										values: [
                                                                                    
											{text: '1/4 | 1/4 | 1/4 | 1/4', value: '1/4|1/4|1/4|1/4'},
											{text: '1/4 | 3/4', value: '1/4|3/4'},
											{text: '3/4 | 1/4', value: '3/4|1/4'},
											{text: '1/4 | 1/4 | 1/2', value: '1/4|1/4|1/2'},
											{text: '1/2 | 1/4 | 1/4', value: '1/2|1/4|1/4'},
											{text: '1/4 | 1/2 | 1/4', value: '1/4|1/2|1/4'},
											{text: '1/3 | 1/3 | 1/3', value: '1/3|1/3|1/3'},
											{text: '1/3 | 2/3', value: '1/3|2/3'},
											{text: '2/3 | 1/3', value: '2/3|1/3'},
											{text: '1/2 | 1/2', value: '1/2|1/2'},
											{text: '1/4', value: 'one_fourth'},
											{text: '1/4 (last)', value: 'one_fourth_last'},
											{text: '1/3', value: 'one_third'},
											{text: '1/3 (last)', value: 'one_third_last'},
											{text: '1/2', value: 'one_half'},
											{text: '1/2 (last)', value: 'one_half_last'},
											{text: '2/3', value: 'two_third'},
											{text: '2/3 (last)', value: 'two_third_last'},
											{text: '3/4', value: 'three_fourth'},
											{text: '3/4 (last)', value: 'three_fourth_last'},
										],
                                                                                // value : 'one_fourth' // Sets the default
									},

									// Column Content
									{
										type: 'textbox',
										name: 'columnContent',
										label: editor.getLang( "udesign_sb_strings.columnContentLabel" ),
										value: editor.getLang( "udesign_sb_strings.columnContentValue" ),
										multiline: true,
										minWidth: 300,
										minHeight: 100
									} ],
									onsubmit: function( e ) {
                                                                            
                                                                                var $shortcodetext = '',
                                                                                    $columnArrangement = e.data.columnArrangement,
                                                                                    $columnContent = e.data.columnContent;

                                                                                switch ( $columnArrangement ) {

                                                                                        // Grouped Sets:
                                                                                        case '1/4|1/4|1/4|1/4':
                                                                                            $shortcodetext = '[one_fourth]' + $columnContent + '[/one_fourth] [one_fourth]' + $columnContent + '[/one_fourth] [one_fourth]' + $columnContent + '[/one_fourth] [one_fourth_last]' + $columnContent + '[/one_fourth_last]';
                                                                                            break;
                                                                                        case '1/4|3/4':
                                                                                            $shortcodetext = '[one_fourth]' + $columnContent + '[/one_fourth] [three_fourth_last]' + $columnContent + '[/three_fourth_last]';
                                                                                            break;
                                                                                        case '3/4|1/4':
                                                                                            $shortcodetext = '[three_fourth]' + $columnContent + '[/three_fourth] [one_fourth_last]' + $columnContent + '[/one_fourth_last]';
                                                                                            break;
                                                                                        case '1/4|1/4|1/2':
                                                                                            $shortcodetext = '[one_fourth]' + $columnContent + '[/one_fourth] [one_fourth]' + $columnContent + '[/one_fourth] [one_half_last]' + $columnContent + '[/one_half_last]';
                                                                                            break;
                                                                                        case '1/2|1/4|1/4':
                                                                                            $shortcodetext = '[one_half]' + $columnContent + '[/one_half] [one_fourth]' + $columnContent + '[/one_fourth] [one_fourth_last]' + $columnContent + '[/one_fourth_last]';
                                                                                            break;
                                                                                        case '1/4|1/2|1/4':
                                                                                            $shortcodetext = '[one_fourth]' + $columnContent + '[/one_fourth] [one_half]' + $columnContent + '[/one_half] [one_fourth_last]' + $columnContent + '[/one_fourth_last]';
                                                                                            break;
                                                                                        case '1/3|1/3|1/3':
                                                                                            $shortcodetext = '[one_third]' + $columnContent + '[/one_third] [one_third]' + $columnContent + '[/one_third] [one_third_last]' + $columnContent + '[/one_third_last]';
                                                                                            break;
                                                                                        case '1/3|2/3':
                                                                                            $shortcodetext = '[one_third]' + $columnContent + '[/one_third] [two_third_last]' + $columnContent + '[/two_third_last]';
                                                                                            break;
                                                                                        case '2/3|1/3':
                                                                                            $shortcodetext = '[two_third]' + $columnContent + '[/two_third] [one_third_last]' + $columnContent + '[/one_third_last]';
                                                                                            break;
                                                                                        case '1/2|1/2':
                                                                                            $shortcodetext = '[one_half]' + $columnContent + '[/one_half] [one_half_last]' + $columnContent + '[/one_half_last]';
                                                                                            break;
                                                                                        // Single Column
                                                                                        case 'one_fourth': // One Fourth
                                                                                            $shortcodetext = '[one_fourth]' + $columnContent + '[/one_fourth]';
                                                                                            break;
                                                                                        case 'one_fourth_last':
                                                                                            $shortcodetext = '[one_fourth_last]' + $columnContent + '[/one_fourth_last]';
                                                                                            break;
                                                                                        case 'one_third': // One Third
                                                                                            $shortcodetext = '[one_third]' + $columnContent + '[/one_third]';
                                                                                            break;
                                                                                        case 'one_third_last':
                                                                                            $shortcodetext = '[one_third_last]' + $columnContent + '[/one_third_last]';
                                                                                            break;
                                                                                        case 'one_half': // One Half
                                                                                            $shortcodetext = '[one_half]' + $columnContent + '[/one_half]';
                                                                                            break;
                                                                                        case 'one_half_last':
                                                                                            $shortcodetext = '[one_half_last]' + $columnContent + '[/one_half_last]';
                                                                                            break;
                                                                                        case 'two_third': // Two Third
                                                                                            $shortcodetext = '[two_third]' + $columnContent + '[/two_third]';
                                                                                            break;
                                                                                        case 'two_third_last':
                                                                                            $shortcodetext = '[two_third_last]' + $columnContent + '[/two_third_last]';
                                                                                            break;
                                                                                        case 'three_fourth': // Three Fourth
                                                                                            $shortcodetext = '[three_fourth]' + $columnContent + '[/three_fourth]';
                                                                                            break;
                                                                                        case 'three_fourth_last':
                                                                                            $shortcodetext = '[three_fourth_last]' + $columnContent + '[/three_fourth_last]';
                                                                                            
                                                                                }
                                                                                
										editor.insertContent( $shortcodetext );
									}
								});
							}
						}, // End columns

						/* Dividers Start */
						{
							text: editor.getLang( "udesign_sb_strings.dividersText" ),
							onclick: function() {
								editor.windowManager.open( {
									title: editor.getLang( "udesign_sb_strings.dividersTitle" ),
									body: [

									// Divider Style
									{
										type: 'listbox',
										name: 'dividerStyle',
										label: editor.getLang( "udesign_sb_strings.dividerStyleLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.dividerStyleValuesTextDivider" ), value: 'divider'},
											{text: editor.getLang( "udesign_sb_strings.dividerStyleValuesTextDividerTop" ), value: 'divider_top'},
											{text: editor.getLang( "udesign_sb_strings.dividerStyleValuesTextClear" ), value: 'clear'}
										],
                                                                                minWidth: 300,
									} ],
									onsubmit: function( e ) {
										editor.insertContent('[' + e.data.dividerStyle + ']');
									}
								});
							}
						} // End divider

					]
				}, // End Layout Section


				/** Buttons **/
				{
					text: editor.getLang( "udesign_sb_strings.buttonsText" ),
                                        icon: 'icon dashicons-external',
					menu: [

						/* Flat Button Start */
						{
							text: editor.getLang( "udesign_sb_strings.flatButtonText" ),
							onclick: function() {
								editor.windowManager.open( {
									title: editor.getLang( "udesign_sb_strings.flatButtonTitle" ),
									body: [

									// Button Text
									{
										type: 'textbox',
										name: 'flatButtonText',
										label: editor.getLang( "udesign_sb_strings.flatButtonTextLabel" ),
										value: editor.getLang( "udesign_sb_strings.flatButtonTextValue" )
									},

									// Button Title
									{
										type: 'textbox',
										name: 'flatButtonTitle',
										label: editor.getLang( "udesign_sb_strings.flatButtonTitleLabel" ),
										value: editor.getLang( "udesign_sb_strings.flatButtonTitleValue" )
									},

									// Button URL
									{
										type: 'textbox',
										name: 'flatButtonUrl',
										label: editor.getLang( "udesign_sb_strings.flatButtonUrlLabel" ),
										value: 'http://www.example.com/'
									},

									// Button Padding
									{
										type: 'textbox',
										name: 'flatButtonPadding',
										label: editor.getLang( "udesign_sb_strings.flatButtonPaddingLabel" ),
										value: '10px 20px'
									},

									// Button Background Color
									{
                                                                                type: 'colorbox',  // colorpicker plugin MUST be included for this to work
                                                                                name: 'flatButtonBackgroundColor',
                                                                                label: editor.getLang( "udesign_sb_strings.flatButtonBackgroundColorLabel" ),
                                                                                value: 'transparent',
                                                                                classes: 'u-design-shortcode-colorbox', // this class is used to fix some CSS issues with the colorbox
                                                                                onaction: createColorPickAction()
									},

									// Button Border Color
									{
                                                                                type: 'colorbox',  // colorpicker plugin MUST be included for this to work
                                                                                name: 'flatButtonBorderColor',
                                                                                label: editor.getLang( "udesign_sb_strings.flatButtonBorderColorLabel" ),
                                                                                value: '#ff5c00',
                                                                                classes: 'u-design-shortcode-colorbox', // this class is used to fix some CSS issues with the colorbox
                                                                                onaction: createColorPickAction()
									},

									// Button Border Width
									{
										type: 'textbox',
										name: 'flatButtonBorderWidth',
										label: editor.getLang( "udesign_sb_strings.flatButtonBorderWidthLabel" ),
										value: '1px'
									},

									// Button Text Color
									{
                                                                                type: 'colorbox',  // colorpicker plugin MUST be included for this to work
                                                                                name: 'flatButtonTextColor',
                                                                                label: editor.getLang( "udesign_sb_strings.flatButtonTextColorLabel" ),
                                                                                value: '#000000',
                                                                                classes: 'u-design-shortcode-colorbox', // this class is used to fix some CSS issues with the colorbox
                                                                                onaction: createColorPickAction()
									},

									// Button Text Size
									{
										type: 'textbox',
										name: 'flatButtonTextSize',
										label: editor.getLang( "udesign_sb_strings.flatButtonTextSizeLabel" ),
										value: '14px'
									},

									// Button Alignment
									{
										type: 'listbox',
										name: 'flatButtonAlignment',
										label: editor.getLang( "udesign_sb_strings.flatButtonAlignmentLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.flatButtonAlignmentValuesLeft" ), value: 'left'},
											{text: editor.getLang( "udesign_sb_strings.flatButtonAlignmentValuesRight" ), value: 'right'},
											{text: editor.getLang( "udesign_sb_strings.flatButtonAlignmentValuesCenter" ), value: 'center'},
											{text: editor.getLang( "udesign_sb_strings.flatButtonAlignmentValuesNone" ), value: 'none'}
										]
									},

									// Button Link Target
									{
										type: 'listbox',
										name: 'flatButtonLinkTarget',
										label: editor.getLang( "udesign_sb_strings.flatButtonLinkTargetLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.flatButtonLinkTargetValuesSelf" ), value: '_self'},
											{text: editor.getLang( "udesign_sb_strings.flatButtonLinkTargetValuesBlank" ), value: '_blank'}
										]
									} ],
									onsubmit: function( e ) {
                                                                                editor.insertContent('[flat_button text="' + e.data.flatButtonText + '" title="' + e.data.flatButtonTitle + '" url="' + e.data.flatButtonUrl + '" padding="' + e.data.flatButtonPadding + '" bg_color="' + e.data.flatButtonBackgroundColor + '" border_color="' + e.data.flatButtonBorderColor + '" border_width="' + e.data.flatButtonBorderWidth + '" text_color="' + e.data.flatButtonTextColor + '" text_size="' + e.data.flatButtonTextSize + '" align="' + e.data.flatButtonAlignment + '" target="' + e.data.flatButtonLinkTarget + '"]');
									}
								});
							}
						}, // End flat button

						/* Simple Button Start */
						{
							text: editor.getLang( "udesign_sb_strings.simpleButtonText" ),
							onclick: function() {
								editor.windowManager.open( {
									title: editor.getLang( "udesign_sb_strings.simpleButtonTitle" ),
									body: [

									// Button Type
									{
										type: 'listbox',
										name: 'simpleButtonType',
										label: editor.getLang( "udesign_sb_strings.simpleButtonTypeLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.simpleButtonTypeValuesDefault" ), value: 'button'},
											{text: editor.getLang( "udesign_sb_strings.simpleButtonTypeValuesSmall" ), value: 'small_button'},
											{text: editor.getLang( "udesign_sb_strings.simpleButtonTypeValuesRound" ), value: 'round_button'}
										]
									},
                                                                        
									// Button Text
									{
										type: 'textbox',
										name: 'simpleButtonText',
										label: editor.getLang( "udesign_sb_strings.simpleButtonTextLabel" ),
										value: editor.getLang( "udesign_sb_strings.simpleButtonTextValue" )
									},

									// Button Title
									{
										type: 'textbox',
										name: 'simpleButtonTitle',
										label: editor.getLang( "udesign_sb_strings.simpleButtonTitleLabel" ),
										value: editor.getLang( "udesign_sb_strings.simpleButtonTitleValue" )
									},

									// Button URL
									{
										type: 'textbox',
										name: 'simpleButtonUrl',
										label: editor.getLang( "udesign_sb_strings.simpleButtonUrlLabel" ),
										value: 'http://www.example.com/'
									},

									// Button Style
									{
										type: 'listbox',
										name: 'simpleButtonStyle',
										label: editor.getLang( "udesign_sb_strings.simpleButtonStyleLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.simpleButtonStyleValuesDark" ), value: 'dark'},
											{text: editor.getLang( "udesign_sb_strings.simpleButtonStyleValuesLight" ), value: 'light'}
										]
									},

									// Button Alignment
									{
										type: 'listbox',
										name: 'simpleButtonAlignment',
										label: editor.getLang( "udesign_sb_strings.simpleButtonAlignmentLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.simpleButtonAlignmentValuesLeft" ), value: 'left'},
											{text: editor.getLang( "udesign_sb_strings.simpleButtonAlignmentValuesRight" ), value: 'right'},
											{text: editor.getLang( "udesign_sb_strings.simpleButtonAlignmentValuesCenter" ), value: 'center'}
										]
									},

									// Button Link Target
									{
										type: 'listbox',
										name: 'simpleButtonLinkTarget',
										label: editor.getLang( "udesign_sb_strings.simpleButtonLinkTargetLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.simpleButtonLinkTargetValuesSelf" ), value: '_self'},
											{text: editor.getLang( "udesign_sb_strings.simpleButtonLinkTargetValuesBlank" ), value: '_blank'}
										]
									} ],
									onsubmit: function( e ) {
                                                                                editor.insertContent('[' + e.data.simpleButtonType + ' text="' + e.data.simpleButtonText + '" title="' + e.data.simpleButtonTitle + '" url="' + e.data.simpleButtonUrl + '" style="' + e.data.simpleButtonStyle + '" align="' + e.data.simpleButtonAlignment + '" target="' + e.data.simpleButtonLinkTarget + '"]');
									}
								});
							}
						}, // End simple button

						/* Custom Button Start */
						{
							text: editor.getLang( "udesign_sb_strings.customButtonText" ),
							onclick: function() {
								editor.windowManager.open( {
									title: editor.getLang( "udesign_sb_strings.customButtonTitle" ),
									body: [

									// Button Text
									{
										type: 'textbox',
										name: 'customButtonText',
										label: editor.getLang( "udesign_sb_strings.customButtonTextLabel" ),
										value: editor.getLang( "udesign_sb_strings.customButtonTextValue" )
									},

									// Button Title
									{
										type: 'textbox',
										name: 'customButtonTitle',
										label: editor.getLang( "udesign_sb_strings.customButtonTitleLabel" ),
										value: editor.getLang( "udesign_sb_strings.customButtonTitleValue" )
									},

									// Button URL
									{
										type: 'textbox',
										name: 'customButtonUrl',
										label: editor.getLang( "udesign_sb_strings.customButtonUrlLabel" ),
										value: 'http://www.example.com/'
									},

									// Button Size
									{
										type: 'listbox',
										name: 'customButtonSize',
										label: editor.getLang( "udesign_sb_strings.customButtonSizeLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.customButtonSizeValuesSmall" ), value: 'small'},
											{text: editor.getLang( "udesign_sb_strings.customButtonSizeValuesMedium" ), value: 'medium'},
											{text: editor.getLang( "udesign_sb_strings.customButtonSizeValuesLarge" ), value: 'large'},
											{text: editor.getLang( "udesign_sb_strings.customButtonSizeValuesXLarge" ), value: 'x-large'}
										],
                                                                                value : 'large' // Sets the default
									},

									// Button Background Color
									{
                                                                                type: 'colorbox',  // colorpicker plugin MUST be included for this to work
                                                                                name: 'customButtonBackgroundColor',
                                                                                label: editor.getLang( "udesign_sb_strings.customButtonBackgroundColorLabel" ),
                                                                                value: '#ff5c00',
                                                                                classes: 'u-design-shortcode-colorbox', // this class is used to fix some CSS issues with the colorbox
                                                                                onaction: createColorPickAction()
									},

									// Button Text Color
									{
                                                                                type: 'colorbox',  // colorpicker plugin MUST be included for this to work
                                                                                name: 'customButtonTextColor',
                                                                                label: editor.getLang( "udesign_sb_strings.customButtonTextColorLabel" ),
                                                                                value: '#ffffff',
                                                                                classes: 'u-design-shortcode-colorbox', // this class is used to fix some CSS issues with the colorbox
                                                                                onaction: createColorPickAction()
									},

									// Button Alignment
									{
										type: 'listbox',
										name: 'customButtonAlignment',
										label: editor.getLang( "udesign_sb_strings.customButtonAlignmentLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.customButtonAlignmentValuesLeft" ), value: 'left'},
											{text: editor.getLang( "udesign_sb_strings.customButtonAlignmentValuesRight" ), value: 'right'},
											{text: editor.getLang( "udesign_sb_strings.customButtonAlignmentValuesCenter" ), value: 'center'},
											{text: editor.getLang( "udesign_sb_strings.customButtonAlignmentValuesNone" ), value: 'none'}
										]
									},

									// Button Link Target
									{
										type: 'listbox',
										name: 'customButtonLinkTarget',
										label: editor.getLang( "udesign_sb_strings.customButtonLinkTargetLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.customButtonLinkTargetValuesSelf" ), value: '_self'},
											{text: editor.getLang( "udesign_sb_strings.customButtonLinkTargetValuesBlank" ), value: '_blank'}
										]
									} ],
									onsubmit: function( e ) {
                                                                                editor.insertContent('[custom_button text="' + e.data.customButtonText + '" title="' + e.data.customButtonTitle + '" url="' + e.data.customButtonUrl + '" size="' + e.data.customButtonSize + '" bg_color="' + e.data.customButtonBackgroundColor + '" text_color="' + e.data.customButtonTextColor + '" align="' + e.data.customButtonAlignment + '" target="' + e.data.customButtonLinkTarget + '"]');
									}
								});
							}
						}, // End custom button

						/* Custom More Link Start */
						{
							text: editor.getLang( "udesign_sb_strings.customMoreLinkText" ),
							onclick: function() {
								editor.windowManager.open( {
									title: editor.getLang( "udesign_sb_strings.customMoreLinkTitle" ),
									body: [

									// Link Text
									{
										type: 'textbox',
										name: 'customMoreLinkText',
										label: editor.getLang( "udesign_sb_strings.customMoreLinkTextLabel" ),
										value: editor.getLang( "udesign_sb_strings.customMoreLinkTextValue" )
									},

									// Link Title
									{
										type: 'textbox',
										name: 'customMoreLinkTitle',
										label: editor.getLang( "udesign_sb_strings.customMoreLinkTitleLabel" ),
										value: editor.getLang( "udesign_sb_strings.customMoreLinkTitleValue" )
									},

									// Link URL
									{
										type: 'textbox',
										name: 'customMoreLinkUrl',
										label: editor.getLang( "udesign_sb_strings.customMoreLinkUrlLabel" ),
										value: 'http://www.example.com/'
									},

									// Button Alignment
									{
										type: 'listbox',
										name: 'customMoreLinkAlignment',
										label: editor.getLang( "udesign_sb_strings.customMoreLinkAlignmentLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.customMoreLinkAlignmentValuesLeft" ), value: 'left'},
											{text: editor.getLang( "udesign_sb_strings.customMoreLinkAlignmentValuesRight" ), value: 'right'}
										]
									},

									// Button Link Target
									{
										type: 'listbox',
										name: 'customMoreLinkTarget',
										label: editor.getLang( "udesign_sb_strings.customMoreLinkTargetLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.customMoreLinkTargetValuesSelf" ), value: '_self'},
											{text: editor.getLang( "udesign_sb_strings.customMoreLinkTargetValuesBlank" ), value: '_blank'}
										]
									} ],
									onsubmit: function( e ) {
                                                                                editor.insertContent('[read_more text="' + e.data.customMoreLinkText + '" title="' + e.data.customMoreLinkTitle + '" url="' + e.data.customMoreLinkUrl + '" align="' + e.data.customMoreLinkAlignment + '" target="' + e.data.customMoreLinkTarget + '"]');
									}
								});
							}
						}, // End Custom More Link


					]
				}, // End Buttons Section


				/** Content Start **/
				{
                                        text: editor.getLang( "udesign_sb_strings.contentText" ),
                                        icon: 'icon dashicons-edit',
                                        menu: [

						/* Content Block Start */
						{
							text: editor.getLang( "udesign_sb_strings.contentBlockText" ),
							onclick: function() {
								editor.windowManager.open( {
									title: editor.getLang( "udesign_sb_strings.contentBlockTitle" ),
                                                                        width: 520,
                                                                        height: 600,
                                                                        autoScroll: true,
									body: [

									// The Content
									{
										type: 'textbox',
										name: 'contentBlockContent',
										label: editor.getLang( "udesign_sb_strings.contentBlockContentLabel" ),
										value: "I am text block. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.",
										multiline: true,
										minWidth: 270,
										minHeight: 100
									},
                                                                        
                                                                        // Image Upload
                                                                        {
                                                                                type: 'textbox',
                                                                                name: 'contentBlockBackgroundImageURL',
                                                                                label: editor.getLang( "udesign_sb_strings.contentBlockBackgroundImageURLLabel" ),
                                                                                value: '',
                                                                                classes: 'u-design-shortcodes-input-image-url',
                                                                                tooltip: editor.getLang( "udesign_sb_strings.contentBlockBackgroundImageURLTooltip" ),
                                                                        },
                                                                        {
                                                                                type: 'button',
                                                                                name: 'contentBlockUploadButton',
                                                                                label: ' ',
                                                                                text: editor.getLang( "udesign_sb_strings.contentBlockUploadButtonText" ),
                                                                                classes: 'upload-button-for-image-url'
                                                                        },

									// Background Stretch
									{
										type: 'listbox',
										name: 'contentBlockBackgroundStretch',
										label: editor.getLang( "udesign_sb_strings.contentBlockBackgroundStretchLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.contentBlockBackgroundStretchValuesYes" ), value: 'yes'},
											{text: editor.getLang( "udesign_sb_strings.contentBlockBackgroundStretchValuesNo" ), value: 'no'}
										],
                                                                                tooltip: editor.getLang( "udesign_sb_strings.contentBlockBackgroundStretchTooltip" )
									},

									// Fixed Background
									{
										type: 'listbox',
										name: 'contentBlockFixedBackground',
										label: editor.getLang( "udesign_sb_strings.contentBlockFixedBackgroundLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.contentBlockFixedBackgroundValuesYes" ), value: 'yes'},
											{text: editor.getLang( "udesign_sb_strings.contentBlockFixedBackgroundValuesNo" ), value: 'no'}
										],
                                                                                tooltip: editor.getLang( "udesign_sb_strings.contentBlockFixedBackgroundTooltip" )
									},
                                                                        
									// Background Position
									{
										type: 'textbox',
										name: 'contentBlockBackgroundPosition',
										label: editor.getLang( "udesign_sb_strings.contentBlockBackgroundPositionLabel" ),
										value: 'center top',
                                                                                tooltip: editor.getLang( "udesign_sb_strings.contentBlockBackgroundPositionTooltip" )
									},

									// Background Repeat
									{
										type: 'listbox',
										name: 'contentBlockBackgroundRepeat',
										label: editor.getLang( "udesign_sb_strings.contentBlockBackgroundRepeatLabel" ),
										values: [
											{text: 'no-repeat', value: 'no-repeat'},
											{text: 'repeat', value: 'repeat'},
											{text: 'repeat-x', value: 'repeat-x'},
											{text: 'repeat-y', value: 'repeat-y'},
											{text: 'initial', value: 'initial'},
											{text: 'inherit', value: 'inherit'}
										]
									},

									// Background Size
									{
										type: 'listbox',
										name: 'contentBlockBackgroundSize',
										label: editor.getLang( "udesign_sb_strings.contentBlockBackgroundSizeLabel" ),
										values: [
											{text: 'auto', value: 'auto'},
											{text: 'cover', value: 'cover'},
											{text: 'contain', value: 'contain'},
											{text: 'initial', value: 'initial'},
											{text: 'inherit', value: 'inherit'}
										]
									},

									// Parallax Scroll
									{
										type: 'listbox',
										name: 'contentBlockParallaxScroll',
										label: editor.getLang( "udesign_sb_strings.contentBlockParallaxScrollLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.contentBlockParallaxScrollValuesNo" ), value: 'no'},
											{text: editor.getLang( "udesign_sb_strings.contentBlockParallaxScrollValuesYes" ), value: 'yes'}
										],
                                                                                tooltip: editor.getLang( "udesign_sb_strings.contentBlockParallaxScrollTooltip" )
									},

									// Background Color
									{
                                                                                type: 'colorbox',  // colorpicker plugin MUST be included for this to work
                                                                                name: 'contentBlockBackgroundColor',
                                                                                label: editor.getLang( "udesign_sb_strings.contentBlockBackgroundColorLabel" ),
                                                                                value: '#7a7a7a',
                                                                                classes: 'u-design-shortcode-colorbox', // this class is used to fix some CSS issues with the colorbox
                                                                                onaction: createColorPickAction()
									},
                                                                        
									// Content Padding
									{
										type: 'textbox',
										name: 'contentBlockContentPadding',
										label: editor.getLang( "udesign_sb_strings.contentBlockContentPaddingLabel" ),
										value: '60px 0',
                                                                                tooltip: editor.getLang( "udesign_sb_strings.contentBlockContentPaddingTooltip" )
									},
                                                                        
                                                                        
                                                                        
									// Button Border Color
									{
                                                                                type: 'colorbox',  // colorpicker plugin MUST be included for this to work
                                                                                name: 'flatButtonBorderColor',
                                                                                label: editor.getLang( "udesign_sb_strings.flatButtonBorderColorLabel" ),
                                                                                value: '#ff5c00',
                                                                                classes: 'u-design-shortcode-colorbox', // this class is used to fix some CSS issues with the colorbox
                                                                                onaction: createColorPickAction()
									},

									// Button Border Width
									{
										type: 'textbox',
										name: 'flatButtonBorderWidth',
										label: editor.getLang( "udesign_sb_strings.flatButtonBorderWidthLabel" ),
										value: '1px'
									},

									// Text Color
									{
                                                                                type: 'colorbox',  // colorpicker plugin MUST be included for this to work
                                                                                name: 'contentBlockTextColor',
                                                                                label: editor.getLang( "udesign_sb_strings.contentBlockTextColorLabel" ),
                                                                                value: '#ffffff',
                                                                                classes: 'u-design-shortcode-colorbox', // this class is used to fix some CSS issues with the colorbox
                                                                                onaction: createColorPickAction()
									},

									// Custom Class
									{
										type: 'textbox',
										name: 'contentBlockCustomClass',
										label: editor.getLang( "udesign_sb_strings.contentBlockCustomClassLabel" ),
										value: '',
                                                                                tooltip: editor.getLang( "udesign_sb_strings.contentBlockCustomClassTooltip" )
									} ],
									onsubmit: function( e ) {
                                                                                editor.insertContent('[content_block bg_image="' + e.data.contentBlockBackgroundImageURL + '" max_bg_width="' + e.data.contentBlockBackgroundStretch + '" bg_fixed="' + e.data.contentBlockFixedBackground + '" bg_position="' + e.data.contentBlockBackgroundPosition + '" bg_repeat="' + e.data.contentBlockBackgroundRepeat + '" bg_size="' + e.data.contentBlockBackgroundSize + '" parallax_scroll="' + e.data.contentBlockParallaxScroll + '" bg_color="' + e.data.contentBlockBackgroundColor + '" content_padding="' + e.data.contentBlockContentPadding + '" font_color="' + e.data.contentBlockTextColor + '" class="' + e.data.contentBlockCustomClass + '"]' + e.data.contentBlockContent + '[/content_block]');
									}
								});
							}
						}, // End Content Block
                                                
						/* Message Box Start */
						{
							text: editor.getLang( "udesign_sb_strings.messageBoxText" ),
                                                        menu: [
                                                            
                                                            /* Predefined Message Box Start */
                                                            {
                                                                    text: editor.getLang( "udesign_sb_strings.predefinedMessageBoxText" ),
                                                                    onclick: function() {
                                                                            editor.windowManager.open( {
                                                                                    title: editor.getLang( "udesign_sb_strings.messageBoxTitle" ),
                                                                                    body: [

                                                                                    // The Content
                                                                                    {
                                                                                            type: 'textbox',
                                                                                            name: 'messageBoxContent',
                                                                                            label: editor.getLang( "udesign_sb_strings.messageBoxContentLabel" ),
                                                                                            value: editor.getLang( "udesign_sb_strings.messageBoxContentValue" ),
                                                                                            multiline: true,
                                                                                            minWidth: 270,
                                                                                            minHeight: 60
                                                                                    },
                                                                                    
                                                                                    // Message Box Type
                                                                                    {
                                                                                            type: 'listbox',
                                                                                            name: 'messageBoxType',
                                                                                            label: editor.getLang( "udesign_sb_strings.messageBoxTypeLabel" ),
                                                                                            values: [
                                                                                                    {text: editor.getLang( "udesign_sb_strings.messageBoxTypeValuesInfo" ), value: 'info'},
                                                                                                    {text: editor.getLang( "udesign_sb_strings.messageBoxTypeValuesSuccess" ), value: 'success'},
                                                                                                    {text: editor.getLang( "udesign_sb_strings.messageBoxTypeValuesWarning" ), value: 'warning'},
                                                                                                    {text: editor.getLang( "udesign_sb_strings.messageBoxTypeValuesErroneous" ), value: 'erroneous'}
                                                                                            ]
                                                                                    } ],
                                                                                    onsubmit: function( e ) {
                                                                                            editor.insertContent('[message type="' + e.data.messageBoxType + '"]' + e.data.messageBoxContent + '[/message]');
                                                                                    }
                                                                            });
                                                                    }
                                                            }, // End Predefined Message Box
                                                            
                                                            /* Custom Message Box Start */
                                                            {
                                                                    text: editor.getLang( "udesign_sb_strings.customMessageBoxText" ),
                                                                    onclick: function() {
                                                                            editor.windowManager.open( {
                                                                                    title: editor.getLang( "udesign_sb_strings.customMessageBoxTitle" ),
                                                                                    body: [

                                                                                    // The Content
                                                                                    {
                                                                                            type: 'textbox',
                                                                                            name: 'customMessageBoxContent',
                                                                                            label: editor.getLang( "udesign_sb_strings.customMessageBoxContentLabel" ),
                                                                                            value: editor.getLang( "udesign_sb_strings.customMessageBoxContentValue" ),
                                                                                            multiline: true,
                                                                                            minWidth: 270,
                                                                                            minHeight: 60
                                                                                    },
                                                                                    
                                                                                    // Message Box Width
                                                                                    {
                                                                                            type: 'textbox',
                                                                                            name: 'customMessageBoxWidth',
                                                                                            label: editor.getLang( "udesign_sb_strings.customMessageBoxWidthLabel" ),
                                                                                            value: '100%',
                                                                                            tooltip: editor.getLang( "udesign_sb_strings.customMessageBoxWidthTooltip" )
                                                                                    },

                                                                                    // Message Box Start Color
                                                                                    {
                                                                                            type: 'colorbox',  // colorpicker plugin MUST be included for this to work
                                                                                            name: 'customMessageBoxStartColor',
                                                                                            label: editor.getLang( "udesign_sb_strings.customMessageBoxStartColorLabel" ),
                                                                                            value: '#fffcb5',
                                                                                            classes: 'u-design-shortcode-colorbox', // this class is used to fix some CSS issues with the colorbox
                                                                                            onaction: createColorPickAction()
                                                                                    },

                                                                                    // Message Box End Color
                                                                                    {
                                                                                            type: 'colorbox',  // colorpicker plugin MUST be included for this to work
                                                                                            name: 'customMessageBoxEndColor',
                                                                                            label: editor.getLang( "udesign_sb_strings.customMessageBoxEndColorLabel" ),
                                                                                            value: '#f4cbcb',
                                                                                            classes: 'u-design-shortcode-colorbox', // this class is used to fix some CSS issues with the colorbox
                                                                                            onaction: createColorPickAction()
                                                                                    },

                                                                                    // Message Box Border Color
                                                                                    {
                                                                                            type: 'colorbox',  // colorpicker plugin MUST be included for this to work
                                                                                            name: 'customMessageBoxBorderColor',
                                                                                            label: editor.getLang( "udesign_sb_strings.customMessageBoxBorderColorLabel" ),
                                                                                            value: '#bbbbbb',
                                                                                            classes: 'u-design-shortcode-colorbox', // this class is used to fix some CSS issues with the colorbox
                                                                                            onaction: createColorPickAction()
                                                                                    },

                                                                                    // Message Box Text Color
                                                                                    {
                                                                                            type: 'colorbox',  // colorpicker plugin MUST be included for this to work
                                                                                            name: 'customMessageBoxTextColor',
                                                                                            label: editor.getLang( "udesign_sb_strings.customMessageBoxTextColorLabel" ),
                                                                                            value: '#333333',
                                                                                            classes: 'u-design-shortcode-colorbox', // this class is used to fix some CSS issues with the colorbox
                                                                                            onaction: createColorPickAction()
                                                                                    },
                                                                                    
                                                                                    // Message Box Alignment
                                                                                    {
                                                                                            type: 'listbox',
                                                                                            name: 'customMessageBoxAlignment',
                                                                                            label: editor.getLang( "udesign_sb_strings.customMessageBoxAlignmentLabel" ),
                                                                                            values: [
                                                                                                    {text: editor.getLang( "udesign_sb_strings.customMessageBoxAlignmentValuesLeft" ), value: 'left'},
                                                                                                    {text: editor.getLang( "udesign_sb_strings.customMessageBoxAlignmentValuesCenter" ), value: 'center'},
                                                                                                    {text: editor.getLang( "udesign_sb_strings.customMessageBoxAlignmentValuesRight" ), value: 'right'}
                                                                                            ]
                                                                                    } ],
                                                                                    onsubmit: function( e ) {
                                                                                            editor.insertContent('[message type="custom" width="' + e.data.customMessageBoxWidth + '" start_color="' + e.data.customMessageBoxStartColor + '" end_color="' + e.data.customMessageBoxEndColor + '" border="' + e.data.customMessageBoxBorderColor + '" color="' + e.data.customMessageBoxTextColor + '" align="' + e.data.customMessageBoxAlignment + '"]' + e.data.customMessageBoxContent + '[/message]');
                                                                                    }
                                                                            });
                                                                    }
                                                            }, // End Custom Message Box
                                                            
                                                            /* Simple Message Box Start */
                                                            {
                                                                    text: editor.getLang( "udesign_sb_strings.simpleMessageBoxText" ),
                                                                    onclick: function() {
                                                                            editor.windowManager.open( {
                                                                                    title: editor.getLang( "udesign_sb_strings.simpleMessageBoxTitle" ),
                                                                                    body: [

                                                                                    // The Content
                                                                                    {
                                                                                            type: 'textbox',
                                                                                            name: 'simpleMessageBoxContent',
                                                                                            label: editor.getLang( "udesign_sb_strings.simpleMessageBoxContentLabel" ),
                                                                                            value: editor.getLang( "udesign_sb_strings.simpleMessageBoxContentValue" ),
                                                                                            multiline: true,
                                                                                            minWidth: 270,
                                                                                            minHeight: 60
                                                                                    },

                                                                                    // Message Box Border Color
                                                                                    {
                                                                                            type: 'colorbox',  // colorpicker plugin MUST be included for this to work
                                                                                            name: 'simpleMessageBoxBackgroundColor',
                                                                                            label: editor.getLang( "udesign_sb_strings.simpleMessageBoxBackgroundColorLabel" ),
                                                                                            value: '#eeeeee',
                                                                                            classes: 'u-design-shortcode-colorbox', // this class is used to fix some CSS issues with the colorbox
                                                                                            onaction: createColorPickAction()
                                                                                    },

                                                                                    // Message Box Text Color
                                                                                    {
                                                                                            type: 'colorbox',  // colorpicker plugin MUST be included for this to work
                                                                                            name: 'simpleMessageBoxTextColor',
                                                                                            label: editor.getLang( "udesign_sb_strings.simpleMessageBoxTextColorLabel" ),
                                                                                            value: '#333333',
                                                                                            classes: 'u-design-shortcode-colorbox', // this class is used to fix some CSS issues with the colorbox
                                                                                            onaction: createColorPickAction()
                                                                                    } ],
                                                                                    onsubmit: function( e ) {
                                                                                            editor.insertContent('[message type="simple" bg_color="' + e.data.simpleMessageBoxBackgroundColor + '" color="' + e.data.simpleMessageBoxTextColor + '"]' + e.data.simpleMessageBoxContent + '[/message]');
                                                                                    }
                                                                            });
                                                                    }
                                                            }, // End Simple Message Box
                                                            
                                                            
                                                        ]
                                                        
						}, // End Message Box

						/* Quotes Start */
						{
							text: editor.getLang( "udesign_sb_strings.quotesText" ),
                                                        menu: [
                                                            
                                                            /* Pullquote Start */
                                                            {
                                                                    text: editor.getLang( "udesign_sb_strings.pullquoteText" ),
                                                                    onclick: function() {
                                                                            editor.windowManager.open( {
                                                                                    title: editor.getLang( "udesign_sb_strings.pullquoteTitle" ),
                                                                                    body: [

                                                                                    // The Content
                                                                                    {
                                                                                            type: 'textbox',
                                                                                            name: 'pullquoteContent',
                                                                                            label: editor.getLang( "udesign_sb_strings.pullquoteContentLabel" ),
                                                                                            value: "I am text block. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.",
                                                                                            multiline: true,
                                                                                            minWidth: 270,
                                                                                            minHeight: 100
                                                                                    },

                                                                                    // Pullquote Symbol
                                                                                    {
                                                                                            type: 'listbox',
                                                                                            name: 'pullquoteSymbol',
                                                                                            label: editor.getLang( "udesign_sb_strings.pullquoteSymbolLabel" ),
                                                                                            values: [
                                                                                                    {text: editor.getLang( "udesign_sb_strings.pullquoteSymbolValuesSymbol2" ), value: '2'},
                                                                                                    {text: editor.getLang( "udesign_sb_strings.pullquoteSymbolValuesSymbol1" ), value: ''}
                                                                                            ]
                                                                                    },

                                                                                    // Pullquote Style
                                                                                    {
                                                                                            type: 'listbox',
                                                                                            name: 'pullquoteStyle',
                                                                                            label: editor.getLang( "udesign_sb_strings.pullquoteStyleLabel" ),
                                                                                            values: [
                                                                                                    {text: editor.getLang( "udesign_sb_strings.pullquoteStyleValuesDark" ), value: 'dark'},
                                                                                                    {text: editor.getLang( "udesign_sb_strings.pullquoteStyleValuesLight" ), value: 'light'}
                                                                                            ]
                                                                                    },

                                                                                    // Pullquote Alignment
                                                                                    {
                                                                                            type: 'listbox',
                                                                                            name: 'pullquoteAlignment',
                                                                                            label: editor.getLang( "udesign_sb_strings.pullquoteAlignmentLabel" ),
                                                                                            values: [
                                                                                                    {text: editor.getLang( "udesign_sb_strings.pullquoteAlignmentValuesLeft" ), value: 'left'},
                                                                                                    {text: editor.getLang( "udesign_sb_strings.pullquoteAlignmentValuesRight" ), value: 'right'}
                                                                                            ]
                                                                                    } ],
                                                                                    onsubmit: function( e ) {
                                                                                            editor.insertContent( '[pullquote' + e.data.pullquoteSymbol + ' style="' + e.data.pullquoteAlignment + '" quote="' + e.data.pullquoteStyle + '"]' + e.data.pullquoteContent + '[/pullquote' + e.data.pullquoteSymbol + ']' );
                                                                                    }
                                                                            });
                                                                    }
                                                            }, // End Pullquote section
                                                            
                                                            /* Blockquote Start */
                                                            {
                                                                    text: editor.getLang( "udesign_sb_strings.blockquoteText" ),
                                                                    onclick: function() {
                                                                            editor.windowManager.open( {
                                                                                    title: editor.getLang( "udesign_sb_strings.blockquoteTitle" ),
                                                                                    body: [

                                                                                    // The Content
                                                                                    {
                                                                                            type: 'textbox',
                                                                                            name: 'blockquoteContent',
                                                                                            label: editor.getLang( "udesign_sb_strings.blockquoteContentLabel" ),
                                                                                            value: "I am text block. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.",
                                                                                            multiline: true,
                                                                                            minWidth: 270,
                                                                                            minHeight: 100
                                                                                    },

                                                                                    // Quote Symbol
                                                                                    {
                                                                                            type: 'listbox',
                                                                                            name: 'blockquoteSymbol',
                                                                                            label: editor.getLang( "udesign_sb_strings.blockquoteSymbolLabel" ),
                                                                                            values: [
                                                                                                    {text: editor.getLang( "udesign_sb_strings.blockquoteSymbolValuesSymbol2" ), value: '2'},
                                                                                                    {text: editor.getLang( "udesign_sb_strings.blockquoteSymbolValuesSymbol1" ), value: ''}
                                                                                            ]
                                                                                    },

                                                                                    // Quote Style
                                                                                    {
                                                                                            type: 'listbox',
                                                                                            name: 'blockquoteStyle',
                                                                                            label: editor.getLang( "udesign_sb_strings.blockquoteStyleLabel" ),
                                                                                            values: [
                                                                                                    {text: editor.getLang( "udesign_sb_strings.blockquoteStyleValuesDark" ), value: 'dark'},
                                                                                                    {text: editor.getLang( "udesign_sb_strings.blockquoteStyleValuesLight" ), value: 'light'}
                                                                                            ]
                                                                                    } ],
                                                                                    onsubmit: function( e ) {
                                                                                            var $blockquoteSymbol = ( '2' === e.data.blockquoteSymbol ) ? '-2': '',
                                                                                                $blockquoteClass = 'bq-' + e.data.blockquoteStyle + $blockquoteSymbol;
                                                                                            editor.insertContent( '<blockquote class="' + $blockquoteClass + '">' + e.data.blockquoteContent + '</blockquote>' );
                                                                                    }
                                                                            });
                                                                    }
                                                            }, // End Blockquote section
                                                            
                                                        ]
                                                        
						}, // End quotes section
                                                
						/* Recent Posts Start */
						{
							text: editor.getLang( "udesign_sb_strings.recentPostsText" ),
							onclick: function() {
								editor.windowManager.open( {
									title: editor.getLang( "udesign_sb_strings.recentPostsTitle" ),
                                                                        width: 450,
                                                                        height: 600,
                                                                        autoScroll: true,
                                                                        //style: 'padding-right: 4px;',
									body: [
                                                                            
									// Title
									{
										type: 'textbox',
										name: 'recentPostsTitle',
										label: editor.getLang( "udesign_sb_strings.recentPostsTitleLabel" ),
										value: editor.getLang( "udesign_sb_strings.recentPostsTitleValue" )
									},
                                                                        
									// Categories
                                                                        {
                                                                                type   : 'combobox',
										name: 'recentPostsCategories',
										label: editor.getLang( "udesign_sb_strings.recentPostsCategoriesLabel" ),
                                                                                'values': tinyMCE.activeEditor.settings.udesignCategoriesList,
                                                                                classes: 'u-design-shortcode-combobox', // this class is used to fix some CSS issues with the combobox
									},
                                                                        // Categories Field Description
                                                                        {
                                                                                type: 'label',
                                                                                name: 'recentPostsCategoriesDescription',
                                                                                multiline: true,
                                                                                style: 'color: #aeaeae; height: 75px;',
                                                                                text: "",
                                                                                onPostRender : function() {
                                                                                    this.getEl().innerHTML =
                                                                                        "<em>" + editor.getLang( "udesign_sb_strings.recentPostsCategoriesDescriptionLine1" ) + "</em><br />" +
                                                                                        "<em>" + editor.getLang( "udesign_sb_strings.recentPostsCategoriesDescriptionLine2" ) + "</em><br />" +
                                                                                        "<em>" + editor.getLang( "udesign_sb_strings.recentPostsCategoriesDescriptionLine3" ) + "</em>";
                                                                                }
                                                                        },
                                                                        // Categories Field Description using tooltip
//                                                                        {
//                                                                                type   : 'tooltip',
//                                                                                name   : 'recentPostsCategoriesDescription',
//                                                                                label  : '',
//                                                                                style: 'height: 100px; width: 200px;',
//                                                                                text   : "To choose a catetory use the little dropdown menu above. For multiple categories enter comma-separated list of IDs. To choose all categories leave the field blank."
//                                                                        },
                                                                            
                                                                            
									// Number of posts to show
									{
										type: 'textbox',
										name: 'recentPostsNumberPostsToShow',
										label: editor.getLang( "udesign_sb_strings.recentPostsNumberPostsToShowLabel" ),
										value: '3',
                                                                                maxWidth: 40,
                                                                                tooltip: editor.getLang( "udesign_sb_strings.recentPostsNumberPostsToShowTooltip" )
									},
                                                                            
									// Number of posts to skip
									{
										type: 'textbox',
										name: 'recentPostsNumberPostsToSkip',
										label: editor.getLang( "udesign_sb_strings.recentPostsNumberPostsToSkipLabel" ),
										value: '0',
                                                                                maxWidth: 40,
                                                                                tooltip: editor.getLang( "udesign_sb_strings.recentPostsNumberPostsToSkipTooltip" )
									},
                                                                            
									// Number of words to show
									{
										type: 'textbox',
										name: 'recentPostsNumberWordsToShow',
										label: editor.getLang( "udesign_sb_strings.recentPostsNumberWordsToShowLabel" ),
										value: '23',
                                                                                maxWidth: 40,
                                                                                tooltip: editor.getLang( "udesign_sb_strings.recentPostsNumberWordsToShowTooltip" )
									},

									// Date and author
									{
										type: 'listbox',
										name: 'recentPostsDateAndAuthor',
										label: editor.getLang( "udesign_sb_strings.recentPostsDateAndAuthorLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.recentPostsDateAndAuthorValuesNo" ), value: '0'},
											{text: editor.getLang( "udesign_sb_strings.recentPostsDateAndAuthorValuesYes" ), value: '1'}
										]
									},

									// More link
									{
										type: 'listbox',
										name: 'recentPostsMoreLink',
										label: editor.getLang( "udesign_sb_strings.recentPostsMoreLinkLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.recentPostsMoreLinkValuesNo" ), value: '0'},
											{text: editor.getLang( "udesign_sb_strings.recentPostsMoreLinkValuesYes" ), value: '1'}
										]
									},
                                                                            
									// "More" link text
									{
										type: 'textbox',
										name: 'recentPostsMoreLinkText',
										label: editor.getLang( "udesign_sb_strings.recentPostsMoreLinkTextLabel" ),
										value: editor.getLang( "udesign_sb_strings.recentPostsMoreLinkTextValues" ),
									},

									// Thumbnails
									{
										type: 'listbox',
										name: 'recentPostsShowThumbnails',
										label: editor.getLang( "udesign_sb_strings.recentPostsShowThumbnailsLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.recentPostsShowThumbnailsValuesYes" ), value: '1'},
											{text: editor.getLang( "udesign_sb_strings.recentPostsShowThumbnailsValuesNo" ), value: '0'}
										]
									},

									// Thumbnail frame
									{
										type: 'listbox',
										name: 'recentPostsThumbnailFrame',
										label: editor.getLang( "udesign_sb_strings.recentPostsThumbnailFrameLabel" ),
										values: [ // the "no" and "yes" values below sould be oposites to reverse the original shortcode option which is asking to remove the thumb frame
											{text: editor.getLang( "udesign_sb_strings.recentPostsThumbnailFrameValuesNo" ), value: '1'},
											{text: editor.getLang( "udesign_sb_strings.recentPostsThumbnailFrameValuesYes" ), value: '0'}
										]
									},

									// Thumbnail shadow
									{
										type: 'listbox',
										name: 'recentPostsThumbnailShadow',
										label: editor.getLang( "udesign_sb_strings.recentPostsThumbnailShadowLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.recentPostsThumbnailShadowValuesNo" ), value: '0'},
											{text: editor.getLang( "udesign_sb_strings.recentPostsThumbnailShadowValuesYes" ), value: '1'}
										]
									},

									// Default image
									{
										type: 'listbox',
										name: 'recentPostsDefaultImage',
										label: editor.getLang( "udesign_sb_strings.recentPostsDefaultImageLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.recentPostsDefaultImageValuesYes" ), value: '1'},
                                                                                        {text: editor.getLang( "udesign_sb_strings.recentPostsDefaultImageValuesNo" ), value: '0'}
										],
										tooltip: editor.getLang( "udesign_sb_strings.recentPostsDefaultImageTooltip" )
									},
                                                                            
									// Thumbnail width
									{
										type: 'textbox',
										name: 'recentPostsThumbnailWidth',
										label: editor.getLang( "udesign_sb_strings.recentPostsThumbnailWidthLabel" ),
										value: '60',
                                                                                maxWidth: 40,
                                                                                tooltip: editor.getLang( "udesign_sb_strings.recentPostsThumbnailWidthTooltip" )
									},
                                                                            
									// Thumbnail height
									{
										type: 'textbox',
										name: 'recentPostsThumbnailHeight',
										label: editor.getLang( "udesign_sb_strings.recentPostsThumbnailHeightLabel" ),
										value: '60',
                                                                                maxWidth: 40,
                                                                                tooltip: editor.getLang( "udesign_sb_strings.recentPostsThumbnailHeightTooltip" )
									}],
									onsubmit: function( e ) {
                                                                                editor.insertContent('[udesign_recent_posts title="' + e.data.recentPostsTitle + '" category_id="' + e.data.recentPostsCategories + '" num_posts="' + e.data.recentPostsNumberPostsToShow + '" post_offset="' + e.data.recentPostsNumberPostsToSkip + '" num_words_limit="' + e.data.recentPostsNumberWordsToShow + '" show_date_author="' + e.data.recentPostsDateAndAuthor + '" show_more_link="' + e.data.recentPostsMoreLink + '" more_link_text="' + e.data.recentPostsMoreLinkText + '" show_thumbs="' + e.data.recentPostsShowThumbnails + '" remove_thumb_frame="' + e.data.recentPostsThumbnailFrame + '" thumb_frame_shadow="' + e.data.recentPostsThumbnailShadow + '" default_thumb="' + e.data.recentPostsDefaultImage + '" post_thumb_width="' + e.data.recentPostsThumbnailWidth + '" post_thumb_height="' + e.data.recentPostsThumbnailHeight + '"]');
									}
								});
							}
						}, // End Recent Posts
                                                
						/* Accordion Start */
						{
							text: editor.getLang( "udesign_sb_strings.accordionText" ),
							onclick: function() {
								editor.insertContent('[accordion scroll_into_view="no"]<br />' +
                                                                                            '&nbsp;&nbsp;&nbsp;&nbsp;[accordion_toggle title="Title 1"]Content for accordion toggle 1 goes here...[/accordion_toggle]<br />' +
                                                                                            '&nbsp;&nbsp;&nbsp;&nbsp;[accordion_toggle title="Title 2"]Content for accordion toggle 2 goes here...[/accordion_toggle]<br />' +
                                                                                            '&nbsp;&nbsp;&nbsp;&nbsp;[accordion_toggle title="Title 3"]Content for accordion toggle 3 goes here...[/accordion_toggle]<br />' +
                                                                                     '[/accordion]');
							}
						}, // End accordion

						/* Toggle Start */
						{
							text: editor.getLang( "udesign_sb_strings.toggleText" ),
							onclick: function() {
								editor.insertContent('[toggle_content title="Toggle content title..."]Your content goes here...[/toggle_content]');
							}
						}, // End toggle

						/* Tabs Start */
						{
							text: editor.getLang( "udesign_sb_strings.tabsText" ),
							onclick: function() {
								editor.insertContent('[tabs]<br />' +
                                                                                            '&nbsp;&nbsp;&nbsp;&nbsp;[tab title="Tab 1"]Content for Tab 1 goes here...[/tab]<br />' +
                                                                                            '&nbsp;&nbsp;&nbsp;&nbsp;[tab title="Tab 2"]Content for Tab 2 goes here...[/tab]<br />' +
                                                                                            '&nbsp;&nbsp;&nbsp;&nbsp;[tab title="Tab 3"]Content for Tab 3 goes here...[/tab]<br />' +
                                                                                     '[/tabs]');
							}
						}, // End tabs

						/* List Styles Start */
						{
							text: editor.getLang( "udesign_sb_strings.listStylesText" ),
							onclick: function() {
								editor.windowManager.open( {
									title: editor.getLang( "udesign_sb_strings.listStylesTitle" ),
									body: [

									// Bullets Style
									{
										type: 'listbox',
										name: 'listStyle',
										label: editor.getLang( "udesign_sb_strings.listStyleLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.listStyleValuesList1" ), value: 'list-1'},
											{text: editor.getLang( "udesign_sb_strings.listStyleValuesList2" ), value: 'list-2'},
											{text: editor.getLang( "udesign_sb_strings.listStyleValuesList3" ), value: 'list-3'},
											{text: editor.getLang( "udesign_sb_strings.listStyleValuesList4" ), value: 'list-4'},
											{text: editor.getLang( "udesign_sb_strings.listStyleValuesList5" ), value: 'list-5'},
											{text: editor.getLang( "udesign_sb_strings.listStyleValuesList6" ), value: 'list-6'},
											{text: editor.getLang( "udesign_sb_strings.listStyleValuesList7" ), value: 'list-7'},
											{text: editor.getLang( "udesign_sb_strings.listStyleValuesList8" ), value: 'list-8'},
											{text: editor.getLang( "udesign_sb_strings.listStyleValuesList9" ), value: 'list-9'},
											{text: editor.getLang( "udesign_sb_strings.listStyleValuesList10" ), value: 'list-10'},
											{text: editor.getLang( "udesign_sb_strings.listStyleValuesList11" ), value: 'list-11'}
										]
									},

									// Bullets Content
									{
										type: 'textbox',
										name: 'listContent',
										label: editor.getLang( "udesign_sb_strings.listContentLabel" ),
										value: "<ul>\r\n\t<li>Your list item 1</li>\r\n\t<li>Your list item 2</li>\r\n\t<li>Your list item 3</li>\r\n</ul>",
										multiline: true,
										minWidth: 250,
										minHeight: 150
									} ],
									onsubmit: function( e ) {
										editor.insertContent('[custom_list style="' + e.data.listStyle + '"]' + e.data.listContent + '[/custom_list]');
									}
								});
							}
						}, // End list styles section

						/* Dropcap */
						{
							text: editor.getLang( "udesign_sb_strings.dropcapText" ),
							onclick: function() {
								editor.windowManager.open( {
									title: editor.getLang( "udesign_sb_strings.dropcapTitle" ),
                                                                        width: 400,
                                                                        height: 100,
									body: [

									// Dropcap Content
									{
										type: 'textbox',
										name: 'dropcapContent',
										label: editor.getLang( "udesign_sb_strings.dropcapContentLabel" ),
                                                                                maxWidth: 100,
										value: "A",
                                                                                tooltip: editor.getLang( "udesign_sb_strings.dropcapContentTooltip" )
									} ],
									onsubmit: function( e ) {
										editor.insertContent('[dropcap]' + e.data.dropcapContent + '[/dropcap]');
									}
								});
							}
						}, // End Dropcap

						/* Image Frame Start */
						{
							text: editor.getLang( "udesign_sb_strings.imageFrameText" ),
							onclick: function() {
								editor.windowManager.open( {
									title: editor.getLang( "udesign_sb_strings.imageFrameTitle" ),
									body: [

									// Image Alignment
									{
										type: 'listbox',
										name: 'imageAlignment',
										label: editor.getLang( "udesign_sb_strings.imageAlignmentLabel" ),
										values: [
											{text: editor.getLang( "udesign_sb_strings.imageAlignmentValuesLeft" ), value: 'left'},
											{text: editor.getLang( "udesign_sb_strings.imageAlignmentValuesRight" ), value: 'right'},
											{text: editor.getLang( "udesign_sb_strings.imageAlignmentValuesCenter" ), value: 'center'}
										]
									},

									// Frame Shadow
                                                                        {
                                                                                type   : 'checkbox',
                                                                                name   : 'imageFrameShadow',
                                                                                label  : editor.getLang( "udesign_sb_strings.imageFrameShadowLabel" ),
                                                                                text   : editor.getLang( "udesign_sb_strings.imageFrameShadowText" ),
                                                                                checked : false
                                                                        },
                                                                        
                                                                        // Image Upload
                                                                        {
                                                                                type: 'textbox',
                                                                                name: 'selectedImageHTML',
                                                                                label: editor.getLang( "udesign_sb_strings.selectedImageHTMLLabel" ),
                                                                                value: '',
                                                                                multiline: true,
										minWidth: 250,
										minHeight: 150,
                                                                                classes: 'u-design-shortcodes-input-image-html'
                                                                        },
                                                                        {
                                                                                type: 'button',
                                                                                name: 'imageFrameUploadButton',
                                                                                label: ' ',
                                                                                text: editor.getLang( "udesign_sb_strings.imageFrameUploadButtonText" ),
                                                                                classes: 'upload-button-for-image-html'
                                                                        } ],
                                                                    
									onsubmit: function( e ) {
                                                                                var $imageFrameShadow = ( true === e.data.imageFrameShadow ) ? 'on' : 'off';
                                                                                editor.insertContent('[custom_frame_' + e.data.imageAlignment + ' shadow="' + $imageFrameShadow + '"]' + e.data.selectedImageHTML + '[/custom_frame_' + e.data.imageAlignment + ']');
									}
								});
							}
						}, // End Image Frame

						/* Custom Table Start */
						{
							text: editor.getLang( "udesign_sb_strings.customTableText" ),
							onclick: function() {
                                                            var $sampleTable = '<table summary="Sample Table">' +
                                                                                    '<thead>' +
                                                                                        '<tr>' +
                                                                                            '<th scope="col">Header 1</th>' +
                                                                                            '<th scope="col">Header 2</th>' +
                                                                                            '<th scope="col">Header 3</th>' +
                                                                                            '<th scope="col">Header 4</th>' +
                                                                                        '</tr>' +
                                                                                    '</thead>' +
                                                                                    '<tbody>' +
                                                                                        '<tr>' +
                                                                                            '<td>Item 1</td>' +
                                                                                            '<td>Description</td>' +
                                                                                            '<td>Subtotal:</td>' +
                                                                                            '<td>$0.00</td>' +
                                                                                        '</tr>' +
                                                                                        '<tr>' +
                                                                                            '<td>Item 2</td>' +
                                                                                            '<td>Description</td>' +
                                                                                            '<td>Discount:</td>' +
                                                                                            '<td>$0.00</td>' +
                                                                                        '</tr>' +
                                                                                        '<tr>' +
                                                                                            '<td>Item 3</td>' +
                                                                                            '<td>Description</td>' +
                                                                                            '<td>Shipping:</td>' +
                                                                                            '<td>$0.00</td>' +
                                                                                       '</tr>' +
                                                                                       '<tr>' +
                                                                                            '<td>Item 4</td>' +
                                                                                            '<td>Description</td>' +
                                                                                            '<td>Tax:</td>' +
                                                                                            '<td>$0.00</td>' +
                                                                                        '</tr>' +
                                                                                        '<tr>' +
                                                                                            '<td>Item 1:</td>' +
                                                                                            '<td>Description</td>' +
                                                                                            '<td><strong>TOTAL:</strong></td>' +
                                                                                            '<td><strong>$0.00</strong></td>' +
                                                                                        '</tr>' +
                                                                                    '</tbody>' +
                                                                                    '<tfoot>' +
                                                                                        '<tr>' +
                                                                                            '<td colspan="4">' +
                                                                                                '*Table Footer here...' +
                                                                                            '</td>' +
                                                                                        '</tr>' +
                                                                                    '</tfoot>' +
                                                                                '</table>';
                                                                editor.insertContent('[custom_table]' + $sampleTable + '[/custom_table]');
							}
						}, // End Custom Table


					]
				}, // End Content section


				/** Other Start **/
				{
                                        text: editor.getLang( "udesign_sb_strings.otherText" ),
                                        icon: 'icon dashicons-art',
                                        menu: [

                                                /* Email Obfuscation */
                                                {
                                                        text: editor.getLang( "udesign_sb_strings.emailObfuscationText" ),
                                                        onclick: function() {
                                                                        editor.windowManager.open( {
                                                                                title: editor.getLang( "udesign_sb_strings.emailObfuscationTitle" ),
                                                                                width: 500,
                                                                                height: 100,
                                                                                body: [

                                                                                // Email Address
                                                                                {
                                                                                        type: 'textbox',
                                                                                        name: 'emailAdress',
                                                                                        label: editor.getLang( "udesign_sb_strings.emailAdressLabel" ),
                                                                                        value: 'john.doe@example.com'
                                                                                } ],
                                                                                onsubmit: function( e ) {
                                                                                        editor.insertContent('[safe_email]' + e.data.emailAdress + '[/safe_email]');
                                                                                }
                                                                        });

                                                        }
                                                } // End Email Obfuscation

					]
				} // End Other section

			]
		});
                
                /** Start Miscellaneous Functions **/
                // Taken from core plugins
                var editor = tinymce.activeEditor;
                function createColorPickAction() {
                    var colorPickerCallback = editor.settings.color_picker_callback;
                    if ( colorPickerCallback ) {
                        return function() {
                            var self = this;
                            colorPickerCallback.call(
                                    editor,
                                    function( value ) {
                                            self.value( value ).fire( 'change' );
                                    },
                                    self.value()
                            );
                        };
                    }
                } // End createColorPickAction Function
                
                
	});
})();




jQuery( document ).ready( function( $ ){
        /**
         * Get a WP Media library image URL by accessing WP Media library from tinymce plugin popup window
         * 
         */
        $( document ).on( 'click', '.mce-upload-button-for-image-url', select_image_url_tinymce );
        function select_image_url_tinymce( e ) {
            var $el = $(this);
            e.preventDefault();
            var $input_field = $( '.mce-u-design-shortcodes-input-image-url' );
            var custom_uploader = wp.media.frames.file_frame = wp.media({
                title: $el.data('choose'),
                button: {
                    text: $el.data('choose'),
                },
                multiple: false
            });
            custom_uploader.on( 'select', function() {
                var attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
                $input_field.val( attachment.url );
            });
            custom_uploader.open();
        }
        
        
        /**
         * Get a WP Media library image HTML by accessing WP Media library from tinymce plugin popup window
         * 
         */
        $( document ).on( 'click', '.mce-upload-button-for-image-html', select_image_html_tinymce );
        function select_image_html_tinymce( e ) {
            var $el = $(this);
            e.preventDefault();
            var $input_field = $( '.mce-u-design-shortcodes-input-image-html' );
            var custom_uploader = wp.media.frames.file_frame = wp.media({
                title: $el.data('choose'),
                button: {
                    text: $el.data('choose'),
                },
                multiple: false
            });
            custom_uploader.on( 'select', function() {
                var attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
                var html = '<img src="' + attachment.url + '" alt="' + attachment.alt + '" title="' + attachment.title + '" />';
                $input_field.val( html );
            });
            custom_uploader.open();
        }
        
        
        
});

