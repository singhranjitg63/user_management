<x-layout>
    <div class="container">
        <script>
function showSuccessNotification() {
    alert('Form submitted successfully!');
}
</script>
<div class="d-flex justify-content-between">
            <h2>Users Table</h2>
            <button class="btn btn-success m-3"><a class="text-white text-decoration-none" href="{{ route('users.create') }}">Add new User</a></button>
        </div>
        <!-- @if(session('success'))
                   <div class="alert alert-success">
                       {{session('success')}}
                   </div>
                   @endif -->
        <form class="w-100 me-3 input-group" action="{{route('users.index')}}" method="get">
            <input type="text" class="form-control" placeholder="Search..."  name="keyword" value="{{ request()->input('keyword') }}">
           <a href="{{route('users.index')}}" class="input-group-text text-decoration-none">Reset</a>
        </form>
        <br>
        <table class="table table-bordered" border="1">
            <thead>
                <tr>
                    <th>Id.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr>
                    <td>{{$loop->iteration + ((request()->input('page', 1)-1) * 5) }}</td> 
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->role}}</td>
                    <td>
                        <a href="{{route('users.edit', $item->id)}}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('users.destroy', $item->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Are You sure')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Not data found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="text-center">
            {{$items->links()}}
        </div>
    </div>
</x-layout>
<style>
    .w-5.h-5{
        width: 25px
    }
    .flex.gap-2 {
        display: none;
    }
    /* .inline-flex {
        display:none;
    } */
</style>