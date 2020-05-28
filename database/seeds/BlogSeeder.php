<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => $this->generateRandomString(),
            'body' => '<p>'.$this->generateRandomString(200).'</p>',
            'user_id'=>9999999
        ]);
    }
    private function generateRandomString($length = 10)
    {
        $string = '';
        $vowels = array("ei", "ang", "ing", "ay", "ya", "yo", "ai", "eight", "aia", "er", "uyen", "ung", "ieu", "inh", "on", "ong");
        $consonants = array(
            'zh', 'th', 'tr', 'gi', 'gh', 'br', 'ch', 'nh', 'ng', 'sh', 'wh', 'str', 'ngh', 't', 'h'
        );
        srand((double)microtime() * 1000000);
        $max = $length / 2;
        for ($i = 1; $i <= $max; $i++) {
            $string .= $consonants[rand(0, 14)];
            $string .= $vowels[rand(0, 14)];
            $string .= ' ';
        }

        return $string;
    }
}
