console.log(document.getElementsByClassName("nav-link--add"));
if (window.location.pathname == "/add-recipe") {
    document.getElementsByClassName("nav-link--add")[0].classList.add("active");
} else if (window.location.pathname == "/") {
    document
        .getElementsByClassName("nav-link--list")[0]
        .classList.add("active");
}
