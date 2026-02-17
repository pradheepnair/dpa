$(document).ready(function () {
  $("body").on("click", ".btn_action", function () {
    let me = $(this),
      action = me.data("action"),
      err = false,
      loader = $("#smart_loading"),
      form = me.closest("form"),
      elems = form.find(".required_field");
    console.log(action);
  });
});
