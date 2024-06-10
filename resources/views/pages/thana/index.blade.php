@section('title') Thana @endsection
@section('js') @include('pages.thana.js') @endsection
<x-layout>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title">Create</h5>
                <h6 id="error-message" class="text-danger"></h6>
            </div>
            <div class="card-body">
                <form id="thanaForm">
                    @csrf
                    <input type="text" id="id" name="id" hidden>
                    <div class="input-group input-group-sm flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">Name</span>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Thana Name">
                    </div>
                    <div class="input-group input-group-sm flex-nowrap mb-3">
                        <span class="input-group-text col-3 bg-dark text-white">District</span>
                        <select name="district_id" id="district_id" class="form-control">
                            @foreach ($districts as $district)
                                <option value="{{$district->id}}">{{$district->name}}</option>
                            @endforeach
                        </select>
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
                <h5 class="card-title">All Thana</h5>
                <input type="text" name="search" id="search" class="border border-success rounded px-2" placeholder="Search...">
            </div>
            <div class="card-body table-data">
                <table class="table table-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>District</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody">

                        @forelse ($thanas as $thana)
                        <tr>
                            <td width="10%">{{ $thana->id }}</td>
                            <td width="35%">{{ $thana->name }}</td>
                            <td width="35%">{{ $thana->district->name }}</td>
                            <td width="20%">
                                <a class="btn btn-success btn-sm editBtn"
                                 data-id="{{ $thana->id }}"
                                 data-name="{{ $thana->name }}"
                                 data-district_id="{{ $thana->district_id }}">
                                 Edit</a>
                                <a class="btn btn-danger btn-sm delBtn"
                                 data-id="{{ $thana->id }}">
                                 Del</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">No Thana Found</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
                {{$thanas->links()}}
            </div>
        </div>
    </div>

</x-layout>
