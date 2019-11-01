@if ($message = Session::get('danger'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span class="fa fa-times"></span>
    </button>
</div>
@endif