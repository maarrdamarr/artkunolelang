<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\LandingSection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class LandingSectionUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_upload_landing_image_and_public_page_renders()
    {
        Storage::fake('public');

        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)
            ->post(route('admin.landing_sections.store'), [
                'title' => 'Hero Section',
                'description' => 'Hero desc',
                'image' => UploadedFile::fake()->image('hero.jpg'),
                'published' => true,
            ])
            ->assertRedirect(route('admin.landing_sections.index'));

        $section = LandingSection::first();
        $this->assertNotNull($section);
        $this->assertStringStartsWith('landing/', $section->image);
        $this->assertTrue(Storage::disk('public')->exists($section->image));

        // public landing page should render
        $response = $this->get(route('home'));
        $response->assertStatus(200);
        $response->assertSeeText('Hero Section');
    }
}
