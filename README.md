# gurado WebConnect for TYPO3 (starter)

Initial implementation scaffold for TYPO3 **13.4 LTS** (not yet validated in a running TYPO3 installation).

## Features implemented
- Custom TYPO3 content element `gurado_webconnect`
- Shop ID, Bubble/Embedded, page and product selection, alignment and offsets
- Escaped HTML attributes and parameter allowlists
- WebConnect CDN JavaScript registered through TYPO3 AssetCollector
- JavaScript registration reused across multiple content elements

## Installation and testing
1. Install as Composer package or place in a local extensions directory.
2. Run TYPO3 database schema updates.
3. Activate the **gurado WebConnect** site set in the TYPO3 site configuration, with `fluid_styled_content` included.
4. Add the **gurado WebConnect** content element to a page and enter a real shop identifier.
5. Check both Bubble and Embedded, different page modes, multiple widgets and frontend JS console.

## Before production / release
- Run actual TYPO3 13.4 installation tests and PHP static analysis.
- Add localized German and English field labels.
- Add a global Bubble integration through site settings (not included in this starter).
- Confirm offset formats against the current WebConnect runtime.
- Test consent/CSP handling and accessibility with real TYPO3 installations.
- Verify composer dependencies, site set precedence, frontend caching, and TER packaging.
- Decide license with gurado legal review.

Source reference: https://de.wordpress.org/plugins/gurado-webconnect/ and user-supplied WordPress / Contao source archives.
