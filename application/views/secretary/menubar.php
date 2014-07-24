
<body>
  <!-- start: Header -->
  <header class="navbar">
    <div class="container">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".sidebar-nav.nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a id="main-menu-toggle" class="hidden-xs open"><i class="icon-reorder"></i></a>    
      <a class="navbar-brand col-lg-2 col-sm-1 col-xs-12" href="index"><span><img src="<?= base_url() ?>assets/img/dlaclogo.png" alt="Logo" width="70%"></span></a>
      <!-- start: Header Menu -->
      <div class="nav-no-collapse header-nav">
        <ul class="nav navbar-nav pull-right">

          <!-- start: Notif Dropdown -->
          <li id='notifdropdown' class="dropdown hidden-xs">
            <a id='notifbutton' class="btn dropdown-toggle" data-toggle="dropdown" href="index.html#">
              <i class="icon-warning-sign"></i>
              <?php
              if ($notifcount->count != 0)
                echo "<span class='notification red' style='padding:3px 5px 3px 5px; margin:10px; font-size:13px;'> $notifcount->count </span>";
              ?>
            </a>
            <ul class="dropdown-menu notifications" id="ulnotif">
              <li class="dropdown-menu-title">
                <span>
                  <?php
                  if ($notifcount->count == 1)
                    echo "You have $notifcount->count new notification";
                  else
                    echo "You have $notifcount->count new notifications";
                  ?>
                </span>
              </li>
              <?php foreach ($notifs as $notif) : ?>
                <li <?php if ($notif->status == 0) echo "style='background-color:#e8f1da'"; ?> onclick="notifclick(<?= $notif->notificationID ?>)">
                  <a href="<?= base_url() . $notif->destination ?>">
                    <?php
                    //colors: blue, green, red, yellow, orange
                    if ($notif->category == 'application')
                      echo '<span class="icon blue"><i class="icon-inbox"></i></span>';
                    else if ($notif->category == 'case')
                      echo '<span class="icon orange"><i class="icon-folder-open"></i></span>';
                    else if ($notif->category == 'calendar')
                      echo '<span class="icon green"><i class="icon-calendar"></i></span>';
                    else if ($notif->category == 'drafts')
                      echo '<span class="icon yellow"><i class="icon-file"></i></span>';
                    ?>
                    <span class="message"><?= $notif->message ?></span>
                    <span class="time"><?= date("n/d, h:i a", strtotime($notif->dateTime)) ?></span> 
                  </a>
                </li><?php endforeach; ?>
            </ul>
          </li>
          <!-- end: Notif Dropdown -->

          <!-- start: User Dropdown -->
          <li class="dropdown">
            <a class="btn account dropdown-toggle" data-toggle="dropdown" href="index.html#">
              <div class="avatar"><img src="<?php echo base_url() . $image; ?>"  alt="Avatar"></div>
              <div class="user">
                <span class="hello">Welcome!</span>
                <span class="name"><?= $name; ?></span>
              </div>
            </a>
            <ul class="dropdown-menu">
              <li class="dropdown-menu-title">

              </li>
              <li><a href="<?= base_url() ?>people/profile"><i class="icon-user"></i> Profile</a></li>
              <li><a href='<?= base_url() ?>login/logout'><i class="icon-off"></i> Logout</a></li>
            </ul>
          </li>
          <!-- end: User Dropdown -->
        </ul>
      </div>
      <!-- end: Header Menu -->

    </div>  
  </header>
  <!-- end: Header -->

  <div class="container">
    <div class="row">

      <!-- start: Main Menu -->
      <div id="sidebar-left" class="col-lg-2 col-sm-1" >



        <div class="nav-collapse sidebar-nav collapse navbar-collapse bs-navbar-collapse">

          <img src="<?= base_url() ?>assets/img/logo.png" style="width:120%; margin-left:-15px; margin-bottom:15px;">

          <ul class="nav nav-tabs nav-stacked main-menu">
            <li <?php if ($this->uri->segment(1) == "dashboard") echo ' class="active"' ?>>
              <a href="<?= base_url() ?>dashboard"><i class="icon-th-large"></i>Dashboard</a>
            </li>
            <li <?php if ($this->uri->segment(2) == "attendanceLogs") echo ' class="active"' ?>>
              <a href="<?= base_url() ?>people/attendanceLogs"><i class="icon-reorder"></i>Intern Attendance</a>
            </li>
  <!--           <li <?php if ($this->uri->segment(2) == "application" || $this->uri->segment(2) == "viewApplication") echo ' class="active"' ?>>
                <a href="<?= base_url() ?>application/index"><i class="icon-inbox"></i>Application </a>
            </li> -->
            <li <?php if ($this->uri->segment(2) == "cases") echo ' class="active"' ?>>
              <a href="<?= base_url() ?>cases"><i class="icon-folder-open"></i>Cases</a>
            </li>
            <li <?php if ($this->uri->segment(2) == "calendar") echo ' class="active"' ?>>
              <a href="<?= base_url() ?>calendar"><i class="icon-calendar"></i>Calendar</a>
            </li>
            <li <?php if ($this->uri->segment(2) == "people") echo ' class="active"' ?>>
              <a href="<?= base_url() ?>people"><i class="icon-group"></i>People</a>
            </li>
            <li <?php if ($this->uri->segment(2) == "reports") echo ' class="active"' ?>>
              <a href="<?= base_url() ?>reports"><i class="icon-bar-chart"></i>Reports</a>
            </li>
          </ul>

          </li>
          </ul>
        </div>
      </div>
      <!-- end: Main Menu -->

