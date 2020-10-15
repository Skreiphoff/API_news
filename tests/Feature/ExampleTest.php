<?php

namespace Tests\Feature;

use App\Http\Controllers\NewsController;
use App\Models\News;
use Database\Factories\NewsFactory;
use Tests\TestCase;
use Faker\Generator as Faker;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testAddNews()
    {
        $faker = new Faker();
        $news = News::factory()->make();
        $response = $this->post('api/news',$news->toArray());
        dd($response);
        $response->assertStatus(200);
    }

    public function testUpdateNews()
    {
        $news = News::all()->find(10);
        $news->preview = 'asdwad';
        $response = $this->put('api/news/10',$news->toArray());
        dd($response);
        $response->assertStatus(200);
    }

    /**
     *
     */
    public function testShowNews()
    {
        $response = $this->get('api/news/10');
        $response->assertStatus(200);
    }

    /**
     *
     */
    public function testFindByName()
    {
        $response = $this->get('api/news/find/Prof');
        $response->assertStatus(200);
    }

}
