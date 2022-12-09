<?php

namespace Tests\Unit;

use App\Models\Category;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    public function testCreating()
    {
        Category::factory()->create();
        $this->assertDatabaseCount('categories', 1);
    }

    public function testCreatingWithChild()
    {
        /** @var Category $parent */
        $parent = Category::factory()->create();
        $this->assertDatabaseCount('categories', 1);
        $child = Category::factory()->create(['parent_id' => $parent]);
        self::assertCount(1, $parent->children);
        self::assertEquals($child->id, $parent->children[1]->id);
    }

}
