
<!-- ADMIN TOP HEADER NAVBAR -->

<header class="headerMenu сlearfix sb-page-header">
    
        
        
        <style type="text/css">
        .navbar-brand {
    font-family: inherit;
    color: #323f52;
    height: inherit;
    padding: 0px;
    line-height: 0px;
    font-weight: lighter;
    font-size: 25px;
}
.icon-ver
{
    font-weight: 900;
}

.sidenav-menu-heading
{
padding: 1.75rem 1rem 0.75rem;
    font-size: 0.7rem;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: rgba(255, 255, 255, 0.25);
}

    </style>
    <div class="nav-header">
        <a class="navbar-brand" href="">
            <img src="Design/images/barbershop_logo.png">
        </a>
        
    </div>
    <div class="nav-controls top-nav">
        <ul class="nav top-menu" style="align-items: center;">
            <li id="user-btn" class="main-li dropdown" style="background:none;margin-right: 20px">
                <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i>
            <span class="username">Lock and Key</span>
            <b class="caret"></b>
        </a>
        
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="users.php?do=Edit&userid=<?php echo $_SESSION['admin_id_barbershop_Xw211qAAsq4'] ?>">
                <i class="fas fa-user-cog"></i>
                <span style="padding-left:6px">
                    Edit Profile
                </span>
            </a>
            <a class="dropdown-item" href="settings.php">
                <i class="fas fa-cogs"></i>
                <span style="padding-left:6px">
                    Website Settings
                </span>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">
                <i class="fas fa-sign-out-alt"></i>
                <span style="padding-left:6px">
                    Logout
                </span>
            </a>
        </div>
    </div>
            </li>
            <li class="main-li webpage-btn">
                <a class="view-website-button " href="../index.php" target="_blank">
                    <i class="fas fa-binoculars"></i>
                    <span>View website</span>
                </a>
            </li>
            
        </ul>
    </div>
    
</header>


<!-- END NAVBAR SECTION -->


<!---------------------------- VERTICAL MENU ---------------------------->

<aside class="vertical-menu" id="vertical-menu">
    <div>
        <ul class="menu-bar">
            <div class="sidenav-menu-heading">
                Core
            </div>
            <li>
                <a href="dashboard.php" class="a-verMenu dashboard_link">
                    <i class="fas fa-tachometer-alt icon-ver"></i>
                    <span style="padding-left:6px;">Dashboard</span>
                </a>
            </li>
            <div class="sidenav-menu-heading">
                Services & Samples
            </div>
            <li>
                <a href="service_categories.php" class="a-verMenu service_categories_link">
                    <i class="fas fa-list icon-ver"></i>
                    <span style="padding-left:6px;">Service Categories</span>
                </a>
            </li>
            <li>
                <a href="services.php" class="a-verMenu services_link">
                    <i class="bs bs-scissors-1 icon-ver"></i>
                    <span style="padding-left:6px;">Services</span>
                </a>
            </li>
            <li>
                <a href="samples.php" class="a-verMenu gallery_link">
                    <i class="far fa-image icon-ver"></i>
                    <span style="padding-left:6px;">Samples</span>
                </a>
            </li>
            <div class="sidenav-menu-heading">
                Clients & Staff
            </div>
            <li>
                <a href="clients.php" class="a-verMenu clients_link">
                    <i class="far fa-address-card icon-ver"></i>
                    <span style="padding-left:6px;">Clients</span>
                </a>
            </li>
            <li>
                <a href="employees.php" class="a-verMenu employees_link">
                    <i class="far fa-user icon-ver"></i>
                    <span style="padding-left:6px;">Employees</span>
                </a>
            </li>
            <li>
                <a href="employees_schedule.php" class="a-verMenu employees_schedule_link">
                    <i class="fas fa-calendar-week icon-ver"></i>
                    <span style="padding-left:6px;">Employees Schedule</span>
                </a>
            </li>
        </ul>
    </div>
</aside>



<!----------------------------- END VERTICAL MENU ----------------------->




<!-- START BODY CONTENT  -->

<div id="content" style="margin-left:240px;"> 
    <section class="content-wrapper" style="width: 100%;
    padding: 100px 0 0;">
        <div class="inside-page" style="padding:0px 20px">
            <div class="page_title_top" style="margin-bottom: 1.5rem!important;">
                <h1 style="color: #5a5c69!important;font-size: 1.75rem;font-weight: 400;line-height: 1.2;">
                    <?php echo $pageTitle; ?>
                </h1>
            </div>