@foreach($forms as $form)
    <h1>{{ $form->name }}</h1>
    <hr>
    <form action="/forms" method="POST">
        <input type="hidden" name="form_name" value="{{ $form->slug }}">
        {!! csrf_field() !!}
        @foreach($form->fields as $filed)
            <div>
                <label for="{{ $filed->name }}">
                    {{ $filed->label }} :
                </label>

                <input type="{{ $filed->type }}"
                       id="{{ $filed->name }}"
                       name="{{ $filed->name }}"
                       placeholder="{{ $filed->placeholder }}"
                       maxlength="{{ $filed->max }}"
                       min="{{ $filed->min }}"
                       @if($filed->required) required @endif
                        >
            </div>
            <br>
        @endforeach
        <button type="submit">
            {{ $form->submit_text }}
        </button>
    </form>
@endforeach
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif