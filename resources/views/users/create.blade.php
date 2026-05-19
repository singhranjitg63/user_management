<x-layout>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div>
            <section class="">
                <!-- Jumbotron -->
                <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
                    <div class="container">
                        <div class=" gx-lg-5 align-items-center">
                            <div class="col-lg-12 mb-5 mb-lg-0">    
                                <h4 class="mb-3">Create new user</h4>
                                <form class="needs-validation" action="{{ route('users.store') }}" method="post">
                                   @csrf 
                                   @method('POST')
                                    <div class="row g-4">
                                        <div class="col-sm-12">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" id="firstName" value="">
                                            <span class="text-danger">@error('name'){{$message}}@enderror</span>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" value="">
                                            <span class="text-danger">@error('email'){{$message}}@enderror</span>
                                        </div>

                                        <div class="col-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" id="password">
                                            <span class="text-danger">@error('password'){{$message}}@enderror</span>
                                        </div>
                                        <div class="col-12">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text " class="form-control" name="phone" id="phone">
                                            <span class="text-danger">@error('phone'){{$message}}@enderror</span>
                                        </div>

                                        <div class="col-12">
                                            <label for="role" class="form-label">Role</label>
                                            <select name="role" class="form-control" id="role" >
                                                <option value="" disabled selected>Select Role</option>
                                                <option  value="Subscriber">Subscriber</option>
                                                <option  value="Author">Author</option>
                                            </select>
                                        </div>

                                        <hr class="my-4">

                                        <button class="w-100 btn btn-primary btn-lg">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2026–2027 TED IT</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="https://www.instagram.com/">instagram</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</x-layout>