<?php

namespace Database\Seeders;

use App\Models\Subtest;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        // Sample questions for TPS - Penalaran Umum (PU)
        $puSubtest = Subtest::where('code', 'PU')->first();
        $this->createQuestionsForSubtest($puSubtest, [
            [
                'question' => 'Jika semua A adalah B, dan semua B adalah C, maka...',
                'options' => [
                    'A' => 'Semua A adalah C',
                    'B' => 'Sebagian A adalah C',
                    'C' => 'Tidak ada A yang C',
                    'D' => 'Sebagian C adalah A',
                    'E' => 'Tidak dapat ditentukan'
                ],
                'correct' => 'A'
            ],
            [
                'question' => 'Manakah yang TIDAK SAMA dengan yang lain?',
                'options' => [
                    'A' => 'Buku - Halaman',
                    'B' => 'Pohon - Daun',
                    'C' => 'Rumah - Atap',
                    'D' => 'Sepatu - Tali',
                    'E' => 'Pensil - Menulis'
                ],
                'correct' => 'E'
            ],
            [
                'question' => 'Jika tidak hujan maka Ali pergi ke sekolah. Hari ini Ali tidak pergi ke sekolah. Maka...',
                'options' => [
                    'A' => 'Pasti hujan',
                    'B' => 'Tidak hujan',
                    'C' => 'Mungkin hujan',
                    'D' => 'Ali sakit',
                    'E' => 'Tidak dapat disimpulkan'
                ],
                'correct' => 'A'
            ],
            [
                'question' => 'Semua mahasiswa rajin belajar. Sebagian mahasiswa suka membaca. Maka...',
                'options' => [
                    'A' => 'Semua yang suka membaca rajin belajar',
                    'B' => 'Sebagian yang rajin belajar suka membaca',
                    'C' => 'Semua yang rajin belajar suka membaca',
                    'D' => 'Tidak ada mahasiswa yang rajin belajar',
                    'E' => 'Semua mahasiswa tidak suka membaca'
                ],
                'correct' => 'B'
            ],
            [
                'question' => 'Urutan yang tepat dari yang terkecil ke terbesar adalah...',
                'options' => [
                    'A' => 'Desa, Kota, Provinsi, Negara',
                    'B' => 'Desa, Provinsi, Kota, Negara',
                    'C' => 'Kota, Desa, Provinsi, Negara',
                    'D' => 'Provinsi, Kota, Desa, Negara',
                    'E' => 'Negara, Provinsi, Kota, Desa'
                ],
                'correct' => 'A'
            ],
        ]);

        // Sample questions for TPS - Pemahaman Bacaan dan Menulis (PBM)
        $pbmSubtest = Subtest::where('code', 'PBM')->first();
        $this->createQuestionsForSubtest($pbmSubtest, [
            [
                'question' => 'Bacalah paragraf berikut:\n\nPemanasan global telah menjadi isu utama dalam beberapa dekade terakhir. Para ilmuwan telah membuktikan bahwa suhu rata-rata bumi terus meningkat. Hal ini disebabkan oleh meningkatnya emisi gas rumah kaca.\n\nIde pokok paragraf tersebut adalah...',
                'options' => [
                    'A' => 'Definisi pemanasan global',
                    'B' => 'Penyebab pemanasan global',
                    'C' => 'Pemanasan global sebagai isu utama',
                    'D' => 'Peningkatan suhu bumi',
                    'E' => 'Emisi gas rumah kaca'
                ],
                'correct' => 'C'
            ],
            [
                'question' => 'Manakah kalimat yang paling efektif?',
                'options' => [
                    'A' => 'Saya dan dia pergi ke sekolah',
                    'B' => 'Kami pergi ke sekolah',
                    'C' => 'Saya dan dia kami pergi ke sekolah',
                    'D' => 'Kami berdua pergi ke sekolah bersama',
                    'E' => 'Ke sekolah kami pergi'
                ],
                'correct' => 'B'
            ],
            [
                'question' => 'Kata yang tepat untuk melengkapi kalimat "Ia ... tugasnya dengan baik" adalah...',
                'options' => [
                    'A' => 'Kerjakan',
                    'B' => 'Mengerjakan',
                    'C' => 'Mengerjai',
                    'D' => 'Dikerjakan',
                    'E' => 'Bekerja'
                ],
                'correct' => 'B'
            ],
            [
                'question' => 'Manakah yang merupakan kalimat baku?',
                'options' => [
                    'A' => 'Dimana kamu tinggal?',
                    'B' => 'Di mana kamu tinggal?',
                    'C' => 'Dimana tempat tinggalmu?',
                    'D' => 'Kamu tinggal dimana?',
                    'E' => 'Tinggal dimana kamu?'
                ],
                'correct' => 'B'
            ],
            [
                'question' => 'Kalimat yang menggunakan kata berimbuhan yang tepat adalah...',
                'options' => [
                    'A' => 'Mereka memperlihatkan hasil karyanya',
                    'B' => 'Dia memperlihatkan kepada temannya',
                    'C' => 'Saya memperlihatkan',
                    'D' => 'Kami memperlihatkan ke dia',
                    'E' => 'Kamu memperlihatkan sama dia'
                ],
                'correct' => 'A'
            ],
        ]);

        // Sample questions for TPS - Pengetahuan dan Pemahaman Umum (PPU)
        $ppuSubtest = Subtest::where('code', 'PPU')->first();
        $this->createQuestionsForSubtest($ppuSubtest, [
            [
                'question' => 'Siapakah proklamator kemerdekaan Indonesia?',
                'options' => [
                    'A' => 'Soekarno dan Hatta',
                    'B' => 'Soekarno dan Soeharto',
                    'C' => 'Hatta dan Soeharto',
                    'D' => 'Soekarno dan Habibie',
                    'E' => 'Hatta dan Habibie'
                ],
                'correct' => 'A'
            ],
            [
                'question' => 'Apa nama lain dari gaya gravitasi?',
                'options' => [
                    'A' => 'Gaya gesek',
                    'B' => 'Gaya pegas',
                    'C' => 'Gaya magnet',
                    'D' => 'Gaya berat',
                    'E' => 'Gaya normal'
                ],
                'correct' => 'D'
            ],
            [
                'question' => 'Berikut ini yang bukan merupakan gas rumah kaca adalah...',
                'options' => [
                    'A' => 'Karbon dioksida',
                    'B' => 'Metana',
                    'C' => 'Nitrogen',
                    'D' => 'CFC',
                    'E' => 'Ozon'
                ],
                'correct' => 'C'
            ],
            [
                'question' => 'Apa fungsi utama klorofil pada tumbuhan?',
                'options' => [
                    'A' => 'Fotosintesis',
                    'B' => 'Respirasi',
                    'C' => 'Transpirasi',
                    'D' => 'Reproduksi',
                    'E' => 'Pertumbuhan'
                ],
                'correct' => 'A'
            ],
            [
                'question' => 'Negara manakah yang memiliki penduduk terbanyak di dunia?',
                'options' => [
                    'A' => 'Amerika Serikat',
                    'B' => 'Indonesia',
                    'C' => 'India',
                    'D' => 'China',
                    'E' => 'Rusia'
                ],
                'correct' => 'D'
            ],
        ]);

        // Sample questions for TPS - Pengetahuan Kuantitatif (PK)
        $pkSubtest = Subtest::where('code', 'PK')->first();
        $this->createQuestionsForSubtest($pkSubtest, [
            [
                'question' => 'Hasil dari 3² × 3³ adalah...',
                'options' => [
                    'A' => '3⁵',
                    'B' => '3⁶',
                    'C' => '9⁵',
                    'D' => '6⁵',
                    'E' => '27'
                ],
                'correct' => 'A'
            ],
            [
                'question' => 'Jika x + y = 10 dan x - y = 4, maka nilai x adalah...',
                'options' => [
                    'A' => '3',
                    'B' => '5',
                    'C' => '7',
                    'D' => '8',
                    'E' => '9'
                ],
                'correct' => 'C'
            ],
            [
                'question' => 'Sebuah persegi panjang memiliki panjang 8 cm dan lebar 6 cm. Luasnya adalah...',
                'options' => [
                    'A' => '24 cm²',
                    'B' => '28 cm²',
                    'C' => '36 cm²',
                    'D' => '48 cm²',
                    'E' => '64 cm²'
                ],
                'correct' => 'D'
            ],
            [
                'question' => 'Jika 2x + 3 = 11, maka nilai x adalah...',
                'options' => [
                    'A' => '2',
                    'B' => '3',
                    'C' => '4',
                    'D' => '5',
                    'E' => '6'
                ],
                'correct' => 'C'
            ],
            [
                'question' => 'Bilangan berikutnya dalam deret 2, 4, 8, 16, ... adalah...',
                'options' => [
                    'A' => '24',
                    'B' => '28',
                    'C' => '30',
                    'D' => '32',
                    'E' => '36'
                ],
                'correct' => 'D'
            ],
        ]);

        // Sample questions for Literasi - Literasi Bahasa Indonesia (LBI)
        $lbiSubtest = Subtest::where('code', 'LBI')->first();
        $this->createQuestionsForSubtest($lbiSubtest, [
            [
                'question' => 'Bacalah teks berikut:\n\nBahasa Indonesia berasal dari bahasa Melayu yang digunakan sebagai lingua franca di Nusantara. Pada 28 Oktober 1928, bahasa Indonesia dikukuhkan sebagai bahasa persatuan dalam Sumpah Pemuda.\n\nPernyataan yang sesuai dengan teks tersebut adalah...',
                'options' => [
                    'A' => 'Bahasa Indonesia sama dengan bahasa Melayu',
                    'B' => 'Bahasa Indonesia berasal dari bahasa Melayu',
                    'C' => 'Sumpah Pemuda terjadi pada tahun 1927',
                    'D' => 'Bahasa Melayu bukan lingua franca',
                    'E' => 'Bahasa Indonesia bukan bahasa persatuan'
                ],
                'correct' => 'B'
            ],
            [
                'question' => 'Kalimat yang menggunakan kata serapan yang tepat adalah...',
                'options' => [
                    'A' => 'Dia menganalisa masalah dengan baik',
                    'B' => 'Dia menganalisis masalah dengan baik',
                    'C' => 'Dia menganalisakan masalah dengan baik',
                    'D' => 'Dia analisis masalah dengan baik',
                    'E' => 'Dia analisakan masalah dengan baik'
                ],
                'correct' => 'B'
            ],
            [
                'question' => 'Manakah yang merupakan kalimat aktif?',
                'options' => [
                    'A' => 'Buku itu dibaca oleh Ani',
                    'B' => 'Surat itu ditulis oleh ibu',
                    'C' => 'Ani membaca buku itu',
                    'D' => 'Makanan itu dimakan oleh kucing',
                    'E' => 'Rumah itu dibersihkan oleh pembantu'
                ],
                'correct' => 'C'
            ],
            [
                'question' => 'Kata yang tidak memiliki makna yang sama dengan "cerdas" adalah...',
                'options' => [
                    'A' => 'Pintar',
                    'B' => 'Pandai',
                    'C' => 'Genius',
                    'D' => 'Bodoh',
                    'E' => 'Cendekia'
                ],
                'correct' => 'D'
            ],
            [
                'question' => 'Penggunaan tanda baca yang tepat terdapat dalam kalimat...',
                'options' => [
                    'A' => 'Dia berkata "Saya akan datang"',
                    'B' => 'Dia berkata, "Saya akan datang."',
                    'C' => 'Dia berkata: "Saya akan datang"',
                    'D' => 'Dia berkata; "Saya akan datang"',
                    'E' => 'Dia berkata "Saya akan datang."'
                ],
                'correct' => 'B'
            ],
        ]);

        // Sample questions for Literasi - Literasi Bahasa Inggris (LBE)
        $lbeSubtest = Subtest::where('code', 'LBE')->first();
        $this->createQuestionsForSubtest($lbeSubtest, [
            [
                'question' => 'Choose the correct form:\n\nIf I ... rich, I would buy a house.',
                'options' => [
                    'A' => 'am',
                    'B' => 'was',
                    'C' => 'were',
                    'D' => 'is',
                    'E' => 'are'
                ],
                'correct' => 'C'
            ],
            [
                'question' => 'The opposite of "expensive" is...',
                'options' => [
                    'A' => 'costly',
                    'B' => 'cheap',
                    'C' => 'rich',
                    'D' => 'poor',
                    'E' => 'valuable'
                ],
                'correct' => 'B'
            ],
            [
                'question' => 'She ... to school every day.',
                'options' => [
                    'A' => 'go',
                    'B' => 'goes',
                    'C' => 'going',
                    'D' => 'went',
                    'E' => 'gone'
                ],
                'correct' => 'B'
            ],
            [
                'question' => 'Which sentence is grammatically correct?',
                'options' => [
                    'A' => 'I am go to school',
                    'B' => 'I going to school',
                    'C' => 'I goes to school',
                    'D' => 'I go to school',
                    'E' => 'I to go school'
                ],
                'correct' => 'D'
            ],
            [
                'question' => 'The book ... on the table belongs to me.',
                'options' => [
                    'A' => 'who',
                    'B' => 'whom',
                    'C' => 'whose',
                    'D' => 'which',
                    'E' => 'what'
                ],
                'correct' => 'D'
            ],
        ]);

        // Sample questions for Literasi - Penalaran Matematika (PM)
        $pmSubtest = Subtest::where('code', 'PM')->first();
        $this->createQuestionsForSubtest($pmSubtest, [
            [
                'question' => 'Jika 3x + 2y = 12 dan x - y = 3, maka nilai y adalah...',
                'options' => [
                    'A' => '1',
                    'B' => '2',
                    'C' => '3',
                    'D' => '4',
                    'E' => '5'
                ],
                'correct' => 'A'
            ],
            [
                'question' => 'Akar-akar persamaan x² - 5x + 6 = 0 adalah...',
                'options' => [
                    'A' => '2 dan 3',
                    'B' => '1 dan 4',
                    'C' => '-2 dan 7',
                    'D' => '-3 dan 8',
                    'E' => '0 dan 5'
                ],
                'correct' => 'A'
            ],
            [
                'question' => 'Sebuah lingkaran memiliki jari-jari 7 cm. Luasnya adalah... (π = 22/7)',
                'options' => [
                    'A' => '154 cm²',
                    'B' => '144 cm²',
                    'C' => '148 cm²',
                    'D' => '152 cm²',
                    'E' => '156 cm²'
                ],
                'correct' => 'A'
            ],
            [
                'question' => 'log 1000 = ...',
                'options' => [
                    'A' => '2',
                    'B' => '3',
                    'C' => '4',
                    'D' => '5',
                    'E' => '6'
                ],
                'correct' => 'B'
            ],
            [
                'question' => 'Nilai sin 30° adalah...',
                'options' => [
                    'A' => '1/4',
                    'B' => '1/3',
                    'C' => '1/2',
                    'D' => '2/3',
                    'E' => '3/4'
                ],
                'correct' => 'C'
            ],
        ]);
    }

    private function createQuestionsForSubtest($subtest, $questions)
    {
        foreach ($questions as $index => $q) {
            $question = Question::create([
                'subtest_id' => $subtest->id,
                'question_text' => $q['question'],
                'correct_answer' => $q['correct'],
                'order' => $index + 1,
            ]);

            foreach ($q['options'] as $label => $text) {
                $question->options()->create([
                    'option_label' => $label,
                    'option_text' => $text,
                ]);
            }
        }
    }
} 