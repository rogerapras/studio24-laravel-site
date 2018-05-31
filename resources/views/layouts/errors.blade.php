<style>
    .errors {
        background-color: indianred;
        color: #fff;
    }

    .error-item {
        border-bottom: #d1d5da 1px solid;
        padding: 5px 10px;
    }
</style>

@if(count($errors) > 0)
    <div class="errors">
        <ul>
            @foreach($errors->all() as $error)
                <div class="error-item">
                    <ul>
                        <li>{{ $error }}</li>
                    </ul>
                </div>
            @endforeach
        </ul>
    </div>
@endif
