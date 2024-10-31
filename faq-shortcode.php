<?php
class Bs_Ul_Accordion_Sh {

    public function __construct() {
        
        add_shortcode('bs_accordion', array($this, 'show_shortcode_bs_image_slider'));
        add_action('wp_enqueue_scripts', array($this, 'bs_image_slider_enqueue_scripts'));
    }

    // private function bs_image_slider($atts, $content = NULL) {
    //     extract(shortcode_atts(
    //                     array(
    //         'id' => '',
    //                     ), $atts)
    //     );
    //     $query_args = array(
    //         'p' => (!empty($id)) ? $id : -1,
    //         'posts_per_page' => -1,
    //         'post_type' => 'bs_ul_accorion',
    //         'order' => 'DESC',
    //         'orderby' => 'menu_order',
    //     );
    //     $wp_query = new WP_Query($query_args);
    //     if ($wp_query->have_posts()):while ($wp_query->have_posts()) : $wp_query->the_post();
    //             //return $data_tables = get_post_meta($id, '_bs_image_slider_group', true);
    //             return $data=$wp_query->the_post();
    //         endwhile;
    //     else: echo 'No Accordion Found';
    //     endif;
    // }

    public function show_shortcode_bs_image_slider($atts, $content = NULL) {
        extract(shortcode_atts(
                        array(
            'id' => '',
                        ), $atts)
        );
        $query_args = array(
            //'p' => (!empty($id)) ? $id : -1,
            'posts_per_page' => -1,
            'post_type' => 'bs_ul_accorion',
            'order' => 'DESC',
            'orderby' => 'menu_order',
        );
        $wp_query = new WP_Query($query_args);
        ?>
        <div class="bs_bootstrap">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel-group" id="accordion-cat-1">
       
        <?php if ($wp_query->have_posts()):while ($wp_query->have_posts()) : $wp_query->the_post();ob_start();?>
                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href=<?php echo "#".get_the_id();?>>
                                    <h4 class="panel-title">
                                        <?php the_title();?>                        
                                        <span class="pull-left"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                    </h4>
                                </a>
                            </div>
                            <div id="<?php echo get_the_id();?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?php the_content();?>
                                </div>
                            </div>
                        </div>
        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        else: echo 'No Accordion Found';
        endif;
        $content = ob_get_contents();
        ob_get_clean();
        return $content;
       
    }

    public function bs_image_slider_enqueue_scripts() {
        wp_enqueue_style('bs_custom_bootstrap', plugin_dir_url(__FILE__) . 'css/bs_bootstrap.css');
        wp_enqueue_style('bs__accordion_style', plugin_dir_url(__FILE__) . 'css/style.css');
        wp_enqueue_script('bs_accordion_js', plugin_dir_url(__FILE__) . 'js/custom.js', array('jquery'), true);
        wp_enqueue_script('bs_bootstrap_js','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',array('jquery'),true);
    }

}

new Bs_Ul_Accordion_Sh();


