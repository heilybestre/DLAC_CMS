<div id="content" class="col-lg-10 col-sm-11">

  <!-- start: Content -->
  <div class="row">

    <div class="col-md-12">
      <div class="box">
        <div class="box-header"><br><br>
          <ul class="nav tab-menu nav-tabs">
            <li class="active"><a href="#internal" data-toggle="tab">Internal</a></li>
            <li><a href="#external" data-toggle="tab">External</a></li>
          </ul>
        </div>
        <div class="box-content">

          <div id="myTabContent" class="tab-content">
            <div class="tab-pane active" id="internal">
                <?php $this->load->view('director/people/internal'); ?>
            </div>
            <div class="tab-pane" id="external">
                <?php $this->load->view('director/people/external'); ?>
            </div>
          </div>
        </div>
      </div>
    </div><!--/col-->

  </div>
</div>
