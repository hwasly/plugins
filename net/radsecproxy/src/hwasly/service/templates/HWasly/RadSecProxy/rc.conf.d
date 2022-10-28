{% if helpers.exists('HWasly.radsecproxy.general.enabled') and HWasly.radsecproxy.general.enabled == '1' %}
radsecproxy_enable="YES"
{% else %}
radsecproxy_enable="NO"
{% endif %}
radsecproxy_user="root"
radsecproxy_group="wheel"
