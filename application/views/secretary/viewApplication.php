<!-- https://github.com/sathomas/responsive-tabs -->

<div class="container-fluid">
	<div class="span17"> 

    <div class="tabbable tabs-left responsive" id="statictabs">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tabs-1" data-toggle="tab">Client Information</a></li>
        <li><a href="#tabs-2" data-toggle="tab">Case Facts</a></li>
        <li><a href="#tabs-3" data-toggle="tab">Evidence</a></li>
        <li><a href="#tabs-4" data-toggle="tab">Legal Advice</a></li>
        <li><a href="#tabs-5" data-toggle="tab">Recommendation</a></li>
        <li><a href="#tabs-6" data-toggle="tab">Director's Remarks</a></li>
      </ul>
      <div class="tab-content responsive"  style="background-color:#fffff; border-width: 3px; overflow-x:hidden; padding: 10px">

        <div class="row-fluid">
          <div class="span9">
            <i>Submitted by: Mihaela Mamenta on July 04, 2013 8:00 AM</i><br>
            Application number: <?php echo $value = $_COOKIE['cookie_name']; ?>
          </div>
          <div class="span3">
            <button class="btn btn-success">Accept</button> &nbsp;
            <button class="btn btn-warning">Incomplete</button>&nbsp;
            <button class="btn btn-danger">Reject</button> 
          </div>
        </div>
        <br>

        <div class="tab-pane fade in active" id="tabs-1">
          <?php $this->load->view('secretary/viewApplication/viewclientinfo'); ?>
        </div>
        <div class="tab-pane fade in" id="tabs-2">
          <?php $this->load->view('secretary/viewApplication/viewcasefacts'); ?>
        </div>
        <div class="tab-pane fade in" id="tabs-3">
          <?php $this->load->view('secretary/viewApplication/viewevidence'); ?>
        </div>
        <div class="tab-pane fade in" id="tabs-4">
          <?php $this->load->view('secretary/viewApplication/viewlegaladvice'); ?>
        </div>
        
        <div class="tab-pane fade in" id="tabs-5">
          <?php $this->load->view('secretary/viewApplication/viewrecommendation'); ?>
        </div>
        
        <div class="tab-pane fade in" id="tabs-6">
          <?php $this->load->view('secretary/viewApplication/directorsremarks'); ?>
        </div>
        
      </div> <!-- /tab-content -->
    </div> <!-- /tabbable -->
  </div>

</div>
