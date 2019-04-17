$(document).ready(function(){

    let api_key = "2daef69f5e47a9f774cd8db16ffba569";

    $(".btn-more-results-trending").click(function(){
        $(this).hide();



        $.ajax({
            url: "https://api.themoviedb.org/3/trending/movie/week?api_key=" + api_key + "&page=2",
            dataType:'json',
            success: function(result) {
                "use strict";
                $.each(result.results, function(index, value){
                    let image = "<img class=\"img-poster\" src=\"https://image.tmdb.org/t/p/w200" + value['poster_path'] + "\"/>";
                    let title = "<h6 class=\"title-movie\"><strong>" + value['title'] + "</strong></h6>";

                    jQuery(".more-results").append("<div class=\"col-md-7 col-lg-3 text-center\">" +
                         "<a href='page-film/" + value['id'] + "'>" + image + title + "</a></div>");
                })
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    });

    $(".btn-more-results-upcoming").click(function() {
        $(this).hide();

        $.ajax({
            url: "https://api.themoviedb.org/3/movie/upcoming?api_key=" + api_key + "&page=2",
            dataType:'json',
            success: function(result) {
                "use strict";
                $.each(result.results, function(index, value){
                    let image = "<img class=\"img-poster\" src=\"https://image.tmdb.org/t/p/w200" + value['poster_path'] + "\"/>";
                    let title = "<h6 class=\"title-movie\"><strong>" + value['title'] + "</strong></h6>";

                    jQuery(".more-results").append("<div class=\"col-md-7 col-lg-3 text-center\">" +
                        "<a href='page-film/" + value['id'] + "'>" + image + title + "</a></div>");
                })
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }
        });

    });
});