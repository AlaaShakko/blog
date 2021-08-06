<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
       //  \App\Models\User::factory(10)->create();

        //to truncate the tables
        //truncates could removed
/*        User::truncate();
        Post::truncate();
        Category::truncate();*/

        //connect to a specific aurthor instead of the fake names
        $user = User::factory()->create([
            'name'=>'kitty spencer'
        ]);

        Post::factory(5)->create([
            'user_id'=>$user->id
        ]);


        /*$user = User::factory()->create();//will create 1 user only

        $ethics = Category::create([
           'name'=>'Ethics',
            'slug'=>'ethics'
        ]);
       $ideas = Category::create([
            'name'=>'Ideas',
            'slug'=>'ideas'
        ]);
        $health = Category::create([
            'name'=>'Health',
            'slug'=>'health'
        ]);

        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$ethics->id,
            'title'=>'Forget Morality',
            'slug'=>'forget-morality',
            'excerpt'=>'<p>Moral philosophy is bogus, a mere substitute for God that licenses ugly emotions. Here are five reasons to reject it</p>',
            'body'=>'<p>Let me start with a disclosure. I am not a moral philosopher, but I have taught moral philosophy for several decades. I have come to regard the very idea of morality as fraudulent. Morality, I now believe, is a shadow of religion, serving to comfort those who no longer accept divine guidance but still hope for an objective source of certainty about right and wrong. Moralists claim to discern the existence of commands as inescapable as those of an omniscient and omnipotent God. Those commands, moral philosophers teach, deserve to prevail over all other reasons to act always, everywhere, and for all time. But that claim is bogus.</p>'

        ]);

        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$ideas->id,
            'title'=>'Ideas that work',
            'slug'=>'ideas-that-work',
            'excerpt'=>'<p>Truth, knowledge, justice – to understand how our loftiest abstractions earn their keep, trace them to their practical origins</p>',
            'body'=>'<p>Ideas, Mr Carlyle, ideas, nothing but ideas!’ scoffed a hard-headed businessman over dinner with Thomas Carlyle, the Victorian essayist and historian of the French Revolution. The businessman had had enough of Carlyle’s endless droning on about ideas – what do ideas matter anyway? Carlyle shot back: ‘There was once a man called Rousseau who wrote a book containing nothing but ideas. The second edition was bound in the skins of those who laughed at the first.’ Ideas have consequences.</p>'
        ]);

        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$health->id,
            'title'=>'World Wide Open',
            'slug'=>'world-wide-open',
            'excerpt'=>'<p>Deep brain stimulation not only treats psychiatric disease – it changes the whole person, boosting confidence and openness</p>',
            'body'=>'<p>A mother in her mid-20s begins to have recurring thoughts of physically harming her baby. These thoughts make no sense to her. She deeply loves her baby, and thoughts of hurting him intentionally are immensely distressing to her, as they would be for any parent. She decides to take a shower while her baby sleeps. The shower has the desired effect of cleansing her of her disturbing thoughts. Gradually, her thoughts turn to more mundane matters.</p>'
        ]);*/
    }
}
