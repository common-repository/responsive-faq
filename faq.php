<?php
/*
  Plugin Name:Responsive FAQ
  Plugin URI:http://www.clownfishweb.com
  Description:
  Version: 1.0
  Author: Junk Theme
  Author URI: http://www.clownfishweb.com
 */


class Bs_Ul_Accordion {

    public function Bs_Image_Instance() {
    include dirname(__FILE__) . '/inc/faq-post.php';
    include dirname(__FILE__) . '/faq-shortcode.php';
    $custom_post = new Bs_Accordion_Post('bs-ul-accorion');
    $custom_post->bs_post('bs_ul_accorion', 'Faq', 'Faqs', array('supports' => array('title','editor')));
    }

    public function bs_instance() {
        $this->Bs_Image_Instance();
    }

    public function display_bs_image_slider_metabox_shortcode($bs_image_slider) {
        ?>
        <div class="bs_price">
            <input type="text" name="bs_image_slider_shortcode[]" value="[bs_accordion id='<?= get_the_id(); ?>']" disabled></input>
        </div>

        <?php
    }


}

$var = new Bs_Ul_Accordion();
$var->bs_instance();

