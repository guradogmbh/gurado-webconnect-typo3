..  _troubleshooting:

===============
Troubleshooting
===============

Site set not found / invalid
============================

Activate the **gurado WebConnect** site set under TYPO3 site management.
The set metadata must use the `label` key rather than the obsolete
`title` field. Clear all caches after updating files.

"No rendering definition" error
===============================

Check that the site set and `fluid_styled_content` are active.
The site set supplies `tt_content.gurado_webconnect` TypoScript.

Generic frontend "Oops" error
=============================

Find the request ID in `var/log/typo3_*.log` and inspect the exception.
In an earlier development version, a data processor required a constructor
argument that TYPO3 did not provide; update to the current branch.

Widget does not appear
======================

* Confirm the **Storecode** is present and valid.
* For Bubble Mode, confirm the site setting is enabled.
* For Embed Mode, check the selected Article ID where relevant.
* Clear caches and inspect browser developer tools for blocked script requests.
* Review CSP/consent rules for `statics.gurado.de`.

Composer dependency errors
==========================

Do not globally disable security advisories to resolve dependency conflicts.
Check project constraints and run a dry-run update of compatible TYPO3 packages.

Support
=======

Documentation and user support: https://support.gurado.de
Issues with the TYPO3 extension:
https://github.com/guradogmbh/gurado-webconnect-typo3/issues
