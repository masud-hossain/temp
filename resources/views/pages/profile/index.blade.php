@section('title') Profile | {{Auth::user()->name}} @endsection
@section('js') @include('pages.profile.js') @endsection
<x-layout>

    <div class="col-sm-8 offset-sm-2 mt-4">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title">Profile</h5>
                <h6 id="error-message" class="text-danger"></h6>
            </div>
            <div class="card-body">
                <form id="profile">
                    @csrf
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">Full Name</span>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Full Name">
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">Email</span>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email Address">
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">Phone</span>
                        <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone" >
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">Old Password</span>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Old Password">
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">New Password</span>
                        <input type="password" id="newpassword" name="newpassword" class="form-control" placeholder="New Password">
                    </div>
                    <div class="input-group flex-nowrap mb-5">
                        <button class="col-3 btn btn-dark">Update</button>
                    </div>
                </form>
            </div>
            </div>
    </div>

</x-layout>
