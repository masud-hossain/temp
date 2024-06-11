@section('title') District @endsection
@section('js') @include('pages.district.js') @endsection
<x-layout>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title">তৈরী</h5>
                <h6 id="error-message" class="text-danger"></h6>
            </div>
            <div class="card-body">
                <form id="districtForm">
                    @csrf
                    <input type="text" id="id" name="id" hidden>
                    <div class="input-group input-group-sm flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">নাম</span>
                        <input type="text" id="name" name="name" class="form-control form-control-sm" placeholder="জেলার নাম">
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
                <h5 class="card-title">সকল জেলা</h5>
                <input type="text" name="search" id="search" class="border border-success rounded px-2" placeholder="খুজুন...">
            </div>
            <div class="card-body table-data">
                <table class="table table-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>আইডি</th>
                            <th>নাম</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody">

                        @forelse ($districts as $district)
                        <tr>
                            <td width="10%">{{ $district->id }}</td>
                            <td width="60%">{{ $district->name }}</td>
                            <td width="30%">
                                <a class="btn btn-success btn-sm editBtn"
                                 data-id="{{ $district->id }}"
                                 data-name="{{ $district->name }}">
                                 Edit</a>
                                <a class="btn btn-danger btn-sm delBtn"
                                 data-id="{{ $district->id }}">
                                 Del</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">No District Found</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
                {{$districts->links()}}
            </div>
        </div>
    </div>

</x-layout>
