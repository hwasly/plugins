{% if helpers.exists('HWasly.puppetagent.general') and HWasly.puppetagent.general.Enabled|default("0") == "1" %}
puppet_enable="YES"
{% else %}
puppet_enable="NO"
{% endif %}
