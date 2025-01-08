@switch($role)
    @case('admin')
        <p> Welcome Admin </p>
        @break
    @case('editor')
        <p> Welcome Editor </p>
        @break
    @default
        <p> Welcome User </p>   
@endswitch