<?php
/*
@Package TAMIM Theme
====================================
        HEADER SETTINGS FUNCTIONS
====================================
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Add admin scripts for media uploader
function tamim_admin_scripts($hook) {
    // শুধুমাত্র হেডার পেজে স্ক্রিপ্ট লোড করুন
    if ($hook == 'tamim_page_tamim_header_options') {
        wp_enqueue_media(); // WordPress media uploader
        wp_enqueue_script('jquery');
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
        
        // একবারে সব ফিল্ডের জন্য JavaScript
        add_action('admin_footer', 'tamim_admin_footer_script');
    }
}
add_action('admin_enqueue_scripts', 'tamim_admin_scripts');

// Admin footer script
function tamim_admin_footer_script() {
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        // Initialize color pickers
        $('.tamim-color-field').wpColorPicker();
        
        // Media uploader for image fields
        function initImageUploader(uploadBtnId, urlFieldId, displayFieldId, previewDivId, removeBtnId) {
            $(uploadBtnId).click(function(e) {
                e.preventDefault();
                
                var mediaFrame = wp.media({
                    title: 'Select Image',
                    button: { text: 'Use This Image' },
                    library: { type: 'image' },
                    multiple: false
                });
                
                mediaFrame.on('select', function() {
                    var attachment = mediaFrame.state().get('selection').first().toJSON();
                    
                    $(urlFieldId).val(attachment.url);
                    $(displayFieldId).val(attachment.url);
                    
                    $(previewDivId).html(
                        '<img src="' + attachment.url + '" alt="Preview" style="max-width: 200px; max-height: 100px; border: 1px solid #ddd; padding: 5px;" />'
                    ).show();
                    
                    if (!$(removeBtnId).length) {
                        $(uploadBtnId).after(
                            '<button type="button" class="button" id="' + removeBtnId.replace('#', '') + '" style="color: #dc3232;">🗑️ Remove</button>'
                        );
                    }
                });
                
                mediaFrame.open();
            });
            
            // Dynamic remove button handler
            $(document).on('click', removeBtnId, function(e) {
                e.preventDefault();
                $(urlFieldId).val('');
                $(displayFieldId).val('');
                $(previewDivId).hide().html('');
                $(this).remove();
            });
        }
        
        // File uploader for CV/PDF/DOC
        function initFileUploader(uploadBtnId, urlFieldId, displayFieldId, previewDivId, removeBtnId) {
            $(uploadBtnId).click(function(e) {
                e.preventDefault();
                
                var mediaFrame = wp.media({
                    title: 'Select CV/Resume File',
                    button: { text: 'Use This File' },
                    library: {
                        type: ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']
                    },
                    multiple: false
                });
                
                mediaFrame.on('select', function() {
                    var attachment = mediaFrame.state().get('selection').first().toJSON();
                    
                    $(urlFieldId).val(attachment.url);
                    $(displayFieldId).val(attachment.filename);
                    
                    var fileIcon = getFileIcon(attachment.filename);
                    $(previewDivId).html(
                        '<div style="display: flex; align-items: center; gap: 10px; padding: 10px; background: #f5f5f5; border: 1px solid #ddd; border-radius: 4px;">' +
                        '<span style="font-size: 24px;">' + fileIcon + '</span>' +
                        '<div>' +
                        '<strong>' + attachment.filename + '</strong><br>' +
                        '<small>' + formatFileSize(attachment.filesize) + '</small>' +
                        '</div>' +
                        '</div>'
                    ).show();
                    
                    if (!$(removeBtnId).length) {
                        $(uploadBtnId).after(
                            '<button type="button" class="button" id="' + removeBtnId.replace('#', '') + '" style="color: #dc3232;">🗑️ Remove</button>'
                        );
                    }
                });
                
                mediaFrame.open();
            });
            
            // Dynamic remove button handler
            $(document).on('click', removeBtnId, function(e) {
                e.preventDefault();
                $(urlFieldId).val('');
                $(displayFieldId).val('');
                $(previewDivId).hide().html('');
                $(this).remove();
            });
        }
        
        // Helper function to get file icon
        function getFileIcon(filename) {
            var ext = filename.split('.').pop().toLowerCase();
            if (ext === 'pdf') return '📄';
            if (ext === 'doc' || ext === 'docx') return '📝';
            return '📎';
        }
        
        // Helper function to format file size
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            var k = 1024;
            var sizes = ['Bytes', 'KB', 'MB', 'GB'];
            var i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }
        
        // Initialize for header logo
        if ($('#tamim_upload_header_logo').length) {
            initImageUploader(
                '#tamim_upload_header_logo',
                '#tamim_header_logo_url',
                '#tamim_header_logo_display',
                '#tamim_header_logo_preview',
                '#tamim_remove_header_logo'
            );
        }
        
        // Initialize for mobile logo
        if ($('#tamim_upload_mobile_logo').length) {
            initImageUploader(
                '#tamim_upload_mobile_logo',
                '#tamim_mobile_logo_url',
                '#tamim_mobile_logo_display',
                '#tamim_mobile_logo_preview',
                '#tamim_remove_mobile_logo'
            );
        }
        
        // Initialize for CV file
        if ($('#tamim_upload_cv_file').length) {
            initFileUploader(
                '#tamim_upload_cv_file',
                '#tamim_cv_file_url',
                '#tamim_cv_file_display',
                '#tamim_cv_file_preview',
                '#tamim_remove_cv_file'
            );
        }
    });
    </script>
    <?php
}

/**1️⃣ Register Header Settings, Section, and Fields*/
function tamim_register_header_settings() {
    // Step-1: Register setting For All
    register_setting('tamim_themes_options_groups', 'tamims_options', 'tamims_registers_options_sanitizes');

    // Step-2: Add Section
    add_settings_section('headers_section', 'Header Settings', 'tamim_headers_section_cb', 'tamim_header_options');
    
    //Step-3: Add Fields
    $fields = array(
        array('header_btn_enable', 'Enable Header Button'),
        array('copyright_enable', 'Enable Bottom header (Copyright)'),
        array('header_logo', 'Header Logo'),
        array('header_mobile_logo', 'Header Mobile Logo'),
        array('header_menu', 'Main Header Menu'),
        array('header_button_text', 'Header Button Text'),
        array('cv_file', 'CV/Resume File (PDF/DOC)'),
        
        // Color Fields - এখান থেকেই color pick করবেন
        array('header_bg_color', 'Header Background Color'),
        array('logo_title_color', 'Logo/Title Color'),
        array('menu_text_color', 'Menu Text Color'),
        array('menu_bg_color', 'Menu Background Color'),
        array('menu_hover_color', 'Menu Hover Color'),
        array('menu_hover_bg', 'Menu Hover Background'),
        array('button_bg_color', 'Button Background Color'),
        array('button_border_color', 'Button Border Color'),
        array('button_text_color', 'Button Text Color'),
        array('button_hover_bg', 'Button Hover Background'),
        array('button_hover_border', 'Button Hover Border'),
        array('button_hover_text', 'Button Hover Text Color'),
        array('mobile_menu_bg', 'Mobile Menu Background'),
        array('mobile_menu_text', 'Mobile Menu Text Color'),
    );
    
    foreach ($fields as $field) {
        add_settings_field(
            $field[0],
            $field[1],
            'tamim_header_' . $field[0] . '_cb',
            'tamim_header_options',
            'headers_section'
        );
    }
}
add_action('admin_init', 'tamim_register_header_settings');

/** 2️⃣ Section Callback*/
function tamim_headers_section_cb() {
    echo '<p>Set the All logo for the header, Mobile Header, and CV Download button.</p>';
}

/**3️⃣ Field Callbacks */

// 1. Enable/Disable Header Button
function tamim_header_header_btn_enable_cb() {
    $options = get_option('tamims_options');
    $enabled = isset($options['header_btn_enable']) ? $options['header_btn_enable'] : '1';
    ?>
    <label>
        <input type="checkbox" 
               name="tamims_options[header_btn_enable]" 
               value="1" 
               <?php checked('1', $enabled); ?> />
        Show Header Button On Right Side
    </label>
    <p class="description">Uncheck to hide header button completely.</p>
    <?php
}

// 2. Enable/Disable Copyright
function tamim_header_copyright_enable_cb() {
    $options = get_option('tamims_options');
    $enabled = isset($options['copyright_enable']) ? $options['copyright_enable'] : '1';
    ?>
    <label>
        <input type="checkbox" 
               name="tamims_options[copyright_enable]" 
               value="1" 
               <?php checked('1', $enabled); ?> />
        Show Copyright Section
    </label>
    <p class="description">Uncheck to hide copyright section.</p>
    <?php
}

// 3. Upload Header Logo
function tamim_header_header_logo_cb() {
    $options = get_option('tamims_options');
    $logo_url = isset($options['header_logo']) ? $options['header_logo'] : '';
    ?>
    
    <div style="margin-bottom: 15px;">
        <input type="hidden" 
               id="tamim_header_logo_url" 
               name="tamims_options[header_logo]" 
               value="<?php echo esc_attr($logo_url); ?>" />
        
        <input type="text" 
               id="tamim_header_logo_display" 
               value="<?php echo esc_attr($logo_url); ?>" 
               placeholder="Logo URL will appear here" 
               readonly 
               style="width: 300px; padding: 8px; margin-right: 10px;" />
        
        <button type="button" 
                class="button" 
                id="tamim_upload_header_logo">
            📁 Upload Logo
        </button>
        
        <?php if (!empty($logo_url)): ?>
        <button type="button" 
                class="button" 
                id="tamim_remove_header_logo"
                style="color: #dc3232;">
            🗑️ Remove
        </button>
        <?php endif; ?>
    </div>
    
    <div id="tamim_header_logo_preview" style="margin-top: 10px; <?php echo empty($logo_url) ? 'display: none;' : ''; ?>">
        <?php if (!empty($logo_url)): ?>
        <img src="<?php echo esc_url($logo_url); ?>" 
             alt="Logo Preview" 
             style="max-width: 200px; max-height: 100px; border: 1px solid #ddd; padding: 5px;" />
        <?php endif; ?>
    </div>
    
    <p class="description">Click "Upload Logo" to select image from media library.</p>
    <?php
}

// 4. Upload Mobile Logo
function tamim_header_header_mobile_logo_cb() {
    $options = get_option('tamims_options');
    $logo_url = isset($options['header_mobile_logo']) ? $options['header_mobile_logo'] : '';
    ?>
    
    <div style="margin-bottom: 15px;">
        <input type="hidden" 
               id="tamim_mobile_logo_url" 
               name="tamims_options[header_mobile_logo]" 
               value="<?php echo esc_attr($logo_url); ?>" />
        
        <input type="text" 
               id="tamim_mobile_logo_display" 
               value="<?php echo esc_attr($logo_url); ?>" 
               placeholder="Mobile Logo URL" 
               readonly 
               style="width: 300px; padding: 8px; margin-right: 10px;" />
        
        <button type="button" 
                class="button" 
                id="tamim_upload_mobile_logo">
            📁 Upload Mobile Logo
        </button>
        
        <?php if (!empty($logo_url)): ?>
        <button type="button" 
                class="button" 
                id="tamim_remove_mobile_logo"
                style="color: #dc3232;">
            🗑️ Remove
        </button>
        <?php endif; ?>
    </div>
    
    <div id="tamim_mobile_logo_preview" style="margin-top: 10px; <?php echo empty($logo_url) ? 'display: none;' : ''; ?>">
        <?php if (!empty($logo_url)): ?>
        <img src="<?php echo esc_url($logo_url); ?>" 
             alt="Mobile Logo Preview" 
             style="max-width: 200px; max-height: 100px; border: 1px solid #ddd; padding: 5px;" />
        <?php endif; ?>
    </div>
    
    <p class="description">Upload logo specifically for mobile devices.</p>
    <?php
}

// 5. Header Menu Selection
function tamim_header_header_menu_cb() {
    $options = get_option('tamims_options');
    $selected_menu = isset($options['header_menu']) ? $options['header_menu'] : '';
    
    // Get all WordPress menus
    $menus = wp_get_nav_menus();
    ?>
    <select name="tamims_options[header_menu]" style="min-width: 200px; padding: 5px;">
        <option value="">-- Select Menu --</option>
        <?php foreach ($menus as $menu): ?>
        <option value="<?php echo esc_attr($menu->slug); ?>" <?php selected($selected_menu, $menu->slug); ?>>
            <?php echo esc_html($menu->name); ?>
        </option>
        <?php endforeach; ?>
    </select>
    <p class="description">Select a WordPress menu to display in header.</p>
    <?php
}

// 6. Header Button Text
function tamim_header_header_button_text_cb() {
    $options = get_option('tamims_options');
    $button_text = isset($options['header_button_text']) ? $options['header_button_text'] : 'Download CV';
    ?>
    <input type="text" 
           name="tamims_options[header_button_text]" 
           value="<?php echo esc_attr($button_text); ?>" 
           placeholder="e.g., Download CV"
           style="width: 300px; padding: 8px;" />
    <p class="description">Text to display on the header button.</p>
    <?php
}

// 7. CV File Upload (PDF/DOC)
function tamim_header_cv_file_cb() {
    $options = get_option('tamims_options');
    $cv_url = isset($options['cv_file']) ? $options['cv_file'] : '';
    $cv_filename = basename($cv_url);
    ?>
    
    <div style="margin-bottom: 15px;">
        <input type="hidden" 
               id="tamim_cv_file_url" 
               name="tamims_options[cv_file]" 
               value="<?php echo esc_attr($cv_url); ?>" />
        
        <input type="text" 
               id="tamim_cv_file_display" 
               value="<?php echo esc_attr($cv_filename); ?>" 
               placeholder="CV/Resume file will appear here" 
               readonly 
               style="width: 300px; padding: 8px; margin-right: 10px;" />
        
        <button type="button" 
                class="button" 
                id="tamim_upload_cv_file">
            📁 Upload CV/Resume
        </button>
        
        <?php if (!empty($cv_url)): ?>
        <button type="button" 
                class="button" 
                id="tamim_remove_cv_file"
                style="color: #dc3232;">
            🗑️ Remove
        </button>
        <?php endif; ?>
    </div>
    
    <div id="tamim_cv_file_preview" style="margin-top: 10px; <?php echo empty($cv_url) ? 'display: none;' : ''; ?>">
        <?php if (!empty($cv_url)): 
            $file_icon = '📎';
            if (strpos($cv_url, '.pdf') !== false) $file_icon = '📄';
            if (strpos($cv_url, '.doc') !== false) $file_icon = '📝';
        ?>
        <div style="display: flex; align-items: center; gap: 10px; padding: 10px; background: #f5f5f5; border: 1px solid #ddd; border-radius: 4px; max-width: 400px;">
            <span style="font-size: 24px;"><?php echo $file_icon; ?></span>
            <div>
                <strong><?php echo esc_html($cv_filename); ?></strong><br>
                <small><?php echo esc_url($cv_url); ?></small>
            </div>
        </div>
        <?php endif; ?>
    </div>
    
    <p class="description">Upload your CV/Resume (PDF or DOC format). This file will be downloaded when button is clicked.</p>
    <?php
}

// 8. Header Background Color (Color Picker)
function tamim_header_header_bg_color_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[header_bg_color]" 
           value="<?php echo esc_attr($options['header_bg_color'] ?? '#ffffff'); ?>" 
           class="tamim-color-field" 
           data-default-color="#ffffff"
           style="width: 100px;" />
    <p class="description">Background color for entire header section.</p>
    <?php
}

// 9. Logo/Title Color (Color Picker)
function tamim_header_logo_title_color_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[logo_title_color]" 
           value="<?php echo esc_attr($options['logo_title_color'] ?? '#000000'); ?>" 
           class="tamim-color-field" 
           data-default-color="#000000"
           style="width: 100px;" />
    <p class="description">Color for logo or site title.</p>
    <?php
}

// 10. Menu Text Color (Color Picker)
function tamim_header_menu_text_color_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[menu_text_color]" 
           value="<?php echo esc_attr($options['menu_text_color'] ?? '#333333'); ?>" 
           class="tamim-color-field" 
           data-default-color="#333333"
           style="width: 100px;" />
    <p class="description">Color for menu items text.</p>
    <?php
}

// 11. Menu Background Color (Color Picker)
function tamim_header_menu_bg_color_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[menu_bg_color]" 
           value="<?php echo esc_attr($options['menu_bg_color'] ?? 'transparent'); ?>" 
           class="tamim-color-field" 
           data-default-color="transparent"
           style="width: 100px;" />
    <p class="description">Background color for menu container.</p>
    <?php
}

// 12. Menu Hover Color (Color Picker)
function tamim_header_menu_hover_color_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[menu_hover_color]" 
           value="<?php echo esc_attr($options['menu_hover_color'] ?? '#0073aa'); ?>" 
           class="tamim-color-field" 
           data-default-color="#0073aa"
           style="width: 100px;" />
    <p class="description">Text color on menu hover.</p>
    <?php
}

// 13. Menu Hover Background (Color Picker)
function tamim_header_menu_hover_bg_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[menu_hover_bg]" 
           value="<?php echo esc_attr($options['menu_hover_bg'] ?? 'transparent'); ?>" 
           class="tamim-color-field" 
           data-default-color="transparent"
           style="width: 100px;" />
    <p class="description">Background color on menu hover.</p>
    <?php
}

// 14. Button Background Color (Color Picker)
function tamim_header_button_bg_color_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[button_bg_color]" 
           value="<?php echo esc_attr($options['button_bg_color'] ?? '#0073aa'); ?>" 
           class="tamim-color-field" 
           data-default-color="#0073aa"
           style="width: 100px;" />
    <p class="description">Background color for download button.</p>
    <?php
}

// 15. Button Border Color (Color Picker)
function tamim_header_button_border_color_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[button_border_color]" 
           value="<?php echo esc_attr($options['button_border_color'] ?? '#0073aa'); ?>" 
           class="tamim-color-field" 
           data-default-color="#0073aa"
           style="width: 100px;" />
    <p class="description">Border color for download button.</p>
    <?php
}

// 16. Button Text Color (Color Picker)
function tamim_header_button_text_color_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[button_text_color]" 
           value="<?php echo esc_attr($options['button_text_color'] ?? '#ffffff'); ?>" 
           class="tamim-color-field" 
           data-default-color="#ffffff"
           style="width: 100px;" />
    <p class="description">Text color for download button.</p>
    <?php
}

// 17. Button Hover Background (Color Picker)
function tamim_header_button_hover_bg_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[button_hover_bg]" 
           value="<?php echo esc_attr($options['button_hover_bg'] ?? '#005a87'); ?>" 
           class="tamim-color-field" 
           data-default-color="#005a87"
           style="width: 100px;" />
    <p class="description">Background color on button hover.</p>
    <?php
}

// 18. Button Hover Border (Color Picker)
function tamim_header_button_hover_border_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[button_hover_border]" 
           value="<?php echo esc_attr($options['button_hover_border'] ?? '#005a87'); ?>" 
           class="tamim-color-field" 
           data-default-color="#005a87"
           style="width: 100px;" />
    <p class="description">Border color on button hover.</p>
    <?php
}

// 19. Button Hover Text (Color Picker)
function tamim_header_button_hover_text_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[button_hover_text]" 
           value="<?php echo esc_attr($options['button_hover_text'] ?? '#ffffff'); ?>" 
           class="tamim-color-field" 
           data-default-color="#ffffff"
           style="width: 100px;" />
    <p class="description">Text color on button hover.</p>
    <?php
}

// 20. Mobile Menu Background (Color Picker)
function tamim_header_mobile_menu_bg_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[mobile_menu_bg]" 
           value="<?php echo esc_attr($options['mobile_menu_bg'] ?? '#ff014f'); ?>" 
           class="tamim-color-field" 
           data-default-color="#ff014f"
           style="width: 100px;" />
    <p class="description">Background color for mobile menu.</p>
    <?php
}

// 21. Mobile Menu Text Color (Color Picker)
function tamim_header_mobile_menu_text_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[mobile_menu_text]" 
           value="<?php echo esc_attr($options['mobile_menu_text'] ?? '#ffffff'); ?>" 
           class="tamim-color-field" 
           data-default-color="#ffffff"
           style="width: 100px;" />
    <p class="description">Text color for mobile menu.</p>
    <?php
}

/**
 * 5️⃣ Page Callback - Render Header Settings Page
 */
function tamim_header_options_page_cb() {
    ?>
    <div class="wrap">
        <h1>Header Settings</h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('tamim_themes_options_groups');
            do_settings_sections('tamim_header_options');
            submit_button('Save Changes');
            ?>
        </form>
    </div>
    <?php
}


/**6 Header Color Related Code Here ..........*/

function theme_option_header_color(){

$options = get_option('tamims_options');

$header_bg_color = $options['header_bg_color'] ?? '#1a1a1a';
$header_logo_color = $options['logo_title_color'] ?? '#ffffffff';
$header_menu_text_color = $options['menu_text_color'] ?? '#ffffffff';
$header_menu_text_hover = $options['menu_hover_color'] ?? '#ffffffff';
$header_menu_bg_color = $options['menu_bg_color'] ?? '#000000ff';
$header_menu_bg_hover = $options['menu_hover_bg'] ?? '#ff014f';
$header_menu_btn_bg = $options['button_bg_color'] ?? '#ff014f';
$header_menu_btn_border = $options['button_border_color'] ?? '#ff014f';
$header_menu_btn_text = $options['button_text_color'] ?? '#ffffffff';
$header_menu_btn_bg_hover = $options['button_hover_bg'] ?? '#000000ff';
$header_menu_btn_border_hover = $options['button_hover_border'] ?? '#ff014f';
$header_menu_btn_text_hover = $options['button_hover_text'] ?? '#000000ff';
$header_mobile_menu_bg = $options['mobile_menu_bg'] ?? '#ff014f';
$header_mobile_menu_text = $options['mobile_menu_text'] ?? '#ff014f';
?>

<style>
:root {
    /* Header */
    --header-bg-color: <?php echo esc_html($header_bg_color); ?>;
    --header-logo-color: <?php echo esc_html($header_logo_color); ?>;

    /* Menu */
    --header-menu-text-color: <?php echo esc_html($header_menu_text_color); ?>;
    --header-menu-text-hover: <?php echo esc_html($header_menu_text_hover); ?>;
    --header-menu-bg-color: <?php echo esc_html($header_menu_bg_color); ?>;
    --header-menu-bg-hover: <?php echo esc_html($header_menu_bg_hover); ?>;

    /* Buttons */
    --header-menu-btn-bg: <?php echo esc_html($header_menu_btn_bg); ?>;
    --header-menu-btn-border: <?php echo esc_html($header_menu_btn_border); ?>;
    --header-menu-btn-text: <?php echo esc_html($header_menu_btn_text); ?>;
    --header-menu-btn-bg-hover: <?php echo esc_html($header_menu_btn_bg_hover); ?>;
    --header-menu-btn-border-hover: <?php echo esc_html($header_menu_btn_border_hover); ?>;
    --header-menu-btn-text-hover: <?php echo esc_html($header_menu_btn_text_hover); ?>;

    /* Mobile Menu */
    --header-mobile-menu-bg: <?php echo esc_html($header_mobile_menu_bg); ?>;
    --header-mobile-menu-text: <?php echo esc_html($header_mobile_menu_text); ?>;
    }
</style>
<?php
}

