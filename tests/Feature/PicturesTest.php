<?php

use App\Models\Picture;

test('home page can be rendered', function () {
    $this->get('/')->assertOk();
});

test('picture page increments views count', function () {
    $picture = Picture::create([
        'title' => 'Test Picture',
        'image_url' => 'https://example.com/image.jpg',
        'artist' => 'Test Artist',
        'views_count' => 0,
    ]);

    $this->get("/pictures/{$picture->id}")->assertOk();

    expect($picture->fresh()->views_count)->toBe(1);
});


