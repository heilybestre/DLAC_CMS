<div id="content" class="col-lg-10 col-sm-11">
      
  <!-- start: Content -->
  <div class="row">

        
  <div class="col-md-12">
    <div class="box">
      <div class="box-header"><br><br>
       <ul class="nav tab-menu nav-tabs pull-left">
        <li><a href="#directorsremarks" data-toggle="tab">Director's Remarks</a></li>
        <li><a href="#recommendation" data-toggle="tab">Recommendation</a></li>
        <li><a href="#legalAdvice" data-toggle="tab">Legal Advice</a></li>
        <li><a href="#documents" data-toggle="tab">Documents</a></li>
        <li><a href="#evidence" data-toggle="tab">Evidence</a></li>
        <li><a href="#linkedPeople" data-toggle="tab">Linked People</a></li>
        <li><a href="#actionTaken" data-toggle="tab">Action Taken</a></li>
        <li><a href="#caseFacts" data-toggle="tab">Case Facts</a></li>
        <li class="active"><a href="#clientInfo" data-toggle="tab">Client Information</a></li>   
        </ul>
      </div>
      <div class="box-content" id="boxcontent">

      <div id="myTabContent" class="tab-content">
        <div class="tab-pane active" id="clientInfo">
          <?php $this->load->view('intern/editApplication/editclientinfo'); ?>
        </div>
        <div class="tab-pane" id="caseFacts">
          <?php $this->load->view('intern/editApplication/editcasefacts'); ?>
        </div>
        <div class="tab-pane" id="actionTaken">
          <?php $this->load->view('intern/editApplication/editactiontaken'); ?>
        </div>
        <div class="tab-pane" id="linkedPeople">
        <?php $this->load->view('intern/editApplication/editlinkedpeople'); ?>
        </div>
        <div class="tab-pane" id="evidence">
        <?php $this->load->view('intern/editApplication/editevidence'); ?>
        </div>
        <div class="tab-pane" id="documents">
          <?php $this->load->view('intern/editApplication/editdocuments'); ?>
        </div>
        <div class="tab-pane" id="legalAdvice">
        <?php $this->load->view('intern/editApplication/editlegaladvice'); ?>
        </div>
       <div class="tab-pane" id="recommendation">
        <?php $this->load->view('intern/editApplication/editrecommendation'); ?>
        </div>
        <div class="tab-pane" id="directorsremarks">
        <?php $this->load->view('intern/editApplication/directorsremarks'); ?>
        </div>
      </div>
    </div>
  </div>
  </div><!--/col-->
        


    </div>

</div>
