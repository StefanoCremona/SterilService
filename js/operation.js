function showSpinner() {
    document.getElementById("spinner").style.visibility = "visible";
}
function hideSpinner() {
    setTimeout(function() {
        document.getElementById("spinner").style.visibility = "hidden";
    }, 500);
}