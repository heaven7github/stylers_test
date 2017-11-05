var baseHref = document.getElementsByTagName('base')[0].href

$(document).ready(function () {

    $('#data_read_btn').click(function () {
        document.location.href = baseHref + 'index.php?c=dataRead';
    });

    $('#draw_tree_btn').click(function () {
        document.location.href = baseHref + 'index.php?c=drawTree';
    });

    $('#send_email_btn').click(function () {
        document.location.href = baseHref + 'index.php?c=sendEmail';
    });

    $('#start_data_read_btn').click(function () {
        document.location.href = baseHref + 'index.php?c=dataRead&a=start';
    });

    $('#send_email').click(function () {
        document.location.href = baseHref + 'index.php?c=sendEmail&a=send';
    });

    $(".list-group span").click(function(e) {
        $(this).siblings("ul").slideToggle();
        e.preventDefault();
    });

});