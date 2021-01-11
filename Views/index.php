<!DOCTYPE html>
<html>
    <head>
        <title>REXX SYSTEM | TASK</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <style type="text/css">
            .card {
                margin: 0 auto; /* Added */
                float: none; /* Added */
                margin-bottom: 10px; /* Added */
                margin-top: 20px;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">REXX SYSTEM | TASK</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

        <div class="card" style="margin: 1%;">
            <h5 class="card-header">Please Upload JSON file here</h5>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <input type="file" name="importfile" id="importfile"  accept="application/json">
                    <input type="submit" value="Upload File" class="btn btn-outline-primary" name="submit">
                </form>
                <div>
                    <hr>
                    <h3>Filters</h3>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item"><b>Employee Names</b><hr>
                            <select id="name_dropdown">
                                <option value="">--Select--</option>
                            </select>
                        </li>
                        <li class="list-group-item"><b>Event Names</b><hr>
                            <select id="event_name_dropdown">
                                <option value="">--Select--</option>
                            </select>
                        </li>
                        <li class="list-group-item"><b>Event Dates</b><hr>
                            <select id="event_date_dropdown">
                                <option value="">--Select--</option>
                            </select>
                        </li>
                        <li class="list-group-item">
                            <button type="button" id="search" onclick="loadfilters()" class="btn btn-success">Search</button>
                            <button type="button" id="refresh" class="btn btn-primary">Refresh</button>
                        </li>
                    </ul>
                    <table class="table table-bordered table-sm table-responsive" style="margin: 1%;" id="rexx_tbl">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Participation Id</th>
                                <th scope="col">Employee Name</th>
                                <th scope="col">Employee Email</th>
                                <th scope="col">Event Id</th>
                                <th scope="col">Event Name</th>
                                <th scope="col">Participation Fee</th>
                                <th scope="col">Event Date</th>
                                <th scope="col">Version</th>
                            </tr>
                        </thead>
                        <tbody id="rexx_tbl_body">

                        </tbody>
                    </table>
                </div>
            </div>

        </div>


        <script type="text/javascript">

            $(function () {
                loadTable();
                loadEmpNames();
                loadEventNames();
                loadEventDates();
            })
            $("#refresh").click(function () {
                location.reload(true);
            });
            function loadfilters() {
                emp_name = $('#name_dropdown option:selected').val();
                event_name = $('#event_name_dropdown option:selected').val();
                event_date = $('#event_date_dropdown option:selected').val();
                loadTable(emp_name, event_name, event_date);
            }

            function loadTable(emp_name = '', event_name = '', event_date = '') {
                $.ajax({
                    url: "<?php echo $DynamicUrl . '/get_bookings_data'; ?>",
                    data: {
                        emp_name: emp_name,
                        event_name: event_name,
                        event_date: event_date
                    },
                    type: "GET",
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        var resultData = dataResult.Data[0];
                        console.log(resultData.length);
                        var bodyData = '';
                        var i = 1;
                        if (resultData.length != 0) {
                            $.each(resultData, function (index, row) {
                                bodyData += "<tr>"
                                bodyData += " <td>" + i++ + "</td>\n\
                                                <td>" + row.employee_mail + "</td>\n\
                                                <td>" + row.employee_name + "</td>\n\
                                                <td>" + row.event_date + "</td>\n\
                                                <td>" + row.event_id + "</td>\n\
                                                <td>" + row.event_name + "</td>\n\
                                                <td>" + row.participation_fee + "</td>\n\
                                                <td>" + row.participation_id + "</td>\n\
                                                <td>" + row.version + "</td>";
                                bodyData += "</tr>";
                            });
                            bodyData += "<tr><td colspan=4 style='text-align:center'>Total Participation Fees:-</td>\n\
                                              <td colspan=5>" + parseFloat(dataResult.Data[1]).toFixed(2) + "</td></tr>";
                        } else {
                            bodyData += "<tr>"
                            bodyData += "<td colspan=9 style='text-align:center'>No data found</td>"
                            bodyData += "</tr>";
                        }
                        $("#rexx_tbl_body").empty();
                        $("#rexx_tbl").append(bodyData);
                    }
                });
            }
            function loadEmpNames() {
                $.ajax({
                    url: "<?php echo $DynamicUrl . '/get_emp_name'; ?>",
                    data: "",
                    type: "GET",
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        console.log(dataResult);
                        var resultData = dataResult.Data;
                        var bodyData = '';
                        $.each(resultData, function (index, row) {
                            bodyData += "<option value=" + row.employee_name + ">" + row.employee_name + "</option>"
                        });
                        $("#name_dropdown").append(bodyData);
                    }
                });
            }
            function loadEventNames() {
                $.ajax({
                    url: "<?php echo $DynamicUrl . '/get_event_name'; ?>",
                    data: "",
                    type: "GET",
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        console.log(dataResult);
                        var resultData = dataResult.Data;
                        var bodyData = '';
                        $.each(resultData, function (index, row) {
                            bodyData += "<option value=" + row.event_name + ">" + row.event_name + "</option>"
                        });
                        $("#event_name_dropdown").append(bodyData);
                    }
                });
            }
            function loadEventDates() {
                $.ajax({
                    url: "<?php echo $DynamicUrl . '/get_event_date'; ?>",
                    data: "",
                    type: "GET",
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        console.log(dataResult);
                        var resultData = dataResult.Data;
                        var bodyData = '';
                        $.each(resultData, function (index, row) {
                            bodyData += "<option value=" + row.event_date + ">" + row.event_date + "</option>"
                        });
                        $("#event_date_dropdown").append(bodyData);
                    }
                });
            }

        </script>
    </body>
</html>
