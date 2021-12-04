

if (sessionStorage.getItem("value") == null) {

    sessionStorage.setItem("value", true)

    $(".modale_msg").html("<p>Admin username: uros.nana</p> <p>Admin password: 111</p> <p> Please don't make changes</p>")
    $(".modal_link").remove();
    $(".modal_btn").text("Ok");
    $("#myModal").modal("show")
}
