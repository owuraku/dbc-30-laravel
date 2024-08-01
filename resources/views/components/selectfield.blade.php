
<div class="mb-3">
    <label for="{{$name}}" class="form-label">{{$label}}</label>

    <select class="form-select form-control @error($name) is-invalid @enderror" aria-label="{{$label}}" name="{{$name}}">

        <option value="">Select One</option>
        @foreach($options as $option)
        <option @if($option['value'] == old($name)) selected @endif value="{{$option['value']}}">{{$option['label']}}</option>
        @endforeach
        
    </select>
    @error($name)<div class="invalid-feedback">{{$message}}</div>@enderror
</div>
