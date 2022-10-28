{% if helpers.exists('HWasly.Rspamd.general.enabled') and HWasly.Rspamd.general.enabled == '1' and helpers.exists('HWasly.Rspamd.av.whitelist') and HWasly.Rspamd.av.whitelist != '' %}
{%   for host in HWasly.Rspamd.av.whitelist.split(',') %}
{{ host }}
{%   endfor %}
{% endif %}
