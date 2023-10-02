@extends('home.master')
@section('content')

<div class="container-fluid">

    <div class="card card-none">
        <div class="card-header">
            <h3 class="card-title"><i class="fa fa-list-ul" aria-hidden="true"></i> Contact List</h3>
        </div>
        <div class="card-body">
            <div class="row">

                @foreach ( $emps as $emp )
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                      <div class="card-header text-muted border-bottom-0">
                        Yasir Software
                      </div>
                      <div class="card-body pt-0">
                        <div class="row">
                          <div class="col-7">
                            <h2 class="lead"><b>{{ $emp->name }}</b></h2>
                            <p class="text-muted text-sm"><b>Designation: </b> {{ $emp->desig }} </p>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                              <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> <b>Address : </b> {{ $emp->present_address }}</li>
                              <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <b>Phone # : </b> {{ $emp->Mobile_personal }} {{ $emp->Mobile_official }}</li>
                            </ul>
                          </div>
                          <div class="col-5 text-center">
                            <img src="{{ $emp->image_path }}" height="100" width="100" alt="user-avatar" class="img-circle img-fluid">
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <div class="text-right">
                          <a href="#" class="btn btn-sm bg-teal">
                            <i class="fas fa-comments"></i>
                          </a>
                          <a href="#" class="btn btn-sm btn-primary">
                            <i class="fas fa-user"></i> View Profile
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach




            </div>
        </div>
    </div>
</div>

@endsection
@push('script')
<script>
    $('#spinShowHide').hide();
</script>
@endpush
