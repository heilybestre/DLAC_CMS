<div class="clearfix"></div>
</body>

<!-- INTERN FOOTER -->
<footer>
    <p>
        <span style="text-align:left;float:left">&copy; 2013 TEAM HIGH</a></span>
    </p>
</footer>

<script src="<?= base_url() ?>assets/js/jquery-2.0.3.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>   

<!-- page scripts -->

<script src="<?= base_url() ?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.sparkline.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.cookie.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap.min.js"></script>

<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="assets/js/excanvas.min.js"></script><![endif]-->
<script src="<?= base_url() ?>assets/js/jquery.flot.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.flot.pie.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.flot.stack.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.flot.resize.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.flot.time.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.autosize.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.placeholder.min.js"></script>

<script src="<?= base_url() ?>assets/js/bootstrap-timepicker.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-colorpicker.min.js"></script>
<!--<script src="<?= base_url() ?>assets/js/jquery-loader.js"></script>-->
<script src="<?= base_url() ?>assets/js/fullcalendar.js"></script>
<script src="<?= base_url() ?>assets/js/gcal.js"></script>

<!-- theme scripts -->
<script src="<?= base_url() ?>assets/js/custom.min.js"></script>
<script src="<?= base_url() ?>assets/js/core.min.js"></script>

<!-- inline scripts related to this page -->
<script src="<?= base_url() ?>assets/js/pages/index.js"></script>
<script src="<?= base_url() ?>assets/js/pages/table.js"></script>

<!-- end: JavaScript-->


<script type="text/javascript" src="<?= base_url() ?>assets/js/pages/widgets.js"></script>

<script src="<?= base_url() ?>assets/js/holder/holder.js"></script>
<script src="<?= base_url() ?>assets/js/google-code-prettify/prettify.js"></script>
<script src="<?= base_url() ?>assets/js/application.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-rowlink.js"></script>
<script src="<?= base_url() ?>assets/js/hide-show.js"></script>

<script src="<?= base_url() ?>assets/js/chosen.jquery.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/js/chosen.proto.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/js/prism.js" type="text/javascript"></script>


<!-- CUSTOM JAVASCRIPT ------------------------------------------------------>
<script type='text/javascript'>

    var config = {
        '.chosen-select': {},
        '.chosen-select-deselect': {allow_single_deselect: true},
        '.chosen-select-no-single': {disable_search_threshold: 10},
        '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'}
    };
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }

//customized datatables
    $(document).ready(function() {
  
        $('.popover-orig').popover({ 
        html : true,
        title: function() {
          return $("#popover-orig-head").html();
        },
        content: function() {
          return $("#popover-orig-content").html();
        }

        });
        
        $('.popover-editing').popover({ 
        html : true,
        title: function() {
          return $("#popover-editing-head").html();
        },
        content: function() {
          return $("#popover-editing-content").html();
        }
        });

        $("#dashboard-appo").dataTable({
            "sDom": 'tipr',
            "iDisplayLength": 4,
            "bDestroy": true
        });

        $("#dashboard-tasks").dataTable({
            "sDom": 'tipr',
            "iDisplayLength": 4,
            "bDestroy": true
        });

        $("#dashboard-appl").dataTable({
            "sDom": 'tipr',
            "iDisplayLength": 6,
            "bDestroy": true
        });

        $("#dashboard-cases").dataTable({
            "sDom": 'tipr',
            "iDisplayLength": 6,
            "bDestroy": true
        });

        $("#dashboard-req").dataTable({
            "sDom": 'tipr',
            "iDisplayLength": 4,
            "bDestroy": true
        });

        $("#dashboard-drafts").dataTable({
            "sDom": 'tipr',
            "iDisplayLength": 4,
            "bDestroy": true
        });

        $('#viewapp_linkedpeopletable').dataTable({
            "sDom": 'tipr',
            "aaSorting": [[1, "asc"]]
        });

        $('#assigninternstable').dataTable({
            "sDom": 'tipr',
            "aaSorting": [[2, "asc"]]
        });

        $('#assignlawyertable').dataTable({
            "sDom": 'tipr',
            "aaSorting": []
        });

        $('#applicationstable').dataTable({
            "aaSorting": [[2, "desc"]]
        });

        $('#casestable').dataTable({
            "aaSorting": [[3, "desc"]]
        });

    });

// Date and Time Pickers
    $(function() {
        $('#docUpload_dateIssued').datepicker();
        $('#docUpload_dateReceived').datepicker();
        $('#newappt_date').datepicker();
        $('#newappt_time').timepicker();
        $('#editappt_date2').datepicker();
        $('#editappt_time2').timepicker();
        $('#newtask_date').datepicker();
        $('#newtodoassign_date').datepicker();
        $('#newtodo_date').datepicker();
        $('#appinterviewdate').datepicker();
        $('#appincidentdate').datepicker();
        $('#appincidenttime').timepicker();
        $('#bycliIssuedDate').datepicker();
        $('#bycliReceivedDate').datepicker();
        $('#byoppIssuedDate').datepicker();
        $('#byoppReceivedDate').datepicker();
        $('#bycouIssuedDate').datepicker();
        $('#bycouReceivedDate').datepicker();
        $('#docdateissued').datepicker();
        $('#docdatereceived').datepicker();
        $('#objdatereceived').datepicker();
        $('#objdateretrieved').datepicker();
        $('#clidateissued').datepicker();
        $('#clidatereceived').datepicker();
        $('#oppdateissued').datepicker();
        $('#oppdatereceived').datepicker();
        $('#coudateissued').datepicker();
        $('#coudatereceived').datepicker();
        $('#clientBirthday').datepicker();
        $('.attendancetime').timepicker();
        $('#attendancedate').datepicker();
        $('#case-docdateissued').datepicker();
        $('#case-docdatereceived').datepicker();
        $('#case-objdatereceived').datepicker();
        $('#case-objdateretrieved').datepicker();
        $('#newappt_starttime').timepicker();
        $('#newappt_endtime').timepicker();
        $('#taskduedate').datepicker();
        $('#minutesdate').datepicker();
        $('#minutes_starttime').timepicker();
        $('#minutes_endtime').timepicker();
    });

// Make the checkbox unclickable 
    $(".disablethis").bind("click", false);

// Show Entry of Appearance (casefolder/documents/newdraft)
    $('#dddoctype').change(function() {
        var doctype = $('#dddoctype').val();
        if (doctype == 2) {
            $('#entryOfAppearance').removeClass('hide');
        }
        else {
            $('#entryOfAppearance').addClass('hide');
        }
    });

// Current stage and client type dropdown change 
    $(document).ready(function() {

        $('#appstage').change(function() {
            $("#appclienttype > option").remove();
            var currentStage = $('#appstage').val();
            if (currentStage == '1' || currentStage == '2') {
                document.getElementById('appclienttype').options[0] = new Option("Complainant", 8, true);
                document.getElementById('appclienttype').options[1] = new Option("Respondent", 9, false);
            }

            else if (currentStage == '3' || currentStage == '4') {
                document.getElementById('appclienttype').options[0] = new Option("Plaintiff", 10, true);
                document.getElementById('appclienttype').options[1] = new Option("Defendant", 11, false);
            }

            else if (currentStage == '5') {
                document.getElementById('appclienttype').options[0] = new Option("Appellant", 12, true);
                document.getElementById('appclienttype').options[1] = new Option("Appellee", 13, false);
            }
        });
    });


    /* CREATE APPLICATION NEXT BUTTONS */
    $(document).ready(function() {
        $('#btncasefactsnext').click(function() {
            $('#liCaseFacts').removeClass('active');
            $('#caseFacts').removeClass('active');
            $('#liEvidence').addClass('active');
            $('#evidence').addClass('active');
        });
        $('#btnevidencenext').click(function() {
            $('#liEvidence').removeClass('active');
            $('#evidence').removeClass('active');
            $('#liDocuments').addClass('active');
            $('#documents').addClass('active');
        });
        $('#btndocumentsnext').click(function() {
            $('#liDocuments').removeClass('active');
            $('#documents').removeClass('active');
            $('#liLegalAdvice').addClass('active');
            $('#legalAdvice').addClass('active');
        });
        $('#btnlegaladvicenext').click(function() {
            $('#liLegalAdvice').removeClass('active');
            $('#legalAdvice').removeClass('active');
            $('#liRecommendation').addClass('active');
            $('#recommendation').addClass('active');
        });
    });

    /* Add Offense in Table (PENAL) */
    $('#btnaddoffensepenal').click(function() {
        var appoffensepenal = $('select[name="appoffensepenal"]').val();
        var appoffensestagepenal = $('select[name="appoffensestagepenal"]').val();
        var appoffensesource = $('input[name="offenseSource"]:checked').val();

        var table = document.getElementById("offensetable");
        {
            var row = table.insertRow(table.rows.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            cell3.style.display = "none";
            cell1.innerHTML = '<input type="text" name="inputoffense[]" value="' + appoffensepenal + '" style="display:none;" readonly>' + appoffensepenal;
            cell2.innerHTML = '<input type="text" name="inputoffensestage[]" value="' + appoffensestagepenal + '" style="display:none;" readonly>' + appoffensestagepenal;
            cell3.innerHTML = '<input type="text" name="inputoffensesource[]" value="' + appoffensesource + '" style="display:none;" readonly>' + appoffensesource;
        }
    });

    /* Add Offense in Table (SPECIAL) */
    $('#btnaddoffensespecial').click(function() {
        var appoffensespecial = $('select[name="appoffensespecial"]').val();
        var appoffensestagespecial = $('select[name="appoffensestagespecial"]').val();
        var appoffensesource = $('input[name="offenseSource"]:checked').val();

        var table = document.getElementById("offensetable");
        {
            var row = table.insertRow(table.rows.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            cell3.style.display = "none";
            cell1.innerHTML = '<input type="text" name="inputoffense[]" value="' + appoffensespecial + '" style="display:none;" readonly>' + appoffensespecial;
            cell2.innerHTML = '<input type="text" name="inputoffensestage[]" value="' + appoffensestagespecial + '" style="display:none;" readonly>' + appoffensestagespecial;
            cell3.innerHTML = '<input type="text" name="inputoffensesource[]" value="' + appoffensesource + '" style="display:none;" readonly>' + appoffensesource;
        }
    });

    /* LEWIN START */

    $('#btneditoffensepenal').click(function() {
        var caseOffensePenal = $('select[name="caseOffensePenal"]').val();
        var caseoffensestagepenal = $('select[name="caseoffensestagepenal"]').val();

        var table = document.getElementById("offensetable");
        {
            var row = table.insertRow(table.rows.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);

            cell1.innerHTML = '<input type="text" name="inputoffense[]" value="' + caseOffensePenal + '" style="display:none;" readonly>' + caseOffensePenal;
            cell2.innerHTML = '<input type="text" name="inputoffensestage[]" value="' + caseoffensestagepenal + '" style="display:none;" readonly>' + caseoffensestagepenal;
            cell3.innerHTML = "<button class='btn btn-danger' type='button' id='remove_row'> <i class='icon-trash'></i></button>";
        }
    });

    $('#btneditoffensespecial').click(function() {
        var caseOffenseSpecial = $('select[name="caseOffenseSpecial"]').val();
        var caseoffensestagespecial = $('select[name="caseoffensestagespecial"]').val();

        var table = document.getElementById("offensetable");
        {
            var row = table.insertRow(table.rows.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            cell1.innerHTML = '<input type="text" name="inputoffense[]" value="' + caseOffenseSpecial + '" style="display:none;" readonly>' + caseOffenseSpecial;
            cell2.innerHTML = '<input type="text" name="inputoffensestage[]" value="' + caseoffensestagespecial + '" style="display:none;" readonly>' + caseoffensestagespecial;
            cell3.innerHTML = "<button class='btn btn-danger' type='button' id='remove_row'> <i class='icon-trash'></i></button>";
        }
    });

    $('#inputFileDraft').change(function() {
        var files = document.getElementById("inputFileDraft").files;

        var table = document.getElementById("adddrafttable");
        table.innerHTML = '';

        for (var i = 0; i < files.length; i++) {
            var fileName = files[i].name;
            var fileSize = files[i].size;
            var fileExt = fileName.split('.').pop();
            var rawName = fileName.substr(0, files[i].name.lastIndexOf('.'));

            var row = table.insertRow(table.rows.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);

            cell1.innerHTML = "<input type='text' name='rawName[]' value='" + rawName + "' /> ." + fileExt;
            cell2.innerHTML = fileSize + 'KB';
            cell3.innerHTML = "<button class='btn btn-danger' type='button' id='remove_row'><i class='icon-trash'></i></button>";
        }

    });


    $('#inputFileByClient').change(function() {
        var files = document.getElementById("inputFileByClient").files;

        $('#tableFileClientID').css('background-color', '#E4ECD9');
        var tableFileClientID = document.getElementById("tableFileClientID");
        tableFileClientID.innerHTML = '';

        for (var i = 0; i < files.length; i++) {

            var fileName = files[i].name;
            var fileSize = files[i].size;
            var fileExt = fileName.split('.').pop();
            var rawName = fileName.substr(0, files[i].name.lastIndexOf('.'));

            var tableHTML = '';
            tableHTML += "<table class='table-condensed'>"
                    + "<tr>"
                    + "<td width='15%'></td>"
                    + "<td width='38%'></td>"
                    + "<td width='10%'></td>"
                    + "<td width='30%'></td>"
                    + "<td width='5%' rowspan='4' valign='top'> <button type='button' class='close' aria-hidden='true'>×</button> </td>"
                    + "</tr>"
                    + "<tr>"
                    + "<td>File Name:</td>"
                    + "<td> <input class='text form-control col-sm-3' id='tb_title' name='docname[]' value='" + rawName + "'/> ." + fileExt + " </td>"
                    + "<td>Purpose:</td>"
                    + "<td rowspan='2'> <textarea id='textarea_purpose' class='form-control' name='docpurpose[]'></textarea> </td>"
                    + "</tr>"

                    + "<tr>"
                    + "<td>Date Issued:</td>"
                    + "<td class='col-sm-3'>"
                    + "<div class='input-group date'>"
                    + "<span class='input-group-addon'><i class='icon-calendar'></i></span>"
                    + "<input type='text' class='date-picker form-control' id='docUpload_dateIssued_client' name='datefiled[]' data-date-format='yyyy-mm-dd' value='yyyy-mm-dd'>"
                    + "</div>"
                    + "</td>"
                    + "</tr>"

                    + "<tr>"
                    + "<td>Date Received:</td>"
                    + "<td class='col-sm-3'>"
                    + "<div class='input-group date'>"
                    + "<span class='input-group-addon'><i class='icon-calendar'></i></span>"
                    + "<input type='text' class='date-picker form-control' id='docUpload_dateReceived_client' name='datereceived[]' data-date-format='yyyy-mm-dd' value='yyyy-mm-dd'>"
                    + "</div>"
                    + "</td>"
                    + "</tr>"
                    + "</table><br><br>";
            tableFileClientID.innerHTML += tableHTML;
        }

        $('#docUpload_dateIssued_client').datepicker();
        $('#docUpload_dateReceived_client').datepicker();

    });


    $('#inputFileByCourt').change(function() {
        var files = document.getElementById("inputFileByCourt").files;

        $('#tableFileCourt').css('background-color', '#E4ECD9');
        var tableFileCourt = document.getElementById("tableFileCourt");
        tableFileCourt.innerHTML = '';

        for (var i = 0; i < files.length; i++) {

            var fileName = files[i].name;
            var fileSize = files[i].size;
            var fileExt = fileName.split('.').pop();
            var rawName = fileName.substr(0, files[i].name.lastIndexOf('.'));

            var tableHTML = '';
            tableHTML += "<table class='table-condensed'>"
                    + "<tr>"
                    + "<td width='15%'></td>"
                    + "<td width='38%'></td>"
                    + "<td width='10%'></td>"
                    + "<td width='30%'></td>"
                    + "<td width='5%' rowspan='4' valign='top'> <button type='button' class='close' aria-hidden='true'>×</button> </td>"
                    + "</tr>"
                    + "<tr>"
                    + "<td>File Name:</td>"
                    + "<td> <input class='text form-control col-sm-3' id='tb_title' name='docnameCourt[]' value='" + rawName + "'/> ." + fileExt + " </td>"
                    + "<td>Order:</td>"
                    + "<td rowspan='2'> <textarea id='textarea_order' class='form-control' name='docpurposeCourt[]'></textarea> </td>"
                    + "</tr>"

                    + "<tr>"
                    + "<td >Date Issued:</td>"
                    + "<td>"
                    + "<div class='input-group date'>"
                    + "<span class='input-group-addon'><i class='icon-calendar'></i></span>"
                    + "<input type='text' class='date-picker form-control' id='docUpload_dateIssued_court' name='datefiledCourt[]' data-date-format='yyyy-mm-dd' value='yyyy-mm-dd'>"
                    + "</div>"
                    + "</td>"
                    + "</tr>"

                    + "<tr>"
                    + "<td>Date Received:</td>"
                    + "<td class='col-sm-3'>"
                    + "<div class='input-group date'>"
                    + "<span class='input-group-addon'><i class='icon-calendar'></i></span>"
                    + "<input type='text' class='date-picker form-control' id='docUpload_dateReceived_court' name='datereceivedCourt[]' data-date-format='yyyy-mm-dd' value='yyyy-mm-dd'>"
                    + "</div>"
                    + "</td>"
                    + "<td>Needed Action: </td>"
                    + "<td> <input type='text' class='form-control' id='textarea_action' name='neededActionCourt[]'/> </td>"
                    + "</tr>"
                    + "</table><br><br>";
            tableFileCourt.innerHTML += tableHTML;
        }

        $('#docUpload_dateReceived_court').datepicker();
        $('#docUpload_dateIssued_court').datepicker();

    });


    $("body").on("click", "#remove_row", function() {
        $(this).parent().parent().remove();
    });

    $('#btnaddrecords').live('click', function() {
        var number = document.getElementById('recordsAttendance').value;
        $('#recordsQuestion').hide();

        var table = document.getElementById('attendanceLogTable');
        var internsOptions = getAllInternsOption();

        for (var i = 1; i <= number; i++)
        {
            var row = table.insertRow(table.rows.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);

            var internsHTML = "<select id='internname' name='internname" + i + "' class='form-control'>";
            internsHTML += internsOptions;
            internsHTML += "</select>";

            cell1.innerHTML = internsHTML;
            cell2.innerHTML = "<div class='input-group bootstrap-timepicker'>"
                    + "<span class='input-group-addon'><i class='icon-time'></i></span>"
                    + "<input type='text' class='form-control timepicker attendancetime' name='timestart" + i + "' value=''>"
                    + "</div>";
            cell3.innerHTML = "<div class='input-group bootstrap-timepicker'>"
                    + "<span class='input-group-addon'><i class='icon-time'></i></span>"
                    + "<input type='text' class='form-control timepicker attendancetime' name='timeend" + i + "' value=''>"
                    + "</div>";
            $('.attendancetime').timepicker();
        }
    });


    function getAllInternsOption() {
        var internsHTML = '';

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>people/showinterns",
            dataType: "json",
            data: {},
            async: false,
            success: function(msg) {

                var id_numbers = msg;
                var internNo = id_numbers.length;

                for (var x = 0; x < internNo; x++) {
                    var internID = id_numbers[x];
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url() ?>people/showname/",
                        dataType: "json",
                        data: {id: internID},
                        async: false,
                        success: function(result) {
                            internsHTML += "<option value='" + internID + "'>" + result + "</option>";
                        }, error: function() {
                            alert("error!");

                        }
                    });
                }
            }
        });

        return internsHTML;
    }

//ADD PERSON
    $('#btn_addperson').live('click', function() {

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>people/addexternal",
            data: {use: 'doctestifyadd',
                lastname: $('#objpersonLastName').val(),
                firstname: $('#objpersonFirstName').val(),
                middlename: $('#objpersonMiddleName').val(),
                addrhouse: $('#objpersonAddressHouseNo').val(),
                addrstreet: $('#objpersonAddressStreet').val(),
                addrtown: $('#objpersonAddressTown').val(),
                addrdistrict: $('#objpersonAddressDistrict').val(),
                addrpostalcode: $('#objpersonAddressPostalCode').val(),
                contacthome: $('#objpersonCNHome').val(),
                contactoffice: $('#objpersonCNOffice').val(),
                contactmobile: $('#objpersonCNMobile').val()},
            success: function(result) {
                $("#case-doctestify").html(result);
                $("#case-objtestify").html(result);
                $("#case-tesname").html(result);
            }
        });

        //Removes textfield values
        $('#objpersonFirstName').val('');
        $('#objpersonLastName').val('');
        $('#objpersonMiddleName').val('');
        $('#objpersonAddressHouseNo').val('');
        $('#objpersonAddressStreet').val('');
        $('#objpersonAddressTown').val('');
        $('#objpersonAddressDistrict').val('');
        $('#objpersonAddressPostalCode').val('');
        $('#objpersonCNHome').val('');
        $('#objpersonCNOffice').val('');
        $('#objpersonCNMobile').val('');

    });

    $('#case-btnadddocevidence').live('click', function() {

        var caseID = document.getElementById('inputCaseID').value;
        var case_evidenceof = $('input[name="case-evidenceof"]:checked').val();

        var docName = document.getElementById('case-docname').value;
        var case_doctype = $('input[name="case-doctype"]:checked').val();
        var docdesc = document.getElementById('case-docdesc').value;
        var docpurpose = document.getElementById('case-docpurpose').value;
        var docdateissued = document.getElementById('case-docdateissued').value;
        var docplaceissued = document.getElementById('case-docplaceissued').value;
        var docdatereceived = document.getElementById('case-docdatereceived').value;
        var case_doctestify = $('select[name="case-doctestify"]').val();
        var case_doctestify_name = $("#case-doctestify :selected").text();
        var case_docstatus = $('input[name="case-docstatus"]:checked').val();


        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>cases/addDocuEvidence",
            async: false,
            data: {
                caseID: caseID,
                case_evidenceof: case_evidenceof,
                docName: docName,
                case_doctype: case_doctype,
                docdesc: docdesc,
                docpurpose: docpurpose,
                docdateissued: docdateissued,
                docplaceissued: docplaceissued,
                docdatereceived: docdatereceived,
                case_doctestify: case_doctestify,
                case_docstatus: case_docstatus},
            success: function(result) {

                document.getElementById('case-docname').value = '';
                document.getElementById('case-docdesc').value = '';
                document.getElementById('case-docpurpose').value = '';
                document.getElementById('case-docdateissued').value = 'yyyy-mm-dd';
                document.getElementById('case-docplaceissued').value = '';
                jQuery("#case-doctestify option:first-child").attr("selected", true);

                var table = $('#case-docevidencetable').dataTable();
                table.fnAddData([
                    docName,
                    case_doctestify_name,
                    case_docstatus]);

            }

        });
    });


    $('#case-btnaddobjevidence').live('click', function() {

        var caseID = document.getElementById('inputCaseID').value;
        var case_evidenceof = $('input[name="case-evidenceof"]:checked').val();

        var objname = document.getElementById('case-objname').value;
        var objdesc = document.getElementById('case-objdesc').value;
        var docpurpose = document.getElementById('case-docpurpose').value;
        var objdatereceived = document.getElementById('case-objdatereceived').value;
        var objdateretrieved = document.getElementById('case-objdateretrieved').value;
        var case_objtestify = $('select[name="case-objtestify"]').val();
        var case_objtestify_name = $("#case-objtestify :selected").text();
        var case_objstatus = $('input[name="case-objstatus"]:checked').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>cases/addObjeEvidence",
            async: false,
            data: {
                caseID: caseID,
                case_evidenceof: case_evidenceof,
                objname: objname,
                objdesc: objdesc,
                docpurpose: docpurpose,
                objdatereceived: objdatereceived,
                objdateretrieved: objdateretrieved,
                case_objtestify: case_objtestify,
                case_objstatus: case_objstatus},
            success: function(result) {
                document.getElementById('case-objname').value = '';
                document.getElementById('case-objdesc').value = '';
                document.getElementById('case-docpurpose').value = '';
                document.getElementById('case-objdateretrieved').value = 'yyyy-mm-dd';
                jQuery("#case-objtestify option:first-child").attr("selected", true);

                var table = $('#case-objevidencetable').dataTable();
                table.fnAddData([
                    objname,
                    case_objtestify_name,
                    case_objstatus]);
            }
        });

    });

    $('#case-btnaddtesevidence').live('click', function() {

        var caseID = document.getElementById('inputCaseID').value;
        var case_evidenceof = $('input[name="case-evidenceof"]:checked').val();

        var case_tesname = $('select[name="case-tesname"]').val();
        var case_tesname_name = $("#case-tesname :selected").text();
        var tesrel = document.getElementById('case-tesrel').value;
        var tespurpose = document.getElementById('case-tespurpose').value;
        var tesnarrative = document.getElementById('case-tesnarrative').value;
        var case_tesstatus = $('input[name="case-tesstatus"]:checked').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>cases/addTestEvidence",
            async: false,
            data: {
                caseID: caseID,
                case_evidenceof: case_evidenceof,
                case_tesname: case_tesname,
                tesrel: tesrel,
                tespurpose: tespurpose,
                tesnarrative: tesnarrative,
                case_tesstatus: case_tesstatus},
            success: function(result) {

                jQuery("#case-tesname option:first-child").attr("selected", true);
                document.getElementById('case-tesrel').value = '';
                document.getElementById('case-tespurpose').value = '';
                document.getElementById('case-tesnarrative').value = '';

                var table = $('#case-tesevidencetable').dataTable();
                table.fnAddData([
                    case_tesname_name,
                    tesrel,
                    case_tesstatus]);
            }
        });
    });

    /* LEWIN END */


    /* Add Doc Evidence in Table */
    $('#btnadddocevidence').click(function() {
        var docevidenceof = $('input[name="evidenceof"]:checked').val();
        var docname = $('#docname').val();
        var doctype = $('input[name="doctype"]:checked').val();
        var docdesc = $('#docdesc').val();
        var docpurpose = $('#docpurpose').val();
        var docdateissued = $('#docdateissued').val();
        var docplaceissued = $('#docplaceissued').val();
        var docdatereceived = $('#docdatereceived').val();
        var doctestify = $('select[name="doctestify"]').val();
        var doctestifystr = $('#doctestify option:selected').text();
        var docstatus = $('input[name="docstatus"]:checked').val();

        var table = $('#docevidencetable').dataTable();

        table.fnAddData([
            '<input type="text" name="idocname[]" value="' + docname + '" style="display:none;" readonly>' + docname,
            '<input type="text" name="idoctestify[]" value="' + doctestify + '" style="display:none;" readonly>' + doctestifystr,
            '<input type="text" name="idocstatus[]" value="' + docstatus + '" style="display:none;" readonly>' + docstatus,
            '<input type="text" name="idoctype[]" value="' + doctype + '" style="border:none;" readonly>',
            '<input type="text" name="idocdesc[]" value="' + docdesc + '" style="border:none;" readonly>',
            '<input type="text" name="idocpurpose[]" value="' + docpurpose + '" style="border:none;" readonly>',
            '<input type="text" name="idocdateissued[]" value="' + docdateissued + '" style="border:none;" readonly>',
            '<input type="text" name="idocplaceissued[]" value="' + docplaceissued + '" style="border:none;" readonly>',
            '<input type="text" name="idocdatereceived[]" value="' + docdatereceived + '" style="border:none;" readonly>',
            '<input type="text" name="idocevidenceof[]" value="' + docevidenceof + '" style="border:none;" readonly>'
        ]);

        //Hide columns
        $('#docevidencetable tr td:nth-child(4)').addClass('hide');
        $('#docevidencetable tr td:nth-child(5)').addClass('hide');
        $('#docevidencetable tr td:nth-child(6)').addClass('hide');
        $('#docevidencetable tr td:nth-child(7)').addClass('hide');
        $('#docevidencetable tr td:nth-child(8)').addClass('hide');
        $('#docevidencetable tr td:nth-child(9)').addClass('hide');
        $('#docevidencetable tr td:nth-child(10)').addClass('hide');

        //Removes textfields values
        $('#docname').val('');
        $('#docdesc').val('');
        $('#docpurpose').val('');
        $('#docdateissued').val('yyyy-mm-dd');
        $('#docplaceissued').val('');
    });

    /* Add Obj Evidence in Table */
    $('#btnaddobjevidence').click(function() {
        var objevidenceof = $('input[name="evidenceof"]:checked').val();
        var objname = $('#objname').val();
        var objdesc = $('#objdesc').val();
        var objdatereceived = $('#objdatereceived').val();
        var objdateretrieved = $('#objdateretrieved').val();
        var objtestify = $('select[name="objtestify"]').val();
        var objtestifystr = $('#objtestify option:selected').text();
        var objstatus = $('input[name="objstatus"]:checked').val();

        var table = $('#objevidencetable').dataTable();

        table.fnAddData([
            '<input type="text" name="iobjname[]" value="' + objname + '" style="display:none;" readonly>' + objname,
            '<input type="text" name="iobjtestify[]" value="' + objtestify + '" style="display:none;" readonly>' + objtestifystr,
            '<input type="text" name="iobjstatus[]" value="' + objstatus + '" style="display:none;" readonly>' + objstatus,
            '<input type="text" name="iobjdesc[]" value="' + objdesc + '" style="border:none;" readonly>',
            '<input type="text" name="iobjdatereceived[]" value="' + objdatereceived + '" style="border:none;" readonly>',
            '<input type="text" name="iobjdateretrieved[]" value="' + objdateretrieved + '" style="border:none;" readonly>',
            '<input type="text" name="iobjevidenceof[]" value="' + objevidenceof + '" style="border:none;" readonly>'
        ]);

        //Hide columns
        $('#objevidencetable tr td:nth-child(4)').addClass('hide');
        $('#objevidencetable tr td:nth-child(5)').addClass('hide');
        $('#objevidencetable tr td:nth-child(6)').addClass('hide');
        $('#objevidencetable tr td:nth-child(7)').addClass('hide');

        //Remove textfield values
        $('#objname').val('');
        $('#objdesc').val('');
        $('#objdateretrieved').val('yyyy-mm-dd');
    });

    /* Add Tes Evidence in Table */
    $('#btnaddtesevidence').click(function() {
        var tesevidenceof = $('input[name="evidenceof"]:checked').val();
        var tesname = $('#tesname').val();
        var tesnamestr = $('#tesname option:selected').text();
        var tesrel = $('#tesrel').val();
        var tespurpose = $('#tespurpose').val();
        var tesnarrative = $('#tesnarrative').val();
        var tesstatus = $('input[name="tesstatus"]:checked').val();

        var table = $('#tesevidencetable').dataTable();

        table.fnAddData([
            '<input type="text" name="itesname[]" value="' + tesname + '" style="display:none;" readonly>' + tesnamestr,
            '<input type="text" name="itesrel[]" value="' + tesrel + '" style="display:none;" readonly>' + tesrel,
            '<input type="text" name="itesstatus[]" value="' + tesstatus + '" style="display:none;" readonly>' + tesstatus,
            '<input type="text" name="itespurpose[]" value="' + tespurpose + '" style="border:none;" readonly>',
            '<input type="text" name="itesnarrative[]" value="' + tesnarrative + '" style="border:none;" readonly>',
            '<input type="text" name="itesevidenceof[]" value="' + tesevidenceof + '" style="border:none;" readonly>'
        ]);

        $('#tesevidencetable tr td:nth-child(4)').addClass('hide');
        $('#tesevidencetable tr td:nth-child(5)').addClass('hide');
        $('#tesevidencetable tr td:nth-child(6)').addClass('hide');

        //Removes textfield values
        $('#tesrel').val('');
        $('#tespurpose').val('');
        $('#tesnarrative').val('');
    });

    /* Adds doc person to testify  */
    $('#btnaddpersondoc').click(function() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>people/addexternal",
            data: {use: 'doctestifyadd',
                lastname: $('#docpersonLastName').val(),
                firstname: $('#docpersonFirstName').val(),
                middlename: $('#docpersonMiddleName').val(),
                addrhouse: $('#docpersonAddressHouseNo').val(),
                addrstreet: $('#docpersonAddressStreet').val(),
                addrtown: $('#docpersonAddressTown').val(),
                addrdistrict: $('#docpersonAddressDistrict').val(),
                addrpostalcode: $('#docpersonAddressPostalCode').val(),
                contacthome: $('#docpersonCNHome').val(),
                contactoffice: $('#docpersonCNOffice').val(),
                contactmobile: $('#docpersonCNMobile').val()},
            success: function(result) {
                $("#doctestifydiv").html(result);
            }
        });

        //Removes textfield values
        $('#docpersonFirstName').val('');
        $('#docpersonLastName').val('');
        $('#docpersonMiddleName').val('');
        $('#docpersonAddressHouseNo').val('');
        $('#docpersonAddressStreet').val('');
        $('#docpersonAddressTown').val('');
        $('#docpersonAddressDistrict').val('');
        $('#docpersonAddressPostalCode').val('');
        $('#docpersonCNHome').val('');
        $('#docpersonCNOffice').val('');
        $('#docpersonCNMobile').val('');

        //Change other dropdowns
        var clientid = $('select[name="appclient"]').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>application/removeclient/" + clientid + '/objtestify',
            success: function(result) {
                $("#objtestifydiv").html(result);
            }
        });

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>application/removeclient/" + clientid + '/tesname',
            success: function(result) {
                $("#tesnamediv").html(result);
            }
        });

    });

    /* Adds obj person to testify  */
    $('#btnaddpersonobj').click(function() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>people/addexternal",
            data: {use: 'doctestifyadd',
                lastname: $('#objpersonLastName').val(),
                firstname: $('#objpersonFirstName').val(),
                middlename: $('#objpersonMiddleName').val(),
                addrhouse: $('#objpersonAddressHouseNo').val(),
                addrstreet: $('#objpersonAddressStreet').val(),
                addrtown: $('#objpersonAddressTown').val(),
                addrdistrict: $('#objpersonAddressDistrict').val(),
                addrpostalcode: $('#objpersonAddressPostalCode').val(),
                contacthome: $('#objpersonCNHome').val(),
                contactoffice: $('#objpersonCNOffice').val(),
                contactmobile: $('#objpersonCNMobile').val()},
            success: function(result) {
                $("#objtestifydiv").html(result);
            }
        });

        //Removes textfield values
        $('#objpersonFirstName').val('');
        $('#objpersonLastName').val('');
        $('#objpersonMiddleName').val('');
        $('#objpersonAddressHouseNo').val('');
        $('#objpersonAddressStreet').val('');
        $('#objpersonAddressTown').val('');
        $('#objpersonAddressDistrict').val('');
        $('#objpersonAddressPostalCode').val('');
        $('#objpersonCNHome').val('');
        $('#objpersonCNOffice').val('');
        $('#objpersonCNMobile').val('');

        //Change other dropdowns
        var clientid = $('select[name="appclient"]').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>application/removeclient/" + clientid + '/doctestify',
            success: function(result) {
                $("#doctestifydiv").html(result);
            }
        });

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>application/removeclient/" + clientid + '/tesname',
            success: function(result) {
                $("#tesnamediv").html(result);
            }
        });
    });

    /* Adds testi person */
    $('#btnaddpersontes').click(function() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>people/addexternal",
            data: {use: 'tesnameadd',
                lastname: $('#tespersonLastName').val(),
                firstname: $('#tespersonFirstName').val(),
                middlename: $('#tespersonMiddleName').val(),
                addrhouse: $('#tespersonAddressHouseNo').val(),
                addrstreet: $('#tespersonAddressStreet').val(),
                addrtown: $('#tespersonAddressTown').val(),
                addrdistrict: $('#tespersonAddressDistrict').val(),
                addrpostalcode: $('#tespersonAddressPostalCode').val(),
                contacthome: $('#tespersonCNHome').val(),
                contactoffice: $('#tespersonCNOffice').val(),
                contactmobile: $('#tespersonCNMobile').val()},
            success: function(result) {
                $("#tesnamediv").html(result);
            }
        });

        //Removes textfield values
        $('#tespersonFirstName').val('');
        $('#tespersonLastName').val('');
        $('#tespersonMiddleName').val('');
        $('#tespersonAddressHouseNo').val('');
        $('#tespersonAddressStreet').val('');
        $('#tespersonAddressTown').val('');
        $('#tespersonAddressDistrict').val('');
        $('#tespersonAddressPostalCode').val('');
        $('#tespersonCNHome').val('');
        $('#tespersonCNOffice').val('');
        $('#tespersonCNMobile').val('');

        //Change other dropdowns
        var clientid = $('select[name="appclient"]').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>application/removeclient/" + clientid + '/objtestify',
            success: function(result) {
                $("#objtestifydiv").html(result);
            }
        });

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>application/removeclient/" + clientid + '/doctestify',
            success: function(result) {
                $("#doctestifydiv").html(result);
            }
        });
    });


    $(document).ready(function() {

// Client name to other tabs
        $('#appclient').change(function() {
            var clientname = $('#appclient option:selected').text();
            var clientid = $('select[name="appclient"]').val();

            $('.clientnamediv').html(clientname);

            //Client name should not be in person to testify / testi / etc dropdowns
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>application/removeclient/" + clientid + '/opposing',
                success: function(result) {
                    $("#opposingpartydiv").html(result);
                }
            });

        });

//Interview date to received dates
        $('#appinterviewdate').change(function() {
            var date = $('#appinterviewdate').val();
            $('.datereceived').val(date);
        });

//Hide salary etc if unemployed
        $('input[name="clientJobless"]').change(function() {
            var clientjobless = $('input[name="clientJobless"]:checked').val();

            if (clientjobless == 2) {
                $('#hideifunemployed').css('display', 'none');
            }
            else {
                $('#hideifunemployed').css('display', 'block');
            }
        });

//Hide decision if reason is by the client
        $('input[name="applytoclosereason"]').change(function() {
            var clientreason = $('input[name="applytoclosereason"]:checked').val();
            if (clientreason == 1) {
                $('#radio-courts-decision').css('display', 'none');
            }
            else {
                $('#radio-courts-decision').css('display', 'block');
            }
        });


//Button Create Action Plan
        $('#btncreateactionplan').click(function() {
            $('#actionplandiv').removeClass('disable');
            $('#actionplandiv').removeClass('fadedopp');
            $('#editingdiv').removeClass('hide');
            $('#btncreateactionplan').addClass('hide');
            $('#submitactionplanbtndiv').removeClass('hide');
            $('#saveactionplanbtndiv').removeClass('hide');
        });
 

//Add action
        $('#btnaddaction').click(function() {
            var stage = $('#newactionstage').val();
            var action = $('#newaction').val();
            var table;

            if (stage == 1)
                table = document.getElementById("action1table");
            else if (stage == 2)
                table = document.getElementById("action2table");
            else if (stage == 3)
                table = document.getElementById("action3table");
            else if (stage == 4)
                table = document.getElementById("action4table");
            else if (stage == 5)
                table = document.getElementById("action5table");
            {
                var row = table.insertRow(table.rows.length);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                cell1.innerHTML = "<input type='checkbox' name='action" + stage + "[]' value='" + action + "' style='margin: 0px 5px 0px 10px;' />";
                cell2.innerHTML = "<input name='actionname" + stage + "[]' value='" + action + "' class='hide'>" + action;
            }

            $('#newactionstage').val(1);
            $('#newaction').val('');
        });


//Approve action plan (lawyer)
        $('#btnapproveactionplan').click(function() {
            var cid = "<?php echo $this->session->userdata('cid') ?>";
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>cases/approveactionplan/" + cid,
                success: function(result) {
                    $("#actionPlan").html(result);
                }
            });
        });

//Appointment attendees change on case change 
        $('#newappt_case').change(function() {
            var cid = $('select[name="newappt_case"]').val();
            var uid = <?php echo $this->session->userdata('userid') ?>;

            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>calendar/change_attendees/" + cid + '/' + uid,
                success: function(result) {
                    $("#internsdiv").html(result);
                }
            });
        });

//Close view appointment div
        $('.btnapptclose').click(function() {
            $('#viewapptdiv').removeClass('hide');
            $('#cantattendapptdiv').addClass('hide');
            $('#editapptdiv').addClass('hide');
            $('#doneapptdiv').addClass('hide');
            $('#deleteapptdiv').addClass('hide');
        });

//last
    });

//Tid general click: refresh page
    $('#tidgeneral').click(function() {
        var cid = "<?php echo $this->session->userdata('cid') ?>";
        window.location.assign("<?php echo base_url() ?>cases/caseFolder/" + cid);
    });
     //!!popover, actionplan
    
    $('.popover-orig').click(function(){
      $('#actionPlanOption1').removeClass('hide');
      $('#actionPlanOption2').addClass('hide');
      $('#actionPlanOption3').addClass('hide');
      $('#actionPlanOption4').addClass('hide');
  });

  $('.popover-editing').click(function(){
        //editing
        $('#actionPlanOption1').addClass('hide');
        $('#actionPlanOption2').addClass('hide');
        $('#actionPlanOption3').addClass('hide');
        $('#actionPlanOption4').removeClass('hide');  
    });
    
    $(document).on('click','.getActionButton',function(){
        $('#actionPlanOption1').addClass('hide');
        $('#actionPlanOption2').removeClass('hide');
        $('#actionPlanOption3').addClass('hide');
        $('#actionPlanOption4').addClass('hide'); 
    });
    
    $(document).on('click','.editActionButton',function(){
        $('#editAction').removeClass('hide');
        $('#deleteAction').addClass('hide');
        $('#actionPlanWriteNotes').addClass('hide');
        $('#getActionButton').addClass('hide');
    });
    
    $(document).on('click','.editActionButton2',function(){
        $('#editAction2').removeClass('hide');
        $('#deleteAction2').addClass('hide');
        $('#actionPlanWriteNotes2').addClass('hide');
    });
    
    $(document).on('click','.deleteActionButton',function(){
        $('#editAction').addClass('hide');
        $('#deleteAction').removeClass('hide');
        $('#actionPlanWriteNotes').addClass('hide');
        $('#getActionButton').addClass('hide');
        $('#editActionButton').addClass('hide');
        $('#deleteActionButton').addClass('hide');
       
    });
    
    $(document).on('click','.deleteActionButton2',function(){
        $('#editAction2').addClass('hide');
        $('#deleteAction2').removeClass('hide');
        $('#actionPlanWriteNotes2').addClass('hide');
        $('#getActionButton2').addClass('hide');
        $('#editActionButton2').addClass('hide');
        $('#deleteActionButton2').addClass('hide');
       
    });
    
    $(document).on('click','.saveActionButton',function(){
        $('#editAction').addClass('hide');
        $('#deleteAction').addClass('hide');
        $('#actionPlanWriteNotes').removeClass('hide');
        $('#getActionButton').removeClass('hide');
    });
    
    $(document).on('click','.saveActionButton2',function(){
        $('#editAction2').addClass('hide');
        $('#deleteAction2').addClass('hide');
        $('#actionPlanWriteNotes2').removeClass('hide');
    });
    
      $(document).on('click','.cancelEditButton',function(){
        $('#editAction').addClass('hide');
        $('#deleteAction').addClass('hide');
        $('#actionPlanWriteNotes').removeClass('hide');
        $('#getActionButton').removeClass('hide');
        $('#editActionButton').removeClass('hide');
        $('#deleteActionButton').removeClass('hide');
    });
   
   $(document).on('click','.cancelEditButton2',function(){
        $('#editAction2').addClass('hide');
        $('#deleteAction2').addClass('hide');
        $('#actionPlanWriteNotes2').removeClass('hide');
        $('#getActionButton2').removeClass('hide');
        $('#editActionButton2').removeClass('hide');
        $('#deleteActionButton2').removeClass('hide');
    });
    
        $(document).on('click','.cancelDeleteButton',function(){
        $('#editAction').addClass('hide');
        $('#deleteAction').addClass('hide');
        $('#actionPlanWriteNotes').removeClass('hide');
        $('#getActionButton').removeClass('hide');
        $('#editActionButton').removeClass('hide');
        $('#deleteActionButton').removeClass('hide');
    });
    
        $(document).on('click','.cancelDeleteButton2',function(){
        $('#editAction2').addClass('hide');
        $('#deleteAction2').addClass('hide');
        $('#actionPlanWriteNotes2').removeClass('hide');
        $('#getActionButton2').removeClass('hide');
        $('#editActionButton2').removeClass('hide');
        $('#deleteActionButton2').removeClass('hide');
    });
   
</script>

<!-- VIANICAAAAAAAAAA ------------------------------------------------------->
<script type='text/javascript'>
$(document).ready(function() {
       
    $('#preEvalOffense').change(function() {
       alert('hello');    
       
       
       
    });
   
});
   
   
   
   
 
</script>


<!-- AJAX AJAX AJAX AJAX AJAX AJAX AJAX AJAX AJAX AJAX AJAX AJAX AJAX AJAX -->
<script type="text/javascript">
    /* Loads edit appointment modal body with data */
    $('.classedit').click(function() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>intern/preEditAppointment/",
            success: function(result) {
                $("#editAppointmentModalBody").html(result);
            }
        });
    });

    /* Adds opposing party */
    $('#btnaddopposingparty').click(function() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>people/addexternal",
            data: {use: 'opposingparty', lastname: $('#partyLastName').val(),
                firstname: $('#partyFirstName').val(),
                middlename: $('#partyMiddleName').val(),
                addrhouse: $('#partyAddressHouseNo').val(),
                addrstreet: $('#partyAddressStreet').val(),
                addrtown: $('#partyAddressTown').val(),
                addrdistrict: $('#partyAddressDistrict').val(),
                addrpostalcode: $('#partyAddressPostalCode').val(),
                contacthome: $('#partyCNHome').val(),
                contactoffice: $('#partyCNOffice').val(),
                contactmobile: $('#partyCNMobile').val()},
            success: function(result) {
                $("#opposingpartydiv").html(result);
            }
        });

        //Removes textfield values
        $('#partyFirstName').val('');
        $('#partyLastName').val('');
        $('#partyMiddleName').val('');
        $('#partyAddressHouseNo').val('');
        $('#partyAddressStreet').val('');
        $('#partyAddressTown').val('');
        $('#partyAddressDistrict').val('');
        $('#partyAddressPostalCode').val('');
        $('#partyCNHome').val('');
        $('#partyCNOffice').val('');
        $('#partyCNMobile').val('');
    });

</script>


<!-- JAVASCRIPT FUNCTIONS -->
<script>

    function generalclick(id) {

    }

    function reassignclick(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>calendar/view_reassignmodal/" + id,
            success: function(result) {
                $("#reassignmodaldiv").html(result);
            }
        });
    }

    function fileclick(id, vdocname, vdocpath) {
        $('#tb_title_draftasdoc').val(vdocname);
        $('#documentID').val(id);
    }

    function uploadclick(id) {
        $('#documentid').val(id);
    }

    function doneclick(id) {
        $('#taskID').val(id);
    }

    function notifclick(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>application/changestatus/" + id + '/1',
            success: function(result) {
                $("#ulnotif").html(result);
            }
        });
    }

    function actionclick(id, stage, currentstage) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>cases/changeactionstatus/" + id,
            success: function(result) {
            }
        });

        if (currentstage == 1) {
            if ($('.cbactionstage1:checked').length == $('.cbactionstage1').length) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>cases/nextstage/" + id,
                    success: function(result) {
                        alert('The case has moved to the next stage.');
                        var cid = "<?php echo $this->session->userdata('cid') ?>";
                        window.location.assign("<?php echo base_url() ?>cases/caseFolder/" + cid);
                    }
                });
            }
        }
        else if (currentstage == 2) {
            if ($('.cbactionstage2:checked').length == $('.cbactionstage2').length) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>cases/nextstage/" + id,
                    success: function(result) {
                        alert('The case has moved to the next stage.');
                        var cid = "<?php echo $this->session->userdata('cid') ?>";
                        window.location.assign("<?php echo base_url() ?>cases/caseFolder/" + cid);
                    }
                });
            }
        }
        else if (currentstage == 3) {
            if ($('.cbactionstage3:checked').length == $('.cbactionstage3').length) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>cases/nextstage/" + id,
                    success: function(result) {
                        alert('The case has moved to the next stage.');
                        var cid = "<?php echo $this->session->userdata('cid') ?>";
                        window.location.assign("<?php echo base_url() ?>cases/caseFolder/" + cid);
                    }
                });
            }
        }
        else if (currentstage == 4) {
            if ($('.cbactionstage4:checked').length == $('.cbactionstage4').length) {
                alert("Trial stage has been completed.");
                var cid = "<?php echo $this->session->userdata('cid') ?>";
                window.location.assign("<?php echo base_url() ?>cases/caseFolder/" + cid);
            }
        }
    }
</script>


<!-- END JAVASCRIPTS DO NOT TOUCH -------------------------------------------->
<script>

    $(function() {
        var tooltips = $("[title]").tooltip();
        $(document).ready(function() {
            tooltips.tooltip("open");
        });
    });
    var _gauges = _gauges || [];
    (function() {
        var t = document.createElement('script');
        t.type = 'text/javascript';
        t.async = true;
        t.id = 'gauges-tracker';
        t.setAttribute('data-site-id', '4f0dc9fef5a1f55508000013');
        t.src = '//secure.gaug.es/track.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(t, s);
    })();
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-146052-10']);
    _gaq.push(['_trackPageview']);
    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
    $(document).ready(function() {
        /* ---------- Text editor ---------- */
        $('.cleditor').cleditor();
        /* ---------- Datapicker ---------- */
        $('.date-picker').datepicker();
        $('.time-picker').timepicker();
        /* ---------- Choosen ---------- */
        $('[data-rel="chosen"],[rel="chosen"]').chosen();
        /* ---------- Placeholder Fix for IE ---------- */
        $('input, textarea').placeholder();
        /* ---------- Auto Height texarea ---------- */
        $('textarea').autosize();
        /* ---------- Masked Input ---------- */
        $("#date").mask("99/99/9999");
        $("#phone").mask("(999) 999-9999");
        $("#tin").mask("99-9999999");
        $("#ssn").mask("999-99-9999");
        $.mask.definitions['~'] = '[+-]';
        $("#eyescript").mask("~9.99 ~9.99 999");
        /* ---------- Textarea with limits ---------- */
        $('#limit').inputlimiter({
            limit: 10,
            limitBy: 'words',
            remText: 'You only have %n word%s remaining...',
            limitText: 'Field limited to %n word%s.'
        });
        /* ---------- Timepicker for Bootstrap ---------- */
        $('#timepicker1').timepicker();
        /* ---------- DateRangepicker for Bootstrap ---------- */
        $('#daterange').daterangepicker();
        /* ---------- Bootstrap Wysiwig ---------- */
        $('.editor').wysiwyg();
        /* ---------- Colorpicker for Bootstrap ---------- */
        $('#colorpicker1').colorpicker();
    });

</script>


</html>
