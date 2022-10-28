{% if helpers.exists('HWasly.AcmeClient.settings.enabled') and HWasly.AcmeClient.settings.enabled|default("0") == "1" %}
acme_http_challenge_enable=YES
acme_http_challenge_conf="/var/etc/lighttpd-acme-challenge.conf"
acme_http_challenge_pidfile="/var/run/lighttpd-acme-challenge.pid"
acme_http_challenge_setup="/usr/local/hwasly/scripts/HWasly/AcmeClient/setup.sh"
{% else %}
acme_http_challenge_enable=NO
{% endif %}
