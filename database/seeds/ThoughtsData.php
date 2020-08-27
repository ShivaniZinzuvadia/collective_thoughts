<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ThoughtsData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('thoughts')->insert([
            [
                'title' => "Thought1 title",
                'thought' => "The happiness of your life depends upon the quality of your thoughts: therefore, guard accordingly, and take care that you entertain no notions unsuitable to virtue and reasonable nature.",
                'said_by' => "Marcus Aurelius",
                'published_by' => 1,
                'sort_order' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'title' => "Thought2 title",
                'thought' => "Everyone has noticed how hard it is to turn our thoughts to God when everything is going well with us... While what we call 'our own life' remains agreeable, we will not surrender it to Him. What, then, can God do in our interests but make 'our own life' less agreeable to us, and take away the plausible sources of false happiness?",
                'said_by' => "Swami Vivekanand",
                'published_by' => 1,
                'sort_order' => 2,
                'created_at' => Carbon::now()
            ],
            [
                'title' => "Thought3 title",
                'thought' => "The anxiety I get more when I'm not working. So actually work, for me, takes away my anxiety, and doing live TV, in that moment when you're consumed by something else, it takes away all of my thoughts. It distracts you!",
                'said_by' => "Marcus Aurelius",
                'published_by' => 1,
                'sort_order' => 3,
                'created_at' => Carbon::now()
            ],
            [
                'title' => "Thought4 title",
                'thought' => "My mind withdrew its thoughts from experience, extracting itself from the contradictory throng of sensuous images, that it might find out what that light was wherein it was bathed... And thus, with the flash of one hurried glance, it attained to the vision of That Which Is.",
                'said_by' => "Saint Augustine",
                'published_by' => 1,
                'sort_order' => 4,
                'created_at' => Carbon::now()
            ],
            [
                'title' => "Thought5 title",
                'thought' => "The happiness of your life depends upon the quality of your thoughts: therefore, guard accordingly, and take care that you entertain no notions unsuitable to virtue and reasonable nature.",
                'said_by' => "Marcus Aurelius",
                'published_by' => 1,
                'sort_order' => 5,
                'created_at' => Carbon::now()
            ],
            [
                'title' => "Thought6 title",
                'thought' => "Everyone has noticed how hard it is to turn our thoughts to God when everything is going well with us... While what we call 'our own life' remains agreeable, we will not surrender it to Him. What, then, can God do in our interests but make 'our own life' less agreeable to us, and take away the plausible sources of false happiness?",
                'said_by' => "Swami Vivekanand",
                'published_by' => 1,
                'sort_order' => 6,
                'created_at' => Carbon::now()
            ],
            [
                'title' => "Thought7 title",
                'thought' => "The anxiety I get more when I'm not working. So actually work, for me, takes away my anxiety, and doing live TV, in that moment when you're consumed by something else, it takes away all of my thoughts. It distracts you!",
                'said_by' => "Marcus Aurelius",
                'published_by' => 1,
                'sort_order' => 7,
                'created_at' => Carbon::now()
            ],
            [
                'title' => "Thought8 title",
                'thought' => "My mind withdrew its thoughts from experience, extracting itself from the contradictory throng of sensuous images, that it might find out what that light was wherein it was bathed... And thus, with the flash of one hurried glance, it attained to the vision of That Which Is.",
                'said_by' => "Saint Augustine",
                'published_by' => 1,
                'sort_order' => 8,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
