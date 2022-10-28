{% if helpers.exists('HWasly.bind.general.enabled') and HWasly.bind.general.enabled == '1' %}
{%   if helpers.exists('HWasly.bind.dnsbl.enabled') and HWasly.bind.dnsbl.enabled == '1' %}
{%     if helpers.exists('HWasly.bind.dnsbl.type') and HWasly.bind.dnsbl.type != '' %}
{%       if helpers.exists('HWasly.bind.dnsbl.whitelists') and HWasly.bind.dnsbl.whitelists != '' %}
{%         for whitelist in HWasly.bind.dnsbl.whitelists.split(',') %}
{{ whitelist }}		IN	CNAME	rpz-passthru.
*.{{ whitelist }}	IN	CNAME	rpz-passthru.
{%         endfor %}
{%       endif %}
{%     endif %}
{%   endif %}
{% endif %}
