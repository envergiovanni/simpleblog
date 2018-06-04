@if ($errors->any())
    <div class="alert alert-danger">
        <h6><i class="fa fa-exclamation-circle"></i>&nbsp;Error message</h6>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif