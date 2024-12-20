<?php
namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    private $rowNumber = 0;
    public function query()
    {
        // Mengambil data user dengan relasi
        return User::with(['roles', 'guru', 'siswa', 'admin']);
    }

    public function headings(): array
    {
        // Header Excel disesuaikan dengan tabel di web
        return [
            'NO',             // Kolom Nomor
            'ID User',
            'NIS/NIP/ID_ADMIN',
            'Username',
            'Nama User',
            'Email',
            'Roles',
            'Data Terkait',
            'Status Login',
            'Status Akun',
        ];

    }

    public function map($user): array
    {
        $this->rowNumber++;
        return [
            $this->rowNumber, 
            $user->id,
            isset($user->guru) ? $user->guru->nip : 
                (isset($user->siswa) ? $user->siswa->nisn : 
                (isset($user->admin) ? $user->admin->id : 'Belum Terkait ke data')),
            $user->username,
            $user->name,
            $user->email,
            $user->roles->pluck('name')->implode(', '),
            isset($user->guru) ? $user->guru->nama_guru : 
                (isset($user->siswa) ? $user->siswa->nama_siswa : 
                (isset($user->admin) ? $user->admin->nama : 'Belum Terkait ke data')),
            $user->status_login ? 'Sedang' : 'Non-aktif',
            $user->email_verified_at ? 'Aktif' : 'Non-aktif',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Style header
        $sheet->getStyle('A1:J1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FFFFFFFF'], // Teks putih
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FF0070C0'], // Latar belakang biru
            ],
        ]);

        // Style border untuk seluruh data
        $sheet->getStyle('A1:J' . $sheet->getHighestRow())
            ->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => 'FF000000'], // Border hitam
                    ],
                ],
            ]);

        // Style untuk nomor (kolom pertama)
        $sheet->getStyle('A')->getAlignment()->setHorizontal('center');
    }
}
