{% if helpers.exists('HWasly.ZabbixAgent.settings.main.enabled') and HWasly.ZabbixAgent.settings.main.enabled|default("0") == "1" %}
zabbix_agentd_setup="/usr/local/hwasly/scripts/HWasly/ZabbixAgent/setup.sh"
zabbix_agentd_config="/usr/local/etc/zabbix_agentd.conf"
zabbix_agentd_enable="YES"
{% else %}
zabbix_agentd_enable="NO"
{% endif %}
