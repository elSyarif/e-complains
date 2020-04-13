$("body").on("click", ".btn-show", function(e) {
  debugger;
  e.preventDefault();
  // inisialisasi
  var me = $(this),
    url = me.attr("href"),
    title = me.attr("title");

  $("#modal-title").text(title);
  $("#modal-btn-save").addClass("d-none"); // tambah class hidden
  $(".modal-dialog").addClass("modal-lg"); // tambah class hidden

  $.ajax({
    url: url,
    dataType: "html",
    success: function(response) {
      $("#modal-body").html(response);
    }
  });

  $("#modal").modal("show");
});

// edit result
$("body").on("click", ".modal-show-result", function(e) {
  debugger;
  e.preventDefault();
  // inisialisasi
  var me = $(this),
    url = me.attr("href"),
    title = me.attr("title");

  $("#modal-title").text("Approve Form");
  $(".modal-dialog").removeClass("modal-lg");
  $("#modal-btn-save")
    .removeClass("d-none")
    .text(me.hasClass("edit") ? "Approve" : "Create");

  $.ajax({
    url: url,
    dataType: "html",
    success: function(response) {
      $("#modal-body").html(response);
    }
  });

  $("#modal").modal("show");
});

$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
  }
});
$("body").on("click", "#modal-btn-save", function() {
  debugger;
  var form = $("#modal-body form"),
    url = form.attr("action"),
    method = $("input[name=_method]").val() == undefined ? "POST" : "PUT";

  $.ajax({
    url: url,
    method: method,
    data: form.serialize(),
    success: function(response) {
      debugger;
      $.toast({
        text:
          '<i class="jq-toast-icon ti-bell"></i><p>' +
          response.status +
          ".</p>",
        position: "top-right",
        loaderBg: "#7a5449",
        class: "jq-has-icon jq-toast-success",
        hideAfter: 3500,
        stack: 6,
        showHideTransition: "fade"
      });
      $("#modal").modal("hide");
      $("#myTable")
        .DataTable()
        .ajax.reload();
    }
  });
});
