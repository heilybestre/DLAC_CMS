<div id="content" class="col-lg-10 col-sm-12">

    <!-- start: Content -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">

                <?php echo form_open(base_url() . 'application/create', array('class' => 'form-horizontal')); ?> 

                <div class="box-header"><br><br>
                    <ul class="nav tab-menu nav-tabs pull-left">
                        <!-- <li id='liRecommendation'><a href="#recommendation" data-toggle="tab">Recommendation</a></li> -->

                        <li id='liLegalAdvice'><a href="#legalAdvice" data-toggle="tab">Legal Advice</a></li>

                        <li id='liCaseFacts' class='active'><a href="#caseFacts" data-toggle="tab">Case Facts</a></li>   
                    </ul>
                </div>
                <div class="box-content" id="boxcontent">

                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active" id="caseFacts" style='padding:10px;'>
                            <?php $this->load->view('intern/createApplication/addcasefacts'); ?>
                        </div>
                        <div class="tab-pane" id="legalAdvice" style='padding:10px;'>
                            <?php $this->load->view('intern/createApplication/addlegaladvice'); ?>
                        </div>
                        <!-- <div class="tab-pane" id="recommendation" style='padding:10px;'>
                        <?php $this->load->view; ?>
                        </div> -->
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div><!--/col-->
        <table class="hide" id="offensetableTD">
            <tbody>
                <tr>
                    <td>
                        <select class="form-control">
                            <?php foreach ($offenses as $off): ?>
                                <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                            <?php endforeach; ?>
                        </select> 
                    </td>
                    <td>
                        <select id="appoffensestagepenal" name="appoffensestagepenal[]" class="form-control">
                            <option>Attempted</option>
                            <option>Frustrated</option>
                            <option>Consummated</option>
                            <option>N/A</option>
                        </select>
                    </td>
                    <td><button type='button' class="btn btn-danger removerowcreateAppOffense" style="margin-top:0px;"> <i class="icon-minus"></i> </button></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
