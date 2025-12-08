<?php

// Header - Theme option

?>


<div id="theme_option_body">
    <div class="main_area_option">

        <h1>Theme Option</h1>
        <p>Add your <strong>TOP Header Area</strong> Information here.</p>

        <form action="options.php" method="post">
            <?php wp_nonce_field('update-options'); ?>

            <!-- Address -->
            <label for="address-info">Address Info</label>
            <input type="text" id="address-info" name="address-info" value="<?php echo esc_attr( get_option('address-info') ); ?>" placeholder="Enter Your Address">

            <!-- Email -->
            <label for="email-info">Email Info</label>
            <input type="text" id="email-info" name="email-info" value="<?php echo esc_attr( get_option('email-info') ); ?>" placeholder="Enter Your Email Address">

            <!-- Phone -->
            <label for="phone-number">Phone Number</label>
            <input type="text" id="phone-number" name="phone-number" value="<?php echo esc_attr( get_option('phone-number') ); ?>" placeholder="Enter Phone Number">
          
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="page_options" value="address-info,email-info,phone-number">

            <input type="submit" name="submit" value="<?php _e('Save Info', 'tamim-theme'); ?>">
        </form>

    </div>
</div>


<?php

function tamim_settings_page_html() {
    ?>

    <div class="wrap">
        <h1>Theme Options</h1>

        <form method="post" action="options.php">
            <?php
                // Nonce + Security + Option Group
                settings_fields('tamim_settings_group');

                // Section + Fields Output
                do_settings_sections('tamim_settings_page');

                // Save Button
                submit_button();
            ?>
        </form>
    </div>

    <?php
}


  ?>