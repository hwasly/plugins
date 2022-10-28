{# Default setting is enabled, so that no GUI interaction is required. #}
{% if not (helpers.exists('HWasly.QemuGuestAgent.general.LogDebug')) or HWasly.QemuGuestAgent.general.Enabled|default("0") != "0" %}
{%   set optional_flags = [] %}
{%   do optional_flags.append('-d -l /var/log/qemu-ga.log') %}
{%   if helpers.exists('HWasly.QemuGuestAgent.general.LogDebug') and HWasly.QemuGuestAgent.general.LogDebug|default("0") == "1" %}
{%     do optional_flags.append('-v') %}
{%   endif %}
{%   if helpers.exists('HWasly.QemuGuestAgent.general.DisabledRPCs') and not helpers.empty('HWasly.QemuGuestAgent.general.DisabledRPCs') %}
{%     do optional_flags.append('--blacklist=' ~ HWasly.QemuGuestAgent.general.DisabledRPCs) %}
{%   endif %}
qemu_guest_agent_setup="/usr/local/hwasly/scripts/HWasly/QemuGuestAgent/setup.sh"
qemu_guest_agent_enable="YES"
qemu_guest_agent_flags="{{optional_flags|join(' ')}}"
{% else %}
qemu_guest_agent_enable="NO"
{% endif %}
