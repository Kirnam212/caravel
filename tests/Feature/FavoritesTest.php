<?php

use App\Models\Picture;
use App\Models\User;

test('guest can not add picture to favorites', function () {
    $picture = Picture::create([
        'title' => 'Test Picture',
        'image_url' => 'https://example.com/image.jpg',
        'artist' => 'Test Artist',
    ]);

    $this->post("/pictures/{$picture->id}/favorite")
        ->assertRedirect('/login');
});

test('authenticated user can add and remove picture from favorites', function () {
    $user = User::factory()->create();

    $picture = Picture::create([
        'title' => 'Test Picture',
        'image_url' => 'https://example.com/image.jpg',
        'artist' => 'Test Artist',
    ]);

    $this->actingAs($user)
        ->post("/pictures/{$picture->id}/favorite")
        ->assertRedirect();

    $this->assertDatabaseHas('favorites', [
        'user_id' => $user->id,
        'picture_id' => $picture->id,
    ]);

    $this->actingAs($user)
        ->delete("/pictures/{$picture->id}/favorite")
        ->assertRedirect();

    $this->assertDatabaseMissing('favorites', [
        'user_id' => $user->id,
        'picture_id' => $picture->id,
    ]);
});


