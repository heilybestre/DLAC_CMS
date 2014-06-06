<div id='view_clientinfo' class="container">
    <br>
    <?php echo form_open(base_url() . 'viewapplication/clientinfo', array('class' => 'form-horizontal')); ?>

    <div class="row-fluid span12">

        <div class="span6">

            <!-- Text input-->
            <div class="control-group">
                <label class="control-label" for="appFormNum">Application Form Number</label>
                <div class="controls">
                    <label class="control-label1">A0001</label>
                </div>
            </div>

            <!-- photo -->
            <div class="controls">
                <img src="<?= base_url() ?>assets/img/clientphoto.jpg">
            </div>
            <br>

            <!-- Text input-->
            <div class="control-group">
                <label class="control-label" for="clientFirstName">Name</label>
                <div class="controls">
                    <label class="control-label1">Indiongco, Nicole</label>
                </div>
            </div>

            <!-- Text input from http://stackoverflow.com/questions/1318367/best-way-to-input-mailing-property-address -->
            <div class="control-group">
                <label class="control-label" for="clientAddress">Address</label>
                <div class="controls">

                    <label class="control-label1 span12">36 Jonah St., Metrogate Complex, Meycauayan City, Bulacan</label>

                </div>
            </div>

            <!-- Text input-->
            <div class="control-group">
                <label class="control-label" for="clientCN">Contact No.</label>
                <div class="controls">
                    <label class="control-label1">(Mobile) 09172077950</label>
                </div>
            </div>


            <!-- Text input-->
            <div class="control-group">
                <label class="control-label" for="clientEmail">E-mail Address</label>
                <div class="controls">
                    <label class="control-label1">gaw@yahoo.com</label>
                </div>
            </div>

            <!-- Text input-->
            <div class="control-group">
                <label class="control-label" for="clientFb">Facebook Username</label>
                <div class="controls">
                </div>
            </div>

            <!-- Text input-->
            <div class="control-group">
                <label class="control-label" for="clientReferredBy">Referred by</label>
                <div class="controls">
                    <label class="control-label1">(Mobile) 09172077950</label>    
                </div>
            </div>

        </div>

        <div class="span5">

            <!-- Form Name -->
            <h4>Personal Circumstances</h4>
            <hr width='450px'>

            <!-- Multiple Radios -->
            <div class="control-group">
                <label class="control-label" for="clientSex">Sex</label>
                <div class="controls">
                    <label class="control-label1">Male</label>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="clientCivilStatus">Civil Status</label>
                <div class="controls">
                    <label class="control-label1">Single</label>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="control-group">
                <label class="control-label" for="clientBirthDateMonth">Birthday</label>
                <div class="controls">
                    <label class="control-label1">January 01, 1985</label>
                </div>
            </div>


            <!-- Text input-->
            <div class="control-group">
                <label class="control-label" for="clientBirthPlace">Place of Birth</label>
                <div class="controls">
                    <label class="control-label1">Nueva Ecija</label>    
                </div>
            </div>

            <!-- Text input-->
            <div class="control-group">
                <label class="control-label" for="clientOccupation">Work/Occupation</label>
                <div class="controls">
                    <label class="control-label1">Taxi Driver</label>      
                </div>
            </div>

            <!-- Text input-->
            <div class="control-group">
                <label class="control-label" for="clientOrganization">Organization</label>
                <div class="controls">
                    <label class="control-label1">(Somewhere)</label>    
                </div>
            </div>

            <!-- Text input-->
            <div class="control-group">
                <label class="control-label" for="clientOrganizationAddress">Address</label>
                <div class="controls">
                    <label class="control-label1">Caloocan City</label> 
                </div>
            </div>

        </div>  
    </div>


    <?php echo form_close(); ?>

</div>