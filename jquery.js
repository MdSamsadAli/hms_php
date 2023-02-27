$(document).ready(function () {
    $("#close-btn").click(function () {
        // remove active class from all images
        $(".small-image").removeClass('active');
        $("#show_image_popup").slideUp();
    })

    $(".small-image").click(function () {
        // remove active class from all images
        $(".small-image").removeClass('active');
        // add active class
        $(this).addClass('active');

        var image_path = $(this).attr('src');
        $("#show_image_popup").fadeOut();
        // now st this path to our popup image src
        $("#show_image_popup").fadeIn();
        $("#large-image").attr('src', image_path);

    });

});