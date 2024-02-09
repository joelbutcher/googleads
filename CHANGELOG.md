# Release Notes

# Changelog

This changelog follows [the Keep a Changelog standard](https://keepachangelog.com).

## v8.0.0 - 2024-02-09

**What’s changed**

- Bump GoogleAds SDK to v22.0.0
- Remove support for V13 Client
- Replace StyleCI with Laravel Style workflows
- Added “update changelog” workflow

**Full Changelog**: https://github.com/joelbutcher/googleads/compare/v7.0.0...v8.0.0

## [v2.1.0 (2021-08-27)](https://github.com/joelbutcher/googleads/compare/v2.0.0...v2.1.0)

### Changes

- fix setting of login customer id

## [v2.0.0 (2021-08-27)](https://github.com/joelbutcher/googleads/compare/v1.2.0...v2.0.0)

### Changes

- Drop support for PHP < 7.3

## [v1.2.0 (2021-08-27)](https://github.com/joelbutcher/googleads/compare/v1.1.0...v1.2.0)

### Changes

- Ensure tests reflect compatibility [1c6d854](https://github.com/joelbutcher/googleads/commit/1c6d85427d3aeff4e87aa88323cc59d5a21118b5)

## [v1.1.0 (2021-08-26)](https://github.com/joelbutcher/googleads/compare/v1.0.0...v1.1.0)

### Changes

- Removed the need for `illuminate/support` by cloning the `ForwardsCalls` trait into source code.
- Google ads versions now include `^6.1.0|7.0|^8.0|^10.0|^11.0`
- Laravel requirements now include `^5.5|^6.0|^7.0|^8.0`.
- PHP requirements now include `>=7.0 || >=8.0`

# v1.0.0 (2021-04-01)

Initial Release
