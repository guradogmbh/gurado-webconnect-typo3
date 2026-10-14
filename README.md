# gurado WebConnect for TYPO3 (v0.2 development)

Development implementation for TYPO3 13.4 and 14.x. **Test in staging before production.**

## Global Bubble Mode (Site Settings only)

1. Activate the **gurado WebConnect** site set in **Sites → Setup**.
2. Open **Edit site settings** and locate **gurado WebConnect**.
3. Enter the **Shop identifier**, enable **floating widget**, and optionally set alignment and offsets.
4. Save, clear TYPO3 caches and load a frontend page. Global Bubble is added through `page.footerData.1998`.
5. The setting is per TYPO3 site. Bubble is disabled by default and is only rendered with a nonempty Shop ID.

## Embedded shop content element

Insert **gurado WebConnect** as a content element. Enter the Shop ID and optionally the page/product selection. The content element is for Embedded Mode only. Previously created Bubble content elements are intentionally suppressed to avoid duplicate floating widgets.

The script URL is `https://statics.gurado.de/widget/assets/widget.js` and is registered with the same AssetCollector key for both modes.

## Update

```bash
composer update gurado/typo3-webconnect -W
./vendor/bin/typo3 cache:flush
```

## Validation checklist

- Check Bubble on a normal page, a page without other elements and a cached response.
- Disable Bubble and confirm it disappears.
- Test an embedded shop and global Bubble together, ensuring only one JS asset.
- Test multiple sites and German/English frontend pages.
- Verify CSP/consent settings, HTML escaping and frontend console.
- Run TYPO3 13.4 and 14.3 integration tests before release.

The extension is not yet published in TER. Global Bubble has not yet been validated on the user's TYPO3 runtime.
