<form class="container-sm" action="{{$action}}" method="POST">
    <div class="mb-3">
      <label for="text" class="form-label">Course Name</label>
      <input type="text" name="name" class="form-control">
    </div>
    @csrf
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
