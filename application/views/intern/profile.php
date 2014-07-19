<div id="content" class="col-lg-10 col-sm-11">

    <!-- start: Content -->
    <div class="row">

        <div class="col-md-12">
            <div class="box">
                <div class="box-header"><h2> Intern Profile</h2>
                    <ul class="nav tab-menu nav-tabs">
                        <li><a href="#external" data-toggle="tab">Activity</a></li>
                        <li class="active"><a href="#internal" data-toggle="tab">Profile</a></li>
                    </ul>
                </div>
                <div class="box-content">

                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane" id="external">
                            <?php $this->load->view('intern/profile/activity'); ?>
                        </div>
                        <div class="tab-pane active" id="internal">
                            <?php $this->load->view('intern/profile/profile'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/col-->

    </div>

</div><!-- end: Content -->
