    

<div id="content" class="col-lg-10 col-sm-11">

    <!-- CASE FOLDER -->

    <!-- start: Content -->
    <div class="row">

        <div class="col-lg-12">

            <div class="box">
                <div class="box-header">
                    <h2><i class="icon-list"></i>Cases</h2>
                </div>
                <div class="box-content">

                    <div id="myTabContent" class="tab-content">

                        <div class="tab-pane active" id="ongoing">
                            <br/>
                            <table id='casestable' class="table table-striped table-bordered" data-provides="rowlink">
                                <thead>
                                    <tr>
                                        <th width="10%">Case No.</th>
                                        <th width="30%">Title</th>
                                        <th width="20%">Status</th>
                                        <th width="20%">Date Opened</th>
                                    </tr>
                                </thead>   
                                <tbody>
                                    <?php foreach ($cases as $row) : ?>
                                        <tr>
                                            <td><a href="cases/caseFolder/<?php echo $row->caseID ?>"> <?php echo $row->caseNum ?></a></td>
                                            <td>
                                                <tabletitle>
                                                    <?php echo $row->caseName ?>
                                                </tabletitle>
                                                <br>
                                                <tabledesc>
                                                    <?php echo $row->caseDesc ?>
                                                </tabledesc>
                                                    
                                                <tabletags>Tags:
                                                    <?php $tags = explode(" #",$row->tags); 
                                                        $count = 1;
                                                        foreach ($tags as $tag){
                                                            if ($count > 1){
                                                                echo ',  ';
                                                            }
                                                            echo $tag;
                                                            $count++;
                                                        }
                                                    ?>
                                                </tabletags>
                                            </td>
                                            <td><?php echo $row->statusName ?></td>
                                            <td><?php echo $row->dateReceived ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                        <div class="tab-pane" id="closed">
                            <p>
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.   
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>