@if($errors->any())
    <ul class="list-group">
        <li class="list-group-item text-danger">
            <h1>Woooops</h1>
            @foreach($errors->all() as $error)
                <p>&gt; {{ $error }}</p>
            @endforeach
        </li>
    </ul>
@endif
