<div class="form-check form-switch mb-3  @error($name) is-invalid @enderror"  >
    <input class="form-check-input" type="checkbox" name={{$name}}  value="{{$value}}" @if($isSelected($value)) checked  @endif >
    <label class="form-check-label" for="{{$name}}">{{$label}}</label>
</div>
@error($name)<div class="invalid-feedback">{{$message}}</div>@enderror