<?php

namespace App\Providers;
use App\Models\ChatDiscussion;
use App\Models\Blog;
use App\Models\BlogCategory;

use App\Models\User;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['chat_messages.fields'], function ($view) {
            $chat_discussionItems = ChatDiscussion::pluck('last_message','id')->toArray();
            $view->with('chat_discussionItems', $chat_discussionItems);
        });
        View::composer(['chat_messages.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['chat_discussions.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['chat_discussions.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['blog_comments.fields'], function ($view) {
            $blogItems = Blog::pluck('title','id')->toArray();
            $view->with('blogItems', $blogItems);
        });
        View::composer(['blogs.fields'], function ($view) {
            $blog_categoryItems = BlogCategory::pluck('name','id')->toArray();
            $view->with('blog_categoryItems', $blog_categoryItems);
        });
        View::composer(['test_and_evaluations.fields'], function ($view) {
            $userItems = User::pluck('name', 'id')->toArray();
            $view->with('userItems', $userItems);
        });

        View::composer(['testimonies.fields'], function ($view) {
            $userItems = User::pluck('name', 'id')->toArray();
            $view->with('userItems', $userItems);
        });

        //
    }
}
