@if($isAdmin)
    <p>Welcome Admin</p>
@elseif($isEditor)
    <p>Welcome Editor</p>
@else
    <p>Welcome User</p>
@endif

@isset($items)
    <p>Number of Items: {{ count($items) }}</p>
@endisset

@empty($items)
    <p>No Items</p>
@endempty

@unless($isAdmin)
    <p>You are not an Admin</p>
@endunless