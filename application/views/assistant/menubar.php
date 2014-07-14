
<header>

  <!-- Navbar -->
  <div class="navbar">
    <div class="row-fluid">
      <div class="span12"style="background-color:#01723e"> 
        <img id="imglogo" src="<?= base_url() ?>assets/img/logo.jpg"></img>
      </div>
    </div>

    <div class="navbar-inner">
      <div class="container">

        <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="nav-collapse collapse">
          <ul class="nav">

            <li <?php if ($this->uri->segment(2) == "index") echo ' class="active"' ?>><a href="index">Dashboard</a></li>
            <li <?php if ($this->uri->segment(2) == "application") echo ' class="active"' ?>><a href="application">Application <!-- <span class="badge badge-important">6</span> --> </a></li>
            <li <?php if ($this->uri->segment(2) == "cases") echo ' class="active"' ?>><a href="cases"> Cases</a></li>
            <li <?php if ($this->uri->segment(2) == "tasks") echo ' class="active"' ?>><a href="tasks">Tasks</a></li>
            <li <?php if ($this->uri->segment(2) == "schedule") echo ' class="active"' ?>><a href="schedule">Schedule</a></li>
            <li <?php if ($this->uri->segment(2) == "documents") echo ' class="active"' ?>><a href="documents">Documents</a></li>
          </ul>

          <li id="accounticon" class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user icon-2x icon-dark"></i> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu pull-right" ole="menu" aria-labelledby="dLabel">
              <li> 
                <a href='account'>Account </a>
              </li>
              <li> 
                <a href='<?= base_url() ?>login/logout'>Logout</a>
              </li>
            </ul>
          </li>
          <li id="name">
            Welcome <?= $userName ?> (Assistant)
          </li>
        </div>
      </div>
    </div>
  </div>


  <!-- END OF NAV -->

</header>


<body data-spy="scroll" data-target=".bs-docs-sidebar" style="background-color:#f7f7f7">


