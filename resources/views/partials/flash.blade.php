@if(session()->has('flashevent'))
    <div class="alert alert-success">
        {{session()->get('flashevent')}}
    </div>
@endif

@if(session()->has('flashsession'))
    <div class="alert alert-success">
        {{session()->get('flashsession')}}
    </div>
@endif
