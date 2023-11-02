<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

uses(RefreshDatabase::class);

test('Landing page return 200 code', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('Store page return 200 code', function () {
    $response = $this->get('/store');

    $response->assertStatus(200);
});

test('Filament admin login page return 200 code', function () {
    $response = $this->get('/admin/login');

    $response->assertStatus(200);
});
