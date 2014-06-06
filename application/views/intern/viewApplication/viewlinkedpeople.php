<div id='linkedpeople_form' class="container">
    <br>
    <div class="row">
        <div class="box span4" onTablet="span6" onDesktop="span4">
            <div class="box-header">
                <h2><i class="icon-file"></i>People</h2>
            </div>
            <div class="box-content">
                <table id='viewapp_linkedpeopletable' class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Participation</th>
                            <th>Contact Number</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php foreach ($casepeople as $row) : ?>
                        <tr>
                            <td>
                                <?= "$row->firstname $row->middlename $row->lastname" ?>
                            </td>
                            <td>
                                <?php echo $this->Case_model->select_strtype($row->participation)->typeName . ' (' . $this->Case_model->select_strtype($row->side)->typeName . ')' ?>
                            </td>
                            <td>
                                <?php
                                if ($row->contacthome != null) {
                                    echo $row->contacthome . ' (Home) ; ';
                                }
                                ?>
                                <?php
                                if ($row->contactoffice != null) {
                                    echo $row->contactoffice . ' (Office) ; ';
                                }
                                ?>
                                <?php
                                if ($row->contactmobile != null) {
                                    echo $row->contactmobile . ' (Mobile)';
                                }
                                ?>
                            </td>
                        </tr><?php endforeach; ?>
                    </tbody>
                </table>
                <br>
            </div>
        </div>
    </div>
</div>