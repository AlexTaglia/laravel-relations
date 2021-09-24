<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagList = [
            'affari',
            'cinema',
            'cronaca',
            'intrattenimento',
            'musica',
            'opinione',
            'salute',
            'scienza e tecnologia',
            'sport',
            'turismo',
        ];

        foreach($tagList as $tag) {
            $tagObject = new Tag();
            $tagObject->name = $tag;
            $tagObject->save();
        }
    }
}
