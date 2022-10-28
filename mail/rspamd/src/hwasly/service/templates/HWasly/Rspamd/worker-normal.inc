{% if helpers.exists('HWasly.Rspamd.general.enabled') and HWasly.Rspamd.general.enabled == '1' %}
bind_socket = "/var/run/rspamd/normal.sock mode=0666 owner=rspamd";
{% endif %}
