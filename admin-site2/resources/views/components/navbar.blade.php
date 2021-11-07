<nav class="bg-light shadow-sm fixed-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-9 col-sm-9">
                <button onclick="sidebarToggle()" class="btn btn-light m-1">
                    <i class="fa fa-bars"></i>
                </button>
                <span class="mt-4 pt-4">{{ config('app.name') }}</span>
            </div>
            <div class="col-3 col-sm-3">
                <div class="float-right">
                    <button class="btn btn-primary m-1">LOGOUT</button>
                </div>
            </div>
        </div>
    </div>
</nav>


<div id="sidebar" class="sidebar sidebar-closed">
    <div class="sidebar-inside">
        <button class="sidebar-btn"><i class="fa fa-home sidebar-icon"></i> Home</button>
        <button class="sidebar-btn"><i class="fa fa-list sidebar-icon"></i> Categories</button>
        <button class="sidebar-btn"><i class="fa fa-list sidebar-icon"></i> Products</button>
        <a href='{{route("socialMediaLinks")}}'><button class="sidebar-btn"><i class="fa fa-link sidebar-icon"></i> Social Media Links</button></a>
        <a href='{{route("division.manage")}}'><button class="sidebar-btn"><i class="fa fa-circle sidebar-icon"></i> Divisions</button></a>
        <a href='{{route("district.manage")}}'><button class="sidebar-btn"><i class="fa fa-circle sidebar-icon"></i> Districts</button></a>
        <a href='{{route("visitorDetails.manage")}}'><button class="sidebar-btn"><i class="fa fa-info-circle sidebar-icon"></i> Visitor Details</button></a>
    </div>
</div>
<div onclick="sidebarToggle()" id="overlay" class="overlay-closed">
</div>