<?php

use App\Models\Picture;
use App\Models\User;

test('profile page requires authentication', function () {
    $this->get('/profile')->assertRedirect('/login');
});

test('profile page shows favorite pictures', function () {
    $user = User::factory()->create();

    $picture = Picture::create([
        'title' => 'Favorite Picture',
        'image_url' => 'https://example.com/image.jpg',
        'artist' => 'Test Artist',
    ]);

    $user->favoritePictures()->attach($picture->id);

    $this->actingAs($user)
        ->get('/profile')
        ->assertOk()
        ->assertSee('Favorite Picture');
});


