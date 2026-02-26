@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@php $mailLogo = \App\Models\SiteSetting::get('logo'); @endphp
@if($mailLogo)
<img src="{{ url('/storage/'.$mailLogo) }}" class="logo" alt="{{ \App\Models\SiteSetting::get('site_name', config('app.name')) }}" style="height:50px;max-height:50px;width:auto;">
@else
<span style="color:#E86531;font-size:19px;font-weight:bold;">{{ $slot }}</span>
@endif
</a>
</td>
</tr>
