<?php

use App\Http\Models\BillboardModel;
use Illuminate\Database\Seeder;

class BillboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        factory(BillboardModel::class, 50)->create()
            ->each(function ($u) {
                $u->posts()->save(factory(BillboardModel::class)->make());
            });
    }
}
