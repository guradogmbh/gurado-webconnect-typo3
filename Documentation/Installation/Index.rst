..  _installation:

============
Installation
============

Requirements
============

* TYPO3 13.4 or TYPO3 14 (current integration tested by the project on TYPO3 14.3.6).
* A gurado account and an activated voucher shop with a **Storecode**.
* The **fluid_styled_content** system extension and an active site configuration.

Create your gurado account
==========================

If you do not already have a gurado account, `register for free <https://dashboard.gurado.de/register>`_.
Create and configure your voucher shop in the gurado Dashboard and obtain its
**Storecode** before connecting it to TYPO3. Both gurado's Free plan and the TYPO3 WebConnect integration are free to use;
no paid subscription is required. The Free plan includes up to 10 voucher
redemptions in a 30-day period.

Composer installation from GitHub (development)
==============================================

Until the official package is published, add the GitHub repository as a
Composer VCS repository in your TYPO3 project directory:

..  code-block:: bash

    composer config repositories.gurado-webconnect vcs https://github.com/guradogmbh/gurado-webconnect-typo3.git
    composer require "gurado/typo3-webconnect:dev-feature/initial-typo3-extension" -W
    ./vendor/bin/typo3 extension:setup
    ./vendor/bin/typo3 cache:flush

For an existing installation, update using:

..  code-block:: bash

    composer update gurado/typo3-webconnect -W
    ./vendor/bin/typo3 cache:flush

..  warning::
    The GitHub development branch is not a tagged stable release. Do not
    disable Composer security-advisory blocking simply to force a dependency update.

Activate the site set
=====================

#. Open **Sites > Site Management** in the TYPO3 backend.
#. Edit the site configuration and activate the **gurado WebConnect** site set.
#. Save and clear caches.
#. Open **Sites > Setup** to configure the shop.

For non-Composer TYPO3 installations, the extension may be installed as
a local extension after extracting a compatible release package; enable
it and apply any database schema updates in the TYPO3 backend.

Next, follow :ref:`configuration` to configure WebConnect in the gurado Dashboard in three steps (design, articles, integration type), then set the Storecode and Bubble/Embed options in TYPO3.

Need help?
==========

If you have questions about the installation or configuration, email
**support@gurado.de** or use the **support chat on**
`www.gurado.de <https://www.gurado.de/>`_.
