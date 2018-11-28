@foreach($users as $user)
<li>
    <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="gravatar"/>
    <a href="{{ route('users.show', $user->id) }}" class="username">{{ $user->name }}</a>
    @can('destroy', $user)
    <form method="POST" action="{{ route('users.destroy', $user->id) }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>
    </form>
    @endcan
    @can('update', $user)
    <form action="" method="post">
        {{ csrf_field() }}
      <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-danger delete-btn">Modify Account</a>
    </form>
    @endcan
</li>
@endforeach