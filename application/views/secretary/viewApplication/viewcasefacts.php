<div id='view_casefacts' class="container">
    <br>

    <?php echo form_open(base_url() . 'createapplication/addcasefacts', array('class' => 'form-horizontal')); ?>

    <div class="row-fluid">

        <!-- Select Basic -->
        <div class="control-group">
            <label class="control-label" for="interviewDate">Date of Interview</label>
            <div class="controls">
                <label class="control-label1">July 03, 2013</label>
            </div>
        </div>


        <!-- Select Basic -->
        <div class="control-group">
            <label class="control-label" for="clientType">Client Type</label>
            <div class="controls">
                <label class="control-label1">Complainant</label>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="control-group">
            <label class="control-label" for="caseStatus">Current Stage of the Case</label>
            <div class="controls">
                <label class="label label-success label-xlarge" for="caseStatus">Pre-information</label>
           <!-- <select id="caseStatus" name="caseStatus" class="input-xlarge span2">
              <option></option>
              <option>Pre-information</option>
              <option>Information</option>
              <option>Trial Court</option>
              <option>Appeal</option>
            </select> -->
                <br>
            </div>
        </div>

        <!-- Text input-->
        <div class="control-group">
            <label class="control-label" for="caseTitle">Title</label>
            <div class="controls">
                <label class="control-label1">Murder Case</label>    
            </div>
        </div>

        <!-- Textarea -->
        <div class="control-group">
            <label class="control-label" placeholder="will change size" for="narrative">Narrative</label>
            <div class="controls">                     
                <label class="control-label1">(narrative)</label>    
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="caseTags">Tags</label>
            <div class="controls">
                <label class="control-label1">Murder</label>    
            </div>
        </div>

    </div>

    <div class="row-fluid span12">

        <div class="span6">

            <h4>Incident Details</h4>
            <hr width='1050px'>

            <!-- Select Basic -->
            <div class="control-group">
                <label class="control-label" for="casePlace">Place of Incident</label>
                <div class="controls">
                    <label class="control-label1">Manila</label>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="control-group">
                <label class="control-label" for="incidentDate">Date of Incident</label>
                <div class="controls">
                    <label class="control-label1">July 01, 2013</label>
                </div>
            </div>

            <!-- Text input-->
            <div class="control-group">
                <label class="control-label" for="caseTime">Time of Incident</label>
                <div class="controls">
                    <label class="control-label1">Around 5 PM</label> 
                </div>
            </div>

        </div>

    </div>

    <div class="row-fluid">

        <h4>Offense</h4>
        <hr width='1050px'>

        <table class="table table-striped table-bordered">
            <tr>
                <th></th>
                <th>Offense</th>
                <th>"specific"</th>
                <th>Source</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>

    </div>

    <div class="row-fluid">

        <h4>Action Taken</h4>
        <hr width='1050px'>

        <table class="table table-striped table-bordered">
            <tr>
                <th></th>
                <th>Action Taken</th>
                <th>Date</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>

    </div>

    <div class="row-fluid">

        <h4>Parties</h4>
        <hr width='1050px'>

        <table class="table table-striped table-bordered">
            <tr>
                <th></th>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Possible Location</th>
                <th>Participation</th>
            </tr>
            <tr>
                <td>1</td>
                <td>(Client Name)</td>
                <td> (Client's Contact Number) </td>
                <td>(Client's Address)</td>
                <td>(Client's Participation)</td>
            </tr>
        </table>

    </div>


    <?php echo form_close(); ?>

</div>