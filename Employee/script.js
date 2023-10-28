$(".button-collapse").sideNav();

$(".collapsible").collapsible();

$("select").material_select();

$("#myModal").on("shown.bs.modal", function () {
  $("#myInput").trigger("focus");
});
