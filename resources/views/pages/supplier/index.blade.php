@section('title') ব্যাপারী @endsection
@section('js') @include('pages.supplier.js') @endsection
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
                        <input type="text" id="name" name="name" class="form-control" placeholder="ব্যাপারীর নাম">
                    </div>
                    <div class="input-group input-group-sm flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">জেলা</span>
                        <select name="district_id" id="district_id" class="form-control districtClick">
                            <option value="">জেলা পছন্দ করুন</option>
                            @foreach ($districts as $district)
                                <option data-id="{{$district->id}}" value="{{$district->id}}">{{$district->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group input-group-sm flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">থানা</span>
                        <select name="thana_id" id="thana_id" class="form-control">
                            <option value="">থানা পছন্দ করুন</option>
                            @foreach ($thanas as $thana)
                                <option value="{{$thana->id}}">{{$thana->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="input-group input-group-sm flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">ঠিকানা</span>
                        <input type="text" id="address" name="address" class="form-control" placeholder="ঠিকানা">
                    </div>
                    <div class="input-group input-group-sm flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">ফোন</span>
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="মোবাইল নাম্বার">
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

                        @forelse ($suppliers as $supplier)
                        <tr>
                            <td width="5%">{{$numto->bnNum( $supplier->id) }}</td>
                            <td width="15%">{{ $supplier->name }}</td>
                            <td width="10%">{{ $supplier->district->name }}</td>
                            <td width="10%">{{ $supplier->thana->name }}</td>
                            <td width="15%">{{ $supplier->address }}</td>
                            <td width="10%">{{ $supplier->phone }}</td>
                            <td width="10%">{{ $supplier->status == 1 ? "সক্রিয়" : "নিষ্ক্রিয়" }}</td>
                            <td width="10%">{{ $supplier->balance ? $numto->bnNum($supplier->balance): '00' }}</td>
                            <td width="10%">
                                <a class="btn btn-success btn-sm editBtn"
                                 data-id="{{ $supplier->id }}"
                                 data-name="{{ $supplier->name }}"
                                 data-district_id="{{ $supplier->district_id }}"
                                 data-thana_id="{{ $supplier->thana_id }}"
                                 data-address="{{ $supplier->address }}"
                                 data-phone="{{ $supplier->phone }}"
                                 data-status="{{ $supplier->status }}"
                                 >Edit</a>
                                <a class="btn btn-danger btn-sm delBtn"
                                 data-id="{{ $supplier->id }}">
                                 Del</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">কোন ব্যাপারী পাওয়া জায়নি</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
                {{$suppliers->links()}}
            </div>
        </div>
    </div>

</x-layout>
