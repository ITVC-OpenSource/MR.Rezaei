function btsErrorBox(txt , cls) {
  document.body.innerHTML += `<div class="${cls}"><div class="alert alert-danger" role="alert">${txt}</div></div>`;
}
function retBtsErrorBox(txt , cls) {
    return `<div class="${cls} alert alert-danger" role="alert">${txt}</div>`;
}
function check(txt , u , p) {
  if (txt === "true") {
    $("#floatingInput").removeClass("is-invalid");
    $("#floatingPassword").removeClass("is-invalid");
    $("#floatingInput").addClass("is-valid");
    $("#floatingPassword").addClass("is-valid");
    setCookie("uname" , u , 1);
    setCookie("passw" , p , 1);
    location.assign("/");
  } else {
    $("#floatingInput").removeClass("is-valid");
    $("#floatingPassword").removeClass("is-valid");
    $("#floatingInput").addClass("is-invalid");
    $("#floatingPassword").addClass("is-invalid");
  }
}
document.querySelector("#scoreSub").addEventListener("click" , sendScoreRequest);
function sendScoreRequest() {
  splash();
  $.get({
    url: api_server + "/send/?n=" + $(".teadad").val() + "&f=" + $(".about").val() + "&s=" + $_COOKIE["uname"] + "&p=" + $_COOKIE["passw"],
    success: (txt) => {
      unsplash();
      if (txt === "true") {
          Box("ارسال موفقیت آمیز بود." , "باید منتظر تایید کادر مدرسه باشید!" , "sendBox");
      }else {
          btsErrorBox("خطا در ارسال اطلاعات" , cls);
      }
    },
    error: () => {
        unsplash();
        noneTitleBox(retBtsErrorBox("خطا در ارسال اطلاعات" , "error-in-send-score-request") , "eissr");
    }
  });
}
if (location.pathname === "login/" || location.pathname === "login") {} else {
  document.body.classList.forEach((a) => {
    if (a === "text-secondary") {} else {
      $("body").addClass("text-secondary");
    }
  });
  document.querySelector("#sub").addEventListener("click" , send);
function send() {
  let type = $("#floatingInput").val();
  let name = $("#floatingInput").val();
  let ncode = $("#floatingInput").val();
  let uname = $("#floatingInput").val();
  let passw = $("#floatingPassword").val();
  let rmm = $("#remember-me").val();
  splash();
  $.get({
    url: api_server + "/login/?u=" + uname + "&p=" + passw,
    success: (txt) => {
      let text = txt.replace("" , "");
      check(text , type , name , ncode , uname , passw);
      unsplash();
    },
    error: () => {
      if (navigator.Online === "true") {
        net_error();
      } else {
        error_box();
      }
      unsplash();
    }
  });
}
}