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
