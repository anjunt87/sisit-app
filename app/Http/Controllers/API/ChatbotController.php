<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;

class ChatbotController extends Controller
{
    private $responses = [

        // Nilai Islami
        'islami' => [
            'keywords' => ['islami', 'nilai islam', 'agama', 'syariah', 'akhlak', 'karakter'],
            'reply' => 'Sekolah kami menanamkan nilai-nilai Islam dalam setiap aktivitas: shalat berjamaah, tahfidz, adab kepada guru & orang tua, serta pembiasaan sunnah seperti dzikir dan puasa Senin-Kamis.'
        ],

        // Salam dan sapaan Islami
        'salam' => [
            'keywords' => ['assalamualaikum', 'salam', 'waalaikumsalam', 'wassalamualaikum'],
            'reply' => 'Waalaikumsalam warahmatullah wabarakatuh. Semoga Anda selalu dalam lindungan Allah SWT. Ada yang bisa kami bantu hari ini? 😊'
        ],

        // Doa harian
        'doa' => [
            'keywords' => ['doa', 'doa harian', 'doa pagi', 'doa sebelum belajar'],
            'reply' => 'Salah satu doa sebelum belajar:<br><br>
    <em>Rabbi zidnii ‘ilmaa warzuqnii fahmaa</em><br>
    Artinya: “Ya Allah tambahkanlah ilmuku dan berikanlah aku pemahaman.”'
        ],

        // Tahfidz
        'tahfidz' => [
            'keywords' => ['tahfidz', 'hafalan', 'al-quran', 'tilawah', 'murojaah'],
            'reply' => 'Program Tahfidz Al-Quran kami dibimbing oleh ustadz/ustadzah bersanad, dengan target hafalan bertahap dan murojaah rutin setiap hari. Setiap siswa didampingi sesuai level dan kemampuan.'
        ],

        // Sunnah harian
        'sunnah' => [
            'keywords' => ['sunnah', 'amalan sunnah', 'puasa senin kamis', 'dzikir'],
            'reply' => 'Kami membiasakan siswa untuk menjalankan amalan sunnah seperti shalat dhuha, dzikir pagi-petang, puasa sunnah (Senin-Kamis), serta membaca Al-Qur’an setiap hari.'
        ],


        // Pendaftaran
        'daftar' => [
            'keywords' => ['daftar', 'pendaftaran', 'masuk', 'bergabung', 'join'],
            'reply' => 'Silakan daftar di: <a href="/daftar" class="text-green-600 underline">Formulir Pendaftaran</a>. Atau hubungi kami di WhatsApp untuk info lebih lanjut.'
        ],

        // Program & Kurikulum
        'program' => [
            'keywords' => ['program', 'kurikulum', 'pelajaran', 'mata pelajaran', 'jurusan'],
            'reply' => 'Kami memiliki program unggulan: Tahfidz Al-Quran, Sains & Teknologi, serta Akhlak & Karakter. Setiap program dirancang untuk mengembangkan potensi siswa secara holistik.'
        ],

        // Jadwal
        'jadwal' => [
            'keywords' => ['jadwal', 'jam belajar', 'waktu', 'jam sekolah', 'schedule'],
            'reply' => 'Jadwal belajar: Senin–Jumat pukul 07.00–14.00 WIB. Sabtu ada kegiatan ekstrakurikuler pukul 08.00–11.00 WIB.'
        ],

        // Lokasi
        'lokasi' => [
            'keywords' => ['alamat', 'lokasi', 'tempat', 'dimana', 'maps', 'peta'],
            'reply' => '
            Anda dapat mengunjungi lokasi sekolah kami melalui Google Maps:<br><br>
            🏫 <strong>NIIS 1 & 2</strong>: <a href="https://maps.app.goo.gl/KBSpqMNciY7LM3Qt5" target="_blank" class="text-green-600 underline">📍 Google Maps</a> atau <a href="https://www.google.com/maps/dir/?api=1&destination=-6.3100083,107.3435115" target="_blank" class="text-green-600 underline">🗺️ Rute</a><br>
            🏫 <strong>NIIS 3</strong>: <a href="https://maps.app.goo.gl/zmbQurhrPghk6pQ19" target="_blank" class="text-green-600 underline">📍 Google Maps</a> atau <a href="https://www.google.com/maps/dir/?api=1&destination=-6.3527211,107.3551641" target="_blank" class="text-green-600 underline">🗺️ Rute</a>'
        ],

        // Biaya
        'biaya' => [
            'keywords' => ['biaya', 'spp', 'uang sekolah', 'bayar', 'harga', 'tarif'],
            'reply' => 'Untuk informasi biaya pendaftaran dan SPP, silakan hubungi admin kami di WhatsApp atau datang langsung ke sekolah untuk konsultasi.'
        ],

        // Fasilitas
        'fasilitas' => [
            'keywords' => ['fasilitas', 'sarana', 'prasarana', 'lab', 'perpustakaan', 'kantin'],
            'reply' => 'Fasilitas kami meliputi: Lab Komputer, Perpustakaan, Masjid, Lapangan Olahraga, Kantin Sehat, dan ruang kelas ber-AC.'
        ],

        // Kontak
        'kontak' => [
            'keywords' => ['kontak', 'hubungi', 'telepon', 'whatsapp', 'wa', 'phone'],
            'reply' => 'Hubungi kami: 📞 (0267) 123-4567 | 📱 WhatsApp: 0812-3456-7890 | 📧 info@sekolah.com'
        ],

        // Guru
        'guru' => [
            'keywords' => ['guru', 'pengajar', 'tenaga pengajar', 'staff', 'kualifikasi'],
            'reply' => 'Guru-guru kami berkualifikasi S1/S2 dengan pengalaman mengajar minimal 3 tahun. Semua guru telah tersertifikasi dan mengikuti pelatihan berkala.'
        ],

        // Ekstrakurikuler
        'ekskul' => [
            'keywords' => ['ekstrakurikuler', 'ekskul', 'kegiatan', 'club', 'organisasi'],
            'reply' => 'Ekstrakurikuler yang tersedia: Pramuka, Olahraga (Futsal, Basket, Badminton), Seni (Tari, Musik), Robotika, dan English Club.'
        ]
    ];

    public function ask(Request $request): JsonResponse
    {
        // Validasi input
        $request->validate([
            'message' => 'required|string|max:500'
        ]);

        $message = Str::lower(trim($request->input('message')));

        // Jika pesan kosong
        if (empty($message)) {
            return response()->json([
                'reply' => 'Silakan ketik pertanyaan Anda.',
                'status' => 'error'
            ]);
        }

        $reply = $this->generateReply($message);

        return response()->json([
            'reply' => $reply,
            'status' => 'success',
            'success' => true,
            'timestamp' => now()->toISOString()
        ]);
    }

    private function generateReply(string $message): string
    {
        // Check for specific topics first
        foreach ($this->responses as $topic => $data) {
            foreach ($data['keywords'] as $keyword) {
                if (Str::contains($message, $keyword)) {
                    return $data['reply'];
                }
            }
        }

        // Greeting fallback
        if ($this->containsGreeting($message)) {
            $greetings = [
                'Halo! Selamat datang di Asisten Sekolah kami. Ada yang bisa saya bantu?',
                'Hai! Saya siap membantu Anda. Silakan tanya tentang sekolah kami.',
                'Selamat datang! Ada informasi apa yang ingin Anda ketahui tentang sekolah kami?',
                'Waalaikumsalam warahmatullah wabarakatuh. Semoga Anda selalu dalam lindungan Allah SWT. Ada yang bisa kami bantu hari ini? 😊'
            ];
            return $greetings[array_rand($greetings)];
        }

        // FAQ umum
        if (Str::contains($message, ['terima kasih', 'thanks', 'makasih'])) {
            return 'Sama-sama! Senang bisa membantu. Ada pertanyaan lain?';
        }

        if (Str::contains($message, ['selamat pagi', 'selamat siang', 'selamat sore', 'selamat malam'])) {
            return 'Selamat ' . $this->getTimeGreeting() . '! Ada yang bisa saya bantu hari ini?';
        }

        // Default response
        return 'Maaf, saya belum bisa menjawab pertanyaan itu. Coba tanya tentang: <strong>pendaftaran, program, jadwal, lokasi, biaya, fasilitas, atau kontak</strong>.';
    }

    private function containsGreeting(string $message): bool
    {
        $greetings = ['halo', 'hai', 'hello', 'hi', 'assalamualaikum', 'selamat'];

        foreach ($greetings as $greeting) {
            if (Str::contains($message, $greeting)) {
                return true;
            }
        }

        return false;
    }

    private function getTimeGreeting(): string
    {
        $hour = now()->hour;

        if ($hour < 12) {
            return 'pagi';
        } elseif ($hour < 15) {
            return 'siang';
        } elseif ($hour < 18) {
            return 'sore';
        } else {
            return 'malam';
        }
    }
}
