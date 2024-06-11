@section('title') ডাল @endsection
@section('js') @include('pages.product.js') @endsection
<x-layout>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title">তৈরী</h5>
                <h6 id="error-message" class="text-danger"></h6>
            </div>
            <div class="card-body">
                <form id="supplierForm">
                    @csrf
                    <input type="text" id="id" name="id" hidden>
                    <div class="input-group input-group-sm flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">নাম</span>
                        <input type="text" id="name" name="name" class="form-control" placeholder="ডালের নাম">
                    </div>
                    <div class="input-group input-group-sm flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">শ্রেণী</span>
                        <select name="category_id" id="category_id" class="form-control districtClick">
                            <option value="">শ্রেণী পছন্দ করুন</option>
                            @foreach ($categories as $category)
                                <option data-id="{{$category->id}}" value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group input-group-sm flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">ব্যাপারী</span>
                        <select name="supplier_id" id="supplier_id" class="form-control">
                            <option value="">ব্যাপারী পছন্দ করুন</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="input-group input-group-sm flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">পরিমাণ</span>
                        <input type="number" id="quantity" name="quantity" class="form-control" placeholder="পরিমাণ">
                    </div>
                    <div class="input-group input-group-sm flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">ধরন</span>
                        <input type="hidden" name="status" value="0"> <!-- Hidden field -->
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
                <h5 class="card-title">সকল ব্যাপারী</h5>
                <input type="text" name="search" id="search" class="border border-success rounded px-2" placeholder="Search...">
            </div>
            <div class="card-body table-data">
                <table class="table table-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>আইডি</th>
                            <th>নাম</th>
                            <th>জেলা</th>
                            <th>থানা</th>
                            <th>ঠিকানা</th>
                            <th>ফোন</th>
                            <th>ধরন</th>
                            <th>ব্যালেন্স</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody">

                        @forelse ($products as $product)
                        <tr>
                            <td width="5%">{{$numto->bnNum( $product->id) }}</td>
                            <td width="15%">{{ $product->name }}</td>
                            <td width="10%">{{ $product->category->name }}</td>
                            <td width="10%">{{ $product->supplier->name }}</td>
                            <td width="15%">{{ $product->quantity }}</td>
                            <td width="10%">{{ $product->status == 1 ? "সক্রিয়" : "নিষ্ক্রিয়" }}</td>
                            <td width="10%">
                                <a class="btn btn-success btn-sm editBtn"
                                 data-id="{{ $product->id }}"
                                 data-name="{{ $product->name }}"
                                 data-district_id="{{ $product->category_id }}"
                                 data-thana_id="{{ $product->supplier_id }}"
                                 data-address="{{ $product->quantity }}"
                                 data-status="{{ $product->status }}"
                                 >Edit</a>
                                <a class="btn btn-danger btn-sm delBtn"
                                 data-id="{{ $product->id }}">
                                 Del</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">কোন ডাল পাওয়া জায়নি</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
                {{$products->links()}}
            </div>
        </div>
    </div>

</x-layout>
