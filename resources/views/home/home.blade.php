@push('style')
<style>
    .dataTables_filter {
    display: none;
}
</style>
@endpush
@extends('home.master')
@section('content')

@endsection
@push('script')
    <script>
    $('#spinShowHide').hide();
    </script>
@endpush
