<div class="errorbox-position" x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-dismissible fade show text-center">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>{{ $message }}</strong>
  </div>
  @endif
  @if ($message = Session::get('error'))
  <div class="alert alert-danger alert-dismissible fade show text-center">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>{{ $message }}</strong>
  </div>
  @endif
  @if ($message = Session::get('failure'))
  <div class="alert alert-danger alert-dismissible fade show text-center">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>{{ $message }}</strong>
  </div>
  @endif
  @if ($message = Session::get('warning'))
  <div class="alert alert-warning alert-dismissible fade show text-center">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>{{ $message }}</strong>
  </div>
  @endif
  @if ($message = Session::get('info'))
  <div class="alert alert-info alert-dismissible fade show text-center">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>{{ $message }}</strong>
  </div>
  @endif
  @if ($errors->any())
  <div class="alert alert-danger alert-dismissible fade show text-center">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    Check the following errors
  </div>
  @endif
</div>
<div class="alert alert-success alert-dismissible fade show text-center alertdiv" style="display:none;"></div>