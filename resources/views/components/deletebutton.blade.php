@if(Auth::user()->isSuperAdmin())
<form style="display: inline" action="{{$action}}" method="POST" >
    @method('DELETE')
    @csrf
    <button type="button" onclick="submitDeleteForm(this)" class="btn btn-outline-danger">Delete</button>
</form>
@endif