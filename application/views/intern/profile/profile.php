<div class="container">

    <div class="row">
        <br>
        <div class="col-lg-4 well">
            <img border="0" src="<?php echo base_url() . $person->image ?>" alt="<?php echo "$person->firstname $person->lastname" ?>" >
        </div>

        <div class="col-lg-1">
        </div>

        <div class="col-lg-6 well" style="background-color:white;padding:3px;">

            <table class="table">
                <tr>
                    <th>Name</th>
                    <td><?php echo "$person->firstname $person->middlename $person->lastname" ?></td>
                </tr>
                <tr>
                    <th>Year Level</th>
                    <td></td>
                </tr>
                <tr>
                    <th>Residency Hours</th>
                    <td><?php echo $person->residency ?></td>
                </tr>
                <tr>
                    <th>Current Cases Handled</th>
                    <td><?php echo $currentcasehandled->currentcaseload ?></td>
                </tr>
                <tr>
                    <th>Cases Handled</th>
                    <td><?php echo $person->caseload ?></td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

    <div class="row">
        <div style="border-width:5px;">
            <table class="table table-condensed">
                <tr style="background-color:#ddd;">
                    <th>Case No.</th>
                    <th>Case Title</th>
                    <th>Client</th>
                    <th>Status</th>
                </tr>
                <?php foreach ($cases as $row): ?>
                    <tr>
                        <td><?php echo $row->caseNum ?></td>
                        <td><?php echo $row->caseName ?></td>
                        <td><?php echo $row->client ?></td>
                        <td><?php echo $row->statusName ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

</div>
