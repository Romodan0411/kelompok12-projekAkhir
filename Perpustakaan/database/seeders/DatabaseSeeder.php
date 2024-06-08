<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Buku;
use App\Models\buku_categori;
use App\Models\Categori;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        Buku::create([
            'judul' => 'OnePiece',
            'pengarang' => 'Eichiro Oda',
            'deskripsi' => '“One Piece” adalah sebuah seri manga Jepang yang ditulis dan diilustrasikan oleh Eiichiro Oda. Manga ini telah dimuat di majalah Weekly Shōnen Jump milik Shueisha sejak tanggal 22 Juli 1997, dan telah dibundel menjadi 105 volume tankōbon hingga Maret 2023. Ceritanya mengisahkan petualangan Monkey D. Luffy, seorang anak laki-laki yang memiliki kemampuan tubuh elastis seperti karet setelah memakan Buah Iblis secara tidak disengaja. Luffy bersama kru bajak lautnya, yang dinamakan Bajak Laut Topi Jerami, menjelajahi Grand Line untuk mencari harta karun terbesar di dunia yang dikenal sebagai “One Piece” dalam rangka untuk menjadi Raja Bajak Laut yang berikutnya',
            'cover' => 'onepiece.jpg',
        ]);

        Buku::create([
            'judul' => 'Black Clover',
            'pengarang' => 'Yūki Tabata',
            'deskripsi' => '“Black Clover” adalah seri manga shōnen bergenre fantasi asal Jepang yang ditulis dan diilustrasikan oleh Yūki Tabata. Ceritanya mengisahkan tentang seorang anak laki-laki bernama Asta yang lahir tanpa kekuatan sihir, suatu fenomena yang tidak normal di dunia tempatnya tinggal. Asta bercita-cita menjadi penyihir terhebat di kerajaan, tetapi dia memiliki satu masalah: dia tidak bisa menggunakan sihir. Beruntung bagi Asta, dia menerima grimoire semanggi berdaun lima yang sangat langka, memberinya kekuatan anti-sihir. Meskipun tanpa kemampuan sihir, Asta bertekad untuk menjadi Raja Penyihir',
            'cover' => 'lalala.jpg',
        ]);

        Buku::create([
            'judul' => 'Atomic Habits',
            'pengarang' => 'James Clear',
            'deskripsi' => 'Buku ini membahas cara membangun kebiasaan baik dan menghentikan kebiasaan buruk dengan mengandalkan perubahan kecil yang berkelanjutan. Berdasarkan biologi, psikologi, dan ilmu saraf, buku ini menawarkan kerangka kerja yang terbukti untuk meningkatkan kehidupan dan pekerjaan Anda',
            'cover' => 'lalala.jpg',
        ]);

        Categori::create([
            'nama' => 'fiksi',
            'deskripsi' => 'Fiksi adalah sebuah karya sastra yang berasal dari imajinasi. Ini berarti bahwa kisah atau latar dalam fiksi tidak selalu didasarkan pada sejarah atau fakta. Fiksi dapat diekspresikan dalam berbagai format, termasuk tulisan, pertunjukan langsung, film, acara televisi, animasi, permainan video, dan permainan peran. Meskipun istilah “fiksi” awalnya lebih sering digunakan untuk bentuk sastra naratif seperti novel, cerita pendek, dan sandiwara, sebenarnya fiksi mencakup beragam bentuk kreatif lainnya. Karya fiksi merupakan hasil dari imajinasi kreatif, sehingga kebenarannya diasumsikan oleh audiensnya. Tokoh dan peristiwa di dalam dunia fiksi mungkin berlatar di dalam konteks mereka sendiri yang sepenuhnya terpisah dari dunia nyata. Fiksi merupakan lawan kata untuk nonfiksi, yang lebih berfokus pada fakta sejarah dan faktual. Namun, perbedaan antara fiksi dan nonfiksi bisa menjadi tidak jelas, terutama dalam sastra pascamodern',
        ]);

        Categori::create([
            'nama' => 'filsafat',
            'deskripsi' => 'Filsafat adalah ilmu pengetahuan yang berusaha mencari sebab secara mendalam berdasarkan pemikiran dan akal manusia. Kata “philosophia” dalam Bahasa Yunani menggabungkan makna “cinta kepada pengetahuan mengenai kebenaran yang hakiki,” yang mencakup kebijaksanaan, kearifan, dan hikmat. Dalam filsafat, kita menyelidiki segala sesuatu secara mendalam, termasuk ketuhanan, alam semesta, dan manusia, dengan tujuan memahami hakikatnya sejauh yang dapat dicapai oleh akal manusia'
        ]);

        buku_categori::create([
            'buku_id' => 1,
            'categori_id' => 1
        ]);

        buku_categori::create([
            'buku_id' => 2,
            'categori_id' => 1
        ]);

        buku_categori::create([
            'buku_id' => 2,
            'categori_id' => 2
        ]);

        buku_categori::create([
            'buku_id' => 3,
            'categori_id' => 2
        ]);
    }
}
