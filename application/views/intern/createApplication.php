<div id="content" class="col-lg-10 col-sm-12">

	<!-- start: Content -->
	<div class="row">
		<div class="col-md-12">
			<div class="box">

				<?php echo form_open(base_url() . 'application/create', array('class' => 'form-horizontal')); ?> 

				<div class="box-header"><br><br>
					<ul class="nav tab-menu nav-tabs pull-left">
						
						<li id='liLegalAdvice'><a href="#legalAdvice" data-toggle="tab">Legal Advice</a></li>
                                                
                                                <li id='liLinkedPeople'><a href="#linkedPeople" data-toggle="tab">People</a></li>
						
						<li id='liDocuments'><a href="#documents" data-toggle="tab">Legal Documents</a></li>
						
						<li id='liEvidence'><a href="#evidence" data-toggle="tab">Evidence</a></li>
						
						<li id='liCaseFacts' class='active'><a href="#caseFacts" data-toggle="tab">Case Facts</a></li>   
					</ul>
				</div>
				<div class="box-content" id="boxcontent">

					<div id="myTabContent" class="tab-content">
						<div class="tab-pane active" id="caseFacts" style='padding:10px;'>
							<?php $this->load->view('intern/createApplication/addcasefacts'); ?>
						</div>
						<div class="tab-pane" id="documents" style='padding:10px;'>
							<?php $this->load->view('intern/createApplication/adddocuments'); ?>
						</div>
						<div class="tab-pane" id="evidence" style='padding:10px;'>
							<?php $this->load->view('intern/createApplication/addevidence'); ?>
						</div>
                                            
                                                <div class="tab-pane" id="linkedPeople" style='padding:10px;'>
							<?php $this->load->view('intern/createApplication/addlinkedpeople'); ?>
						</div>
                                            
						<div class="tab-pane" id="legalAdvice" style='padding:10px;'>
							<?php $this->load->view('intern/createApplication/addlegaladvice'); ?>
						</div>
						<!-- <div class="tab-pane" id="recommendation" style='padding:10px;'>
							<?php// $this->load->view; ?>
						</div> -->
					</div>
				</div>

				<?php echo form_close(); ?>
			</div>
		</div><!--/col-->

	</div>

</div>
