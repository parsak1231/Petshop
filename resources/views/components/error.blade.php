@if($errors->has($field))
    <small class="text-danger" style="color:red">
        {{ $errors->first($field) }}
    </small>
@endif
