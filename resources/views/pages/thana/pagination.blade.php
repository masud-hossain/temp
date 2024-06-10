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
