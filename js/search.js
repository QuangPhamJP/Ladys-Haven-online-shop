function hasSelected(){
    if($("#searchBox").val().trim().length == 0){
        return false;
    }
    if($(".showProductSearch").hasClass("selected")){
        return false;
    }
    return true;
}

function showSort(){
    $("#sort-product").click(function(){
        if($(".sort-hidden").hasClass("sort-hidden")){
            $(".sort-hidden").addClass("sort-show");
            $(".sort-hidden").removeClass("sort-hidden");
        }
        else if($(".sort-show").hasClass("sort-show")){
            $(".sort-show").addClass("sort-hidden");
            $(".sort-show").removeClass("sort-show");   
        }
    });

    $(document).mouseup(function(e){
        var container = $("#sort-product");

        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0) 
        {
            if(typeof $(".sort-show") !== "underfined"){
                $(".sort-show").addClass("sort-hidden");
                $(".sort-show").removeClass("sort-show"); 
            }
        }
    });
    }

$(document).ready(function(){
    $("#searchBox").keyup(function(event){
        var txt = $(this).val();
        if(txt.length <= 1){
            $("#result").empty();
        }
        else{
            if(event.which != 32 && event.which != 38 && event.which != 39 && event.which != 40 && event.which!=37 && event.which != 13){
                $("#result").html('');
                $.ajax({
                    url: "quick_search.php",
                    method: "post",
                    data:{search:txt},
                    dataType:"text",
                    success:function(data){
                        $("#result").html(data);
                    }
                });
            }
            else{
                if(event.which == 40){
                    if(!$(".showProductSearch").hasClass("selected")){
                        $(".showProductSearch").eq(0).addClass("selected");
                    }
                    else{
                        var $index = $(".showProductSearch").filter(".selected").index();
                        $(".showProductSearch").eq($index).removeClass("selected");
                        if($index != $(".showProductSearch").length-1){
                            $(".showProductSearch").eq($index+1).addClass("selected");
                        }
                    }
                }
                if(event.which == 38){
                    if(!$(".showProductSearch").hasClass("selected")){
                        $(".showProductSearch").eq($(".showProductSearch").length - 1).addClass("selected");
                    }
                    else{
                        var $index = $(".showProductSearch").filter(".selected").index();
                        $(".showProductSearch").eq($index).removeClass("selected");
                        if($index != 0){
                            $(".showProductSearch").eq($index-1).addClass("selected");
                        }
                    }
                }
                if(event.which == 13){
                    if($(".showProductSearch").hasClass("selected")){
                        var href = $(".selected").children("a").attr("href");
                        location.href = href;
                    }
                }
            }
        }
    });
    showSort();
});