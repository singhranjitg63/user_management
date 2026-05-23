<x-layout>
    <div class="container">
        <div class="d-flex justify-content-between">
            <h2>Users Table</h2>
            @can('create', App\Models\User::class)
            <a href="{{ route('users.create') }}" class="btn btn-success m-3">Add new User</a>
            @endcan
        </div>
        <!-- @if(session('success'))
                   <div class="alert alert-success">
                       {{session('success')}}
                   </div>
                   @endif -->
        <form class="w-100 me-3 input-group" action="{{route('users.index')}}" method="get">
            <input type="text" class="form-control" placeholder="Search..." name="keyword" value="{{ request()->input('keyword') }}">
            <a href="{{route('users.index')}}" class="input-group-text text-decoration-none">Reset</a>
        </form>
        <br>
        <table class="table table-bordered table-hover" border="1">
            <thead class="table-dark">
                <tr>
                    <th>Id.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                     @can('create', App\Models\User::class)
                    <th>Actions</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr>
                    <td>{{$loop->iteration + ((request()->input('page', 1)-1) * 6) }}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->role}}</td>
                    @can('create', App\Models\User::class)
                    <td>
                        <a href="{{route('users.edit', $item->id)}}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('users.destroy', $item->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Are You sure')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    @endcan
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Not data found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="text-start">
            {{$items->links()}}
        </div>
    </div>
    <style>
     
    </style>
</x-layout>