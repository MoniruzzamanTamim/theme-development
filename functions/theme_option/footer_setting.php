<?php
/*
@Package TAMIM Theme
====================================
        FOOTER SETTINGS FUNCTIONS
====================================
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Load media uploader for footer
function tamim_footer_admin_scripts($hook) {
    if (isset($_GET['page']) && $_GET['page'] == 'tamim_footer_options') {
        wp_enqueue_media();
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_script('jquery');
        
        // Footer admin script
        add_action('admin_footer', 'tamim_footer_admin_footer_script');
    }
}
add_action('admin_enqueue_scripts', 'tamim_footer_admin_scripts');

// Footer admin footer script
function tamim_footer_admin_footer_script() {
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        // Initialize color pickers
        $('.tamim-color-field').wpColorPicker();
        
        // Media uploader for footer logo
        function initFooterLogoUploader() {
            $('#tamim_upload_footer_logo').click(function(e) {
                e.preventDefault();
                
                var mediaFrame = wp.media({
                    title: 'Select Footer Logo',
                    button: { text: 'Use This Image' },
                    library: { type: 'image' },
                    multiple: false
                });
                
                mediaFrame.on('select', function() {
                    var attachment = mediaFrame.state().get('selection').first().toJSON();
                    
                    $('#tamim_footer_logo_url').val(attachment.url);
                    $('#tamim_footer_logo_display').val(attachment.url);
                    
                    $('#tamim_footer_logo_preview').html(
                        '<img src="' + attachment.url + '" alt="Logo Preview" style="max-width: 200px; max-height: 100px; border: 1px solid #ddd; padding: 5px;" />'
                    ).show();
                    
                    if (!$('#tamim_remove_footer_logo').length) {
                        $('#tamim_upload_footer_logo').after(
                            '<button type="button" class="button" id="tamim_remove_footer_logo" style="color: #dc3232;">🗑️ Remove</button>'
                        );
                    }
                });
                
                mediaFrame.open();
            });
            
            $(document).on('click', '#tamim_remove_footer_logo', function(e) {
                e.preventDefault();
                $('#tamim_footer_logo_url').val('');
                $('#tamim_footer_logo_display').val('');
                $('#tamim_footer_logo_preview').hide().html('');
                $(this).remove();
            });
        }
        
        // Initialize footer logo uploader
        if ($('#tamim_upload_footer_logo').length) {
            initFooterLogoUploader();
        }
    });
    </script>
    <?php
}

/**1️⃣ Register Footer Settings*/
function tamim_register_footer_settings() {
    // Use the same option group as header
    register_setting('tamim_themes_options_groups', 'tamims_options', 'tamims_registers_options_sanitizes');

    // Add Section
    add_settings_section(
        'footer_section',
        'Footer Settings',
        'tamim_footers_section_cb',
        'tamim_footer_options'
    );

    // Add Fields
    $fields = array(
        array('top_footer_enable', 'Enable Top Footer'),
        array('copyright_enable', 'Enable Bottom Footer (Copyright)'),
        array('footer_title', 'Website Title'),
        array('footer_logo', 'Footer Logo'),
        array('footer_address', 'Address'),
        array('useful_links_title', 'Useful Links Title'),
        array('useful_links_menu', 'Useful Links Menu'),
        array('quick_links_title', 'Quick Links Title'),
        array('quick_links_menu', 'Quick Links Menu'),
        array('contact_title', 'Contact Title'),
        array('contact_phone', 'Phone Number'),
        array('contact_email', 'Email Address'),
        array('contact_address', 'Contact Address'),
        array('footer_bg_color', 'Background Color'),
        array('footer_text_color', 'Text Color'),
        array('footer_link_color', 'Link Color'),
        array('footer_copyright', 'Copyright Text'),
    );

    foreach ($fields as $field) {
        add_settings_field(
            $field[0],
            $field[1],
            'tamim_footer_' . $field[0] . '_cb',
            'tamim_footer_options',
            'footer_section'
        );
    }
}
add_action('admin_init', 'tamim_register_footer_settings');

/** 2️⃣ Section Callback*/
function tamim_footers_section_cb() {
    echo '<p>Customize your footer with Useful Links, Quick Links and Contact Information.</p>';
}

/** 3️⃣ Field Callbacks */

// Enable/Disable Top Footer
function tamim_footer_top_footer_enable_cb() {
    $options = get_option('tamims_options');
    $enabled = isset($options['top_footer_enable']) ? $options['top_footer_enable'] : '1';
    ?>
    <label>
        <input type="checkbox" 
               name="tamims_options[top_footer_enable]" 
               value="1" 
               <?php checked('1', $enabled); ?> />
        Show Top Footer (Logo, Links, Contact)
    </label>
    <p class="description">Uncheck to hide top footer section.</p>
    <?php
}

// Enable/Disable Bottom Footer
function tamim_footer_copyright_enable_cb() {
    $options = get_option('tamims_options');
    $enabled = isset($options['copyright_enable']) ? $options['copyright_enable'] : '1';
    ?>
    <label>
        <input type="checkbox" 
               name="tamims_options[copyright_enable]" 
               value="1" 
               <?php checked('1', $enabled); ?> />
        Show Bottom Footer (Copyright Section)
    </label>
    <p class="description">Uncheck to hide copyright section.</p>
    <?php
}

// Website Title
function tamim_footer_footer_title_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[footer_title]" 
           value="<?php echo esc_attr($options['footer_title'] ?? 'TAMIM'); ?>" 
           style="width: 300px; padding: 8px;" 
           placeholder="TAMIM" />
    <?php
}

// Footer Logo
function tamim_footer_footer_logo_cb() {
    $options = get_option('tamims_options');
    $logo_url = $options['footer_logo'] ?? '';
    ?>
    
    <div style="margin-bottom: 15px;">
        <input type="hidden" 
               id="tamim_footer_logo_url" 
               name="tamims_options[footer_logo]" 
               value="<?php echo esc_attr($logo_url); ?>" />
        
        <input type="text" 
               id="tamim_footer_logo_display" 
               value="<?php echo esc_attr($logo_url); ?>" 
               placeholder="Logo URL will appear here" 
               readonly 
               style="width: 300px; padding: 8px; margin-right: 10px;" />
        
        <button type="button" 
                class="button" 
                id="tamim_upload_footer_logo">
            📁 Upload Logo
        </button>
        
        <?php if (!empty($logo_url)): ?>
        <button type="button" 
                class="button" 
                id="tamim_remove_footer_logo"
                style="color: #dc3232;">
            🗑️ Remove
        </button>
        <?php endif; ?>
    </div>
    
    <?php if (!empty($logo_url)): ?>
    <div id="tamim_footer_logo_preview" style="margin-top: 10px;">
        <img src="<?php echo esc_url($logo_url); ?>" 
             alt="Logo Preview" 
             style="max-width: 200px; max-height: 100px; border: 1px solid #ddd; padding: 5px;" />
    </div>
    <?php else: ?>
    <div id="tamim_footer_logo_preview" style="margin-top: 10px; display: none;"></div>
    <?php endif; ?>
    
    <p class="description">Click "Upload Logo" to select image from media library.</p>
    <?php
}

// Address
function tamim_footer_footer_address_cb() {
    $options = get_option('tamims_options');
    ?>
    <textarea name="tamims_options[footer_address]" 
              rows="2"
              style="width: 80%; padding: 8px;"
              placeholder="7 No Elephant Road, Dhaka"><?php 
              echo esc_textarea($options['footer_address'] ?? '7 No Elephant Road, Dhaka'); 
    ?></textarea>
    <?php
}

// Useful Links Title
function tamim_footer_useful_links_title_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[useful_links_title]" 
           value="<?php echo esc_attr($options['useful_links_title'] ?? 'Useful Links'); ?>" 
           style="width: 300px; padding: 8px;" 
           placeholder="Useful Links" />
    <?php
}

// Useful Links Menu
function tamim_footer_useful_links_menu_cb() {
    $options = get_option('tamims_options');
    $selected_menu = $options['useful_links_menu'] ?? '';
    
    // Get all WordPress menus
    $menus = wp_get_nav_menus();
    ?>
    <select name="tamims_options[useful_links_menu]" style="width: 300px; padding: 8px;">
        <option value="">-- Select Menu --</option>
        <?php foreach ($menus as $menu): ?>
        <option value="<?php echo esc_attr($menu->term_id); ?>" 
                <?php selected($selected_menu, $menu->term_id); ?>>
            <?php echo esc_html($menu->name); ?>
        </option>
        <?php endforeach; ?>
    </select>
    <p class="description">Select a WordPress menu to display in Useful Links section.</p>
    
    <div style="margin-top: 10px;">
        <a href="<?php echo admin_url('nav-menus.php'); ?>" class="button" target="_blank">
            📝 Manage Menus
        </a>
    </div>
    <?php
}

// Quick Links Title
function tamim_footer_quick_links_title_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[quick_links_title]" 
           value="<?php echo esc_attr($options['quick_links_title'] ?? 'Quick Links'); ?>" 
           style="width: 300px; padding: 8px;" 
           placeholder="Quick Links" />
    <?php
}

// Quick Links Menu
function tamim_footer_quick_links_menu_cb() {
    $options = get_option('tamims_options');
    $selected_menu = $options['quick_links_menu'] ?? '';
    
    // Get all WordPress menus
    $menus = wp_get_nav_menus();
    ?>
    <select name="tamims_options[quick_links_menu]" style="width: 300px; padding: 8px;">
        <option value="">-- Select Menu --</option>
        <?php foreach ($menus as $menu): ?>
        <option value="<?php echo esc_attr($menu->term_id); ?>" 
                <?php selected($selected_menu, $menu->term_id); ?>>
            <?php echo esc_html($menu->name); ?>
        </option>
        <?php endforeach; ?>
    </select>
    <p class="description">Select a WordPress menu to display in Quick Links section.</p>
    
    <div style="margin-top: 10px;">
        <a href="<?php echo admin_url('nav-menus.php'); ?>" class="button" target="_blank">
            📝 Manage Menus
        </a>
    </div>
    <?php
}

// Contact Title
function tamim_footer_contact_title_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[contact_title]" 
           value="<?php echo esc_attr($options['contact_title'] ?? 'Contact Information'); ?>" 
           style="width: 300px; padding: 8px;" 
           placeholder="Contact Information" />
    <?php
}

// Phone Number
function tamim_footer_contact_phone_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[contact_phone]" 
           value="<?php echo esc_attr($options['contact_phone'] ?? '01739820399'); ?>" 
           style="width: 300px; padding: 8px;" 
           placeholder="01739820399" />
    <?php
}

// Email Address
function tamim_footer_contact_email_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="email" 
           name="tamims_options[contact_email]" 
           value="<?php echo esc_attr($options['contact_email'] ?? 'tamimiqbal896@gmail.com'); ?>" 
           style="width: 300px; padding: 8px;" 
           placeholder="tamimiqbal896@gmail.com" />
    <?php
}

// Contact Address
function tamim_footer_contact_address_cb() {
    $options = get_option('tamims_options');
    ?>
    <textarea name="tamims_options[contact_address]" 
              rows="2"
              style="width: 80%; padding: 8px;"
              placeholder="7 No Elephant Road, Dhaka"><?php 
              echo esc_textarea($options['contact_address'] ?? '7 No Elephant Road, Dhaka'); 
    ?></textarea>
    <?php
}

// Background Color
function tamim_footer_footer_bg_color_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[footer_bg_color]" 
           value="<?php echo esc_attr($options['footer_bg_color'] ?? '#1a1a1a'); ?>" 
           class="tamim-color-field"
           data-default-color="#1a1a1a" />
    <p class="description">Background color for entire footer.</p>
    <?php
}

// Text Color
function tamim_footer_footer_text_color_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[footer_text_color]" 
           value="<?php echo esc_attr($options['footer_text_color'] ?? '#ffffff'); ?>" 
           class="tamim-color-field"
           data-default-color="#ffffff" />
    <p class="description">Text color for footer content.</p>
    <?php
}

// Link Color
function tamim_footer_footer_link_color_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[footer_link_color]" 
           value="<?php echo esc_attr($options['footer_link_color'] ?? '#cccccc'); ?>" 
           class="tamim-color-field"
           data-default-color="#cccccc" />
    <p class="description">Link color in footer.</p>
    <?php
}

// Copyright Text
function tamim_footer_footer_copyright_cb() {
    $options = get_option('tamims_options');
    ?>
    <input type="text" 
           name="tamims_options[footer_copyright]" 
           value="<?php echo esc_attr($options['footer_copyright'] ?? '© 2025 TAMIM Theme. All rights reserved.'); ?>" 
           style="width: 80%; padding: 8px;" 
           placeholder="Copyright text" />
    <?php
}

/**
 * 4️⃣ Page Callback - Render Footer Settings Page
 */
function tamim_footer_options_page_cb() {
    ?>
    <div class="wrap">
        <h1>Footer Settings</h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('tamim_themes_options_groups');
            do_settings_sections('tamim_footer_options');
            submit_button('Save Changes');
            ?>
        </form>
    </div>
    <?php
}