<?php

namespace Tests\Feature;

use App\User;
use App\Tweet;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DataBaseMigrations;
use Illuminate\Foundation\Testing\DataBaseTransactions;

class ViewAntoherUsersTweetsTest extends TestCase
{
    use DataBaseMigrations;

    public function test_can_view_another_users_tweets()
    {
      $user = factory(User::class)->create(['username' => 'johndoe']);
      dd($user);
      $tweet = factory(Tweet::class)->make([
        'body' => 'My first tweet',
      ]);
      $user->tweets()->save($tweet);

      $this->visit('/johndoe')
        ->see('My first tweet');


        // $response = $this->get('/');
        // $response->assertSee('Laravel');
    }
}
