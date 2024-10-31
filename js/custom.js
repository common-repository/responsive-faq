jQuery(document).ready(function() {
    jQuery('.collapse').on('show.bs.collapse', function() {
        var id = jQuery(this).attr('id');
        console.log(id);
        jQuery('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-faq');
        jQuery('a[href="#' + id + '"] .panel-title span').html('<i class="glyphicon glyphicon-chevron-down"></i>');
    });
    jQuery('.collapse').on('hide.bs.collapse', function() {
        var id = jQuery(this).attr('id');
        jQuery('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-faq');
        jQuery('a[href="#' + id + '"] .panel-title span').html('<i class="glyphicon glyphicon-chevron-right"></i>');
    });
});



	