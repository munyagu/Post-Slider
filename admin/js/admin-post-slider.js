jQuery(function ($) {
    var insSliderBtn = $('<span id="insGalleryBtn" class="button">Insert Slider</span>');
    $('#wp-content-media-buttons').append(insSliderBtn);


    if ($('#wp-content-wrap').hasClass('html-active')) {
        insSliderBtn.addClass('disabled');
    }

    $('#content-tmce').on('click', function () {
        $('#insGalleryBtn').removeClass('disabled');
    });
    $('#content-html').on('click', function () {
        $('#insGalleryBtn').addClass('disabled');
    });


    var post_slider = wp.media({
        title: "Select Slide Image",
        multiple: true,
        library: {type: "image"},
        button: {text: "Select Image"}
    });

    post_slider.on('select', function ( evt ) {

        var images = post_slider.state().get("selection");
        var ids = new Array();
        images.each(function (file) {
            ids.push(file.id);
        });

        var ids_str = '';
        if (ids.length > 0) {
            ids_str = ' ids="' + ids.join(',') + '"';
        }

        tinyMCE.execCommand('mceInsertContent', false, '[post_slider' + ids_str + ']');

    });


    insSliderBtn.on('click', function (evt) {
        evt.preventDefault();
        post_slider.open();
    });

});
