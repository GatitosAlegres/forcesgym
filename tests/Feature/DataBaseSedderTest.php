<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

uses(RefreshDatabase::class);

test('Database seed works sucessful', function () {

    try {
        $this->seed();
        $this->assertTrue(true);
    } catch (Exception $e) {
        $this->fail('Error in database seeding: ' . $e->getMessage());
    }
});
