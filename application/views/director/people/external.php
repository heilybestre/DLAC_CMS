<div class="container">
    <div class="row">
        <br>
        <div class="col-lg-12">

            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Case Related</th>
                        <th>Contact Number</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php foreach ($external as $row): ?>
                        <tr>
                            <td><?php echo "$row->firstname $row->middlename $row->lastname" ?></td>
                            <td><?php echo $row->caseName ?></td>
                            <td>
                                <?php if ($row->contacthome != null){echo $row->contacthome . ' (Home) ; ';} ?>
                                <?php if ($row->contactoffice != null){echo $row->contactoffice . ' (Office) ; ';} ?>
                                <?php if ($row->contactmobile != null){echo $row->contactmobile . ' (Mobile)';} ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>