<?php

namespace Database\Seeders;

use App\Helper\Helper;
use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = \App\Models\InsClass::get()->take(3);

        foreach ($classes as $class){

            $shifts   = \App\Models\Shift::where('ins_class_id',$class->id)->get();

            foreach ($shifts as $shift){

                $sections = \App\Models\Section::where('shift_id',$shift->id)->get();

                foreach ($sections as $section){
                    Group::updateOrCreate([
                        'ins_class_id'  => $class->id,
                        'shift_id'      => $shift->id,
                        'section_id'    => $section->id,
                        'name'          => 'Common'
                    ]);
                }

            }


        }
    }
}
