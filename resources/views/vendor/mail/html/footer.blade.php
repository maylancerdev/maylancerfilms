<tr>
<td>
<table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td class="content-cell" align="center">
{{ Illuminate\Mail\Markdown::parse($slot) }}
<p style="color:#6b7280;font-size:12px;margin-top:10px;">&copy; {{ date('Y') }} {{ \App\Models\SiteSetting::get('site_name', config('app.name')) }}. {{ __('contact.mail.all_rights') }}</p>
</td>
</tr>
</table>
</td>
</tr>
