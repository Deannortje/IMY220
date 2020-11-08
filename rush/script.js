$(() => {

    $("div.cardStyle>form.commentForm").hide();
    $("div.cardStyle>form.reportType").hide();

    $("button.comment").hover(function(){
        event.preventDefault();
        $("button.comment>i").remove();
        $("button.comment").html("C O M M E N T");


    }, function() {

        $("button.comment").html("<i class=\"far fa-comment-alt\"></i>");

    });

    $("button.comment").on("click", event=>{
        event.preventDefault();
        $("div.cardStyle>p.paragraph2").hide();
        $("div.cardStyle>form.commentForm").show();
    });

    $("div.cardStyle").mouseleave( function(){
        $("div.cardStyle>p").show();
        $("div.cardStyle>form").hide();

    });


    $("button.report").hover(function(){
        event.preventDefault();
        $("button.report>i").remove();
        $("button.report").html("R E P O R T");


    }, function() {

        $("button.report").html("<i class=\"far fa-flag\"></i>");

    });

    $("button.report").on("click", event=>{
        event.preventDefault();
        $("div.cardStyle>p.paragraph2").hide();
        $("div.cardStyle>form.reportType").show();

    });




});