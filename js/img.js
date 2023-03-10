$(document).ready(function () {
    $(".myImg").click(function () {
        $images = $(this).attr('src');
        $("#myModal").css("display", "flex");
        $("#img").attr("src", $images);
    });

    $("#myModal").click(function () {
        $("#myModal").css("display", "none");
    });
});