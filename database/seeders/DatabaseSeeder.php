<?php

namespace Database\Seeders;

<<<<<<< HEAD
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ============================================
        // 1. SEEDER INSTANSI (4 DATA KONSISTEN)
        // ============================================
        $this->seedInstansi();

        // ============================================
        // 2. SEEDER USERS
        // ============================================
        $this->seedUsers();

        // ============================================
        // 3. SEEDER REPORTS
        // ============================================
        $this->seedReports();

        // ============================================
        // 4. SEEDER UPVOTES
        // ============================================
        $this->seedUpvotes();

        // ============================================
        // 5. SEEDER CONFIGURATIONS
        // ============================================
        $this->seedConfigurations();
    }

    /**
     * SEEDER INSTANSI - 4 DATA
     */
    private function seedInstansi(): void
    {
        DB::table('instansi')->insert([
            [
                'name' => 'Dinas Pekerjaan Umum',
                'category' => 'jalan',
                'head_name' => 'Dr. Ir. Budi Santoso',
                'phone' => '021-1234567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dinas Sumber Daya Air',
                'category' => 'drainase',
                'head_name' => 'Ir. Siti Rahayu',
                'phone' => '021-1234568',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dinas Perhubungan',
                'category' => 'lampu',
                'head_name' => 'Drs. Agus Wijaya',
                'phone' => '021-1234569',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dinas Lingkungan Hidup',
                'category' => 'sampah',
                'head_name' => 'Dra. Dewi Lestari',
                'phone' => '021-1234570',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * SEEDER USERS
     */
    private function seedUsers(): void
    {
        // Ambil ID instansi yang sudah dibuat
        $instansiIds = DB::table('instansi')->pluck('id');

        // Super Admin (tidak punya instansi)
        DB::table('users')->insert([
            'email' => 'admin@aera.com',
            'password' => Hash::make('password123'),
            'full_name' => 'Super Admin AERA',
            'role' => 'super_admin',
            'instansi_id' => null,
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Kepala Instansi (role instansi)
        DB::table('users')->insert([
            'email' => 'kepala.pu@aera.com',
            'password' => Hash::make('password123'),
            'full_name' => 'Kepala Dinas PU',
            'role' => 'instansi',
            'instansi_id' => $instansiIds[0], // Dinas PU
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'kepala.sda@aera.com',
            'password' => Hash::make('password123'),
            'full_name' => 'Kepala Dinas SDA',
            'role' => 'instansi',
            'instansi_id' => $instansiIds[1], // Dinas SDA
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Petugas Lapangan (role petugas)
        DB::table('users')->insert([
            'email' => 'petugas1@aera.com',
            'password' => Hash::make('password123'),
            'full_name' => 'Budi Petugas',
            'role' => 'petugas',
            'instansi_id' => $instansiIds[0], // Dinas PU
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'email' => 'petugas2@aera.com',
            'password' => Hash::make('password123'),
            'full_name' => 'Ani Petugas',
            'role' => 'petugas',
            'instansi_id' => $instansiIds[1], // Dinas SDA
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Warga (3 orang)
        DB::table('users')->insert([
            [
                'email' => 'warga1@example.com',
                'password' => Hash::make('password123'),
                'full_name' => 'Budi Warga',
                'phone' => '08123456789',
                'role' => 'warga',
                'instansi_id' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'warga2@example.com',
                'password' => Hash::make('password123'),
                'full_name' => 'Ani Warga',
                'phone' => '08123456780',
                'role' => 'warga',
                'instansi_id' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'warga3@example.com',
                'password' => Hash::make('password123'),
                'full_name' => 'Citra Warga',
                'phone' => '08123456781',
                'role' => 'warga',
                'instansi_id' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * SEEDER REPORTS
     */
    private function seedReports(): void
    {
        // Ambil ID warga pertama
        $wargaIds = DB::table('users')->where('role', 'warga')->pluck('id');

        DB::table('reports')->insert([
            [
                'user_id' => $wargaIds[0],
                'title' => 'Jalan Berlubang di Depan Pasar',
                'description' => 'Lubang cukup dalam, berbahaya untuk pengendara motor. Sudah 2 minggu tidak diperbaiki.',
                'photo_url' => 'reports/lubang_jalan.jpg',
                'latitude' => -6.208763,
                'longitude' => 106.845599,
                'location_address' => 'Jl. Pasar Baru No. 12, Jakarta',
                'category' => 'jalan',
                'priority_score' => 75.50,
                'ai_analysis_result' => '{"risk":"tinggi","recommendation":"segera"}',
                'status' => 'baru',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $wargaIds[1],
                'title' => 'Saluran Air Tersumbat di Perumahan',
                'description' => 'Saluran air mampet sampah, menyebabkan banjir saat hujan deras.',
                'photo_url' => 'reports/saluran_tersumbat.jpg',
                'latitude' => -6.215763,
                'longitude' => 106.845599,
                'location_address' => 'Jl. Mawar No. 5, Jakarta',
                'category' => 'drainase',
                'priority_score' => 60.00,
                'ai_analysis_result' => '{"risk":"sedang","recommendation":"segera"}',
                'status' => 'baru',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $wargaIds[2],
                'title' => 'Lampu Jalan Mati di Sepanjang Jalan Sudirman',
                'description' => 'Lampu jalan mati total, sangat gelap dan berbahaya bagi pejalan kaki.',
                'photo_url' => 'reports/lampu_mati.jpg',
                'latitude' => -6.208763,
                'longitude' => 106.855599,
                'location_address' => 'Jl. Sudirman No. 10, Jakarta',
                'category' => 'lampu',
                'priority_score' => 45.00,
                'ai_analysis_result' => '{"risk":"rendah","recommendation":"normal"}',
                'status' => 'baru',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $wargaIds[0],
                'title' => 'Sampah Menumpuk di TPS Pasar',
                'description' => 'Sampah tidak diangkut selama 3 hari, bau menyengat dan mengganggu warga.',
                'photo_url' => 'reports/sampah_tps.jpg',
                'latitude' => -6.208763,
                'longitude' => 106.875599,
                'location_address' => 'TPS Pasar Baru, Jakarta',
                'category' => 'sampah',
                'priority_score' => 80.00,
                'ai_analysis_result' => '{"risk":"tinggi","recommendation":"segera"}',
                'status' => 'baru',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * SEEDER UPVOTES
     */
    private function seedUpvotes(): void
    {
        // Ambil semua warga dan report
        $wargaIds = DB::table('users')->where('role', 'warga')->pluck('id');
        $reportIds = DB::table('reports')->pluck('id');

        // Report 1 (jalan) - 3 upvote
        DB::table('upvotes')->insert([
            [
                'report_id' => $reportIds[0],
                'user_id' => $wargaIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'report_id' => $reportIds[0],
                'user_id' => $wargaIds[1],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'report_id' => $reportIds[0],
                'user_id' => $wargaIds[2],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Report 2 (drainase) - 2 upvote
        DB::table('upvotes')->insert([
            [
                'report_id' => $reportIds[1],
                'user_id' => $wargaIds[1],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'report_id' => $reportIds[1],
                'user_id' => $wargaIds[2],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Report 3 (lampu) - 1 upvote
        DB::table('upvotes')->insert([
            [
                'report_id' => $reportIds[2],
                'user_id' => $wargaIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Report 4 (sampah) - 2 upvote
        DB::table('upvotes')->insert([
            [
                'report_id' => $reportIds[3],
                'user_id' => $wargaIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'report_id' => $reportIds[3],
                'user_id' => $wargaIds[2],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * SEEDER CONFIGURATIONS
     */
    private function seedConfigurations(): void
    {
        DB::table('system_configurations')->insert([
            [
                'config_key' => 'ai_priority_weight_upvote',
                'config_value' => '0.3',
                'description' => 'Bobot pengaruh upvote ke skor prioritas AI (0-1)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'config_key' => 'emergency_keywords',
                'config_value' => '["bocor","ambruk","kebakaran","longsor"]',
                'description' => 'Kata kunci darurat yang otomatis naikkan prioritas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'config_key' => 'default_deadline_days',
                'config_value' => '7',
                'description' => 'Batas waktu pengerjaan default (hari)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'config_key' => 'ai_min_priority_threshold',
                'config_value' => '50',
                'description' => 'Skor minimal AI untuk dianggap prioritas tinggi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
=======
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
>>>>>>> e7931bbbacd40f92ce42736210fc5eb200712355
