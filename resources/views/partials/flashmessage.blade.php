<!--mawawala rin to pag narefresh-->
@if(session()->has('message'))
    <div class="text-center text-success" id="alert" role="alert">
        {{session()->get('message')}}...
    </div>
@endif