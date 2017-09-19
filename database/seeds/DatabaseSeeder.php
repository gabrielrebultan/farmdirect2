<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('farmproducts')->insert(['productName'=>'Potato','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('farmproducts')->insert(['productName'=>'Chinese Cabbage (Wombok, Petchay)','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('farmproducts')->insert(['productName'=>'Cabbage SC','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('farmproducts')->insert(['productName'=>'Cabbage RB','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('farmproducts')->insert(['productName'=>'Sayote','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('farmproducts')->insert(['productName'=>'Carrot','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('farmproducts')->insert(['productName'=>'Brocolli','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('farmproducts')->insert(['productName'=>'Cauliflower','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('farmproducts')->insert(['productName'=>'Lettuce','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('farmproducts')->insert(['productName'=>'Baguio Beans','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('farmproducts')->insert(['productName'=>'Bell Pepper','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('farmproducts')->insert(['productName'=>'Tomato','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('farmproducts')->insert(['productName'=>'Cucumber','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('farmproducts')->insert(['productName'=>'Garden Peas','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('farmproducts')->insert(['productName'=>'Celery','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('farmproducts')->insert(['productName'=>'Onion Leeks','created_at'=>new dateTime,'updated_at'=> new dateTime]);

        //varieties of potato
        DB::table('varieties')->insert(['farmproduct_id'=>1,'variety'=>'Jumbo','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>1,'variety'=>'Super XL','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>1,'variety'=>'XL','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>1,'variety'=>'Extra (Big)','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>1,'variety'=>'Big (Medium)','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>1,'variety'=>'marble','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        
        //varieties of chinese cabbage
        DB::table('varieties')->insert(['farmproduct_id'=>2,'variety'=>'Big','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>2,'variety'=>'Medium','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>2,'variety'=>'Halfmoon','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>2,'variety'=>'Paypay','created_at'=>new dateTime,'updated_at'=> new dateTime]);

        //varieties of cabbage sb and cs
        DB::table('varieties')->insert(['farmproduct_id'=>3,'variety'=>'First Class','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>3,'variety'=>'Second Class','created_at'=>new dateTime,'updated_at'=> new dateTime]);

        DB::table('varieties')->insert(['farmproduct_id'=>4,'variety'=>'First Class','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>4,'variety'=>'Second Class','created_at'=>new dateTime,'updated_at'=> new dateTime]);

        //varieties of sayote
        DB::table('varieties')->insert(['farmproduct_id'=>5,'variety'=>'Good','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>5,'variety'=>'Semi','created_at'=>new dateTime,'updated_at'=> new dateTime]);

        //varieties of carrot
        DB::table('varieties')->insert(['farmproduct_id'=>6,'variety'=>'Jumbo','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>6,'variety'=>'Big (large)','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>6,'variety'=>'Big (medium)','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>6,'variety'=>'Medium (small)','created_at'=>new dateTime,'updated_at'=> new dateTime]);


        //varieties of brocolli and cauliflower
        DB::table('varieties')->insert(['farmproduct_id'=>7,'variety'=>'First Class','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>7,'variety'=>'Second Class','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>8,'variety'=>'First Class','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>8,'variety'=>'Second Class','created_at'=>new dateTime,'updated_at'=> new dateTime]);

        //varieties of lettuce
        DB::table('varieties')->insert(['farmproduct_id'=>9,'variety'=>'First Class','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>9,'variety'=>'Second Class','created_at'=>new dateTime,'updated_at'=> new dateTime]);

        //varieties of b beans
        DB::table('varieties')->insert(['farmproduct_id'=>10,'variety'=>'First Class','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>10,'variety'=>'Second Class','created_at'=>new dateTime,'updated_at'=> new dateTime]);

        //varieties of BELL PEPPER
        DB::table('varieties')->insert(['farmproduct_id'=>11,'variety'=>'Green','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>11,'variety'=>'Red','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>11,'variety'=>'California','created_at'=>new dateTime,'updated_at'=> new dateTime]);

        //varieties of Tomato
        DB::table('varieties')->insert(['farmproduct_id'=>12,'variety'=>'Apollo','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>12,'variety'=>'American','created_at'=>new dateTime,'updated_at'=> new dateTime]);

        //varieties of Cucumber
        DB::table('varieties')->insert(['farmproduct_id'=>11,'variety'=>'Good','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>11,'variety'=>'Semi','created_at'=>new dateTime,'updated_at'=> new dateTime]);

        //varieties of Garden Peas
        DB::table('varieties')->insert(['farmproduct_id'=>13,'variety'=>'Chinese','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>13,'variety'=>'Lapad','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>13,'variety'=>'Dwarf','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        

        //varieties of Celery
        DB::table('varieties')->insert(['farmproduct_id'=>11,'variety'=>'Long','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('varieties')->insert(['farmproduct_id'=>11,'variety'=>'Short','created_at'=>new dateTime,'updated_at'=> new dateTime]);

        //varieties of Onion Leaks



        //user roles
        DB::table('roles')->insert(['name'=>'Farmer','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('roles')->insert(['name'=>'Buyer','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('roles')->insert(['name'=>'System Personnel','created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('roles')->insert(['name'=>'Super Admin','created_at'=>new dateTime,'updated_at'=> new dateTime]);

        //super admin account
        DB::table('users')->insert(['type'=>'Super Admin','fname'=>'Farm','middleinitial'=>' ','lname'=>'Direct','email'=>'fdadmin@gmail.com','password'=>bcrypt('farmdirect'),'contactno'=>'number ni allan','activated'=>1,'premium'=>1,'created_at'=>new dateTime,'updated_at'=> new dateTime]);
        DB::table('role_users')->insert(['user_id'=>'1','role_id'=>'4','created_at'=>new dateTime,'updated_at'=> new dateTime]);

    }
}
