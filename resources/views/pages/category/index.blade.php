@section('title') শ্রেনী @endsection
@section('js') @include('pages.category.js') @endsection
<x-layout>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title">তৈরী</h5>
                <h6 id="error-message" class="text-danger"></h6>
            </div>
            <div class="card-body">
                <form id="categoryForm">
                    @csrf
                    <input type="text" id="id" name="id" hidden>
                    <div class="input-group input-group-sm flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">নাম</span>
                        <input type="text" id="name" name="name" class="form-control form-control-sm" placeholder="শ্রেনীর নাম">
                    </div>
                    <div class="input-group input-group-sm flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">ধরন</span>
                        <input type="hidden" name="status" value="0">
                        <input type="checkbox" id="status" name="status" style="margin-left:10px" value="1" checked>
                    </div>
                    <div class="input-group flex-nowrap mb-5">
                        <button id="submitBtn" class="col-3 btn btn-sm btn-dark btn sm">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title">সকল শ্রেনী</h5>
                <input type="text" name="search" id="search" class="border border-success rounded px-2" placeholder="খুজুন...">
            </div>
            <div class="card-body table-data">
                <table class="table table-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>আইডি</th>
                            <th>নাম</th>
                            <th>ধরন</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody">

                        @forelse ($categories as $category)
                        <tr>
                            <td width="10%">{{ $category->id }}</td>
                            <td width="60%">{{ $category->name }}</td>
                            <td width="60%">{{ $category->status==1 ? 'সক্রিয়': 'নিষ্ক্রিয়' }}</td>
                            <td width="30%">
                                <a class="btn btn-success btn-sm editBtn"
                                 data-id="{{ $category->id }}"
                                 data-name="{{ $category->name }}"
                                 data-status="{{ $category->status }}"
                                 >
                                 Edit</a>
                                <a class="btn btn-danger btn-sm delBtn"
                                 data-id="{{ $category->id }}">
                                 Del</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">কোন শ্রেনী পাওয়া যায়নি </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
                {{$categories->links()}}
            </div>
        </div>
    </div>

</x-layout>
