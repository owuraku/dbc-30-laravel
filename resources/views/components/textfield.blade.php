<div class="mb-3">
    <label for="{{$name}}" class="form-label">{{$label}}</label>
    <input type="{{$type}}" name="{{$name}}" class="form-control @error($name) is-invalid @enderror" placeholder="{{$placeholder}}">
    @error($name)<div class="invalid-feedback">{{$message}}</div>@enderror
</div>