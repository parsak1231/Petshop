@if($errors->has($field))
    <small class="form-text text-danger">
        {{ $errors->first($field) }}
    </small>
@endif
