<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow">
                    <div class="card-header text-center">
                        <h3>Update User</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{route('users.update', $item->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <!-- Name -->
                            <div class="mb-3">
                                <input type="hidden" name="__METHOD" value="put">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="firstName" value="{{$item->name}}">
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{$item->email}}">
                            </div>

                            <!-- phone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{$item->phone}}">
                            </div>
                            <!-- Role -->
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" class="form-control" id="role" value="{{$item->id}}">
                                    <option>{{$item->role}}</option>
                                    <option>Subscriber</option>
                                    <option>Author</option>
                                </select>
                            </div>

                            <!-- Submit Button -->

                            <button class="w-50 btn btn-primary btn-lg">Update</button>
                            <a href="{{ route('users.index') }}" class=" w-40 btn btn-secondary">Cancel</a>

                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
</x-layout>