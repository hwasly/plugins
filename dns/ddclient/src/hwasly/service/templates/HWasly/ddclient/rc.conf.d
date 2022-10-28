{% if not helpers.empty('HWasly.DynDNS.general.enabled') %}
ddclient_enable="YES"
ddclient_flags="-daemon {{HWasly.DynDNS.general.daemon_delay|default('300')}}"
{% else %}
ddclient_enable="NO"
{% endif %}
