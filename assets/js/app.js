document.querySelector("#scoreSub").addEventListener("click" , sendScoreRequest);
function sendScoreRequest() {

}

document.querySelector("#sub").addEventListener("click" , send);
function send() {
  let uname = $("#floatingInput").val();
  let passw = $("#floatingPassword").val();
  let rmm = $("#remember-me").val();
  splash();
  $.get({
    url: api_server + "/login/?u=" + uname + "&p=" + passw,
    success: (txt) => {
      let text = txt.replace("" , "");
      check(text , uname , passw);
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
function check(txt , u , p) {
  if (txt === "true") {
    $("#floatingInput").removeClass("is-invalid");
    $("#floatingPassword").removeClass("is-invalid");
    $("#floatingInput").addClass("is-valid");
    $("#floatingPassword").addClass("is-valid");
    localStorage.setItem("uname" , u);
    localStorage.setItem("passw" , p);
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
