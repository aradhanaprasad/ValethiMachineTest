<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Json</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>
    <form id="data" method="post" enctype="multipart/form-data" class="container" style="margin-top: 100px;">
        <h3>Upload Json File</h3>
        <input name="uploadJson" type="file" />
        <button class="btn-primary">Upload</button>
    </form>
    <br><br>
    <div class="container">
        <h3>Uploaded Data</h3>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>UPC</th>
                    <th>Category Name</th>
                    <th>Manufacture</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha512-M5KW3ztuIICmVIhjSqXe01oV2bpe248gOxqmlcYrEzAvws7Pw3z6BK0iGbrwvdrUQUhi3eXgtxp5I8PDo9YfjQ=="
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js'></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "http://127.0.0.1:8000/api/uploadJsonFileData",
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'Product_Code',
                        name: 'Product_Code'
                    },
                    {
                        data: 'Product_Name',
                        name: 'Product_Name'
                    },
                    {
                        data: 'UPC',
                        name: 'UPC'
                    },
                    {
                        data: 'Category_Name',
                        name: 'Category_Name'
                    },
                    {
                        data: 'Manufacture',
                        name: 'Manufacture'
                    },
                    {
                        data: 'Description',
                        name: 'Description'
                    },
                ]
            });

            $("form#data").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: 'http://127.0.0.1:8000/api/uploadJsonFile',
                    type: 'POST',
                    data: formData,
                    success: function(data) {
                        alert("Data stored successfully. Please refresh page.")
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });

        });
    </script>

</body>

</html>
