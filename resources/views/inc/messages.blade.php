@if(session('success'))
  <div class="alert alert-success">
    <ul class="message">
      <li>{{ session('success') }}</li>
    </ul>
  </div>
@endif

@if(session('error'))
  <div class="alert alert-danger">
    <ul class="message">
      <li>{{ session('error') }}</li>
    </ul>
  </div>
@endif

@if (session('warning'))
  <div class="alert alert-warning">
    <ul class="message">
      <li>{{ session('warning') }}</li>
    </ul>
  </div>
@endif

@if (session('danger'))
  <div class="alert alert-danger">
    <ul class="message">
      <li>{{ session('danger') }}</li>
    </ul>
  </div>
@endif