<?php

namespace Tests;

use JoelButcher\GoogleAds\ConfigException;
use JoelButcher\GoogleAds\GoogleAds;
use PHPUnit\Framework\TestCase;

class GoogleAdsConfigTest extends TestCase
{
    /**
     * @test
     */
    public function test_it_throws_config_exception_for_no_client_id()
    {
        $config = [];
        $googleAds = new GoogleAds($config);

        $this->expectException(ConfigException::class);
        $this->expectExceptionMessage('The Client ID has not been configured.');

        $googleAds->authorize('token');
    }

    public function test_it_throws_config_exception_for_no_client_secret()
    {
        $config = ['client_id' => 'some-id'];
        $googleAds = new GoogleAds($config);

        $this->expectException(ConfigException::class);
        $this->expectExceptionMessage('The Client Secret has not been configured.');

        $googleAds->authorize('token');
    }

    public function test_it_throws_config_exception_for_no_developer_token()
    {
        $config = ['client_id' => 'some-id', 'client_secret' => 'some-secret'];
        $googleAds = new GoogleAds($config);

        $this->expectException(ConfigException::class);
        $this->expectExceptionMessage('A Developer Token has not been specified.');

        $googleAds->authorize('token');
    }

    public function test_it_throws_config_exception_for_no_login_customer_id()
    {
        $config = ['client_id' => 'some-id', 'client_secret' => 'some-secret', 'developer_token' => 'some-dev-token'];
        $googleAds = new GoogleAds($config);

        $this->expectException(ConfigException::class);
        $this->expectExceptionMessage('A Login Customer ID has not been specified.');

        $googleAds->authorize('token');
    }

    public function test_it_throws_config_exception_for_login_customer_id_as_a_string()
    {
        $config = ['client_id' => 'some-id', 'client_secret' => 'some-secret', 'developer_token' => 'some-dev-token', 'login_customer_id' => 'some-customer-id'];
        $googleAds = new GoogleAds($config);

        $this->expectException(ConfigException::class);
        $this->expectExceptionMessage('The provided Login Customer ID is not an integer.');

        $googleAds->authorize('token');
    }

    public function test_no_exceptions_are_thrown_for_valid_config()
    {
        $config = ['client_id' => 'some-id', 'client_secret' => 'some-secret', 'developer_token' => 'some-dev-token', 'login_customer_id' => 12345678];
        $googleAds = new GoogleAds($config);

        $this->assertInstanceOf(GoogleAds::class, $googleAds->authorize('token'));
    }
}
