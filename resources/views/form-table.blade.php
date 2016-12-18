@foreach($forms as $form)
    <h3>
        {{ $form->name }}
    </h3>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                @foreach($form->fields as $field)
                    <th>
                        {{ $field->name }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($form->responses as $response)
                <tr>
                        <td>
                            {{ $response->identifier }}
                        </td>
                    @foreach($response->fields as $field)
                        <td>
                            {{ $field->value }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
@endforeach