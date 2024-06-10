<table class="table table-sm">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody id="districtData">

        @forelse ($districts as $district)
        <tr>
            <td width="10%">{{ $district->id }}</td>
            <td width="60%">{{ $district->name }}</td>
            <td width="30%">
                <a class="btn btn-success btn-sm editBtn"
                 data-id="{{ $district->id }}"
                 data-name="{{ $district->name }}">
                 Edit</a>
                <a class="btn btn-success btn-sm delBtn"
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
