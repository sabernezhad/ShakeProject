$(document).ready(function () {
    $("#item1Panel").hover(function () { $(this).animate({ left: '-250px' }, 500); }, function () { $(this).animate({ left: '-340px' }, 500); });
    $("#item2Panel").hover(function () { $(this).animate({ left: '-250px' }, 500); }, function () { $(this).animate({ left: '-340px' }, 500); });
    $("#item3Panel").hover(function () { $(this).animate({ left: '-250px' }, 500); }, function () { $(this).animate({ left: '-340px' }, 500); });
    $("#item4Panel").hover(function () { $(this).animate({ left: '-250px' }, 500); }, function () { $(this).animate({ left: '-340px' }, 500); });
    $("#item5Panel").hover(function () { $(this).animate({ left: '-250px' }, 500); }, function () { $(this).animate({ left: '-340px' }, 500); });
	$("#header-search-text").focus(function () {
        if ($(this).val() == "Enter Search Here...") {
            $(this).val("");
            $(this).css("font-style", "normal");
        }
    });
    $("#header-search-text").blur(function () {
        if ($(this).val() == "") {
            $(this).val("Enter Search Here...");
            $(this).css("font-style", "italic");
        }
    });
    $("#txtShareBody").focus(function () {
        if ($(this).val() == "Share what ever you want...") {
            $(this).removeClass("ShareEmpty");
            $(this).addClass("ShareNotEmpty");
            $("#share-body").css("height", "170px");
            $(this).css("height", "100px");
            $(this).val("");
        }
    });
    $("#txtShareBody").blur(function () {
        if ($(this).val() == "") {
            $(this).removeClass("ShareNotEmpty");
            $(this).addClass("ShareEmpty");
            $("#share-body").css("height", "110px")
            $(this).val("Share what ever you want...");
            $(this).css("height", "40px");
        }
    });
});