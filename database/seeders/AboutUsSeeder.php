<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'title' => "We Help Students To Pass Test & Get A License On The First Try",
            'description' => "ABC Driving Institute is a reputable driving school located in the vibrant city of Kathmandu. With its commitment to providing quality driver education and training, ABC Driving Institute has established itself as a trusted institution for individuals seeking to obtain their driver's license and enhance their driving skills.

            At ABC Driving Institute, students are guided by a team of highly skilled and experienced driving instructors who are dedicated to ensuring the safety and competence of each student on the road. The instructors possess a deep understanding of traffic rules, road safety, and defensive driving techniques, allowing them to deliver comprehensive and up-to-date training.

            The driving courses at ABC Driving Institute cater to individuals of all levels, from beginners who are just starting their driving journey to experienced drivers looking to improve their skills. The institute offers both theoretical and practical lessons, creating a well-rounded learning experience for students. The theoretical classes cover essential topics such as traffic rules, road signs, and vehicle maintenance, while the practical sessions focus on hands-on driving practice in a controlled and safe environment."
        ]);
    }
}
