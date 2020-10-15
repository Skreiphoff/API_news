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
     * Тест на добавление записи с использованием фабрики
     */
    public function testAddNews()
    {
        $news = News::factory()->make();
        $response = $this->post('api/news',$news->toArray());
        $response->assertStatus(201);
    }

    /**
     * Тест на изменение записи
     */
    public function testUpdateNews()
    {
        $news = News::all()->find(9);
        $news->preview = 'Тестовое значение';
        $response = $this->put('api/news/9',$news->toArray());
        $response->assertStatus(200);
    }

    /**
     * Тест на показ новости по id
     */
    public function testShowNews()
    {
        $response = $this->get('api/news/10');
        $response->assertStatus(200);
    }

    /**
     * Тест на показ записи по названию
     */
    public function testFindByName()
    {
        $response = $this->get('api/news/find/Quo quibusdam aut sed at. Quia dolores quis est libero.');
        $response->assertStatus(200);
    }

    /**
     * Тест на добавление новости
     */
    public function testAddDuplicateNews()
    {
        $news = News::all()->find(9);
        $news->id = null;
        $response = $this->post('api/news',$news->toArray());
        $response->assertStatus(422);
    }

    /**
     * Тест на удаление записи
     */
    public function testDeleteNews()
    {
        $news = News::all()->last();
        $id = $news->id;
        $request = $this->delete('api/news/'.$id);
        $request->assertStatus(204);
    }
}
