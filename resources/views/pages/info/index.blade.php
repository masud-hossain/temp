@section('title') Mill Information @endsection
@section('js') @include('pages.info.js') @endsection
<x-layout>
<div class="col-sm-8 offset-sm-2 mt-4">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title">প্রতিষ্ঠানের তথ্য</h5>
                <h6 id="error-message" class="text-danger"></h6>
            </div>
            <div class="card-body">
                <form id="information">
                    @csrf
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">নাম</span>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">প্রতিষ্ঠাতা</span>
                        <input type="text" id="propiter" name="propiter" class="form-control" placeholder="Propiter">
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">ফোন</span>
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone" >
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">ঠিকানা</span>
                        <input type="text" id="address" name="address" class="form-control" placeholder="Address">
                    </div>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">বিবরণ</span>
                        <input type="text" id="description" name="description" class="form-control" placeholder="Description">
                    </div>

                    <div class="input-group flex-nowrap mb-5">
                        <button class="col-3 btn btn-dark">Update</button>
                    </div>
                </form>
            </div>
            </div>
    </div>
</x-layout>
