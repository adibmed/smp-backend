<?php

namespace Tests\Unit;


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;
use function PHPUnit\Framework\assertNotNull;

class AuthenticationTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @var
     */
    private $user;
    /**
     * @var string
     */
    private $password = 'password1234';


    /**
     * Set user data
     *
     */
    private function get_user(): void
    {
        if ($this->user) return;
        $this->user = [
            'name' => 'mohamed',
            'email' => 'mohamed@gmail.com',
            'password' => bcrypt($this->password),
            'role' => 1
        ];
    }


    /**
     * Register a user
     *
     * @return User
     */
    private function register_user(): User
    {
        $this->get_user();
        return User::create($this->user);
    }

    /**
     * Login the user
     *
     * @return \Illuminate\Testing\TestResponse
     */
    private function login_user()
    {
        $this->get_user();
        return $this->post('/api/v1/login', [
            'email' => $this->user['email'],
            'password' => $this->password
        ]);
    }


    /**
     * Test register
     *
     * @test
     */
    public function user_can_register_with_name_email_password_and_role()
    {
        $this->get_user();
        $response = $this->postJson('/api/v1/register', $this->user);

        $response
            ->assertStatus(200)
            ->assertJsonStructure(['message']);
    }

    /**
     * Test login
     *
     * @test
     */
    public function user_can_log_in_with_email_and_password()
    {
        $this->register_user();
        $response = $this->post('/api/v1/login', [
            'email' => $this->user['email'],
            'password' => $this->password
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure(['access_token', 'token_type', 'expires_in']);
    }


    /**
     * Test logout.
     *
     * @test
     */
    public function user_can_log_out()
    {
        $this->register_user();
        $this->login_user();
        $user = User::where('email', $this->user['email'])->first();
        $token = JWTAuth::fromUser($user);
        $baseUrl = '/api/v1/logout?token=' . $token;

        $response = $this->postJson($baseUrl, []);

        $response
            ->assertStatus(200);
    }


    /**
     * Test user
     *
     * @test
     */
    public function user_can_get_profile_data()
    {
        $this->register_user();
        $this->login_user();
        $user = User::where('email', $this->user['email'])->first();
        $token = JWTAuth::fromUser($user);
        $response = $this->getJson('/api/v1/user?=' . $token);
        $response->assertStatus(200);
    }

    /**
     * Message
     *
     * @test
     */
    public function user_can_know_adibe_mohamed()
    {

        echo "\e[1;30;43m\t\t @Author: Adibe Mohamed ⚡ \t\t\e[0m\n";
        self::assertEquals(1, true);
    }
}
