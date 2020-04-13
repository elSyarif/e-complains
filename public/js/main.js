$(document).ready(function() {
  // memo Notif Tiket
  setInterval(function() {
    $.ajax({
      url: "getTiket",
      dataType: "json",
      success: function(res) {
        // serting waktu
        if (res.status == true) {
          var oneDay = 24 * 60 * 60 * 1000;

          var hari = new Date().getDate(),
            bulan = new Date().getMonth() + 1,
            tahun = new Date().getFullYear();

          var now = tahun + "-" + bulan + "-" + hari;
          var time = new Date(now);

          var html = "";
          var counts = res.message.length;
          if (res.count != 0) {
            $("div")
              .find('a[class="dropdown-item notif"]')
              .each(function() {
                $(this).remove();
              });
            $("div")
              .find('div[class="dropdown-divider"]')
              .each(function() {
                $(this).remove();
              });
            $("a")
              .find(
                'span[class="badge badge-primary badge-indicator badge-indicator-sm badge-pill pulse"]'
              )
              .each(function() {
                $(this).remove();
              });
            for (i = 0; i < counts; i++) {
              var tgl_1 = new Date(res.message[i].created_at);
              var dif = Math.round(
                Math.round((time.getTime() - tgl_1.getTime()) / oneDay)
              );
              $("#notif-bar").append(
                '<a href="create-memo" data-id="' +
                  res.message[i].id +
                  '" data-role="' +
                  res.role +
                  '" id="notif-item" class="dropdown-item notif">' +
                  '<div class="media">' +
                  '<div class="media-img-wrap">' +
                  '<div class="avatar avatar-sm">' +
                  '<span class="avatar-text avatar-text-warning rounded-circle">' +
                  '<span class="initial-wrap">' +
                  '<span><i class="zmdi zmdi-notifications font-18"></i></span>' +
                  "</span>" +
                  "</span>" +
                  "</div>" +
                  "</div>" +
                  '<div class="media-body">' +
                  "<div>" +
                  '<div class="notifications-text"><strong>' +
                  res.message[i].jenis_complain +
                  " " +
                  res.message[i].kode +
                  "</strong><br>" +
                  res.message[i].description +
                  "</div>" +
                  '<div class="notifications-time">' +
                  dif +
                  "d </div>" +
                  "</div></div></div></a>"
              );
            }
            $(".dropdown-item notif").after(
              '<div class="dropdown-divider"></div>'
            );
            $(".badge-wrap").append(
              '<span class="badge badge-primary badge-indicator badge-indicator-sm badge-pill pulse"></span>'
            );
          } else {
            $("a")
              .find(
                'span[class="badge badge-primary badge-indicator badge-indicator-sm badge-pill pulse"]'
              )
              .each(function() {
                $(this).remove();
              });
            $("div")
              .find('a[class="dropdown-item"]')
              .each(function() {
                $(this).remove();
              });
            $("div")
              .find('a[class="dropdown-item notif"]')
              .each(function() {
                $(this).remove();
              });
          }
        }
      }
    });
  }, 2000);
  // memo Notif Memo
  setInterval(function() {
    $.ajax({
      url: "getMemo",
      dataType: "json",
      success: function(res) {
        // serting waktu
        if (res.status == true) {
          var oneDay = 24 * 60 * 60 * 1000;

          var hari = new Date().getDate(),
            bulan = new Date().getMonth() + 1,
            tahun = new Date().getFullYear();

          var now = tahun + "-" + bulan + "-" + hari;
          var time = new Date(now);

          var html = "";
          var counts = res.message.length;
          if (res.count != 0) {
            $("div")
              .find('a[class="dropdown-item notif-memo"]')
              .each(function() {
                $(this).remove();
              });
            $("div")
              .find('div[class="dropdown-divider"]')
              .each(function() {
                $(this).remove();
              });
            $("a")
              .find(
                'span[class="badge badge-primary badge-indicator badge-indicator-sm badge-pill pulse"]'
              )
              .each(function() {
                $(this).remove();
              });
            for (i = 0; i < counts; i++) {
              var tgl_1 = new Date(res.message[i].created_at);
              var dif = Math.round(
                Math.round((time.getTime() - tgl_1.getTime()) / oneDay)
              );
              $("#notif-bar2").append(
                '<a href="detail-memo" data-id="' +
                  res.message[i].id +
                  '" data-role="' +
                  res.role +
                  '" id="notif-memo" class="dropdown-item notif-memo">' +
                  '<div class="media">' +
                  '<div class="media-img-wrap">' +
                  '<div class="avatar avatar-sm">' +
                  '<span class="avatar-text avatar-text-info rounded-circle">' +
                  '<span class="initial-wrap">' +
                  '<span><i class="zmdi zmdi-notifications font-18"></i></span>' +
                  "</span>" +
                  "</span>" +
                  "</div>" +
                  "</div>" +
                  '<div class="media-body">' +
                  "<div>" +
                  '<div class="notifications-text"><strong>' +
                  res.message[i].auto_kode +
                  "  -" +
                  res.message[i].kode +
                  "</strong><br>" +
                  res.message[i].pesan +
                  "</div>" +
                  '<div class="notifications-time">' +
                  dif +
                  "d </div>" +
                  "</div></div></div></a>"
              );
            }
            $(".dropdown-item notif-memo").after(
              '<div class="dropdown-divider"></div>'
            );
            $(".badge-wrap").append(
              '<span class="badge badge-primary badge-indicator badge-indicator-sm badge-pill pulse"></span>'
            );
          } else {
            $("a")
              .find(
                'span[class="badge badge-primary badge-indicator badge-indicator-sm badge-pill pulse"]'
              )
              .each(function() {
                $(this).remove();
              });
            $("div")
              .find('a[class="dropdown-item"]')
              .each(function() {
                $(this).remove();
              });
            $("div")
              .find('a[class="dropdown-item notif-memo"]')
              .each(function() {
                $(this).remove();
              });
          }
        }
      }
    });
  }, 2000);
  // produk notif to pmqa
  setInterval(function() {
    $.ajax({
      url: "getProduct",
      dataType: "json",
      success: function(res) {
        // serting waktu
        if (res.status == true) {
          var oneDay = 24 * 60 * 60 * 1000;

          var hari = new Date().getDate(),
            bulan = new Date().getMonth() + 1,
            tahun = new Date().getFullYear();

          var now = tahun + "-" + bulan + "-" + hari;
          var time = new Date(now);

          var html = "";
          var counts = res.message.length;
          if (res.count != 0) {
            $("div")
              .find('a[class="dropdown-item notif-pmqa"]')
              .each(function() {
                $(this).remove();
              });
            $("div")
              .find('div[class="dropdown-divider"]')
              .each(function() {
                $(this).remove();
              });
            $("a")
              .find(
                'span[class="badge badge-primary badge-indicator badge-indicator-sm badge-pill pulse"]'
              )
              .each(function() {
                $(this).remove();
              });
            for (i = 0; i < counts; i++) {
              var tgl_1 = new Date(res.message[i].created_at);
              var dif = Math.round(
                Math.round((time.getTime() - tgl_1.getTime()) / oneDay)
              );
              $("#notif-bar3").append(
                '<a href="produck-cek" data-id="' +
                  res.message[i].id +
                  '" data-role="' +
                  res.role +
                  '" id="notif-pmqa" class="dropdown-item notif-pmqa">' +
                  '<div class="media">' +
                  '<div class="media-img-wrap">' +
                  '<div class="avatar avatar-sm">' +
                  '<span class="avatar-text avatar-text-danger rounded-circle">' +
                  '<span class="initial-wrap">' +
                  '<span><i class="zmdi zmdi-notifications font-18"></i></span>' +
                  "</span>" +
                  "</span>" +
                  "</div>" +
                  "</div>" +
                  '<div class="media-body">' +
                  "<div>" +
                  '<div class="notifications-text"><strong>' +
                  res.message[i].result +
                  "  -" +
                  res.message[i].kode +
                  "</strong><br>" +
                  res.message[i].pesan +
                  "</div>" +
                  '<div class="notifications-time">' +
                  dif +
                  "d </div>" +
                  "</div></div></div></a>"
              );
            }
            $(".dropdown-item notif-pmqa").after(
              '<div class="dropdown-divider"></div>'
            );
            $(".badge-wrap").append(
              '<span class="badge badge-primary badge-indicator badge-indicator-sm badge-pill pulse"></span>'
            );
          } else {
            $("a")
              .find(
                'span[class="badge badge-primary badge-indicator badge-indicator-sm badge-pill pulse"]'
              )
              .each(function() {
                $(this).remove();
              });
            $("div")
              .find('a[class="dropdown-item"]')
              .each(function() {
                $(this).remove();
              });
            $("div")
              .find('a[class="dropdown-item notif-pmqa"]')
              .each(function() {
                $(this).remove();
              });
          }
        }
      }
    });
  }, 2000);
  // notif direktur / manager produksi
  setInterval(function() {
    $.ajax({
      url: "getAproval",
      dataType: "json",
      success: function(res) {
        // serting waktu
        if (res.status == true) {
          var oneDay = 24 * 60 * 60 * 1000;

          var hari = new Date().getDate(),
            bulan = new Date().getMonth() + 1,
            tahun = new Date().getFullYear();

          var now = tahun + "-" + bulan + "-" + hari;
          var time = new Date(now);

          var html = "";
          var counts = res.message.length;
          if (res.count != 0) {
            $("div")
              .find('a[class="dropdown-item notif-approval"]')
              .each(function() {
                $(this).remove();
              });
            $("div")
              .find('div[class="dropdown-divider"]')
              .each(function() {
                $(this).remove();
              });
            $("a")
              .find(
                'span[class="badge badge-primary badge-indicator badge-indicator-sm badge-pill pulse"]'
              )
              .each(function() {
                $(this).remove();
              });
            for (i = 0; i < counts; i++) {
              var tgl_1 = new Date(res.message[i].updated_at);
              var dif = Math.round(
                Math.round((time.getTime() - tgl_1.getTime()) / oneDay)
              );
              $("#notif-bar3").append(
                '<a href="result-inspeck" data-id="' +
                  res.message[i].id +
                  '" data-role="' +
                  res.role +
                  '" id="notif-pmqa" class="dropdown-item notif-approval">' +
                  '<div class="media">' +
                  '<div class="media-img-wrap">' +
                  '<div class="avatar avatar-sm">' +
                  '<span class="avatar-text avatar-text-danger rounded-circle">' +
                  '<span class="initial-wrap">' +
                  '<span><i class="zmdi zmdi-notifications font-18"></i></span>' +
                  "</span>" +
                  "</span>" +
                  "</div>" +
                  "</div>" +
                  '<div class="media-body">' +
                  "<div>" +
                  '<div class="notifications-text"><strong>' +
                  res.message[i].jenis_complain +
                  "  -" +
                  res.message[i].kode +
                  "</strong><br>" +
                  res.message[i].description +
                  "</div>" +
                  '<div class="notifications-time">' +
                  dif +
                  "d </div>" +
                  "</div></div></div></a>"
              );
            }
            $(".dropdown-item notif-approval").after(
              '<div class="dropdown-divider"></div>'
            );
            $(".badge-wrap").append(
              '<span class="badge badge-primary badge-indicator badge-indicator-sm badge-pill pulse"></span>'
            );
          } else {
            $("a")
              .find(
                'span[class="badge badge-primary badge-indicator badge-indicator-sm badge-pill pulse"]'
              )
              .each(function() {
                $(this).remove();
              });
            $("div")
              .find('a[class="dropdown-item"]')
              .each(function() {
                $(this).remove();
              });
            $("div")
              .find('a[class="dropdown-item notif-approval"]')
              .each(function() {
                $(this).remove();
              });
          }
        }
      }
    });
  }, 2000);
  // setup token
  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
  });
  // notif tiket item detail
  $("body").on("click", "#notif-item", function(e) {
    debugger;
    e.preventDefault();
    var role = $(this).attr("data-role");
    var id = $(this).attr("data-id");

    if (role == 2 || role == 3) {
      window.open("memo-" + id, "_self");
    } else {
      window.open("list-memo", "_self");
    }
  });

  // tiket detail
  $("body").on("click", "#notif-memo", function(e) {
    debugger;
    e.preventDefault();
    var role = $(this).attr("data-role");
    var id = $(this).attr("data-id");
    var url = $(this).attr("href");
    // if (role == 2 || role == 3) {
    window.open(url + "-" + id, "_self");
    // } else {
    //     window.open('list-memo', '_self');
    // }
  });
  // data tiket jadikan memo
  $("body").on("click", ".modal-show", function(e) {
    e.preventDefault();
    debugger;
    var url = $(this).attr("href");
    window.open(url, "_self");
  });

  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
  });
  // create new memo to all
  $("body").on("submit", "#memoForm", function(e) {
    e.preventDefault();
    debugger;
    var data = $(this).serialize();
    var kode = $("input[name=kode]").val();
    $.ajax({
      method: "post",
      url: "memo",
      data: $(this).serialize(),
      dataType: "JSON",
      success: function(res) {
        debugger;
        $.toast().reset("all");
        $("body").removeAttr("class");
        $.toast({
          text:
            '<i class="jq-toast-icon ti-bell"></i><p>' + res.message + ".</p>",
          position: "top-right",
          loaderBg: "#7a5449",
          class: "jq-has-icon jq-toast-success",
          hideAfter: 3500,
          stack: 6,
          showHideTransition: "fade"
        });
        if (res.status) {
          window.open("home", "_self");
        }
        return false;
      }
    });
  });

  $("body").on("submit", "#pmqa-cek", function(e) {
    e.preventDefault();
    $.ajax({
      url: "pmqa",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(res) {
        $.toast().reset("all");
        $("body").removeAttr("class");
        $.toast({
          text:
            '<i class="jq-toast-icon ti-bell"></i><p>' + res.message + ".</p>",
          position: "top-right",
          loaderBg: "#7a5449",
          class: "jq-has-icon jq-toast-success",
          hideAfter: 3500,
          stack: 6,
          showHideTransition: "fade"
        });
        if (res.status) {
          window.open("home", "_self");
        }
        return false;
      }
    });
  });

  $("body").on("submit", "#inspek-cek", function(e) {
    e.preventDefault();
    $.ajax({
      url: "produck",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(res) {
        debugger;
        $.toast().reset("all");
        $("body").removeAttr("class");
        $.toast({
          text:
            '<i class="jq-toast-icon ti-bell"></i><p>' + res.message + ".</p>",
          position: "top-right",
          loaderBg: "#7a5449",
          class: "jq-has-icon jq-toast-success",
          hideAfter: 3500,
          stack: 6,
          showHideTransition: "fade"
        });
        if (res.status) {
          window.open("home", "_self");
        }
        return false;
      },
      error: function(xhr) {
        debugger;
        var res = xhr.responseJSON;
        if ($.isEmptyObject(res) == false) {
          $.each(res.errors, function(key, value) {
            debugger;
            $("#" + key).append(
              '<div id="feedback" class="invalid-feedback">' +
                value[0] +
                "</div>"
            );
          });
        }
      }
    });
  });
});

(function() {
  window.addEventListener(
    "load",
    function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName("needs-validation");
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener(
          "submit",
          function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add("was-validated");
          },
          false
        );
      });
    },
    false
  );
})();
