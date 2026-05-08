<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ArtisanController extends Controller
{
    /**
     * Daftar command yang diizinkan
     */
    private array $allowedCommands = [
        'optimize:clear'     => ['label' => 'Clear All Cache (Optimize)', 'desc' => 'Hapus semua cache: config, route, view, application'],
        'cache:clear'        => ['label' => 'Clear Cache',                'desc' => 'Hapus application cache'],
        'config:clear'       => ['label' => 'Clear Config Cache',         'desc' => 'Hapus config cache'],
        'route:clear'        => ['label' => 'Clear Route Cache',          'desc' => 'Hapus route cache'],
        'view:clear'         => ['label' => 'Clear View Cache',           'desc' => 'Hapus compiled blade views'],
        'config:cache'       => ['label' => 'Cache Config',               'desc' => 'Compile config untuk production'],
        'route:cache'        => ['label' => 'Cache Routes',               'desc' => 'Compile routes untuk production'],
        'view:cache'         => ['label' => 'Cache Views',                'desc' => 'Compile blade views'],
        'migrate'            => ['label' => 'Migrate',                    'desc' => 'Jalankan semua migration yang belum dijalankan'],
        'migrate:fresh'      => ['label' => 'Migrate Fresh (BAHAYA!)',    'desc' => 'DROP semua tabel lalu migrate ulang — DATA HILANG!', 'danger' => true],
        'migrate:rollback'   => ['label' => 'Migrate Rollback',           'desc' => 'Rollback migration terakhir'],
        'migrate:status'     => ['label' => 'Migrate Status',             'desc' => 'Lihat status semua migration'],
        'db:seed'            => ['label' => 'DB Seed',                    'desc' => 'Jalankan DatabaseSeeder'],
        'storage:link'       => ['label' => 'Storage Link',               'desc' => 'Buat symlink public/storage → storage/app/public'],
        'queue:restart'      => ['label' => 'Queue Restart',              'desc' => 'Restart queue workers'],
        'telescope:clear'    => ['label' => 'Telescope Clear',            'desc' => 'Hapus Telescope entries (jika terinstall)'],
        'about'              => ['label' => 'App Info',                   'desc' => 'Tampilkan informasi aplikasi Laravel'],
    ];

    public function index()
    {
        $commands = $this->allowedCommands;
        $phpVersion     = PHP_VERSION;
        $laravelVersion = app()->version();
        $environment    = app()->environment();
        $dbStatus       = $this->checkDb();
        $storageLinked  = $this->checkStorageLink();
        $pendingMigrations = $this->checkPendingMigrations();

        return view('admin.pages.artisan.index', compact(
            'commands', 'phpVersion', 'laravelVersion',
            'environment', 'dbStatus', 'storageLinked', 'pendingMigrations'
        ));
    }

    public function run(Request $request)
    {
        $request->validate(['command' => 'required|string']);

        $cmd = $request->input('command');

        if (!array_key_exists($cmd, $this->allowedCommands)) {
            return response()->json(['success' => false, 'output' => 'Command tidak diizinkan.'], 403);
        }

        // Extra confirmation for dangerous commands
        if (isset($this->allowedCommands[$cmd]['danger'])) {
            if ($request->input('confirm') !== 'YES_I_UNDERSTAND') {
                return response()->json([
                    'success' => false,
                    'output'  => 'Command berbahaya ini membutuhkan konfirmasi. Ketik YES_I_UNDERSTAND.',
                    'need_confirm' => true,
                ]);
            }
        }

        try {
            $params = [];

            // Special params
            if ($cmd === 'migrate' || $cmd === 'migrate:fresh') {
                $params['--force'] = true;
            }
            if ($cmd === 'db:seed') {
                $params['--force'] = true;
            }

            $exitCode = Artisan::call($cmd, $params);
            $output   = Artisan::output();

            if (empty(trim($output))) {
                $output = "✓ Command `{$cmd}` selesai dijalankan. Exit code: {$exitCode}";
            }

            return response()->json([
                'success'   => $exitCode === 0,
                'output'    => $output,
                'exit_code' => $exitCode,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'output'  => "Error: " . $e->getMessage(),
            ], 500);
        }
    }

    private function checkDb(): string
    {
        try {
            DB::connection()->getPdo();
            return 'connected';
        } catch (\Exception $e) {
            return 'error: ' . $e->getMessage();
        }
    }

    private function checkStorageLink(): bool
    {
        return file_exists(public_path('storage'));
    }

    private function checkPendingMigrations(): int
    {
        try {
            $migrations = DB::table('migrations')->pluck('migration')->toArray();
            $files = glob(database_path('migrations/*.php'));
            $pending = 0;
            foreach ($files as $file) {
                $name = basename($file, '.php');
                if (!in_array($name, $migrations)) $pending++;
            }
            return $pending;
        } catch (\Exception $e) {
            return 0;
        }
    }
}
