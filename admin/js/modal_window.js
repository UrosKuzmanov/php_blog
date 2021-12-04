$(".del_link").on("click",function(){
    let id=$(this).attr("data")
    let query="?delete="+id
    $(".modal_link").attr("href",query)
    $("#myModal").modal("show")
    $(".modale_msg").text("Are You Sure?")

})
