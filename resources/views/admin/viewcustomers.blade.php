@include('layouts.adminnav')
@push('title')
<title>Fire Wins Dashboard | View Customers</title>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
<div class="main-panel">
    <div class="content-wrapper">
        <h3><b>All Customers</b></h3><br>

        <table class="table table-hover table-striped" id="table_data">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Room Name</th>

                    <th>Facebook Link</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Created by</th>
                </tr>
            </thead>
        </table>

        <script>
        $(document).ready(function() {
            $('#table_data').DataTable({
                ajax: '/admin/customers/ajax',
                columns: [{
                        data: 'customer_name'
                    },
                    {
                        data: 'room.room_name'
                    },

                    {
                        data: 'facebook_link'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'date'
                    },
                    {
                        data: 'user.name'
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