/*sidebar toggle*/
function sidebarToggle(){
    var sidebar = document.getElementById('sidebar');
    var overlay = document.getElementById('overlay');
    sidebar.classList.toggle("sidebar-open");
    sidebar.classList.toggle("sidebar-closed");
    overlay.classList.toggle("overlay-open");
    overlay.classList.toggle("overlay-closed");
}
/*end*/