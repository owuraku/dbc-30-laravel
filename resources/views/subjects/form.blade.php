<form class="container-sm" action="{{$action}}" method="POST">
    <x-textfield name="name" label="Subject Name" type="text" placeholder="Enter a subject name" />
    @csrf
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
