<?php

use App\Teacher;
use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = new Teacher;
        $teacher->name = "دکتر امیر فرید امینیان مدرس";
        $teacher->save();

        $teacher = new Teacher;
        $teacher->name = "دکتر بشرا رجایی";
        $teacher->save();

        $teacher = new Teacher;
        $teacher->name = "دکتر جواد حمیدزاده";
        $teacher->save();

        $teacher = new Teacher;
        $teacher->name = "دکتر رضا شمسایی";
        $teacher->save();

        $teacher = new Teacher;
        $teacher->name = "دکتر محمدمهدی سالخورده حقیقی";
        $teacher->save();

        $teacher = new Teacher;
        $teacher->name = "مهندس احمد شکرانی";
        $teacher->save();

        $teacher = new Teacher;
        $teacher->name = "مهندس امیر باوفا طوسی";
        $teacher->save();

        $teacher = new Teacher;
        $teacher->name = "مهندس بهزاد بختیاری";
        $teacher->save();

        $teacher = new Teacher;
        $teacher->name = "مهندس جواد یزدانجو";
        $teacher->save();

        $teacher = new Teacher;
        $teacher->name = "مهندس عباس لاکی";
        $teacher->save();
    }
}
