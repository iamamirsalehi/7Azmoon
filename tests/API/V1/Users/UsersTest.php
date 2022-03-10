<?php

namespace API\V1\Users;

class UsersTest extends \TestCase
{
    public function test_should_create_a_new_user()
    {
        $response = $this->call('POST', 'api/v1/users', [
            'full_name' => 'Amir Salehi',
            'email' => 'isamirsalehi@gmail.com',
            'mobile' => '09121112222',
            'password' => '123456',
        ]);

        $this->assertEquals(201, $response->status());
        $this->seeJsonStructure([
            'success',
            'message',
            'data' => [
                'full_name',
                'email',
                'mobile',
                'password',
            ],
        ]);
    }

    public function test_it_must_throw_a_exception_if_we_dont_send_parameters()
    {
        $response = $this->call('POST', 'api/v1/users', []);

        $this->assertEquals(422, $response->status());
    }

    public function test_should_update_the_information_of_user()
    {
        $response = $this->call('PUT', 'api/v1/users', [
            'id' => '553',
            'full_name' => 'Amir SalehiUpdated',
            'email' => 'isamirsalehi@gmail.comAAAAAA',
            'mobile' => '09121112222UUUUUUpdated',
        ]);

        $this->assertEquals(200, $response->status());
        $this->seeJsonStructure([
            'success',
            'message',
            'data' => [
                'full_name',
                'email',
                'mobile',
            ],
        ]);
    }

    public function test_it_must_throw_a_exception_if_we_dont_send_parameters_to_update_info()
    {
        $response = $this->call('PUT', 'api/v1/users', []);

        $this->assertEquals(422, $response->status());
    }

    public function test_should_update_password()
    {
        $response = $this->call('PUT', 'api/v1/users/change-password', [
            'id' => '205',
            'password' => '1234567890',
            'password_repeat' => '1234567890',
        ]);

        $this->assertEquals(200, $response->status());
        $this->seeJsonStructure([
            'success',
            'message',
            'data' => [
                'full_name',
                'email',
                'mobile',
            ],
        ]);
    }

    public function test_it_must_throw_a_exception_if_we_dont_send_parameters_to_update_password()
    {
        $response = $this->call('PUT', 'api/v1/users/change-password', []);

        $this->assertEquals(422, $response->status());
    }

    public function test_should_delete_a_user()
    {
        $response = $this->call('DELETE', 'api/v1/users', [
            'id' => '48',
        ]);

        $this->assertEquals(200, $response->status());
        $this->seeJsonStructure([
            'success',
            'message',
            'data',
        ]);
    }

    public function test_should_get_users()
    {
        $pagesize = 3;

        $response = $this->call('GET', 'api/v1/users', [
            'page' => 1,
            'pagesize' => $pagesize,
        ]);

        $data = json_decode($response->getContent(), true);

        $this->assertEquals($pagesize, count($data['data']));
        $this->assertEquals(200, $response->status());
        $this->seeJsonStructure([
            'success',
            'message',
            'data',
        ]);
    }

    public function test_should_get_filtered_users()
    {
        $pagesize = 3;
        $userEmail = 'isamirsalehi@gmail.com';
        $response = $this->call('GET', 'api/v1/users', [
            'search' => $userEmail,
            'page' => 1,
            'pagesize' => $pagesize,
        ]);

        $data = json_decode($response->getContent(), true);
        $this->assertEquals($data['data']['email'], $userEmail);
        $this->assertEquals(200, $response->status());
        $this->seeJsonStructure([
            'success',
            'message',
            'data',
        ]);
    }
}
