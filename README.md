# Google Ads Client OAuth2 Wrapper

<p align="center">
    <a href="https://github.com/joelbutcher/googleads/actions">
        <img src="https://github.com/joelbutcher/googleads/workflows/tests/badge.svg" alt="Build Status">
    </a>
    <a href="https://packagist.org/packages/joelbutcher/googleads">
        <img src="https://img.shields.io/packagist/dt/joelbutcher/googleads" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/joelbutcher/googleads">
        <img src="https://img.shields.io/packagist/v/joelbutcher/googleads" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/joelbutcher/googleads">
        <img src="https://img.shields.io/packagist/l/joelbutcher/googleads" alt="License">
    </a>
</p>

A lightweight and easy-to-configure extension for the Google Ads PHP Client, with OAuth2 support.

## Installation

Install the package using composer

`composer require joelbutcher/googleads

## Configuration

To configure the service, provide an array with your `client_id`, `client_secret`, `developer_token` and Google Ads Account ID:

```php
  $config = [
      'client_id' => '<your-app-client-id>',
      'client_secret' => '<your-app-client-secret>',
      'developer_token' => '<your-developer-token>',
      'login_customer_id' => '<your-app-client-id>',
  ];

  $googleAds = new GoogleAds($config);
```

> Note, if you're using an MCC (Manager account), `login_customer_id` will need to be your MCC account ID.

## Usage
Once you've configured the client, you are then ready to start using the client to interact with Google Ads. First, we need to authorize the user with a refresh token. This can be obtained from a simple [OAuth flow](https://github.com/googleapis/google-api-php-client#authentication-with-oauth) with Google.

> Make sure to request the adwords scope in your OAuth2.0 authorization request.

```php
  // ...
  $googleAds->authorize($refreshToken);
```

If you're using an MCC and have configured your `login_customer_id` to use the MCC account ID, you will need to pass the ID of the account you are acting on behalf of, as the second parameter to the `authorize` method:

```php
  // ...
  $googleAds->authorize($refreshToken, '<child-account-id>');
```

## Interacting with Google Ads PHP SDK
Now that you're all configured and authenticated, you can now begin interacting with the underlying `GoogleAdsClient` class. You can call any of the services found here directly from the your `$googleAds` instance from the snippets above. For example, to retrieve the Campaign Service Client, simply call the following:

```php
  // ...
  $googleAds->getCampaignServiceClient();
```

## Versioning
Currently, we only support V9 of the Google Ads SDK.

## Changelog

Check out the [CHANGELOG](CHANGELOG.md) in this repository for all the recent changes.

## Maintainers

Developed and maintained by [Joel Butcher](https://joelbutcher.co.uk)

## Credits

You can view all contributers [here](https://github.com/joelbutcher/googleads/graphs/contributors)

## License

This pacakge is open-sourced software licensed under the [MIT license](LICENSE.md).
