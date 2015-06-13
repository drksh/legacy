@foreach($users as $user)
    <a href="{{ route('admin.users',[$authcode, $user->username]) }}">
        {{ $user->username }}
        @if($count)
            ({{ $user->{$count}->count() }})<br/>
        @endif
    </a>
@endforeach
