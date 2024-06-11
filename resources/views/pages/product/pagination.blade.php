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
            <td width="5%">{{ $supplier->id }}</td>
            <td width="15%">{{ $supplier->name }}</td>
            <td width="10%">{{ $supplier->district->name }}</td>
            <td width="10%">{{ $supplier->thana->name }}</td>
            <td width="15%">{{ $supplier->address }}</td>
            <td width="10%">{{ $supplier->phone }}</td>
            <td width="10%">{{ $supplier->status == 1 ? "সক্রিয়" : "নিষ্ক্রিয়" }}</td>
            <td width="10%">{{ $supplier->balance ? $supplier->balance: '00' }}</td>
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
