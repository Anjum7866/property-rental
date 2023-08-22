<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testBasicExample()
{
    $this->browse(function (Browser $browser) {
        $user = User::factory()->make(); // Create a user for testing
        
        $browser->visit('/register')
            ->type('name', $user->name)
            ->type('email', $user->email)
            ->type('password', 'password')
            ->type('password_confirmation', 'password')
            ->press('Register')
            ->assertPathIs('/home'); // Adjust the expected path after registration
    });
}

}
