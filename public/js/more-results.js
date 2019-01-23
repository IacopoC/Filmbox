$(document).ready(function(){
    $(".btn-more-results").click(function(){
        $(this).hide();

        let api_key = "2daef69f5e47a9f774cd8db16ffba569";

        $.ajax({
            url: "https://api.themoviedb.org/3/trending/movie/week?api_key=" + api_key + "&page=2",
            dataType:'json',
            success: function(result) {
                "use strict";
                $.each(result.results, function(index, value){
                    jQuery("#more-results").append("<div class=\"col-md-7 col-lg-3\"><a href='page-film/" + value['id'] + "'><h6 class=\"title-movie\">" + value['title'] + "</h6></a></div>");
                })
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    });
});