<ul>
    @foreach($users as $user)
        <li>
            ({{ $loop->iteration }}) - {{ $user }}

            @if($loop->first)
                - First User
            @endif

            @if($loop->last)
                - Last User
            @endif
        </li>
    @endforeach
</ul>

@forelse($tasks as $task)
    <p>{{ $task }}</p>
@empty
    <p>No Tasks</p>
@endforelse

<ul>
    @foreach($numbers as $number)
        @if($number % 2 == 0)
            @continue
        @endif

        <li>{{ $number }}</li>

        @if($loop->iteration == 3)
            @break
        @endif
    @endforeach
</ul>

<hr>

@for ($i = 0; $i < 4; $i ++)
{{ $i }}
@endfor 

<hr>

@php $i = 0 @endphp
@while($i < 4)
    {{ $i }}
    @php $i++ @endphp
@endwhile