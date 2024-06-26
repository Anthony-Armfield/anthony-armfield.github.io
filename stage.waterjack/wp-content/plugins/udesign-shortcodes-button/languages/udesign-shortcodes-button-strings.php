<?php

// This file is based on wp-includes/js/tinymce/langs/wp-langs.php

if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



if ( ! class_exists( '_WP_Editors' ) ){
    require( ABSPATH . WPINC . '/class-wp-editor.php' );
}

function udesign_shortcodes_button_translation() {
    
    $strings = array(
        'buttonTitle'                                       => __( 'U-Design Shortcodes', 'udesign-shortcodes-button' ),
            /** Layout **/
            'layoutText'                                    => __( 'Layout', 'udesign-shortcodes-button' ),
                /* Columns */
                'columnsText'                               => __( 'Columns', 'udesign-shortcodes-button' ),
                'columnsTitle'                              => __( 'U-Design Shortcodes - Insert Columns', 'udesign-shortcodes-button' ),
                'columnArrangementLabel'                    => __( 'Arrangement', 'udesign-shortcodes-button' ),
                'columnContentLabel'                        => __( 'Starting Content', 'udesign-shortcodes-button' ),
                'columnContentValue'                        => __( 'Your content here...', 'udesign-shortcodes-button' ),
                /* Dividers */
                'dividersText'                              => __( 'Dividers', 'udesign-shortcodes-button' ),
                'dividersTitle'                             => __( 'U-Design Shortcodes - Insert Divider', 'udesign-shortcodes-button' ),
                'dividerStyleLabel'                         => __( 'Divider Style', 'udesign-shortcodes-button' ),
                'dividerStyleValuesTextDivider'             => __( 'Solid line divider', 'udesign-shortcodes-button' ),
                'dividerStyleValuesTextDividerTop'          => __( 'Solid line divider with a link to the top', 'udesign-shortcodes-button' ),
                'dividerStyleValuesTextClear'               => __( 'Invisible, clears the line', 'udesign-shortcodes-button' ),
            /** Buttons **/
            'buttonsText'                                   => __( 'Buttons', 'udesign-shortcodes-button' ),
                /* Flat Button */
                'flatButtonText'                            => __( 'Flat Button', 'udesign-shortcodes-button' ),
                'flatButtonTitle'                           => __( 'U-Design Shortcodes - Insert Button', 'udesign-shortcodes-button' ),
                'flatButtonTextLabel'                       => __( 'Button Text', 'udesign-shortcodes-button' ),
                'flatButtonTextValue'                       => __( 'Flat Button', 'udesign-shortcodes-button' ),
                'flatButtonTitleLabel'                      => __( 'Link Title', 'udesign-shortcodes-button' ),
                'flatButtonTitleValue'                      => __( 'Flat Button', 'udesign-shortcodes-button' ),
                'flatButtonUrlLabel'                        => __( 'URL', 'udesign-shortcodes-button' ),
                'flatButtonPaddingLabel'                    => __( 'Padding', 'udesign-shortcodes-button' ),
                'flatButtonBackgroundColorLabel'            => __( 'Background Color', 'udesign-shortcodes-button' ),
                'flatButtonBorderColorLabel'                => __( 'Border Color', 'udesign-shortcodes-button' ),
                'flatButtonBorderWidthLabel'                => __( 'Border Width', 'udesign-shortcodes-button' ),
                'flatButtonTextColorLabel'                  => __( 'Text Color', 'udesign-shortcodes-button' ),
                'flatButtonTextSizeLabel'                   => __( 'Text Size', 'udesign-shortcodes-button' ),
                'flatButtonAlignmentLabel'                  => __( 'Alignment', 'udesign-shortcodes-button' ),
                'flatButtonAlignmentValuesLeft'             => __( 'Left', 'udesign-shortcodes-button' ),
                'flatButtonAlignmentValuesRight'            => __( 'Right', 'udesign-shortcodes-button' ),
                'flatButtonAlignmentValuesCenter'           => __( 'Center', 'udesign-shortcodes-button' ),
                'flatButtonAlignmentValuesNone'             => __( 'None', 'udesign-shortcodes-button' ),                                        
                'flatButtonLinkTargetLabel'                 => __( 'Link Target', 'udesign-shortcodes-button' ),
                'flatButtonLinkTargetValuesSelf'            => __( 'Self', 'udesign-shortcodes-button' ),
                'flatButtonLinkTargetValuesBlank'           => __( 'Blank', 'udesign-shortcodes-button' ),
                /* Simple Button */
                'simpleButtonText'                          => __( 'Simple Button', 'udesign-shortcodes-button' ),
                'simpleButtonTitle'                         => __( 'U-Design Shortcodes - Insert Button', 'udesign-shortcodes-button' ),
                'simpleButtonTypeLabel'                     => __( 'Type', 'udesign-shortcodes-button' ),
                'simpleButtonTypeValuesDefault'             => __( 'Default', 'udesign-shortcodes-button' ),
                'simpleButtonTypeValuesSmall'               => __( 'Small', 'udesign-shortcodes-button' ),
                'simpleButtonTypeValuesRound'               => __( 'Round', 'udesign-shortcodes-button' ),
                'simpleButtonTextLabel'                     => __( 'Button Text', 'udesign-shortcodes-button' ),
                'simpleButtonTextValue'                     => __( 'Simple Button', 'udesign-shortcodes-button' ),
                'simpleButtonTitleLabel'                    => __( 'Link Title', 'udesign-shortcodes-button' ),
                'simpleButtonTitleValue'                    => __( 'Simple Button', 'udesign-shortcodes-button' ),
                'simpleButtonUrlLabel'                      => __( 'URL', 'udesign-shortcodes-button' ),
                'simpleButtonStyleLabel'                    => __( 'Style', 'udesign-shortcodes-button' ),
                'simpleButtonStyleValuesDark'               => __( 'Dark', 'udesign-shortcodes-button' ),
                'simpleButtonStyleValuesLight'              => __( 'Light', 'udesign-shortcodes-button' ),
                'simpleButtonAlignmentLabel'                => __( 'Alignment', 'udesign-shortcodes-button' ),
                'simpleButtonAlignmentValuesLeft'           => __( 'Left', 'udesign-shortcodes-button' ),
                'simpleButtonAlignmentValuesRight'          => __( 'Right', 'udesign-shortcodes-button' ),
                'simpleButtonAlignmentValuesCenter'         => __( 'Center', 'udesign-shortcodes-button' ),
                'simpleButtonLinkTargetLabel'               => __( 'Link Target', 'udesign-shortcodes-button' ),
                'simpleButtonLinkTargetValuesSelf'          => __( 'Self', 'udesign-shortcodes-button' ),
                'simpleButtonLinkTargetValuesBlank'         => __( 'Blank', 'udesign-shortcodes-button' ),
                /* Custom Button */
                'customButtonText'                          => __( 'Custom Button', 'udesign-shortcodes-button' ),
                'customButtonTitle'                         => __( 'U-Design Shortcodes - Insert Button', 'udesign-shortcodes-button' ),
                'customButtonTextLabel'                     => __( 'Button Text', 'udesign-shortcodes-button' ),
                'customButtonTextValue'                     => __( 'Custom Button', 'udesign-shortcodes-button' ),
                'customButtonTitleLabel'                    => __( 'Link Title', 'udesign-shortcodes-button' ),
                'customButtonTitleValue'                    => __( 'Custom Button', 'udesign-shortcodes-button' ),
                'customButtonUrlLabel'                      => __( 'URL', 'udesign-shortcodes-button' ),
                'customButtonSizeLabel'                     => __( 'Size', 'udesign-shortcodes-button' ),
                'customButtonSizeValuesSmall'               => __( 'Small', 'udesign-shortcodes-button' ),
                'customButtonSizeValuesMedium'              => __( 'Medium', 'udesign-shortcodes-button' ),
                'customButtonSizeValuesLarge'               => __( 'Large', 'udesign-shortcodes-button' ),
                'customButtonSizeValuesXLarge'              => __( 'X-Large', 'udesign-shortcodes-button' ),
                'customButtonBackgroundColorLabel'          => __( 'Background Color', 'udesign-shortcodes-button' ),
                'customButtonTextColorLabel'                => __( 'Text Color', 'udesign-shortcodes-button' ),
                'customButtonAlignmentLabel'                => __( 'Alignment', 'udesign-shortcodes-button' ),
                'customButtonAlignmentValuesLeft'           => __( 'Left', 'udesign-shortcodes-button' ),
                'customButtonAlignmentValuesRight'          => __( 'Right', 'udesign-shortcodes-button' ),
                'customButtonAlignmentValuesCenter'         => __( 'Center', 'udesign-shortcodes-button' ),
                'customButtonAlignmentValuesNone'           => __( 'None', 'udesign-shortcodes-button' ),
                'customButtonLinkTargetLabel'               => __( 'Link Target', 'udesign-shortcodes-button' ),
                'customButtonLinkTargetValuesSelf'          => __( 'Self', 'udesign-shortcodes-button' ),
                'customButtonLinkTargetValuesBlank'         => __( 'Blank', 'udesign-shortcodes-button' ),
                /* Custom More Link */
                'customMoreLinkText'                        => __( 'Custom More Link', 'udesign-shortcodes-button' ),
                'customMoreLinkTitle'                       => __( 'U-Design Shortcodes - Insert Link', 'udesign-shortcodes-button' ),
                'customMoreLinkTextLabel'                   => __( 'Link Text', 'udesign-shortcodes-button' ),
                'customMoreLinkTextValue'                   => __( 'Read more', 'udesign-shortcodes-button' ),
                'customMoreLinkTitleLabel'                  => __( 'Link Title', 'udesign-shortcodes-button' ),
                'customMoreLinkTitleValue'                  => __( 'Read more', 'udesign-shortcodes-button' ),
                'customMoreLinkUrlLabel'                    => __( 'URL', 'udesign-shortcodes-button' ),
                'customMoreLinkAlignmentLabel'              => __( 'Alignment', 'udesign-shortcodes-button' ),
                'customMoreLinkAlignmentValuesLeft'         => __( 'Left', 'udesign-shortcodes-button' ),
                'customMoreLinkAlignmentValuesRight'        => __( 'Right', 'udesign-shortcodes-button' ),
                'customMoreLinkTargetLabel'                 => __( 'Link Target', 'udesign-shortcodes-button' ),
                'customMoreLinkTargetValuesSelf'            => __( 'Self', 'udesign-shortcodes-button' ),
                'customMoreLinkTargetValuesBlank'           => __( 'Blank', 'udesign-shortcodes-button' ),
            /** Content **/
            'contentText'                                   => __( 'Content', 'udesign-shortcodes-button' ),
		/* Content Block */
                'contentBlockText'                          => __( 'Content Block', 'udesign-shortcodes-button' ),
                'contentBlockTitle'                         => __( 'U-Design Shortcodes - Insert Content Block', 'udesign-shortcodes-button' ),
                'contentBlockContentLabel'                  => __( 'Sample Content', 'udesign-shortcodes-button' ),
                'contentBlockBackgroundImageURLLabel'       => __( 'Image URL', 'udesign-shortcodes-button' ),
                'contentBlockBackgroundImageURLTooltip'     => __( 'URL to a background image, if no image is specified the fallback would be the background color option', 'udesign-shortcodes-button' ),
                'contentBlockUploadButtonText'              => __( 'Select Image', 'udesign-shortcodes-button' ),
                'contentBlockBackgroundStretchLabel'        => __( 'Background Stretch', 'udesign-shortcodes-button' ),
                'contentBlockBackgroundStretchValuesYes'    => __( 'Yes', 'udesign-shortcodes-button' ),
                'contentBlockBackgroundStretchValuesNo'     => __( 'No', 'udesign-shortcodes-button' ),
                'contentBlockBackgroundStretchTooltip'      => __( 'Extend the background to maximum width (the width of the browser window)', 'udesign-shortcodes-button' ),
                'contentBlockFixedBackgroundLabel'          => __( 'Fixed Background', 'udesign-shortcodes-button' ),
                'contentBlockFixedBackgroundValuesYes'      => __( 'Yes', 'udesign-shortcodes-button' ),
                'contentBlockFixedBackgroundValuesNo'       => __( 'No', 'udesign-shortcodes-button' ),
                'contentBlockFixedBackgroundTooltip'        => __( 'Sets whether the background image is fixed or scrolls with the rest of the page', 'udesign-shortcodes-button' ),
                'contentBlockBackgroundPositionLabel'       => __( 'Background Position', 'udesign-shortcodes-button' ),
                'contentBlockBackgroundPositionTooltip'     => __( 'You may apply proper syntax for the CSS "background-position" property', 'udesign-shortcodes-button' ),
                'contentBlockBackgroundRepeatLabel'         => __( 'Background Repeat', 'udesign-shortcodes-button' ),
                'contentBlockBackgroundSizeLabel'           => __( 'Background Size', 'udesign-shortcodes-button' ),
                'contentBlockParallaxScrollLabel'           => __( 'Parallax Scroll', 'udesign-shortcodes-button' ),
                'contentBlockParallaxScrollValuesNo'        => __( 'No', 'udesign-shortcodes-button' ),
                'contentBlockParallaxScrollValuesYes'       => __( 'Yes', 'udesign-shortcodes-button' ),
                'contentBlockParallaxScrollTooltip'         => __( 'Sets whether the background image is fixed or scrolls with the rest of the page', 'udesign-shortcodes-button' ),
                'contentBlockBackgroundColorLabel'          => __( 'Background Color', 'udesign-shortcodes-button' ),
                'contentBlockContentPaddingLabel'           => __( 'Content Padding', 'udesign-shortcodes-button' ),
                'contentBlockContentPaddingTooltip'         => __( 'You may apply proper syntax for the CSS "padding" property', 'udesign-shortcodes-button' ),
                'flatButtonBorderColorLabel'                => __( 'Border Color', 'udesign-shortcodes-button' ),
                'flatButtonBorderWidthLabel'                => __( 'Padding Width', 'udesign-shortcodes-button' ),
                'contentBlockTextColorLabel'                => __( 'Text Color', 'udesign-shortcodes-button' ),
                'contentBlockCustomClassLabel'              => __( 'Class', 'udesign-shortcodes-button' ),
                'contentBlockCustomClassTooltip'            => __( 'Use this option to pass a unique CSS class which you may use to style this particular instance of the content block in the front end with custom CSS', 'udesign-shortcodes-button' ),
		/* Message Box */
                'messageBoxText'                            => __( 'Message Box', 'udesign-shortcodes-button' ),
                    /* Predefined Message Box */
                    'predefinedMessageBoxText'              => __( 'Predefined', 'udesign-shortcodes-button' ),
                    'messageBoxTitle'                       => __( 'U-Design Shortcodes - Insert Message Box', 'udesign-shortcodes-button' ),
                    'messageBoxContentLabel'                => __( 'Sample Content', 'udesign-shortcodes-button' ),
                    'messageBoxContentValue'                => __( 'Replace this text with your message...', 'udesign-shortcodes-button' ),
                    'messageBoxTypeLabel'                   => __( 'Message Box Type', 'udesign-shortcodes-button' ),
                    'messageBoxTypeValuesInfo'              => __( 'info', 'udesign-shortcodes-button' ),
                    'messageBoxTypeValuesSuccess'           => __( 'success', 'udesign-shortcodes-button' ),
                    'messageBoxTypeValuesWarning'           => __( 'warning', 'udesign-shortcodes-button' ),
                    'messageBoxTypeValuesErroneous'         => __( 'erroneous', 'udesign-shortcodes-button' ),
                    /* Custom Message Box */
                    'customMessageBoxText'                  => __( 'Custom', 'udesign-shortcodes-button' ),
                    'customMessageBoxTitle'                 => __( 'U-Design Shortcodes - Insert Message Box', 'udesign-shortcodes-button' ),
                    'customMessageBoxContentLabel'          => __( 'Sample Content', 'udesign-shortcodes-button' ),
                    'customMessageBoxContentValue'          => __( 'Replace this text with your message...', 'udesign-shortcodes-button' ),
                    'customMessageBoxWidthLabel'            => __( 'Width', 'udesign-shortcodes-button' ),
                    'customMessageBoxWidthTooltip'          => __( 'Width could be in pixels (px) or percentage (%)', 'udesign-shortcodes-button' ),
                    'customMessageBoxStartColorLabel'       => __( 'Start Color', 'udesign-shortcodes-button' ),
                    'customMessageBoxEndColorLabel'         => __( 'End Color', 'udesign-shortcodes-button' ),
                    'customMessageBoxBorderColorLabel'      => __( 'Border Color', 'udesign-shortcodes-button' ),
                    'customMessageBoxTextColorLabel'        => __( 'Text Color', 'udesign-shortcodes-button' ),
                    'customMessageBoxAlignmentLabel'        => __( 'Alignment', 'udesign-shortcodes-button' ),
                    'customMessageBoxAlignmentValuesLeft'   => __( 'Left', 'udesign-shortcodes-button' ),
                    'customMessageBoxAlignmentValuesCenter' => __( 'Center', 'udesign-shortcodes-button' ),
                    'customMessageBoxAlignmentValuesRight'  => __( 'Right', 'udesign-shortcodes-button' ),
                    /* Simple Message Box */
                    'simpleMessageBoxText'                  => __( 'Simple', 'udesign-shortcodes-button' ),
                    'simpleMessageBoxTitle'                 => __( 'U-Design Shortcodes - Insert Message Box', 'udesign-shortcodes-button' ),
                    'simpleMessageBoxContentLabel'          => __( 'Sample Content', 'udesign-shortcodes-button' ),
                    'simpleMessageBoxContentValue'          => __( 'Replace this text with your message...', 'udesign-shortcodes-button' ),
                    'simpleMessageBoxBackgroundColorLabel'  => __( 'Border Color', 'udesign-shortcodes-button' ),
                    'simpleMessageBoxTextColorLabel'        => __( 'Text Color', 'udesign-shortcodes-button' ),
                /* Quotes */
                'quotesText'                                => __( 'Quotes', 'udesign-shortcodes-button' ),
                    /* Pullquote */
                    'pullquoteText'                         => __( 'Pullquote', 'udesign-shortcodes-button' ),
                    'pullquoteTitle'                        => __( 'U-Design Shortcodes - Insert Pullquote', 'udesign-shortcodes-button' ),
                    'pullquoteContentLabel'                 => __( 'Sample Content', 'udesign-shortcodes-button' ),
                    'pullquoteSymbolLabel'                  => __( 'Symbol', 'udesign-shortcodes-button' ),
                    'pullquoteSymbolValuesSymbol2'          => __( 'Symbol 2', 'udesign-shortcodes-button' ),
                    'pullquoteSymbolValuesSymbol1'          => __( 'Symbol 1', 'udesign-shortcodes-button' ),
                    'pullquoteStyleLabel'                   => __( 'Style', 'udesign-shortcodes-button' ),
                    'pullquoteStyleValuesDark'              => __( 'Dark', 'udesign-shortcodes-button' ),
                    'pullquoteStyleValuesLight'             => __( 'Light', 'udesign-shortcodes-button' ),
                    'pullquoteAlignmentLabel'               => __( 'Alignment', 'udesign-shortcodes-button' ),
                    'pullquoteAlignmentValuesLeft'          => __( 'Left', 'udesign-shortcodes-button' ),
                    'pullquoteAlignmentValuesRight'         => __( 'Right', 'udesign-shortcodes-button' ),
                    /* Blockquote */
                    'blockquoteText'                        => __( 'Blockquote (HTML)', 'udesign-shortcodes-button' ),
                    'blockquoteTitle'                       => __( 'U-Design Shortcodes - Insert Blockquote', 'udesign-shortcodes-button' ),
                    'blockquoteContentLabel'                => __( 'Sample Content', 'udesign-shortcodes-button' ),
                    'blockquoteSymbolLabel'                 => __( 'Symbol', 'udesign-shortcodes-button' ),
                    'blockquoteSymbolValuesSymbol2'         => __( 'Symbol 2', 'udesign-shortcodes-button' ),
                    'blockquoteSymbolValuesSymbol1'         => __( 'Symbol 1', 'udesign-shortcodes-button' ),
                    'blockquoteStyleLabel'                  => __( 'Style', 'udesign-shortcodes-button' ),
                    'blockquoteStyleValuesDark'             => __( 'Dark', 'udesign-shortcodes-button' ),
                    'blockquoteStyleValuesLight'            => __( 'Light', 'udesign-shortcodes-button' ),
                /* Recent Posts */
                'recentPostsText'                           => __( 'Recent Posts', 'udesign-shortcodes-button' ),
                'recentPostsTitle'                          => __( 'U-Design Shortcodes - Insert Recent Posts', 'udesign-shortcodes-button' ),
                'recentPostsTitleLabel'                     => __( 'Title', 'udesign-shortcodes-button' ),
                'recentPostsTitleValue'                     => __( 'Latest from the Blog', 'udesign-shortcodes-button' ),
                'recentPostsCategoriesLabel'                => __( 'Enter categories (IDs)', 'udesign-shortcodes-button' ),
                'recentPostsCategoriesDescriptionLine1'     => __( 'To choose a catetory use the little dropdown menu above.', 'udesign-shortcodes-button' ),
                'recentPostsCategoriesDescriptionLine2'     => __( 'For multiple categories enter comma-separated list of IDs.', 'udesign-shortcodes-button' ),
                'recentPostsCategoriesDescriptionLine3'     => __( 'To include all categories leave the field blank.', 'udesign-shortcodes-button' ),
                'recentPostsNumberPostsToShowLabel'         => __( 'Number of posts to show', 'udesign-shortcodes-button' ),
                'recentPostsNumberPostsToShowTooltip'       => __( 'at most 15', 'udesign-shortcodes-button' ),
                'recentPostsNumberPostsToSkipLabel'         => __( 'Number of posts to skip', 'udesign-shortcodes-button' ),
                'recentPostsNumberPostsToSkipTooltip'       => __( 'offset from latest', 'udesign-shortcodes-button' ),
                'recentPostsNumberWordsToShowLabel'         => __( 'Number of words to show', 'udesign-shortcodes-button' ),
                'recentPostsNumberWordsToShowTooltip'       => __( 'If lesser value, "Excerpt Length" defined in the theme\'s Blog Section page can overwrite this', 'udesign-shortcodes-button' ),
                'recentPostsDateAndAuthorLabel'             => __( 'Show date and author', 'udesign-shortcodes-button' ),
                'recentPostsDateAndAuthorValuesNo'          => __( 'No', 'udesign-shortcodes-button' ),
                'recentPostsDateAndAuthorValuesYes'         => __( 'Yes', 'udesign-shortcodes-button' ),
                'recentPostsMoreLinkLabel'                  => __( 'Show "more" link', 'udesign-shortcodes-button' ),
                'recentPostsMoreLinkValuesNo'               => __( 'No', 'udesign-shortcodes-button' ),
                'recentPostsMoreLinkValuesYes'              => __( 'Yes', 'udesign-shortcodes-button' ),
                'recentPostsMoreLinkTextLabel'              => __( '"more" link text', 'udesign-shortcodes-button' ),
                'recentPostsMoreLinkTextValues'             => __( 'Read more', 'udesign-shortcodes-button' ),
                'recentPostsShowThumbnailsLabel'            => __( 'Show thumbnails', 'udesign-shortcodes-button' ),
                'recentPostsShowThumbnailsValuesYes'        => __( 'Yes', 'udesign-shortcodes-button' ),
                'recentPostsShowThumbnailsValuesNo'         => __( 'No', 'udesign-shortcodes-button' ),
                'recentPostsThumbnailFrameLabel'            => __( 'Thumbnail frame', 'udesign-shortcodes-button' ),
                'recentPostsThumbnailFrameValuesNo'         => __( 'No', 'udesign-shortcodes-button' ),
                'recentPostsThumbnailFrameValuesYes'        => __( 'Yes', 'udesign-shortcodes-button' ),
                'recentPostsThumbnailShadowLabel'           => __( 'Thumbnail shadow', 'udesign-shortcodes-button' ),
                'recentPostsThumbnailShadowValuesNo'        => __( 'No', 'udesign-shortcodes-button' ),
                'recentPostsThumbnailShadowValuesYes'       => __( 'Yes', 'udesign-shortcodes-button' ),
                'recentPostsDefaultImageLabel'              => __( 'Default image', 'udesign-shortcodes-button' ),
                'recentPostsDefaultImageValuesYes'          => __( 'Yes', 'udesign-shortcodes-button' ),
                'recentPostsDefaultImageValuesNo'           => __( 'No', 'udesign-shortcodes-button' ),
                'recentPostsDefaultImageTooltip'            => __( 'When no image is found for a specific post then a fallback image will be displayed', 'udesign-shortcodes-button' ),
                'recentPostsThumbnailWidthLabel'            => __( 'Thumbnail width', 'udesign-shortcodes-button' ),
                'recentPostsThumbnailWidthTooltip'          => __( 'Width in pixels (px)', 'udesign-shortcodes-button' ),
                'recentPostsThumbnailHeightLabel'           => __( 'Thumbnail height', 'udesign-shortcodes-button' ),
                'recentPostsThumbnailHeightTooltip'         => __( 'Width in pixels (px)', 'udesign-shortcodes-button' ),
                /* Accordion */
                'accordionText'                             => __( 'Accordion', 'udesign-shortcodes-button' ),
                /* Toggle */
                'toggleText'                                => __( 'Toggle', 'udesign-shortcodes-button' ),
                /* Tabs */
                'tabsText'                                  => __( 'Tabs', 'udesign-shortcodes-button' ),
                /* List Styles */
                'listStylesText'                            => __( 'List Styles', 'udesign-shortcodes-button' ),
                'listStylesTitle'                           => __( 'U-Design Shortcodes - Insert Bullets', 'udesign-shortcodes-button' ),
                'listStyleLabel'                            => __( 'Style', 'udesign-shortcodes-button' ),
                'listStyleValuesList1'                      => __( 'List Style 1', 'udesign-shortcodes-button' ),
                'listStyleValuesList2'                      => __( 'List Style 2', 'udesign-shortcodes-button' ),
                'listStyleValuesList3'                      => __( 'List Style 3', 'udesign-shortcodes-button' ),
                'listStyleValuesList4'                      => __( 'List Style 4', 'udesign-shortcodes-button' ),
                'listStyleValuesList5'                      => __( 'List Style 5', 'udesign-shortcodes-button' ),
                'listStyleValuesList6'                      => __( 'List Style 6', 'udesign-shortcodes-button' ),
                'listStyleValuesList7'                      => __( 'List Style 7', 'udesign-shortcodes-button' ),
                'listStyleValuesList8'                      => __( 'List Style 8', 'udesign-shortcodes-button' ),
                'listStyleValuesList9'                      => __( 'List Style 9', 'udesign-shortcodes-button' ),
                'listStyleValuesList10'                     => __( 'List Style 10', 'udesign-shortcodes-button' ),
                'listStyleValuesList11'                     => __( 'List Style 11', 'udesign-shortcodes-button' ),
                'listContentLabel'                          => __( 'Sample Content (ul list)', 'udesign-shortcodes-button' ),
                /* Dropcap */
                'dropcapText'                               => __( 'Dropcap', 'udesign-shortcodes-button' ),
                'dropcapTitle'                              => __( 'U-Design Shortcodes - Insert Dropcap', 'udesign-shortcodes-button' ),
                'dropcapContentLabel'                       => __( 'Dropcap Letter', 'udesign-shortcodes-button' ),
                'dropcapContentTooltip'                     => __( 'Dropcap - a large initial letter usually used at the beginning of a section.', 'udesign-shortcodes-button' ),
                /* Image Frame */
                'imageFrameText'                            => __( 'Image Frame', 'udesign-shortcodes-button' ),
                'imageFrameTitle'                           => __( 'U-Design Shortcodes - Insert Image Frame', 'udesign-shortcodes-button' ),
                'imageAlignmentLabel'                       => __( 'Alignment', 'udesign-shortcodes-button' ),
                'imageAlignmentValuesLeft'                  => __( 'Left', 'udesign-shortcodes-button' ),
                'imageAlignmentValuesRight'                 => __( 'Right', 'udesign-shortcodes-button' ),
                'imageAlignmentValuesCenter'                => __( 'Center', 'udesign-shortcodes-button' ),
                'imageFrameShadowLabel'                     => __( 'Shadow', 'udesign-shortcodes-button' ),
                'imageFrameShadowText'                      => __( 'Add image frame shadow', 'udesign-shortcodes-button' ),
                'selectedImageHTMLLabel'                    => __( 'Image HTML', 'udesign-shortcodes-button' ),
                'imageFrameUploadButtonText'                => __( 'Select Image', 'udesign-shortcodes-button' ),
                /* Custom Table */
                'customTableText'                           => __( 'Custom Table', 'udesign-shortcodes-button' ),
            /** Content **/
            /** Other **/
                'otherText'                                 => __( 'Other', 'udesign-shortcodes-button' ),
                    /* Email Obfuscation */
                    'emailObfuscationText'                  => __( 'Email Obfuscation', 'udesign-shortcodes-button' ),
                    'emailObfuscationTitle'                 => __( 'U-Design Shortcodes - Obfuscate Email Address', 'udesign-shortcodes-button' ),
                    'emailAdressLabel'                      => __( 'Email Address', 'udesign-shortcodes-button' )
    );
    
    $locale = _WP_Editors::$mce_locale;
    $translated = 'tinyMCE.addI18n("' . $locale . '.udesign_sb_strings", ' . json_encode( $strings ) . ");\n";
    
    return $translated;
}

$strings = udesign_shortcodes_button_translation();
