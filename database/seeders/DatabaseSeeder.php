<?php

namespace Database\Seeders;

use App\Models\Folder;
use App\Models\Language;
use App\Models\LanguageAspect;
use App\Models\LanguageLevel;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        LanguageLevel::create(['language_level' => 'A1']);
        LanguageLevel::create(['language_level' => 'A2']);
        LanguageLevel::create(['language_level' => 'B1']);
        LanguageLevel::create(['language_level' => 'B2']);
        LanguageLevel::create(['language_level' => 'C1']);
        LanguageLevel::create(['language_level' => 'C2']);

        LanguageAspect::create(['language_aspect' => 'Klausīšanās']);
        LanguageAspect::create(['language_aspect' => 'Lasīšana']);
        LanguageAspect::create(['language_aspect' => 'Sintakse']);
        LanguageAspect::create(['language_aspect' => 'Morfoloģija']);
        LanguageAspect::create(['language_aspect' => 'Valodu īpatnības']);

        Language::create(['language' => 'Angļu valoda']);
        Language::create(['language' => 'Bulgāru valoda']);
        Language::create(['language' => 'Čehu valoda']);
        Language::create(['language' => 'Dāņu valoda']);
        Language::create(['language' => 'Franču valoda']);
        Language::create(['language' => 'Grieķu valoda']);
        Language::create(['language' => 'Horvātu valoda']);
        Language::create(['language' => 'Igauņu valoda']);
        Language::create(['language' => 'Īru valoda']);
        Language::create(['language' => 'Itāļu valoda']);
        Language::create(['language' => 'Latviešu valoda']);
        Language::create(['language' => 'Lietuviešu valoda']);
        Language::create(['language' => 'Maltiešu valoda']);
        Language::create(['language' => 'Nīderlandiešu valoda']);
        Language::create(['language' => 'Poļu valoda']);
        Language::create(['language' => 'Portugāļu valoda']);
        Language::create(['language' => 'Rumāņu valoda']);
        Language::create(['language' => 'Slovāku valoda']);
        Language::create(['language' => 'Slovēņu valoda']);
        Language::create(['language' => 'Somu valoda']);
        Language::create(['language' => 'Spāņu valoda']);
        Language::create(['language' => 'Ungāru valoda']);
        Language::create(['language' => 'Vācu valoda']);
        Language::create(['language' => 'Zviedru valoda']);

        Folder::create(['folder_name' => 'A1']);
        Folder::create(['folder_name' => 'A2']);
        Folder::create(['folder_name' => 'B1']);
        Folder::create(['folder_name' => 'B2']);
        Folder::create(['folder_name' => 'C1']);
        Folder::create(['folder_name' => 'C2']);

        User::create([
            'user_name' => 'Jānis Admins',
            'email' => 'janis.jaunzems2005@gmail.com',
            'password' => bcrypt('ManaParole'),
            'role' => 'admin',
        ]);
    }
}
