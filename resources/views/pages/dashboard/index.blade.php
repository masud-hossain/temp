@section('title') Dashboard @endsection
@section('js') @include('pages.dashboard.js') @endsection
<x-layout>

Hello{{$text = $numto->bnNum(13459); }}

</x-layout>
