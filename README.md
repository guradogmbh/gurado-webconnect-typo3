# gurado WebConnect for TYPO3

![Official gurado logo](Documentation/Images/gurado-logo.svg)

**Sell gift vouchers from your TYPO3 website with gurado — no paid subscription required to get started.**

gurado is a cloud-based voucher management platform covering online sales, in-store redemption, and reporting for finance and accounting teams. WebConnect embeds your gurado voucher shop into TYPO3 without rebuilding the voucher checkout.

- **Free:** sell vouchers with payment by invoice/bank transfer to your own bank account, with up to **10 voucher redemptions in a 30-day period**.
- **Paid plans:** supported automated payment integrations such as PayPal, Stripe, Worldline, Nexi, hobex and Mollie; physical gift-card printing and delivery by gurado. Provider and fulfilment fees may apply.
- **Embed Mode:** article listing, categories or one specific article inside a TYPO3 page.
- **Bubble Mode:** floating voucher shop enabled once per TYPO3 site, with Default welcome screen, Articles or direct Article starting view.

## Create your free gurado account

**[Sign up for a free gurado account](https://dashboard.gurado.de/register)** to create and configure your voucher shop. You will need its **Storecode** to connect WebConnect to TYPO3. Both the gurado Free plan and the TYPO3 WebConnect extension can be used without a paid subscription. The Free plan allows up to 10 voucher redemptions in a 30-day period.

## Installation

**After the v1.0.0 release is published on Packagist**, the regular installation command will be:

```bash
composer require gurado/typo3-webconnect
```

### Development branch (before public release)

The release candidate has been tested in a TYPO3 14.3.9 installation. TYPO3 13.4 dependency resolution has also passed CI; a full TYPO3 13.4 functional installation test is still recommended. Until the stable tag is published, use the development-branch installation below.

```bash
composer config repositories.gurado-webconnect vcs https://github.com/guradogmbh/gurado-webconnect-typo3.git
composer require "gurado/typo3-webconnect:dev-feature/initial-typo3-extension" -W
./vendor/bin/typo3 extension:setup
./vendor/bin/typo3 cache:flush
```

Enable the **gurado WebConnect** site set in TYPO3 site management. In Site Settings, enter your **Storecode** and enable Bubble Mode if desired. For Embed Mode, add a **gurado WebConnect** content element to a page.

## Full documentation

Start with [the complete installation and user guide](Documentation/Index.rst), including free and paid plans, supported views, in-store redemption, accounting reports and troubleshooting.

## Support

Questions about gurado or the WebConnect extension? **Email [support@gurado.de](mailto:support@gurado.de)** or contact us directly through the **support chat on [www.gurado.de](https://www.gurado.de/)**.

- [gurado support information](https://support.gurado.de)
- [Report a technical extension issue on GitHub](https://github.com/guradogmbh/gurado-webconnect-typo3/issues)

**Release status:** 1.0.0 release candidate; not yet published in TYPO3 Extension Repository. Do not disable Composer security advisory protections to force package installation.
