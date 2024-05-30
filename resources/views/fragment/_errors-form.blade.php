@if ($errors->any())
    <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
