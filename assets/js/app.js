$server = location.protocol + "//" + location.host;
var api_server = $server + "/api";
var cookies = document.cookie.split("; ");
var $_COOKIE = [];
cookies.forEach((cookie) => {
    let c = cookie.split("=");
    $_COOKIE[c[0]] = c[1];
});
var cci = setInterval(() => {
  //console.clear();
} , 100);
window.onload = () => {
  setTimeout(() => {clearInterval(cci)} , 1);
  //console.clear();
}
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
if ($_COOKIE["uname"] !==undefined || $_COOKIE["passw"] !==undefined) {}else {
}
function splash() {
    document.body.innerHTML += "<div class='splash'><img src='assets/img/loader.svg'></div>";
}
function unsplash() {
    document.querySelector(".splash").remove();
}
$("body").addClass("bg-light");
function internetError(){
  document.body.innerHTML += `
  <div class="modal-dialog internetError" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-body p-4 text-center">
        <h5 class="mb-0">خطا در بارگذاری اطلاعات</h5>
        <p class="mb-0">لطفاً اتصال خود به اینترنت را بررسی کنید</p>
      </div>
      <div class="modal-footer flex-nowrap p-0">
        <button onclick="unInternetError();" style="width: 100%;" type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right"><strong>تایید</strong></button>
      </div>
    </div>
  </div>`;
}
function Box(title , value , cls){
  document.body.innerHTML += `
  <div class="${cls}">
  <div class='drk-bg'></div>
    <div class="modal-dialog Box" role="document">
      <div class="modal-content rounded-4 shadow">
        <div class="modal-body p-4 text-center">
          <h5 class="mb-0">${title}</h5>
          <p class="mb-0">${value}</p>
        </div>
        <div class="modal-footer flex-nowrap p-0">
          <button onclick="unBox('${cls}');" style="width: 100%;" type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right"><strong>تایید</strong></button>
        </div>
      </div>
    </div>
  </div>`;
}
function noneTitleBox(value , cls){
  document.body.innerHTML += `
  <div class="Box modal-dialog Box ${cls}" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-body p-4 text-center">
        <p class="mb-0">${value}</p>
      </div>
      <div class="modal-footer flex-nowrap p-0">
        <button onclick="unBox('${cls}');" style="width: 100%;" type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right"><strong>تایید</strong></button>
      </div>
    </div>
  </div>`;
}
function unBox(cls) {
  document.querySelector("." + cls).remove();
}
window.onOnline = () => {
  unInternetError();
}
window.onOffline = () => {
  internetError();
}
function unInternetError() {
  if (navigator.onLine === "true") {
    if (document.querySelector(".internetError") !==null) {
      document.querySelector(".internetError").remove();
    }
  }else {
    if (document.querySelector(".internetError") !==null) {
      document.querySelector(".internetError").remove();
    }
    internetError();
  }
}
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
    location.assign("/dashboard/");
  } else {
    $("#floatingInput").removeClass("is-valid");
    $("#floatingPassword").removeClass("is-valid");
    $("#floatingInput").addClass("is-invalid");
    $("#floatingPassword").addClass("is-invalid");
  }
}
if (document.querySelector("#scoreSub") !== null) {
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
}
if (location.pathname === "login/" || location.pathname === "login") {} else {
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
