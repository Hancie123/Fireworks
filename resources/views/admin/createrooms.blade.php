@include('layouts.adminnav')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
<div class="main-panel">
    <div class="content-wrapper">
        <h3><b>Create Rooms</b></h3><br>



        <div class="container border p-4 w3-round">
            <form method="post" action="{{url('/admin/rooms/create')}}">

                @csrf

                <input type="hidden" value="{{Session::get('User_ID')}}" name="User_ID" type="text">
                <div class="row">
                    <div class="col-12">
                        <label>Room Name</label>
                        <input class="w3-input w3-border w3-round" name="name" type="text"
                            placeholder="Please enter room name">
                        <span class="text-danger">
                            @error('name')
                            {{$message}}
                            </script>
                            @enderror
                        </span>
                    </div><br>


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
                    <th>Room ID</th>
                    <th>Room Name</th>
                    <th>Created By</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be displayed here -->
            </tbody>
        </table>

        <script>
        $(document).ready(function() {
            $('#table_data').DataTable({
                'ajax': '/roomsdata',
                'columns': [{
                        'data': 'room_id'
                    },
                    {
                        'data': 'room_name'
                    },
                    {
                        'data': 'name'
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
</body>

</html>