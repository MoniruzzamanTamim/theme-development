<?php
/*
* This template for displaying the Footer
*/
/*
@Package TAMIM Theme
====================================
        FOOTER SETTINGS FUNCTIONS
====================================
*/
?>

<?php
    $options = get_option('tamims_options');
    
    // Check if top footer and bottom footer are enabled
    $top_footer_enabled = isset($options['top_footer_enable']) ? $options['top_footer_enable'] : '1';
    $bottom_footer_enabled = isset($options['copyright_enable']) ? $options['copyright_enable'] : '1';
    
    // If both are disabled, don't show anything
    if ($top_footer_enabled != '1' && $bottom_footer_enabled != '1') {
        return;
    }
    
    // Get values with defaults
    $title = $options['footer_title'] ?? 'TAMIM';
    $logo = $options['footer_logo'] ?? '';
    $address = $options['footer_address'] ?? '7 No Elephant Road, Dhaka';
    
    // Menu IDs
    $useful_links_menu_id = $options['useful_links_menu'] ?? '';
    $quick_links_menu_id = $options['quick_links_menu'] ?? '';
    
    // Titles
    $useful_title = $options['useful_links_title'] ?? 'Useful Links';
    $quick_title = $options['quick_links_title'] ?? 'Quick Links';
    
    // Contact Information
    $contact_title = $options['contact_title'] ?? 'Contact Information';
    $phone = $options['contact_phone'] ?? '01739820399';
    $email = $options['contact_email'] ?? 'tamimiqbal896@gmail.com';
    $contact_address = $options['contact_address'] ?? '7 No Elephant Road, Dhaka';
    
    // Colors
    $bg_color = $options['footer_bg_color'] ?? '#1a1a1a';
    $text_color = $options['footer_text_color'] ?? '#ffffff';
    $link_color = $options['footer_link_color'] ?? '#cccccc';
    $copyright = $options['footer_copyright'] ?? '© 2025 TAMIM Theme. All rights reserved.';
    
    // Custom Walker Class for Footer Menu
    class TAMIM_Footer_Menu_Walker extends Walker_Nav_Menu {
        private $link_color;
        
        public function __construct($link_color) {
            $this->link_color = $link_color;
        }
        
        function start_lvl(&$output, $depth = 0, $args = null) {
            // We don't want submenus in footer
            return;
        }
        
        function end_lvl(&$output, $depth = 0, $args = null) {
            // We don't want submenus in footer
            return;
        }
        
        function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
            if ($depth > 0) return; // Don't show submenu items
            
            $indent = ($depth) ? str_repeat("\t", $depth) : '';
            
            $class_names = $value = '';
            $classes = empty($item->classes) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;
            
            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
            
            $output .= $indent . '<li' . $class_names .'>';
            
            $atts = array();
            $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
            $atts['target'] = !empty($item->target)     ? $item->target     : '';
            $atts['rel']    = !empty($item->xfn)        ? $item->xfn        : '';
            $atts['href']   = !empty($item->url)        ? $item->url        : '';
            
            $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);
            
            $attributes = '';
            foreach ($atts as $attr => $value) {
                if (!empty($value)) {
                    $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }
            
            $item_output = '<a'. $attributes .' style="color: ' . esc_attr($this->link_color) . ' !important; text-decoration: none !important;">';
            $item_output .= apply_filters('the_title', $item->title, $item->ID);
            $item_output .= '</a>';
            
            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        }
        
        function end_el(&$output, $item, $depth = 0, $args = null) {
            if ($depth > 0) return; // Don't show submenu items
            $output .= "</li>\n";
        }
    }
?>

<!-- Footer Page CSS Start Here........... -->
<style>
.theme-footer-section {
    background: <?php echo esc_attr($bg_color); ?> !important;
    color: <?php echo esc_attr($text_color); ?> !important;
}

<?php if ($top_footer_enabled == '1'): ?>
.theme-footer-section {
    padding: 86px <?php echo $bottom_footer_enabled == '1' ? '20px' : '0'; ?> 20px  !important;
}


.container.top-footer {
    padding-bottom: <?php echo $bottom_footer_enabled == '1' ? '46px' : '0'; ?> !important;
}

.footer_logo_section h2,
.footer-menu-two h3,
.footer-address-section h3 {
    color: <?php echo esc_attr($text_color); ?> !important;
}

.footer_logo_section p {
    color: <?php echo esc_attr($link_color); ?> !important;
}

.footer-menu-two a,
.footer-address-section a {
    color: <?php echo esc_attr($link_color); ?> !important;
    text-decoration: none !important;
    transition: all 0.3s ease;
}

.footer-menu-two a:hover,
.footer-address-section a:hover {
    color: <?php echo esc_attr($text_color); ?> !important;
    text-decoration: underline !important;
    padding-left: 5px;
}

.footer_logo_section img {
    max-width: 150px;
    max-height: 80px;
    margin-bottom: 5px;
}

.footer_logo_section h2 {
    margin-bottom: 5px;
    font-size: 24px;
}
.footer-social{
    padding: 0  0 25px   0;
}


.footer-menu-two h3,
.footer-address-section h3 {
    margin-bottom: 25px;
    padding-bottom: 10px;
    border-bottom: 2px solid rgba(255, 255, 255, 0.3);
    font-size: 18px;
}

.footer-menu-two ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-menu-two li {
    margin-bottom: 12px;
}

.footer-address-section > div {
    margin-bottom: 15px;
    display: flex;
    align-items: flex-start;
}

.footer-address-section span {
    margin-right: 10px;
    min-width: 20px;
}
<?php endif; ?>

<?php if ($bottom_footer_enabled == '1'): ?>
.buttom-footer-content {
    padding: 16px 0;
    border-top: 1px solid rgba(255, 255, 255, 0.2);
}

.buttom-footer-content p {
    color: <?php echo esc_attr($link_color); ?> !important;
    margin: 0;
    opacity: 0.8;
    font-size: 14px;
}
<?php endif; ?>
</style>

<!-- Footer Page CSS End Here........... -->
<!-- Footer Page Responsive CSS Start Here........... -->
<style>
    @media (min-width: 768px) and (max-width: 991.98px) { 
        .theme-footer-section {
    padding: 40px 12px 11px  !important;
} 
    }
@media (max-width: 575.98px) {
.theme-footer-section {
    padding: 40px 12px 11px  !important;
} 
 .footer-menu-two h3, .footer-address-section h3 {
    margin-bottom: 7px;
    padding-bottom: 10px;
}
.footer-menu-two li {
    margin-bottom: 9px;
}
.footer-menu-two h3, .footer-address-section h3 {
    margin-bottom: 7px;
    padding-bottom: 10px;
    display: inline-block;
    border-color: white;
}
    }
</style>
<!-- Footer Page Responsive CSS End Here........... -->


<footer class="theme-footer-section">
    
    <!-- Top Footer Section - Only if enabled -->
    <?php if ($top_footer_enabled == '1'): ?>
    <div class="container top-footer">
        <div class="row">
            <!-- Column 1: Logo/Title/Address -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="footer_logo_section">
                    <?php if (!empty($logo)): ?>
                    <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr($title); ?>">
                    <?php endif; ?>
                    <h2><?php echo esc_html($title); ?></h2>
                    <p><?php echo nl2br(esc_html($address)); ?></p>
                    <div class="social-media footer-social">
                    <span><i class="fa fa-facebook"></i></span>
                    <span><i class="fa fa-linkedin"></i></span>
                    <span><i class="fa fa-briefcase"></i></span>
                    <span>
                    <span><i class="fa fa-twitter"></i></span>
                    </div>
                </div>
            </div>
            
            <!-- Column 2: Useful Links Menu -->
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4">
                <div class="footer-menu-two">
                    <h3><?php echo esc_html($useful_title); ?></h3>
                    <?php if (!empty($useful_links_menu_id)): 
                        // Display WordPress menu
                        wp_nav_menu(array(
                            'menu' => $useful_links_menu_id,
                            'container' => false,
                            'menu_class' => 'useful-links-menu',
                            'fallback_cb' => function() use ($link_color) {
                                echo '<p style="color: ' . esc_attr($link_color) . '; opacity: 0.8;">No menu items found. Please add items to your menu.</p>';
                            },
                            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                            'depth' => 1,
                            'walker' => new TAMIM_Footer_Menu_Walker($link_color)
                        ));
                    else: ?>
                    <p style="color: <?php echo esc_attr($link_color); ?>; opacity: 0.8;">
                        No menu selected. Please select a menu from Footer Settings.
                    </p>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Column 3: Quick Links Menu -->
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4">
                <div class="footer-menu-two">
                    <h3><?php echo esc_html($quick_title); ?></h3>
                    <?php if (!empty($quick_links_menu_id)): 
                        // Display WordPress menu
                        wp_nav_menu(array(
                            'menu' => $quick_links_menu_id,
                            'container' => false,
                            'menu_class' => 'quick-links-menu',
                            'fallback_cb' => function() use ($link_color) {
                                echo '<p style="color: ' . esc_attr($link_color) . '; opacity: 0.8;">No menu items found. Please add items to your menu.</p>';
                            },
                            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                            'depth' => 1,
                            'walker' => new TAMIM_Footer_Menu_Walker($link_color)
                        ));
                    else: ?>
                    <p style="color: <?php echo esc_attr($link_color); ?>; opacity: 0.8;">
                        No menu selected. Please select a menu from Footer Settings.
                    </p>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Column 4: Contact Information -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="footer-address-section">
                    <h3><?php echo esc_html($contact_title); ?></h3>
                    
                    <?php if (!empty($phone)): ?>
                    <div class="contact-phone">
                        <span>📞</span>
                        <a href="tel:<?php echo esc_attr($phone); ?>" style="color: <?php echo esc_attr($link_color); ?> !important;">
                            <?php echo esc_html($phone); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($email)): ?>
                    <div class="contact-email">
                        <span>✉️</span>
                        <a href="mailto:<?php echo esc_attr($email); ?>" style="color: <?php echo esc_attr($link_color); ?> !important;">
                            <?php echo esc_html($email); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($contact_address)): ?>
                    <div class="contact-address">
                        <span>📍</span>
                        <div style="color: <?php echo esc_attr($link_color); ?>; opacity: 0.8;">
                            <?php echo nl2br(esc_html($contact_address)); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    
    <!-- Bottom Footer Section (Copyright) - Only if enabled -->
    <?php if ($bottom_footer_enabled == '1'): ?>
    <div class="container-fluid buttom-footer-section">
        <div class="row">
            <div class="col-xl-12">
                <div class="buttom-footer-content text-center">
                    <p><?php echo esc_html($copyright); ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    
</footer>

<!-- Footer Section END -->

<?php wp_footer(); ?>
</body>
</html>


