{% if helpers.exists('HWasly.Rspamd.general.enabled') and HWasly.Rspamd.general.enabled == '1' and helpers.exists('HWasly.Rspamd.graylist.whitelist_ip') and HWasly.Rspamd.graylist.whitelist_ip != '' %}
{%   for host in HWasly.Rspamd.graylist.whitelist_ip.split(',') %}
{{ host }}
{%   endfor %}
{% endif %}
