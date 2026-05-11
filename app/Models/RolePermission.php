<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;

    public const ROLES = [
        'guru' => 'Guru',
        'student' => 'Student',
    ];

    public const PERMISSIONS = [
        'dashboard.view' => 'Lihat Dashboard',
        'panel.access' => 'Akses Panel Filament',
        'users.manage' => 'Kelola Pengguna',
        'spmb.manage' => 'Kelola SPMB',
        'classes.manage' => 'Kelola Kelas',
        'meetings.manage' => 'Kelola Pertemuan',
        'attendances.manage' => 'Kelola Absensi',
        'assessments.manage' => 'Kelola Penilaian',
        'evaluations.manage' => 'Kelola Evaluasi',
        'grades.manage' => 'Kelola Nilai',
        'payments.manage' => 'Kelola Pembayaran',
        'posts.manage' => 'Kelola Berita',
        'settings.manage' => 'Kelola Pengaturan',
        'reports.view' => 'Lihat Laporan',
        'reports.download' => 'Unduh Laporan',
    ];

    protected $fillable = [
        'role',
        'permission',
        'is_allowed',
    ];

    protected function casts(): array
    {
        return [
            'is_allowed' => 'boolean',
        ];
    }

}
