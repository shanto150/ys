@push('style')
<style>
    .dataTables_filter {
        display: none;
    }

    option {
        zoom: 1.2
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