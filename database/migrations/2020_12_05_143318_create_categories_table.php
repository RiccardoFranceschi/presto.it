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
            $table->string('name');
            $table->timestamps();
        });

        $categories = [
            'Motori', 'Informatica', 'Libri', 'Giochi', 'Sport', 'Telefoni', 
            'Arredamento', 'Elettrodomestici', 'Immobili', 'Televisioni',  
        ];

        foreach($categories as $category){
            $i = new Category();
            $i->name = $category;
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
