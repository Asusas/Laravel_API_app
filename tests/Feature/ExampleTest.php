<?php

namespace Tests\Feature;

use Tests\TestCase;

class ViewMoviesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function main_page_correct_info()
    {
        $response = $this->get(route('movies.index'));

        $response->assertSuccessful();
    }
}