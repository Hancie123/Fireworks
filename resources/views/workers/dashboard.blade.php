@include('layouts.workernav')
@push('title')
<title>Fire Wins Dashboard</title>
<div class="main-panel">
    <div class="content-wrapper">
        @php
        $user_id = session('User_ID');
        @endphp
        @foreach ($access_controls as $data)
        @if ($data->User_ID == $user_id)
        <input type="text" value="{{$data->status}}" name="User_ID" type="text">
        @break
        @endif
        @endforeach





    </div>
</div>

</div>

</body>

</html>