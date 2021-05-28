<h5 class="contact">@lang('main.contacts')</h5>
<ul>
  <li id="address">{{ $address }}</li>
  <li><a href="mailto:{{ $global_arr['email'] }}">{{ $global_arr['email'] }}</a></li>
  <li><a href="tel:{{ $global_arr['phone'] }}">{{ $global_arr['phone'] }}</a></li>
</ul>

<ul class="social-lists">
  <li><a href="{{ $global_arr['instagram'] }}">Instagram</a></li>
  <li><a href="{{ $global_arr['behance'] }}">Behance</a></li>
</ul>