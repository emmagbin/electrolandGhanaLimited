<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel File Upload and Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            padding: 20px;
        }

        input[type="file"] {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }
    </style>
    
    <style>
        .form-inline {
            display: flex;
            align-items: center;
            gap: 10px; /* Space between the file input and button */
        }
        .form-inline .form-control {
            flex: 1; /* Allows the file input to take up available space */
        }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container">

        <div class="container mt-5">
        <form id="uploadForm" enctype="multipart/form-data" class="form-inline">
            <?= csrf_field(); ?>
            <input type="file" id="fileInput" class="form-control mr-2" name="excel_file" accept=".xlsx, .xls" required>
            <button type="submit" class="btn btn-primary " style="margin-top: -20px;" >Upload</button>
        </form>
        <div id="responseMessage" class="mt-3"></div>
    </div>
<div id="responseMessage"></div>
         
        <table id="dataTable" class="display">

            <thead>
                <tr id="headerRow"></tr>
            </thead>
            <tbody id="dataBody"></tbody>
        </table>
    </div>


    


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <!-- xlsx Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script>
        document.getElementById('fileInput').addEventListener('change', handleFile, false);

        function handleFile(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                const data = new Uint8Array(e.target.result);
                const workbook = XLSX.read(data, { type: 'array' });

                // Assuming you want to read the first sheet
                const sheetName = workbook.SheetNames[0];
                const sheet = workbook.Sheets[sheetName];
                const rows = XLSX.utils.sheet_to_json(sheet, { header: 1 });

                if (rows.length > 0) {
                    const headers = rows[0].map(header => header ? header.trim() : '').filter(header => header !== '');

                    if (validateHeader(headers)) {
                        displayTable(rows);
                    } else {
                        alert('The uploaded file does not have the correct headers. Please check the file and try again.');
                    }
                } else {
                    alert('No data found in the uploaded file.');
                }
            };
            reader.readAsArrayBuffer(file);
        }

        function validateHeader(headers) {
            // Expected headers in the correct order
            const expectedHeaders = ['Year', 'Stocks', 'T.Bills', 'T.Bonds'];
            return expectedHeaders.every((header, index) => header === headers[index]);
        }

        function displayTable(rows) {
            const headerRow = document.getElementById('headerRow');
            const dataBody = document.getElementById('dataBody');

            headerRow.innerHTML = '';
            dataBody.innerHTML = '';

            if (rows.length === 0) return;

            // Create header row
            const headers = rows[0].map(header => header ? header.trim() : '');
            headers.forEach((header) => {
                const th = document.createElement('th');
                th.textContent = header;
                headerRow.appendChild(th);
            });

            // Create data rows
            for (let i = 1; i < rows.length; i++) {
                const tr = document.createElement('tr');
                rows[i].forEach((cell, index) => {
                    const td = document.createElement('td');
                    td.textContent = cell;
                    tr.appendChild(td);
                });
                dataBody.appendChild(tr);
            }

            // Initialize DataTables
            $('#dataTable').DataTable({
                responsive: true
            });
        }
    </script>

    <script>
        $('#sendData').click(function() {
            var tableData = [];
            $('#dataTable tr').each(function(row, tr) {
                var rowData = [];
                $(tr).find('td').each(function(col, td) {
                    rowData.push($(td).text());
                });
                if (rowData.length > 0) {
                    tableData.push(rowData);
                }
            });

            $.ajax({
                url: 'bulk-insert',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(tableData),
                success: function(response) {
                    alert(response);
                    alert('Data inserted successfully');
                },
                error: function() {
                    alert('Error inserting data');
                }
            });
        });
    </script>


    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script>
$(document).ready(function() {

    $('#uploadForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting the default way

        var formData = new FormData(this); // Create FormData object
        var $submitButton = $(this).find('button[type="submit"]'); // Find the submit button
         var $fileInput = $(this).find('input[type="file"]'); 

        $submitButton.prop('disabled', true).text('Uploading...'); // Disable button and change text

        $.ajax({
            url: 'bulkinsert', // The URL to send the request to
            type: 'POST',
            data: formData,
            contentType: false, // Prevent jQuery from setting contentType
            processData: false, // Prevent jQuery from processing data
            success: function(response) {
                $('#responseMessage').html('<p>' + response.message + '</p>');
                $submitButton.prop('disabled', false).text('Upload'); // Re-enable button and change text
                        var table = $('#dataTable').DataTable();
                        table.clear().draw(); // Clear DataTable data
                        $('#headerRow').empty(); // Clear table headers
                        $('#dataBody').empty();  // Clear table body

                        // Reset the file input
                        $fileInput.val('');


            },
            error: function(xhr, status, error) {
                $('#responseMessage').html('<p>Error uploading file.</p>');
                console.error(xhr.responseText); // For debugging
                $submitButton.prop('disabled', false).text('Upload'); // Re-enable button and change text
            }
        });
    });
});
</script>


</body>
</html>
