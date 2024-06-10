@section('title') Supplier @endsection
@section('js') @include('pages.supplier.js') @endsection
<x-layout>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title">Create</h5>
                <h6 id="error-message" class="text-danger"></h6>
            </div>
            <div class="card-body">
                <form id="supplierForm">
                    @csrf
                    <input type="text" id="id" name="id" hidden>
                    <div class="input-group input-group-sm flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">Name</span>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Supplier Name">
                    </div>
                    <div class="input-group input-group-sm flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">District</span>
                        <select name="district_id" id="district_id" class="form-control districtClick">
                            <option value="">Choose District</option>
                            @foreach ($districts as $district)
                                <option data-id="{{$district->id}}" value="{{$district->id}}">{{$district->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group input-group-sm flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">Thana</span>
                        <select name="thana_id" id="thana_id" class="form-control">
                        </select>
                    </div>
                    <div class="input-group input-group-sm flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">Address</span>
                        <input type="text" id="address" name="address" class="form-control" placeholder="Address">
                    </div>
                    <div class="input-group input-group-sm flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">Phone</span>
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone">
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
                <h5 class="card-title">All Suppliers</h5>
                <input type="text" name="search" id="search" class="border border-success rounded px-2" placeholder="Search...">
            </div>
            <div class="card-body table-data">
                <table class="table table-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>District</th>
                            <th>Thana</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Balance</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody">

                        @forelse ($suppliers as $supplier)
                        <tr>
                            <td width="5%">{{ $supplier->id }}</td>
                            <td width="15%">{{ $supplier->name }}</td>
                            <td width="10%">{{ $supplier->district->name }}</td>
                            <td width="10%">{{ $supplier->thana->name }}</td>
                            <td width="15%">{{ $supplier->address }}</td>
                            <td width="10%">{{ $supplier->phone }}</td>
                            <td width="10%">{{ $supplier->balance ? $supplier->balance: '00' }}</td>
                            <td width="10%">
                                <a class="btn btn-success btn-sm editBtn"
                                 data-id="{{ $supplier->id }}"
                                 data-name="{{ $supplier->name }}"
                                 data-district_id="{{ $supplier->district_id }}"
                                 data-thana_id="{{ $supplier->thana_id }}"
                                 data-address="{{ $supplier->address }}"
                                 data-phone="{{ $supplier->phone }}"
                                 >Edit</a>
                                <a class="btn btn-danger btn-sm delBtn"
                                 data-id="{{ $supplier->id }}">
                                 Del</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">No Supplier  Found</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
                {{$suppliers->links()}}
            </div>
        </div>
    </div>

</x-layout>
