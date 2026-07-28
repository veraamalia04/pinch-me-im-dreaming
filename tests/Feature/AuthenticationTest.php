<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    public function test_registrasi_user(){

        $response = $this->post(route('post.register'), [
            'name' => 'zayn',
            'username' => 'zaynmalik',
            'email' => 'vera@zayn.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect(route('page.login'));
    }

    public function test_user_login(){
        $user = User::factory()->create([
            'username' => 'zayn',
            'password' => Hash::make('password'),
        ]);

        $response = $this->post(route('post.login'), [
            'username' => 'zayn',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('index'));
    }

    public function test_user_logout(){
         $user = User::factory()->create([
            'username' => 'zayn',
            'password' => Hash::make('password'),
        ]);

        $this->actingAs($user);

        $response = $this->post(route('post.logout'));

        $response->assertRedirect(route('page.login'));
    }

    public function test_admin_login(){
         $user = User::factory()->create([
            'username' => 'zayn',
            'password' => Hash::make('password'),
        ]);

        $user->roles()->sync([1]);

        $response = $this->post(route('post.login'),
        [
            'username' => 'zayn',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('page.dashboard.index'));
    }
}
