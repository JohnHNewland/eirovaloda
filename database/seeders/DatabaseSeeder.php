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
        LanguageLevel::create(['id' => 'A1']);
        LanguageLevel::create(['id' => 'A2']);
        LanguageLevel::create(['id' => 'B1']);
        LanguageLevel::create(['id' => 'B2']);
        LanguageLevel::create(['id' => 'C1']);
        LanguageLevel::create(['id' => 'C2']);

        LanguageAspect::create(['id' => 'materials.listening']);
        LanguageAspect::create(['id' => 'materials.reading']);
        LanguageAspect::create(['id' => 'materials.syntax']);
        LanguageAspect::create(['id' => 'materials.morphology']);
        LanguageAspect::create(['id' => 'materials.specifics']);

        Language::create(['id' => 'materials.english']);
        Language::create(['id' => 'materials.bulgarian']);
        Language::create(['id' => 'materials.czech']);
        Language::create(['id' => 'materials.danish']);
        Language::create(['id' => 'materials.french']);
        Language::create(['id' => 'materials.greek']);
        Language::create(['id' => 'materials.croatian']);
        Language::create(['id' => 'materials.estonian']);
        Language::create(['id' => 'materials.irish']);
        Language::create(['id' => 'materials.italian']);
        Language::create(['id' => 'materials.latvian']);
        Language::create(['id' => 'materials.lithuanian']);
        Language::create(['id' => 'materials.maltese']);
        Language::create(['id' => 'materials.dutch']);
        Language::create(['id' => 'materials.polish']);
        Language::create(['id' => 'materials.portuguese']);
        Language::create(['id' => 'materials.romanian']);
        Language::create(['id' => 'materials.slovak']);
        Language::create(['id' => 'materials.slovenian']);
        Language::create(['id' => 'materials.finnish']);
        Language::create(['id' => 'materials.spanish']);
        Language::create(['id' => 'materials.hungarian']);
        Language::create(['id' => 'materials.german']);
        Language::create(['id' => 'materials.swedish']);

        Folder::create(['folder_name' => 'A1']);
        Folder::create(['folder_name' => 'A2']);
        Folder::create(['folder_name' => 'B1']);
        Folder::create(['folder_name' => 'B2']);
        Folder::create(['folder_name' => 'C1']);
        Folder::create(['folder_name' => 'C2']);
        Folder::create(['parent_id' => 1, 'folder_name' => 'Klausīšanās']);
        Folder::create(['parent_id' => 1, 'folder_name' => 'Lasīšana']);
        Folder::create(['parent_id' => 1, 'folder_name' => 'Sintakse']);
        Folder::create(['parent_id' => 1, 'folder_name' => 'Morfoloģija']);
        Folder::create(['parent_id' => 1, 'folder_name' => 'Valodu īpatnības']);
        Folder::create(['parent_id' => 2, 'folder_name' => 'Klausīšanās']);
        Folder::create(['parent_id' => 2, 'folder_name' => 'Lasīšana']);
        Folder::create(['parent_id' => 2, 'folder_name' => 'Sintakse']);
        Folder::create(['parent_id' => 2, 'folder_name' => 'Morfoloģija']);
        Folder::create(['parent_id' => 2, 'folder_name' => 'Valodu īpatnības']);
        Folder::create(['parent_id' => 3, 'folder_name' => 'Klausīšanās']);
        Folder::create(['parent_id' => 3, 'folder_name' => 'Lasīšana']);
        Folder::create(['parent_id' => 3, 'folder_name' => 'Sintakse']);
        Folder::create(['parent_id' => 3, 'folder_name' => 'Morfoloģija']);
        Folder::create(['parent_id' => 3, 'folder_name' => 'Valodu īpatnības']);
        Folder::create(['parent_id' => 4, 'folder_name' => 'Klausīšanās']);
        Folder::create(['parent_id' => 4, 'folder_name' => 'Lasīšana']);
        Folder::create(['parent_id' => 4, 'folder_name' => 'Sintakse']);
        Folder::create(['parent_id' => 4, 'folder_name' => 'Morfoloģija']);
        Folder::create(['parent_id' => 4, 'folder_name' => 'Valodu īpatnības']);
        Folder::create(['parent_id' => 5, 'folder_name' => 'Klausīšanās']);
        Folder::create(['parent_id' => 5, 'folder_name' => 'Lasīšana']);
        Folder::create(['parent_id' => 5, 'folder_name' => 'Sintakse']);
        Folder::create(['parent_id' => 5, 'folder_name' => 'Morfoloģija']);
        Folder::create(['parent_id' => 5, 'folder_name' => 'Valodu īpatnības']);
        Folder::create(['parent_id' => 6, 'folder_name' => 'Klausīšanās']);
        Folder::create(['parent_id' => 6, 'folder_name' => 'Lasīšana']);
        Folder::create(['parent_id' => 6, 'folder_name' => 'Sintakse']);
        Folder::create(['parent_id' => 6, 'folder_name' => 'Morfoloģija']);
        Folder::create(['parent_id' => 6, 'folder_name' => 'Valodu īpatnības']);

        User::create([
            'user_name' => 'Jānis Admins',
            'email' => 'janis.jaunzems2005@gmail.com',
            'password' => bcrypt('26070326jHj!'),
            'role' => 'admin',
        ]);
    }
}
