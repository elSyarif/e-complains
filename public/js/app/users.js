// Edit User
$("body").on("click", ".modal-show-edit", function(e) {
  debugger;
  e.preventDefault();
  // inisialisasi
  var me = $(this),
    url = me.attr("href"),
    title = me.attr("title");

  $("#modal-title").text(title);
  $("#modal-footer").addClass("d-none"); // tambah class hidden for modal
  $("#modal-btn-save")
    .removeClass("d-none")
    .text(me.hasClass("edit") ? "Update" : "Create"); // tambah class hidden
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

// add User
$("body").on("click", "#addUser", function(e) {
  debugger;
  e.preventDefault();
  // inisialisasi
  var me = $(this),
    url = me.attr("href"),
    title = me.attr("title");

  $("#modal-title").text(title);
  $("#modal-footer").addClass("d-none"); // tambah class hidden for modal
  $(".modal-dialog").addClass("modal-lg"); // tambah class hidden

  $.ajax({
    url: url,
    dataType: "html",
    success: function(response) {
      $("#modal-body").html(response);
    }
  });
  $("#btn-save")
    .removeClass("d-none")
    .text(me.hasClass("edit") ? "Update" : "Create");

  $("#modal").modal("show");
});

// bottom save
$("body").on("submit", "#user-Form", function(e) {
  debugger;
  e.preventDefault();
  var form = $("#modal-body form"),
    url = form.attr("action"),
    method = $("input[name=_method]").val() == undefined ? "POST" : "POST";

  // form.find(".help-block").remove();

  $.ajax({
    url: url,
    method: method,
    data: new FormData(this),
    // data: form.serialize(),
    contentType: false,
    cache: false,
    processData: false,
    success: function(response) {
      debugger;
      $.toast({
        text:
          '<i class="jq-toast-icon ti-bell"></i><p>' +
          response.message +
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
    },
    error: function(xhr) {
      debugger;
      var res = xhr.responseJSON;
      if ($.isEmptyObject(res) == false) {
        $.each(res.errors, function(key, value) {
          debugger;
          $("#" + key).after(
            '<div id="feedback" class="invalid-feedback">' + value[0] + "</div>"
          );
          $.toast({
            heading: key,
            text:
              '<i class="jq-toast-icon ti-bell"></i><p>' + value[0] + ".</p>",
            position: "top-right",
            // loaderBg: "#7a5449",
            class: "jq-has-icon jq-toast-danger",
            hideAfter: 2500,
            // stack: 6,
            showHideTransition: "fade"
          });
        });
      }
    }
  });
});
