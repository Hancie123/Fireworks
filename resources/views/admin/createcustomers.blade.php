@include('layouts.adminnav')
@push('title')
<title>Fire Wins Dashboard | Create Customer Accounts</title>

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
<div class="main-panel">
    <div class="content-wrapper">
        <h3><b>Create Customer Accounts</b></h3><br>



        <div class="container border p-4 w3-round">
            <form method="post" action="{{url('/admin/workers/create')}}">

                @csrf

                <input type="hidden" value="Active" name="status">
                <div class="row">
                    <div class="col-md-6">
                        <label>Name</label>
                        <input class="w3-input w3-border w3-round" name="name" type="text">
                        <span class="text-danger">
                            @error('name')
                            {{$message}}
                            </script>
                            @enderror
                        </span>
                    </div><br>

                    <div class="col-md-6">
                        <label>Email</label>
                        <input class="w3-input w3-border w3-round" name="email" type="email">
                        <span class="text-danger">
                            @error('email')
                            {{$message}}
                            </script>
                            @enderror
                        </span>
                    </div><br>
                </div>
                <br>


                <div class="row">
                    <div class="col-md-6">
                        <label>Facebook Link</label>
                        <input class="w3-input w3-border w3-round" name="password" type="text">
                        <span class="text-danger">
                            @error('password')
                            {{$message}}
                            </script>
                            @enderror
                        </span>
                    </div><br>

                    <div class="col-md-6">
                        <label>Mobile No</label>
                        <input class="w3-input w3-border w3-round" type="text" name="role">
                    </div><br>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label>Room ID</label>

                        <select class="select2 form-control">
                            <option value="option1">Option 1</option>
                            <option value="option2">Option 2</option>
                            <option value="option3">Option 3</option>
                            <option value="option4">Option 4</option>
                        </select>


                    </div>

                    <div class="col-md-6">

                    </div>
                </div>

                <br>
                <button type="submit" class="btn btn-primary mb-2">Create</button><br>
                @if(Session::has('success'))
                <div class="alert alert-success w3-display-bottommiddle">
                    <strong>Success!</strong> {{Session::get('success')}}
                </div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger w3-display-bottommiddle">
                    <strong>Fail!</strong> {{Session::get('fail')}}
                </div>
                @endif
            </form>

        </div>
        <br><br>

        <table class="table table-hover table-striped" id="table_data">
            <thead class="w3-center">
                <tr>
                    <th>Worker ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be displayed here -->
            </tbody>
        </table>

        <script>
        $(document).ready(function() {
            $('#table_data').DataTable({
                'ajax': '/admin/workers/ajax',
                'columns': [{
                        'data': 'User_ID'
                    },
                    {
                        'data': 'name'
                    },
                    {
                        'data': 'email'
                    }
                ]
            });
        });
        </script>


        <style>
        /* Change the background color of the table header */
        #table_data thead {
            background-color: rgb(63, 62, 145);
            color: #fff;
        }

        /* Change the font size and weight of the table header */
        #table_data th {
            font-size: 16px;
            font-weight: bold;
        }

        /* Change the background color and font size of the table rows */
        #table_data tbody tr {
            background-color: #f8f9fa;
            font-size: 14px;
        }

        /* Add hover effect to the table rows */
        #table_data tbody tr:hover {
            background-color: #e2e6ea;
        }

        .dataTables_wrapper .dataTables_filter input {
            font-size: 14px;
            padding: 6px;
            width: 300px;
            border-radius: 5px;
        }

        .dataTables_wrapper .dataTables_filter label {
            font-size: 14px;
            font-weight: bold;
        }
        </style>
    </div>
</div>
</div>



<script src="{{url('assets/js/typeahead.bundle.min.js')}}"></script>
<script src="{{url('assets/js/typeahead.js')}}"></script>
<script src="{{url('assets/js/select2.min.js')}}"></script>




</head>

<body>

    <script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Select an option',
            width: '100%'
        });
    });
    </script>
</body>

</html>