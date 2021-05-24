<h4>@lang('main.contacts')</h4>
<ul>
  <li id="address">{{ $arr['address']->address }}</li>
  <li><a href="tel:{{ $arr['phone']->data }}">{{ $arr['phone']->data }}</a></li>
  <li><a href="mailto:{{ $arr['email']->data }}">{{ $arr['email']->data }}</a></li>
</ul>

<ul class="social-lists">
  <li><a href="{{ $arr['instagram']->data }}">Instagram</a></li>
  <li><a href="{{ $arr['behance']->data }}">Behance</a></li>
</ul>