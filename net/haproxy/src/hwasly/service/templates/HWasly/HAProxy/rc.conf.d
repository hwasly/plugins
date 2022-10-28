{% if helpers.exists('HWasly.HAProxy.general.enabled') and HWasly.HAProxy.general.enabled|default("0") == "1" %}
haproxy_enable=YES
haproxy_setup="/usr/local/hwasly/scripts/HWasly/HAProxy/setup.sh"
haproxy_pidfile="/var/run/haproxy.pid"
haproxy_config="/usr/local/etc/haproxy.conf"
{% if helpers.exists('HWasly.HAProxy.general.storeOcsp') and HWasly.HAProxy.general.storeOcsp|default("0") == "1" %}
haproxy_ocsp=YES
{% else %}
haproxy_ocsp=NO
{% endif %}
{% if helpers.exists('HWasly.HAProxy.general.gracefulStop') and HWasly.HAProxy.general.gracefulStop|default("0") == "1" %}
haproxy_hardstop=NO
{% else %}
haproxy_hardstop=YES
{% endif %}
{% if helpers.exists('HWasly.HAProxy.general.seamlessReload') and HWasly.HAProxy.general.seamlessReload|default("0") == "1" %}
haproxy_socket="/var/run/haproxy.socket"
haproxy_softreload=YES
{% else %}
haproxy_softreload=NO
{% endif %}
{% else %}
haproxy_enable=NO
{% endif %}
