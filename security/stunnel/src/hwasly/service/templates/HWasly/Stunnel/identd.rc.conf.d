{% if not helpers.empty('HWasly.Stunnel.general.enabled') and
      not helpers.empty('HWasly.Stunnel.general.enable_ident_server') %}
identd_stunnel_enable="YES"
{% else %}
identd_stunnel_enable="NO"
{% endif %}
