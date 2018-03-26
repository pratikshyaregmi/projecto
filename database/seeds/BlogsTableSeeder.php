<?php

use Illuminate\Database\Seeder;
use App\Blog;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $blog_one = new Blog();
      $blog_one->title = 'Mauris ut volutpat libero';
      $blog_one->slug = 'mauris-ut-volutpat-libero';
      $blog_one->meta_title = 'Mauris ut volutpat libero';
      $blog_one->meta_desc = 'Mauris ut volutpat libero';
      $blog_one->body = 'Mauris ut volutpat libero. Aenean vitae orci ut sapien ultricies cursus eget a mauris. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis congue ut arcu vel imperdiet. Nulla neque erat, luctus fermentum lectus sed, condimentum dapibus lacus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc lobortis nulla porttitor eros pretium facilisis. Vestibulum maximus mi ex, eu aliquet nunc finibus a. Nunc sed egestas eros. In hac habitasse platea dictumst. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris tristique sem sem, in lobortis erat pellentesque eget.';
      $blog_one->save();

      $blog_two = new Blog();
      $blog_two->title = 'Cras id elit vel augue molestie pulvinar';
      $blog_two->slug = 'cras-id-elit-vel-augue-molestie-pulvinar';
      $blog_two->meta_title = 'Cras id elit vel augue molestie pulvinar';
      $blog_two->meta_desc = 'Cras id elit vel augue molestie pulvinar';
      $blog_two->body = 'Cras id elit vel augue molestie pulvinar. Curabitur fermentum eros eget consequat tempor. Aenean sed ante metus. Aliquam sem neque, porta sed viverra id, pretium ut lectus. Vivamus leo ligula, consectetur non cursus sit amet, ultricies vitae libero. Suspendisse eget sapien ex. Cras risus sapien, lacinia ut sem a, euismod molestie justo. ';
      $blog_two->save();


    }
}
