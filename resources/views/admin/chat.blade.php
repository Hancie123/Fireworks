@include('layouts.adminnav')
@push('title')
<title>Fire Wins | Create Payments</title>

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />


<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>


<div class="main-panel">
    <div class="content-wrapper">
        <h3><b>Firewinz Chat</b></h3><br>



        <div class="container border p-4 w3-round">

            <div class="container border p-3 overflow-auto" style="height:50vh;">

                @foreach($viewchat as $data)

                @php
                $i = Session::get('User_ID');

                @endphp
                @if($data->User_ID ==$i)
                <div class="p-2 w3-right-align">
                    <label alt="Profile" class="rounded bg-primary py-2 px-2 text-white h5">
                        <?php     $name = $data->name; 
                        $name_parts = explode(' ', $name);
                        $first_name = $name_parts[0];  
                        echo $first_name; 
                        ?>
                    </label>

                    <label class="p-2 w3-round" id="message720">{{$data->message}}</label><br>
                    <label>{{$data['created_at']->diffForHumans()}}</label>

                </div><br>

                @else

                <div class="p-2 w3-left-align">
                    <label alt="Profile" class="rounded bg-primary py-2 px-2 text-white h5">
                        <?php     $name = $data->name; 
                        $name_parts = explode(' ', $name);
                        $first_name = $name_parts[0];  
                        echo $first_name; 
                        ?>
                    </label>

                    <label class="p-2 w3-round" id="message720">{{$data->message}}</label><br>
                    <label>{{$data['created_at']->diffForHumans()}}</label>

                </div><br>

                @endif

                @endforeach

            </div>



            <form action="{{url('/admin/chat')}}" method="post">

                @csrf
                <input type="hidden" value="{{Session::get('User_ID')}}" name="User_ID" type="text">
                <input type="hidden" value="{{Session::get('name')}}" name="name" type="text">
                <div class="input-group w3-display-bottommiddle p-4">

                    <textarea type="text" class="form-control" id="comment" name="message"></textarea>
                    <button id="submitchat" class="btn btn-primary round" type="submit">Send</button>

                    <script>
                    var input = document.getElementById("comment");
                    input.addEventListener("keypress", function(event) {
                        if (event.key === "Enter") {
                            event.preventDefault();
                            document.getElementById("submitchat").click();
                        }
                    });
                    </script>

                </div>
                <span>
                    @error('message')
                    <script>
                    toastr.warning('{{$message}}')
                    </script>
                    @enderror
                </span>

            </form>


        </div>


    </div>
</div>
</div>







</body>

</html>