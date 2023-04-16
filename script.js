var form_reg = document.getElementById("form_reg");
var form_auto = document.getElementById("form_auto");

var log_for_log = document.getElementById("log_for_log");
var log_for_reg = document.getElementById("log_for_reg");

var pass_for_log = document.getElementById("pass_for_log");
var pass_for_reg = document.getElementById("pass_for_reg");

var btn_for_log = document.getElementById("btn_for_log");
var brn_for_reg = document.getElementById("btn_for_reg");

var log_window = document.getElementById("log_window");
var reg_window = document.getElementById("reg_window");

reg_window.onclick = function () {
    form_auto.style.display = "none";
    form_reg.style.display = "flex";

    log_for_log.style.display = "none";
    log_for_reg.style.display = "inline-block";
    pass_for_log.style.display = "none";
    pass_for_reg.style.display = "inline-block";
    btn_for_log.style.display = "none";
    btn_for_reg.style.display = "inline-block";
    log_window.style.display = "inline-block";
    reg_window.style.display = "none";
}

log_window.onclick = function () {
    form_auto.style.display = "flex";
    form_reg.style.display = "none";

    log_for_log.style.display = "inline-block";
    log_for_reg.style.display = "none";
    pass_for_log.style.display = "inline-block";
    pass_for_reg.style.display = "none";
    btn_for_log.style.display = "inline-block";
    btn_for_reg.style.display = "none";
    log_window.style.display = "none";
    reg_window.style.display = "inline-block";
}