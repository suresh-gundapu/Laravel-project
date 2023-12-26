@extends('layouts.app')
@section('title', 'Students Edit Page')
@section('content')
<div class="container my-4">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Students Edit') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ url('crud-edit-action',$listingData->id) }}" id="form-student-add" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="student_id" value="{{$listingData->id}}" />
            <input type="hidden" name="old_image_name" id="old_image_name" value="{{ old('profile',$listingData->profile) }}" />

            <div class="row mb-3">
              <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

              <div class="col-md-6">
                <input id="first_name" type="text" class="form-control " name="first_name" value="{{ old('first_name',$listingData->first_name)  }}" autocomplete="first_name" autofocus>

                <span id="first_name_err">
                  @error('first_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </span>
              </div>
            </div>
            <div class="row mb-3">
              <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

              <div class="col-md-6">
                <input id="last_name" type="text" class="form-control " name="last_name" value="{{ old('last_name',$listingData->last_name) }}" autocomplete="last_name" autofocus>

                <span id="last_name_err">
                  @error('last_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </span>
              </div>
            </div>
            <div class="row mb-3">
              <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email',$listingData->email) }}" autocomplete="email" autofocus>
                <span id="email_err">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </span>
              </div>
            </div>
            <div class="row mb-3">
              <label for="mobile" class="col-md-4 col-form-label text-md-end">{{ __('Mobile') }}</label>

              <div class="col-md-6">
                <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile',$listingData->mobile) }}" autocomplete="mobile" autofocus>
                <span id="mobile_err">
                  @error('mobile')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </span>
              </div>
            </div>
            <div class="row mb-3">
              <label for="profile" class="col-md-4 col-form-label text-md-end">{{ __('Profile') }}</label>

              <div class="col-md-6">
                <input id="profile" type="file" class="form-control" name="profile" value="{{ old('profile',asset('upload/students/'.$listingData->profile)) }}" autocomplete="profile" autofocus>
                <span id="profile_err">
                  @error('profile')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </span>
              </div>
            </div>
            <div class="row mb-2">
              <div class="offset-md-9">
                @if(!empty($listingData->profile))
                <h3>
                  <a href="#" class="pop">
                    <i class="fa fa-image ">
                      <img src="{{ asset('upload/students/'.$listingData->profile) }}" style="width:50px;height:50px;" />
                    </i>
                  </a>
                </h3>
                @endif
              </div>
            </div>

            <div class="row mb-3">
              <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

              <div class="col-md-6">
                <input id="address" type="text" class="form-control" name="address" value="{{ old('address',$listingData->address) }}" autocomplete="address" autofocus>
                <span id="address_err">
                  @error('address')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </span>
              </div>
            </div>
            <div class="row mb-3">
              <label for="course" class="col-md-4 col-form-label text-md-end">{{ __('Course') }}</label>

              <div class="col-md-6">
                <input id="course" type="text" class="form-control" name="course" value="{{ old('course',$listingData->course) }}" autocomplete="course" autofocus>
                <span id="course_err">
                  @error('course')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </span>
              </div>
            </div>
            <div class="row mb-3">
              <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

              <div class="col-md-6">
                <select id="status" type="file" class="form-select" name="status" autocomplete="status" autofocus>
                  <option value="Active" {{(old('status') == "Active" ||  $listingData->status == "Active") ? "selected" : "" }}> Active</option>
                  <option value="Inactive" {{(old('status') == "Inactive" ||  $listingData->status == "Inactive") ? "selected" : "" }}> Inactive</option>
                </select>
                <span id="status_err">
                  @error('status')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </span>
              </div>
            </div>


            <div class="row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary add">
                  {{ __('Update') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script type="module" src="{{ asset('js/crud_add.js') }}"></script>
@endpush