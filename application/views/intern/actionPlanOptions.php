<!--intern-->
<div id="actionPlanOption" class="actionPlanOption">

<div id="actionPlanOption-top">
<h5>
    <b>Assigned to </b><label class="label label-default">None</label>
    <div id="actionPlanActionButtons" class="pull-right">
        <a class="btn btn-success getActionButton" id="getActionButton"> <i class="icon-user"></i> </a>
        <a class="btn btn-info editActionButton" id="editActionButton"><i class="icon-edit"></i> </a>
        <a class="btn btn-danger deleteActionButton" id="deleteActionButton"><i class="icon-trash"></i> </a>
    </div>
</h5>
    <h5><b>Type:</b> (Document)</h5>

</div>
      
<div id="actionPlanOption-center-notes">

    <h5><b>Notes</b></h5>
    <textarea class="diss-form" placeholder="Write comment" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 60px; width:280px;"></textarea>
    <a href="" class="btn btn-success pull-right">Send</a>

</div>

<div id="actionPlanOption-center-edit">

    <br>
    <div class="col-lg-3">
           <h5>Action:</h5>
       </div>

       <div class="col-lg-9">
           <?php echo form_input(array('id' => 'newaction', 'name' => 'newaction', 'placeholder' => 'Action', 'class' => 'form-control')); ?>
       </div>

       <br><br>

       <div class="col-lg-3">
           <h5>Type:</h5>
       </div>

       <div class="col-lg-5">
           <select id='newactiontype' name='newactiontype' class='form-control'>
               <option value='1'>Evidence</option>
               <option value='2'>Legal Document</option>
               <option value='3'>People</option>
               <option value='4'>Events</option>
           </select>
       </div>

       <div class="col-lg-3">
           <a class="btn btn-success saveActionButton" id="saveActionButton"> <i class="icon-save"></i> </a>
           <a class="btn btn-danger cancelEditButton" id="cancelEditButton"> <i class="icon-ban-circle"></i> </a>
       </div>

</div>
    
<div id="actionPlanOption-center-delete">
    
    <h4>Are you sure you want to delete this item?</h4> 
    <a class="btn btn-success deleteActionButton" id="deleteActionButton"> <i class="icon-ok"></i> </a>
    <a class="btn btn-danger cancelDeleteButton" id="cancelDeleteButton"> <i class="icon-remove"></i> </a>      
    
</div>
    

 <div id="actionPlan-bottom-notes" class="actionPlan-bottom-notes">
     
    <hr>
     
   <div class="discussions" id="notesThread">

    <ul>
								
        <li id="actionPlanNote" class="actionPlanNote">
            <div class="name">Megan Abbott</div>
            <div class="date">Today, 1:08 PM</div>
            <div class="delete"><i class="icon-remove"></i></div>

            <div class="message">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
            </div>	
    </li>
    
    <li id="actionPlanNote" class="actionPlanNote">
            <div class="name">Megan Abbott</div>
            <div class="date">Today, 1:08 PM</div>
            <div class="delete"><i class="icon-remove"></i></div>

            <div class="message">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
            </div>	
    </li>
						
    </ul>		

    </div>
            
    </div>
</div>    

<!-- START OF NOT YET ASSIGNED & NOT YET DONE -->

<div id="actionPlanOption1" class="actionPlanOption1">


<h5>
    <b>Assigned to </b><label class="label label-default">None</label>
    <div id="actionPlanActionButtons" class="pull-right">
        <a class="btn btn-success getActionButton" id="getActionButton"> <i class="icon-user"></i> </a>
        <a class="btn btn-info editActionButton" id="editActionButton"><i class="icon-edit"></i> </a>
        <a class="btn btn-danger deleteActionButton" id="deleteActionButton"><i class="icon-trash"></i> </a>
    </div>
</h5>
    <h5><b>Type:</b> (Document)</h5>
    
    <div id="editAction" class="editAction hide">
        <br>
         <div class="col-lg-3">
                <h5>Action:</h5>
            </div>

            <div class="col-lg-9">
                <?php echo form_input(array('id' => 'newaction', 'name' => 'newaction', 'placeholder' => 'Action', 'class' => 'form-control')); ?>
            </div>

            <br><br>

            <div class="col-lg-3">
                <h5>Type:</h5>
            </div>

            <div class="col-lg-5">
                <select id='newactiontype' name='newactiontype' class='form-control'>
                    <option value='1'>Evidence</option>
                    <option value='2'>Legal Document</option>
                    <option value='3'>People</option>
                    <option value='4'>Events</option>
                </select>
            </div>
            
            <div class="col-lg-3">
                <a class="btn btn-success saveActionButton" id="saveActionButton"> <i class="icon-save"></i> </a>
                <a class="btn btn-danger cancelEditButton" id="cancelEditButton"> <i class="icon-ban-circle"></i> </a>
            </div>
    </div>
    
    <div id="deleteAction" class="deleteAction hide">
        <h4>Are you sure you want to delete this item?</h4> 
        <a class="btn btn-success deleteActionButton" id="deleteActionButton"> <i class="icon-ok"></i> </a>
        <a class="btn btn-danger cancelDeleteButton" id="cancelDeleteButton"> <i class="icon-remove"></i> </a>
    </div>
 
    <div id="actionPlanWriteNotes" class="actionPlanWriteNotes">
            <h5>Notes</b></h5>
            <textarea class="diss-form" placeholder="Write comment" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 60px; width:280px;"></textarea>
            <a href="" class="btn btn-success pull-right">Send</a>
    </div>
  
    <hr>

<div class="discussions" id="notesThread">

    <ul>
								
        <li id="actionPlanNote" class="actionPlanNote">
            <div class="name">Megan Abbott</div>
            <div class="date">Today, 1:08 PM</div>
            <div class="delete"><i class="icon-remove"></i></div>

            <div class="message">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
            </div>	
    </li>
    
    <li id="actionPlanNote" class="actionPlanNote">
            <div class="name">Megan Abbott</div>
            <div class="date">Today, 1:08 PM</div>
            <div class="delete"><i class="icon-remove"></i></div>

            <div class="message">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
            </div>	
    </li>
						
    </ul>		

</div>


</div>
<!-- END OF NOT YET ASSIGNED & NOT YET DONE -->

<!-- START OF ASSIGNED & NOT YET DONE -->

<div id="actionPlanOption2" class="actionPlanOption2 hide">


<h5>
    <b>Assigned to </b><label class="label label-default">Name</label>    
    <div id="actionPlanActionButtons" class="pull-right">
        <a class="btn btn-success getActionButton" id="getActionButton"> <i class="icon-user"></i> </a>
        <a class="btn btn-info editActionButton2" id="editActionButton2"><i class="icon-edit"></i> </a>
        <a class="btn btn-danger deleteActionButton2" id="deleteActionButton2"><i class="icon-trash"></i> </a>
    </div>
</h5>
    
    <h5><b>Type:</b> (Document)</h5>
    
        <div id="editAction2" class="editAction2 hide">
        <br>
         <div class="col-lg-3">
                <h5>Action:</h5>
            </div>

            <div class="col-lg-9">
                <?php echo form_input(array('id' => 'newaction', 'name' => 'newaction', 'placeholder' => 'Action', 'class' => 'form-control')); ?>
            </div>

            <br><br>

            <div class="col-lg-3">
                <h5>Type:</h5>
            </div>

            <div class="col-lg-5">
                <select id='newactiontype' name='newactiontype' class='form-control'>
                    <option value='1'>Evidence</option>
                    <option value='2'>Legal Document</option>
                    <option value='3'>People</option>
                    <option value='4'>Events</option>
                </select>
            </div>
            
            <div class="col-lg-3">
                <a class="btn btn-success saveActionButton2" id="saveActionButton2"> <i class="icon-save"></i> </a>
                <a class="btn btn-danger cancelEditButton2" id="cancelEditButton2"> <i class="icon-ban-circle"></i> </a>
            </div>
        </div>
    
      <div id="deleteAction2" class="deleteAction2 hide">
          <center>
        <h4>Are you sure you want to delete this item?</h4> 
        <a class="btn btn-success deleteActionButton2" id="deleteActionButton2"> <i class="icon-ok"></i> </a>
        <a class="btn btn-danger cancelDeleteButton2" id="cancelDeleteButton2"> <i class="icon-remove"></i> </a></center>
    </div>
 
    <div id="actionPlanWriteNotes2" class="actionPlanWriteNotes2">
            <h5>Notes</b></h5>
            <textarea class="diss-form" placeholder="Write comment" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 60px; width:280px;"></textarea>
            <a href="" class="btn btn-success pull-right">Send</a>
    </div>
  
    <hr>

<div class="discussions" class="notesThread2" id="notesThread2">

    <ul>
								
        <li id="actionPlanNote2" class="actionPlanNote2">
            <div class="name">Megan Abbott</div>
            <div class="date">Today, 1:08 PM</div>
            <div class="delete"><i class="icon-remove"></i></div>

            <div class="message">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
            </div>	
    </li>
    
    <li id="actionPlanNote2" class="actionPlanNote2">
            <div class="name">Megan Abbott</div>
            <div class="date">Today, 1:08 PM</div>
            <div class="delete"><i class="icon-remove"></i></div>

            <div class="message">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
            </div>	
    </li>
						
    </ul>		

</div>


</div>
<!-- END OF ASSIGNED & NOT YET DONE -->

<!-- START OF DONE ACTION-->

<div id="actionPlanOption3" class="hide">


<h5>
    <b>Assigned to </b><label class="label label-default">Name</label>    
</h5>
    <h5><b>Type:</b> (Document)</h5>
  
    <hr>

<div class="discussions" id="notesThreadOption3">

    <ul>
								
    <li id="actionPlanNote">
            <div class="name">Megan Abbott</div>
            <div class="date">Today, 1:08 PM</div>
            <div class="delete"><i class="icon-remove"></i></div>

            <div class="message">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
            </div>	
    </li>
    
    <li id="actionPlanNote">
            <div class="name">Megan Abbott</div>
            <div class="date">Today, 1:08 PM</div>
            <div class="delete"><i class="icon-remove"></i></div>

            <div class="message">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
            </div>	
    </li>
						
    </ul>		

</div>


</div>
<!-- START OF DONE ACTION-->

<!-- START OF EDITING -->

<div id="actionPlanOption4" class="hide">


<h5>
    <b>Last Edited by: </b><label class="label label-default">Name</label>    
    <div id="actionPlanActionButtons" class="pull-right">
        <a class="btn btn-success getActionButton" id="getActionButton"> <i class="icon-user"></i> </a>
        <a class="btn btn-info" id="editActionButton"><i class="icon-edit"></i> </a>
        <a class="btn btn-danger" id="deleteActionButton"><i class="icon-trash"></i> </a>
    </div>
</h5>
    <h5><b>Type:</b> (Document)</h5>
    
    <div id="editAction" class="hide">
        <br>
         <div class="col-lg-3">
                <h5>Action:</h5>
            </div>

            <div class="col-lg-9">
                <?php echo form_input(array('id' => 'newaction', 'name' => 'newaction', 'placeholder' => 'Action', 'class' => 'form-control')); ?>
            </div>

            <br><br>

            <div class="col-lg-3">
                <h5>Type:</h5>
            </div>

            <div class="col-lg-5">
                <select id='newactiontype' name='newactiontype' class='form-control'>
                    <option value='1'>Evidence</option>
                    <option value='2'>Legal Document</option>
                    <option value='3'>People</option>
                    <option value='4'>Events</option>
                </select>
            </div>
            
            <div class="col-lg-3">
                <a class="btn btn-success saveActionButton" id="saveActionButton"> <i class="icon-save"></i> </a>
                <a class="btn btn-danger"> <i class="icon-ban-circle"></i> </a>
            </div>
    </div>
    
    <div id="deleteAction" class="hide">
        <h4>Are you sure you want to delete this item?</h4> 
        <a class="btn btn-success"> <i class="icon-ok"></i> </a>
        <a class="btn btn-danger cancelDeleteButton" id="cancelDeleteButton"> <i class="icon-remove"></i> </a>
    </div>
 
    <div id="actionPlanWriteNotes" class="">
            <h5>Notes</b></h5>
            <textarea class="diss-form" placeholder="Write comment" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 60px; width:280px;"></textarea>
            <a href="" class="btn btn-success pull-right">Send</a>
    </div>
  
    <hr>

<div class="discussions" id="notesThread">

    <ul>
								
    <li id="actionPlanNote">
            <div class="name">Megan Abbott</div>
            <div class="date">Today, 1:08 PM</div>
            <div class="delete"><i class="icon-remove"></i></div>

            <div class="message">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
            </div>	
    </li>
    
    <li id="actionPlanNote">
            <div class="name">Megan Abbott</div>
            <div class="date">Today, 1:08 PM</div>
            <div class="delete"><i class="icon-remove"></i></div>

            <div class="message">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
            </div>	
    </li>
						
    </ul>		

</div>


</div>
<!-- END OF EDITING -->




