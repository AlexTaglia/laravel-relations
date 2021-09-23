<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Author;
use Faker\Generator as Faker;

class ArticlesTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        $authorNameList = [
            'Andrea','Lorenzo','Nicola','Enrico','Gianluca','Fabrizio','Marco','Alfredo','Roberto','Saviero','Salvo','Selvaggia','Fabio','Angela','Gabriele'
        ];

        $authorSurnameList = [
            'Scanzi','Tosa','Porro','Mentana','Di Marzio','Biasin','Travaglio','Pedullà','Saviano','Tommasi','Sottile','Lucarelli','Salamida','Marino','Parpiglia'
        ];
        
        //Lista dove pusherò gli item degli autori
        $listOfAuthorId = []; 

        //Generazione autori
        for($x = 0; $x < 10; $x++) {

            $authorObject = new Author();

            $name = array_rand(array_flip($authorNameList), 1);
            $surname = array_rand(array_flip($authorSurnameList), 1);

            $authorObject->name = $name;
            $authorObject->surname = $surname;
            $authorObject->email = "{$name}.{$surname}@boolnews.it";
            
            $authorObject->save();

            $listOfAuthorID[] = $authorObject->id;
        }
    
        //generazione articoli
        for ($i = 0; $i < 50; $i++){
            
            $articleObject = new Article();

            $articleObject->title = $faker->sentence(3);  
            $articleObject->content = $faker->paragraph(5);
            $articleObject->img = "https://picsum.photos/300/300?random={{$i}}";

            $randAuthorKey = array_rand($listOfAuthorID, 1);
            $authorId = $listOfAuthorID[$randAuthorKey];
            $articleObject->author_id = $authorId;

            $articleObject->save();
        }
    }
}
