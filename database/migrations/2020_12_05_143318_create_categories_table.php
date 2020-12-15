<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_it');
            $table->string('name_es');
            $table->string('name_en');
            $table->timestamps();
        });

        $categories = [
            ['Motori' , 'Motores' , 'Motors'],
            ['Informatica' , 'Informatica' , 'Informatics'],
            ['Libri' , 'Libros' , 'Books'],
            ['Giochi' , 'Juegos' , 'Games'],
            ['Sport' , 'Deporte' , 'Sport'],
            ['Telefoni' , 'Telefonos' , 'Phone'],
            ['Arredamento' , 'Decoraciones' , 'Decore'],
            ['Elettrodomestici' , 'Electrodomesticos' , 'Household Appliances'],
            ['Immobili' , 'Inmuebles' , 'Properties'],
            ['Televisioni' , 'TV' , 'TV'], 
        ];
        foreach($categories as $category){
            $i = new Category();          
            $i->name_it = $category[0];
            $i->name_es = $category[1];
            $i->name_en = $category[2];
            $i->save();
        }

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
