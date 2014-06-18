<div id='linkedpeople_form' class="container">
      <br>
    
    <div class="row">
        
        <div class="col-sm-6">
            
        <div class="col-sm-2 control-group">
            <div class="controls">
                <h5> <b> Client/s <span class="glyphicon glyphicon-asterisk"></span> </b> </h5> 
            </div>
        </div>
             
        <div class="col-sm-8 control-group">
            <div class="controls">
                <select  multiple class="chosen-select" tabindex="8" style="" disabled>
                    <?php foreach ($offenses as $off): ?>
                        <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                    <?php endforeach; ?>
                </select>  
            </div>
        </div>
            
            
           <br><br><br><br>
           
           <div class="col-sm-2 control-group">
            <div class="controls">
                <h5> <b> Lawyer </b> </h5> 
            </div>
        </div>
              
         <div class="col-sm-8 control-group">
            <div class="controls">
                <select  multiple class="chosen-select" tabindex="8" style="" disabled>
                    <?php foreach ($offenses as $off): ?>
                        <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                    <?php endforeach; ?>
                </select>  
            </div>
        </div>
    
           
           <br><br><br><br>
            
        <div class="col-sm-2 control-group">
            <div class="controls">
                <h5> <b> Witness </b> </h5> 
            </div>
        </div>
             
        <div class="col-sm-8 control-group">
            <div class="controls">
                <select  multiple class="chosen-select" tabindex="8" style="" disabled>
                    <?php foreach ($offenses as $off): ?>
                        <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                    <?php endforeach; ?>
                </select>  
            </div>
        </div>
    
        </div>
        
        <div class="col-sm-6">
            
        <div class="col-sm-3 control-group">
            <div class="controls">
                <h5> <b> Opposing Party <span class="glyphicon glyphicon-asterisk"></span> </b> </h5> 
            </div>
        </div>
             
        <div class="col-sm-8 control-group">
            <div class="controls">
                <select  multiple class="chosen-select" tabindex="8" style="" disabled>
                    <?php foreach ($offenses as $off): ?>
                        <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                    <?php endforeach; ?>
                </select>  
            </div>
        </div>
            
            <br><br><br><br>
               
            
        <div class="col-sm-3 control-group">
            <div class="controls">
                <h5> <b> Lawyer </b> </h5> 
            </div>
        </div>
              
               <div class="col-sm-8 control-group">
            <div class="controls">
                <select  multiple class="chosen-select" tabindex="8" style="" disabled>
                    <?php foreach ($offenses as $off): ?>
                        <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                    <?php endforeach; ?>
                </select>  
            </div>
        </div>
            
              <br><br><br><br>
            
        <div class="col-sm-3 control-group">
            <div class="controls">
                <h5> <b> Witness </b> </h5> 
            </div>
        </div>
              
               <div class="col-sm-8 control-group">
            <div class="controls">
                <select  multiple class="chosen-select" tabindex="8" style="" disabled>
                    <?php foreach ($offenses as $off): ?>
                        <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                    <?php endforeach; ?>
                </select>  
            </div>
            </div>
            
    </div>
       
    </div>
    
    <br><br>
        <div class="col-sm-2 control-group">
            <div class="controls">
                <h5> <b> Judge <span class="glyphicon glyphicon-asterisk"></span> </b> </h5> 
            </div>
        </div>
             
        <div class="col-sm-9 control-group">
            <div class="controls">
                <select  multiple class="chosen-select" tabindex="8" style="" disabled>
                    <?php foreach ($offenses as $off): ?>
                        <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                    <?php endforeach; ?>
                </select>  
            </div>
        </div>
            
    
    <br><br><br><br>
        <div class="col-sm-2 control-group">
            <div class="controls">
                <h5> <b> Clerk of Court <span class="glyphicon glyphicon-asterisk"></span> </b> </h5> 
            </div>
        </div>
             
        <div class="col-sm-9 control-group">
            <div class="controls">
                <select  multiple class="chosen-select" tabindex="8" style="" disabled>
                    <?php foreach ($offenses as $off): ?>
                        <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                    <?php endforeach; ?>
                </select>  
            </div>
        </div>
            
    
     <br><br><br><br>
        <div class="col-sm-2 control-group">
            <div class="controls">
                <h5> <b> Sheriff <span class="glyphicon glyphicon-asterisk"></span> </b> </h5> 
            </div>
        </div>
             
        <div class="col-sm-9 control-group">
            <div class="controls">
                <select  multiple class="chosen-select" tabindex="8" style="" disabled>
                    <?php foreach ($offenses as $off): ?>
                        <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                    <?php endforeach; ?>
                </select>  
            </div>
        </div>
            

    <!-- Button -->
    <div class="row">
        <div class="control-group pull-right">
            <label class="control-label" for="submit"></label>
            <div class="controls">
                <input type='button' id='btnpeoplenext' value='Next' class='btn btn-success'>
            </div>
        </div>
    </div>
    
   
</div>