<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }

        .table-responsive {
            margin: 30px 0;
        }

        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            min-width: 1000px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 15px;
            background: #435d7d;
            color: #fff;
            padding: 16px 30px;
            min-width: 100%;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .table-title .btn-group {
            float: right;
        }

        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 100px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }

        table.table td a:hover {
            color: #2196F3;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #F44336;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a,
        .pagination li.active a.page-link {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }

        /* Custom checkbox */
        .custom-checkbox {
            position: relative;
        }

        .custom-checkbox input[type="checkbox"] {
            opacity: 0;
            position: absolute;
            margin: 5px 0 0 3px;
            z-index: 9;
        }

        .custom-checkbox label:before {
            width: 18px;
            height: 18px;
        }

        .custom-checkbox label:before {
            content: '';
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1px solid #bbb;
            border-radius: 2px;
            box-sizing: border-box;
            z-index: 2;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            content: '';
            position: absolute;
            left: 6px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid #000;
            border-width: 0 3px 3px 0;
            transform: inherit;
            z-index: 3;
            transform: rotateZ(45deg);
        }

        .custom-checkbox input[type="checkbox"]:checked+label:before {
            border-color: #03A9F4;
            background: #03A9F4;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            border-color: #fff;
        }

        .custom-checkbox input[type="checkbox"]:disabled+label:before {
            color: #b8b8b8;
            cursor: auto;
            box-shadow: none;
            background: #ddd;
        }

        /* Modal styles */
        .modal .modal-dialog {
            max-width: 400px;
        }

        .modal .modal-header,
        .modal .modal-body,
        .modal .modal-footer {
            padding: 20px 30px;
        }

        .modal .modal-content {
            border-radius: 3px;
            font-size: 14px;
        }

        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }

        .modal .modal-title {
            display: inline-block;
        }

        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }

        .modal textarea.form-control {
            resize: vertical;
        }

        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }

        .modal form label {
            font-weight: normal;
        }
    </style>
    <script>
        $(document).ready(function() {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function() {
                if (this.checked) {
                    checkbox.each(function() {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function() {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function() {
                if (!this.checked) {
                    $("#selectAll").prop("checked", false);
                }
            });
        });
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Navbar Dropdown Login and Signup Form with Social Buttons</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: 'Varela Round', sans-serif;
        }

        .form-control {
            box-shadow: none;
            font-weight: normal;
            font-size: 13px;
        }

        .navbar {
            background: #fff;
            padding-left: 16px;
            padding-right: 16px;
            border-bottom: 1px solid #dfe3e8;
            border-radius: 0;
        }

        .nav-link img {
            border-radius: 50%;
            width: 36px;
            height: 36px;
            margin: -8px 0;
            float: left;
            margin-right: 10px;
        }

        .navbar .navbar-brand {
            padding-left: 0;
            font-size: 20px;
            padding-right: 50px;
        }

        .navbar .navbar-brand b {
            color: #33cabb;
        }

        .navbar .form-inline {
            display: inline-block;
        }

        .navbar a {
            color: #888;
            font-size: 15px;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            padding-right: 35px;
            border-color: #dfe3e8;
            border-radius: 4px !important;
            box-shadow: none
        }

        .search-box .input-group-text {
            min-width: 35px;
            border: none;
            background: transparent;
            position: absolute;
            right: 0;
            z-index: 9;
            padding: 7px;
            height: 100%;
        }

        .search-box i {
            color: #a0a5b1;
            font-size: 19px;
        }

        .navbar .sign-up-btn {
            min-width: 110px;
            max-height: 36px;
        }

        .navbar .dropdown-menu {
            color: #999;
            font-weight: normal;
            border-radius: 1px;
            border-color: #e5e5e5;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .05);
        }

        .navbar a,
        .navbar a:active {
            color: #888;
            padding: 8px 20px;
            background: transparent;
            line-height: normal;
        }

        .navbar .navbar-form {
            border: none;
        }

        .navbar .action-form {
            width: 280px;
            padding: 20px;
            left: auto;
            right: 0;
            font-size: 14px;
        }

        .navbar .action-form a {
            color: #33cabb;
            padding: 0 !important;
            font-size: 14px;
        }

        .navbar .action-form .hint-text {
            text-align: center;
            margin-bottom: 15px;
            font-size: 13px;
        }

        .navbar .btn-primary,
        .navbar .btn-primary:active {
            color: #fff;
            background: #33cabb !important;
            border: none;
        }

        .navbar .btn-primary:hover,
        .navbar .btn-primary:focus {
            color: #fff;
            background: #31bfb1 !important;
        }

        .navbar .social-btn .btn,
        .navbar .social-btn .btn:hover {
            color: #fff;
            margin: 0;
            padding: 0 !important;
            font-size: 13px;
            border: none;
            transition: all 0.4s;
            text-align: center;
            line-height: 34px;
            width: 47%;
            text-decoration: none;
        }

        .navbar .social-btn .facebook-btn {
            background: #507cc0;
        }

        .navbar .social-btn .facebook-btn:hover {
            background: #4676bd;
        }

        .navbar .social-btn .twitter-btn {
            background: #64ccf1;
        }

        .navbar .social-btn .twitter-btn:hover {
            background: #4ec7ef;
        }

        .navbar .social-btn .btn i {
            margin-right: 5px;
            font-size: 16px;
            position: relative;
            top: 2px;
        }

        .or-seperator {
            margin-top: 32px;
            text-align: center;
            border-top: 1px solid #e0e0e0;
        }

        .or-seperator b {
            color: #666;
            padding: 0 8px;
            width: 30px;
            height: 30px;
            font-size: 13px;
            text-align: center;
            line-height: 26px;
            background: #fff;
            display: inline-block;
            border: 1px solid #e0e0e0;
            border-radius: 50%;
            position: relative;
            top: -15px;
            z-index: 1;
        }

        .navbar .action-buttons .dropdown-toggle::after {
            display: none;
        }

        .form-check-label input {
            position: relative;
            top: 1px;
        }

        @media (min-width: 1200px) {
            .form-inline .input-group {
                width: 300px;
                margin-left: 30px;
            }
        }

        @media (max-width: 768px) {
            .navbar .dropdown-menu.action-form {
                width: 100%;
                padding: 10px 15px;
                background: transparent;
                border: none;
            }

            .navbar .form-inline {
                display: block;
            }

            .navbar .input-group {
                width: 100%;
            }
        }
    </style>
    <script>
        // Prevent dropdown menu from closing when click inside the form
        $(document).on("click", ".action-buttons .dropdown-menu", function(e) {
            e.stopPropagation();
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="#" class="navbar-brand">Brand<b>Name</b></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
            <div class="navbar-nav ml-auto action-buttons">
                <div class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle mr-4">Login</a>
                    <div class="dropdown-menu action-form">
                        <form action="/examples/actions/confirmation.php" method="post">
                            <p class="hint-text">Sign in with your social media account</p>
                            <div class="form-group social-btn clearfix">
                                <a href="#" class="btn btn-secondary facebook-btn float-left"><i
                                        class="fa fa-facebook"></i> Facebook</a>
                                <a href="#" class="btn btn-secondary twitter-btn float-right"><i
                                        class="fa fa-twitter"></i> Twitter</a>
                            </div>
                            <div class="or-seperator"><b>or</b></div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" required="required">
                            </div>
                            <input type="submit" class="btn btn-primary btn-block" value="Login">
                            <div class="text-center mt-2">
                                <a href="#">Forgot Your password?</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle sign-up-btn">Sign
                        up</a>
                    <div class="dropdown-menu action-form">
                        <form action="/examples/actions/confirmation.php" method="post">
                            <p class="hint-text">Fill in this form to create your account!</p>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirm Password"
                                    required="required">
                            </div>
                            <div class="form-group">
                                <label class="form-check-label"><input type="checkbox" required="required"> I accept
                                    the <a href="#">Terms &amp; Conditions</a></label>
                            </div>
                            <input type="submit" class="btn btn-primary btn-block" value="Sign up">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>OKE GARDEN <b>Internship Project</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i> <span>Add Project</span></a>

                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>Nama Project</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                        <label for="checkbox1"></label>
                                    </span>
                                </td>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->keterangan }}</td>
                                <td>{{ $project->status }}</td>
                                <td>
                                    <a href="{{ route('edit_project', $project) }}" class="edit"><i
                                            class="material-icons" title="Edit">&#xE254;</i></a>
                                    <form action="{{ route('delete_project', $project) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"><i class="material-icons"
                                                title="Delete">&#xE872;</i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('store_project') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Add Project</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Project</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control" id="">
                                <option value="konsultasi">Konsultasi</option>
                                <option value="revisi">Revisi</option>
                                <option value="payment">Payment</option>
                                <option value="desain">Desain</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    {{-- <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('update_pages', $project) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Project</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Project</label>
                            <input type="text" name="name" placeholder="{{ $project->name }}"
                                value="{{ $project->name }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" placeholder="{{ $project->keterangan }}"
                                value="{{ $project->keterangan }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control" value="{{ $project->status }}"
                                id="">
                                <option value="konsultasi">Konsultasi</option>
                                <option value="revisi">Revisi</option>
                                <option value="payment">Payment</option>
                                <option value="desain">Desain</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Employee</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
